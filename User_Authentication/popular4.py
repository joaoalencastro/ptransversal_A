import MySQLdb
import re
import sys
reload(sys)
sys.setdefaultencoding("utf-8")

class Banco(object):
	def __init__(self):
		self.con  = MySQLdb.connect(host='localhost', user='root', passwd='****',db='****')
		self.c = self.con.cursor()
		

		
	def PegaEmailDigitado(self):
		self.c.execute("SELECT * FROM usuario_transitorio;")
		self.con.commit()
		resposta = self.c.fetchall()
		return resposta
	
	def Inserir(self, nome, email, senha, data1, matricula, rg, valor):
		
		self.c.execute("INSERT INTO usuariodef VALUES ('%s','%s','%s','%s','%s','%s','%d'); "%( nome, email, senha, data1, matricula, rg, valor))
		self.con.commit()
	
	def ApagaTabela_transitoria(self):
		self.c.execute("TRUNCATE TABLE usuario_transitorio;")
		self.con.commit()
		
	def is_EmailDuplicado(self, email):
		self.c.execute("SELECT * from usuario WHERE email='%s';"%(email))
		self.con.commit()
		resposta = self.c.fetchall()
		
		if resposta != tuple():
			return True
		else:
			return False

