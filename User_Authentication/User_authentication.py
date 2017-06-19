import urllib
import urllib2
import webbrowser
import re
import popular


tabela    = popular.Banco()
email     = tabela.PegaEmailDigitado()[0][0]
rg        = tabela.PegaEmailDigitado()[0][1]
nome      = tabela.PegaEmailDigitado()[0][2]
matricula = tabela.PegaEmailDigitado()[0][3]
data1      = tabela.PegaEmailDigitado()[0][4]


url = "https://aluno.unb.br/alunoweb/default/sca/solicitarsenha"
data = urllib.urlencode({'nome': nome, 'matricula': matricula, 'identidade': rg,'data_nascimento': data1})
results = urllib2.urlopen(url, data)
conteudo_html = str(results.read())

email_unb = re.search(r'<b>E-mail:</b> (.*)</label>', conteudo_html).group(1)
email_alternativo = re.search(r'E-mail alternativo:</b>(.*)</label>', conteudo_html).group(1)

email = " " + email


if (email == email_alternativo):
	print ("Gravado 1!")
	tabela.Inserir(email, rg, nome, matricula, data1, 1)
	tabela.ApagaTabela_transitoria()
else:
  print ("Gravado 0!")
	tabela.Inserir(email, rg, nome, matricula, data1, 0)
	tabela.ApagaTabela_transitoria()
