import urllib
import urllib2
import webbrowser

import re

url = "https://aluno.unb.br/alunoweb/default/sca/solicitarsenha"
data = urllib.urlencode({'nome': '*****', '***': '***', '***': '**','**': '**/**/****'})
results = urllib2.urlopen(url, data)
conteudo_html = str(results.read())

email_unb = re.search(r'<b>E-mail:</b> (.*)</label>', conteudo_html).group(1)
email_alternativo = re.search(r'E-mail alternativo:</b>(.*)</label>', conteudo_html).group(1)

print "Email UnB \t\t\t Email Alternativo"
print email_unb+" \t\t"+email_alternativo
