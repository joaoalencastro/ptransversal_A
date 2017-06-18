import MySQLdb
import re
import sys
reload(sys)
sys.setdefaultencoding("utf-8")

class Banco(object):
	def __init__(self):
		self.con  = MySQLdb.connect(host='localhost', user='root', passwd='45166batata',db='sistemareservadodb')
		self.c = self.con.cursor()
		

	def Inserir(self, contador, nome, codigo, professor, turma, horario, vagas, local, dias ):
	
		nome = re.search(r'\t(.*)', nome).group(1)
		codigo = re.search(r'\t(.*)', codigo).group(1)
		professor = re.search(r'\t(.*)', professor).group(1)
		turma = re.search(r'\t(.*)', turma).group(1)
		horario = re.search(r'\t(.*)', horario).group(1)
		vagas = re.search(r'\t(.*)', vagas).group(1)
		local = re.search(r'\t(.*)', local).group(1)
		dias = re.search(r'\t(.*)', dias).group(1)
				
		
		
		self.c.execute("INSERT INTO materias VALUES ('%d','%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"%(contador, nome.decode('utf-8'), codigo, professor, turma, horario, vagas, local.decode('utf-8'), dias))
		self.con.commit()
		