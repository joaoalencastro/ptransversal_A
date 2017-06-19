import MySQLdb
import re
import sys
reload(sys)
sys.setdefaultencoding("utf-8")

class Banco(object):
	def __init__(self):
		self.con  = MySQLdb.connect(host='localhost', user='root', passwd='senha_do_BD',db='nome_da_tabela')
		self.c = self.con.cursor()
		

		
	def PegaEmailDigitado(self):
		self.c.execute("SELECT * FROM EMAIL_AUTENTICA;")
		self.con.commit()
		resposta = self.c.fetchall()
		return resposta
	
	def Inserir(self, email, rg, nome, matricula, data, valor):
		
		self.c.execute("INSERT INTO EMAIL_AUTENTICADO VALUES ('%s','%s','%s','%s','%s','%d'); "%(email, rg, nome, matricula, data, valor))
		self.con.commit()
	
	def ApagaTabela_transitoria(self):
		self.c.execute("TRUNCATE TABLE EMAIL_AUTENTICA;")
		self.con.commit()

