import cx_Oracle
connection = cx_Oracle.connect("DIEGO", "cnu5181tp3", "localhost:1521")
print("Database version:", connection.version)
cursor = connection.cursor()

"-----Create Tablas-----"

cursor.execute(
    '''
        CREATE TABLE CASOS_POR_REGION(
            Region VARCHAR(60),
            Codigo_Region INT NOT NULL,
            Codigo_Comuna INT
            )
    ''')

cursor.execute(
    '''
        CREATE TABLE CASOS_POR_COMUNA(
            Comuna VARCHAR2(60),
            Codigo_Comuna INT NOT NULL,
            Poblacion INT,
            Casos_Confirmados INT
            )
    ''')

"-----Recorrer y Leer archivos, ingresar valores a la database-----"

file = open("CasosConfirmadosPorComuna.csv")
lines = file.readlines()[1:]
for line in lines:
    datos = line.split(",")
    esecuele = """INSERT INTO CASOS_POR_COMUNA VALUES(:1, :2, :3, :4)"""
    cursor.execute(esecuele, [datos[0], int(datos[1]), int(datos[2]), int(datos[3])])

connection.commit()

arch = open("RegionesComunas.csv")
lines = arch.readlines()[1:]
for line in lines:
    datos = line.split(",")
    sql = """INSERT INTO CASOS_POR_REGION VALUES(:1,:2,:3)"""
    cursor.execute(sql,[datos[0],int(datos[1]),int(datos[2])])

connection.commit()

file.close()
arch.close()

"--------Funciones--------"
'''
Nombre de la función: crearcomuna()
Parametros: -
Return: -
Está funcion crea la comuna, con su codigo, poblacion y casos confirmados, insertandolo en la tabla
'''
def crearcomuna():
    Comun = str(input("Ingrese la Comuna"))
    Code = int(input("Ingrese el codigo de la comuna"))
    Pobla = int(input("Ingrese la Poblacion de la comuna"))
    Confir = int(input("Ingrese los casos confirmados de la comuna"))
    cursor.execute(
        '''
        INSERT INTO CASOS_POR_COMUNA (COMUNA, CODIGO_COMUNA, POBLACION, CASOS_CONFIRMADOS)
        VALUES (:Comun,:Code,:Pobla,:Confir)
        ''', [Comun, Code, Pobla, Confir]
    )
    connection.commit()
    print("Comuna creada")

'''
Nombre de la función: crearregion()
Parametros: -
Return: -
Está funcion crea la region, con su codigo y su codigo de comuna, insertandolo en la tabla
'''
def crearregion():
    Region = str(input("Ingrese la Región"))
    Code = int(input("Ingrese el codigo de la region"))
    CodeComuna = int(input("Ingrese el codigo de la comuna"))
    cursor.execute(
        '''
        INSERT INTO CASOS_POR_REGION (REGION, CODIGO_REGION, CODIGO_COMUNA)
        VALUES (:Region,:Code,:CodeComuna)
        ''', [Region, Code, CodeComuna]
    )
    connection.commit()
    print("Region Creada")

'''
Nombre de la función: TotalesComuna()
Parametros: -
Return: -
Está funcion genera todos los casos confirmados que tiene la comuna a ingresar.
'''
def TotalesComuna():
    comuna = str(input("Ingrese la comuna para obtener los casos:"))
    cursor.execute(
        '''
        SELECT C.COMUNA, CASOS_CONFIRMADOS totalcasos
        from CASOS_POR_COMUNA C
        WHERE C.COMUNA= :1
        ''', [comuna])
    connection.commit()

'''
Nombre de la función: TotalesRegion()
Parametros: -
Return: -
Está funcion genera todos los casos confirmados que tiene la region a ingresar.
'''
def TotalesRegion():
    id = int(input("Ingrese el ID de region:"))
    cursor.execute(
        '''
        SELECT R.CODIGO_REGION, Poblacion, CASOS_CONFIRMADOS
        FROM CASOS_POR_REGION  R
        LEFT JOIN CASOS_POR_COMUNA C ON 
        R.CODIGO_COMUNA= C.CODIGO_COMUNA
        WHERE R.CODIGO_REGION = :1
        ''', [id])
    connection.commit()

