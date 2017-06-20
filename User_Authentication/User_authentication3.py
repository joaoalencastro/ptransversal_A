# -*- coding: utf-8 -*-

import urllib
import urllib2
import webbrowser
import re
import popular3



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
			

			
			if ((not("Acesso negado! Verifique se os dados foram digitados corretamente" in conteudo_html)) or (not("class='tipo_erro'" in conteudo_html )) ):
				
				print ("Consegui!")
				tabela.Inserir(nome, email, senha, data1, matricula, rg, 1)
				tabela.ApagaTabela_transitoria()
			else:
				tabela.Inserir(nome, email, senha, data1, matricula, rg, 0)
				tabela.ApagaTabela_transitoria()
			
		
	print "Esperando Mudança no Banco..."
	
	
	