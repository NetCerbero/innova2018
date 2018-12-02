import mysql.connector
import firebase_admin
from firebase_admin import credentials,db
import random

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="innova"
)

cred = credentials.Certificate("./credenciales.json")
firebase_admin.initialize_app(cred,{'databaseURL': "https://innovahack-224213.firebaseio.com"})
dato = db.reference().child('parada').get()
# dato.sort()
# for e in dato:
# 	print(e,dato[e])
mycursor = mydb.cursor()
sql = "INSERT INTO routes (nombre, alias, latitud, longitud) VALUES (%s, %s, %s, %s)"
var = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","V","W","X","Y","Z","AA","BB","CC","DD","EE","FF","GG","HH","II","JJ"]
val = list()
for e in range(1,35):
	val.append((var[e-1],"parada"+str(e),dato["parada"+str(e)]["lat"],dato["parada"+str(e)]["long"]))
	print("parada"+str(e),dato["parada"+str(e)])
mycursor.executemany(sql, val)
mydb.commit()
print(mycursor.rowcount, "was inserted.")


	
sql = "INSERT INTO aristas (id_route_origen, id_route_destino, peso, distancia, hora, trafico) VALUES (%s, %s, %s, %s, %s, %s)"
val = list()
puntero = 2
for e in range(1, 34):
	val.append((puntero-1, puntero, random.randint(25,100), random.randint(12,50), random.randint(120,1000), random.randint(25,250)))
	val.append((puntero, puntero-1, random.randint(25,100), random.randint(12,50), random.randint(120,1000), random.randint(25,250)))
	puntero += 1
val.append((puntero-1, 1, random.randint(25,100), random.randint(12,50), random.randint(120,1000), random.randint(25,250)))

mycursor.executemany(sql, val)
mydb.commit()
print(mycursor.rowcount, "was inserted.")