'''
Nombre de la función: TotalesTodasComunas()
Parametros: -
Return: -
Está funcion genera todos los casos confirmados de todas las comunas.
'''
def TotalesTodasComunas():
    cursor.execute(
        '''
        SELECT COMUNA, poblacion , casos_confirmados
        FROM CASOS_POR_COMUNA 
        ORDER BY CODIGO_COMUNA
        '''
    )
    filas = cursor.fetchall()
    for fila in filas:
        print(fila[0],fila[1],fila[2])
    connection.commit()

'''
Nombre de la función: TotalesTodasRegiones()
Parametros: -
Return: -
Está funcion genera todos los casos confirmados de todas las regiones.
'''
def TotalesTodasRegiones():
    cursor.execute(
        '''
        SELECT Region, Poblacion , Casos_confirmados  
        FROM CASOS_POR_REGION R
        LEFT JOIN CASOS_POR_COMUNA C ON 
        R.CODIGO_COMUNA= C.CODIGO_COMUNA
        ORDER BY Region
        ''')
    filas = cursor.fetchall()
    for fila in filas:
        print(fila[0], fila[1], fila[2])
    connection.commit()

'''
Nombre de la función: Agregarcasosconfirmadoscomunas()
Parametros: -
Return: -
Está funcion agrega casos confirmados a la comuna correspondiente, sumandolos
'''
def Agregarcasosconfirmadoscomunas():
    VALORPERSONA = int(input("Ingrese el valor a sumar"))
    IDComuna = str(input("Ingrese la Comuna"))
    cursor.execute(
        '''
        UPDATE CASOS_POR_COMUNA C
        SET CASOS_CONFIRMADOS = (
        SELECT sum(C.casos_confirmados+:1)
        FROM CASOS_POR_COMUNA C
        WHERE C.comuna = :2)
        WHERE C.comuna = :3
        ''',[VALORPERSONA,IDComuna,IDComuna])
    connection.commit()

'''
Nombre de la función: Eliminarcasosconfirmadoscomunas()
Parametros: -
Return: -
Está funcion elimina (resta) casos confirmados a la comuna correspondiente
'''
def Eliminarcasosconfirmadoscomunas():
    VALORPERSONA = int(input("Ingrese el valor a restar:"))
    IDComuna = str(input("Ingrese la Comuna:"))
    cursor.execute(
        '''
        UPDATE CASOS_POR_COMUNA C
        SET CASOS_CONFIRMADOS = (
        SELECT sum(c.casos_confirmados-:1)
        FROM CASOS_POR_COMUNA C
        WHERE c.comuna = :2)
        WHERE c.comuna = :3
        ''',[VALORPERSONA,IDComuna,IDComuna]
    )
    connection.commit()

'''
Nombre de la función: CombinarComunas()
Parametros: -
Return: -
Está funcion combina dos comunas a elección del usuario, creando un nombre y un codigo correspondientemente
(Creo que no las elimina, las une pero no elimina)
'''
def CombinarComunas():
    NuevaComuna = str(input("Ingrese el nombre de la comuna donde combinará el resto:"))
    CodeComuna = int(input("Ingrese el codigo de la comuna creada:"))
    Comun = int(input("Ingrese el primer codigo de  comuna a combinar"))
    Comun2 = int(input("Ingrese el segundo codigo de comuna a combinar"))
    cursor.execute(
        '''
        UPDATE CASOS_POR_COMUNA C
        SET comuna = :1, codigo_comuna = :2
        WHERE c.codigo_comuna IN (:3,:4)
        ''',[NuevaComuna,CodeComuna,Comun,Comun2]
    )
    connection.commit()

'''
Nombre de la función: CombinarRegiones()
Parametros: -
Return: -
Está funcion combina dos regiones a elección del usuario, creando un nombre y un codigo correspondientemente
(Creo que no las elimina, las une pero no elimina)
'''
def CombinarRegiones():
    newregion = str(input("Ingrese el nombre de la región combinada"))
    newcoderegion= int(input("Ingrese el codigo de la region combinada"))
    code1= int(input("Ingrese el codigo a combinar"))
    code2= int(input("Ingrese el segundo codigo a combinar"))
    cursor.execute(
        '''
        UPDATE CASOS_POR_REGION R
        SET region = :1, codigo_region = :2
        WHERE r.codigo_region IN (:3,:4)
        ''',[newregion,newcoderegion,code1,code2]
    )
    connection.commit()

