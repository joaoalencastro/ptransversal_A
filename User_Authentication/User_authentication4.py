# -*- coding: utf-8 -*-

import urllib
import urllib2
import webbrowser
import re
import popular4
import logging
from datetime import datetime

agora = datetime.now()
logging.basicConfig(filename='arquivo_de_logs.log',level=logging.DEBUG)


while True:

	
	tabela    = popular3.Banco()
	if (tabela.PegaEmailDigitado() != tuple()):	
		
		nome     	= tabela.PegaEmailDigitado()[0][0]
		email     	= tabela.PegaEmailDigitado()[0][1]
		senha       = tabela.PegaEmailDigitado()[0][2]
		data1      	= tabela.PegaEmailDigitado()[0][3]
		matricula 	= tabela.PegaEmailDigitado()[0][4]
		rg      	= tabela.PegaEmailDigitado()[0][5]
		
		
		
		if (len(email) > 1):
			url = "https://aluno.unb.br/alunoweb/default/sca/solicitarsenha"
			data = urllib.urlencode({'nome': nome, 'matricula': matricula, 'identidade': rg,'data_nascimento': data1})
			results = urllib2.urlopen(url, data)
			conteudo_html = str(results.read())
			email_alter = matricula + "@aluno.unb.br"
			
			if (tabela.is_EmailDuplicado(email)):
				tabela.Inserir(nome, email, senha, data1, matricula, rg, 2)
				tabela.ApagaTabela_transitoria()
				logging.debug("\nHorario do log: %s, nome: %s, email: %s, data: %s, senha: %s, matricula: %s, rg: %s. E-mail já existe, não autenticado.\n"%(agora, nome, email, data1, senha, matricula, rg ))
				continue
			elif (email_alter in conteudo_html ):
				
				print ("Consegui!")
				tabela.Inserir(nome, email, senha, data1, matricula, rg, 1)
				tabela.ApagaTabela_transitoria()
				logging.debug("\nHorario do log: %s, nome: %s, email: %s, data: %s, senha: %s, matricula: %s, rg: %s, autenticado: Sim \n"%(agora, nome, email, data1, senha, matricula, rg ))
			else:
				tabela.Inserir(nome, email, senha, data1, matricula, rg, 0)
				tabela.ApagaTabela_transitoria()
				logging.debug("\nHorario do log: %s, nome: %s, email: %s, data: %s, senha: %s, matricula: %s, rg: %s, autenticado: Não \n"%(agora, nome, email, data1, senha, matricula, rg ))
		else:
			logging.debug("\nHorario do log: %s, nome: %s, email: %s, data: %s, senha: %s, matricula: %s, rg: %s, Email Inválido, não autenticado! \n"%(agora, nome, email, data1, senha, matricula, rg ))
			tabela.ApagaTabela_transitoria()
		
	print "Esperando Mudança no Banco..."
	
	
	