'''
Nombre de la función: Top5Comunas()
Parametros: -
Return: -
Esta función genera el top 5 de comunas con mayor porcentaje de casos confirmados
'''
def Top5Comunas():
    cursor.execute(
        '''
        SELECT COMUNA, ROUND((CASOS_CONFIRMADOS/POBLACION)*100.0)
        FROM CASOS_POR_COMUNA
        WHERE ROUND(CASOS_CONFIRMADOS/POBLACION)<5.0
        ORDER BY (CASOS_CONFIRMADOS/POBLACION) DESC
        FETCH NEXT 5 ROWS ONLY
        '''
    )
    connection.commit()

'''
Nombre de la función: Top5Regiones()
Parametros: -
Return: -
Esta función genera el top 5 de Regiones con mayor porcentaje de casos confirmados
'''
def Top5Regiones():

    cursor.execute(
        '''
        SELECT name.region , ROUND((name.casos/name.pobla)*100.0) Porcentaje
        FROM (SELECT r.region, sum(c.casos_confirmados) casos, sum(c.poblacion) pobla
        FROM CASOS_POR_Region R
        INNER JOIN CASOS_POR_COMUNA C ON
        r.codigo_comuna = c.codigo_comuna
        GROUP BY REGION) Name
        ORDER BY Porcentaje  DESC
        FETCH NEXT 5 ROWS ONLY /*TOP 5 REGION CON MAS PORCENTAJE DE CASOS */
        '''
    )
    connection.commit()

"----------Main---------"

def menu(menuprincipal,opcion):
    if menuprincipal==True:
        print("-----Menú Principal-----")
        print("* 1. Crear Comuna")
        print("* 2. Crear Region")
        print("* 3. Ver casos totales de una comuna")
        print("* 4. Ver casos totales de una region")
        print("* 5. Ver casos totales de todas las comunas")
        print("* 6. Ver casos totales de todas las regiones")
        print("* 7. Agregar casos nuevos a una comuna.")
        print("* 8. Eliminar casos nuevos a una comuna")
        print("* 9. Combinar Comunas")
        print("* 10. Combinar regiones")
        print("* 11. Top 5 comunas con mas porcentaje de casos según población")
        print("* 12. Top 5 regiones con mas porcentaje de casos segun poblacion")
        inputt = int(input("Ingrese el numero de la opcion que desea:"))
        menu(False,inputt)
    elif menuprincipal == False and opcion == 1: #Funcion crear comuna
        crearcomuna()
        menu(True, -1)
    elif menuprincipal == False and opcion == 2: #Funcion crear region
        crearregion()
        menu(True, -1)
    elif menuprincipal == False and opcion == 3: #Total de casos en la comuna
        TotalesComuna()
        menu(True, -1)
    elif menuprincipal == False and opcion == 4: #Total de casos en la region
        TotalesRegion()
        menu(True, -1)
    elif menuprincipal == False and opcion == 5: #Total de casos de todas las comunas
        TotalesTodasComunas()
        menu(True, -1)
    elif menuprincipal == False and opcion == 6: #Total de casos de todas las regiones
        TotalesTodasRegiones()
        menu(True, -1)
    elif menuprincipal == False and opcion == 7: #Agregar casos confirmados a una fila de la tabla
        Agregarcasosconfirmadoscomunas()
        menu(True, -1)
    elif menuprincipal == False and opcion == 8: #Eliminar casos confirmados a una fila de la tabla
        Eliminarcasosconfirmadoscomunas()
        menu(True, -1)
    elif menuprincipal == False and opcion == 9: #Unir dos comunas
        CombinarComunas()
        menu(True, -1)
    elif menuprincipal == False and opcion == 10: #Unir dos regiones
        CombinarRegiones()
        menu(True, -1)
    elif menuprincipal == False and opcion == 11: #Top 5 porcentaje de comunas
        Top5Comunas()
        menu(True, -1)
    elif menuprincipal == False and opcion == 12: #Top 5 porcentaje de regiones
        Top5Regiones()
        menu(True, -1)
    else:
        print("No entro a ninguna parte del menu, alguna cosa paso :O")
        print("menu principal:",str(menuprincipal))
        print("opcion:", str(opcion))

menu(True,1)

connection.close()

