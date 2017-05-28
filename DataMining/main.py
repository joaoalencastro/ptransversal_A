from bs4 import BeautifulSoup
import urllib2
import re


""" Recebe uma URL como parametro, a funcao retorna o codigo HTML da URL """
def htmlSourceCode(page):
    sock = urllib2.urlopen(page)
    htmlSource = sock.read()
    sock.close()
    return htmlSource


""" A partir de uma url, a funcao pega todos os HREFs (links) do codigo HTML """
def get_HREFs_from(page):
    html_page = urllib2.urlopen(page)
    soup = BeautifulSoup(html_page)
    for link in soup.findAll('a'):
        write_on_txt("HREFs.txt", link.get('href') + "\n")
    html_page.close()

""" Funcao que escreve em um txt """
def write_on_txt(file_name, content):
    f = open(file_name, "a")
    f.write(content)
    f.close()


""" Funcao que le de um arquivo """
def read_txt(file_name):
    f = open(file_name, "r")
    for line in f:
        print line,
    f.close()


#get_HREFs_from("https://matriculaweb.unb.br/graduacao/oferta_dis.aspx?cod=163")

#read_txt("HREFs.txt")


file_object = open("HREFs.txt", "r")
label = 0
url = ""
for line in file_object:
    print line,
    if line[0] == 'o':
        label = label + 1
        url = htmlSourceCode("https://matriculaweb.unb.br/graduacao/" + line)
        soup = BeautifulSoup(url)

        write_on_txt("teste" + str(label) + ".txt", url)

        #tag = soup.find_all("b")
        #print tag.string

        for string in soup.stripped_strings:
            write_on_txt("infoTeste" + str(label) + ".txt", repr(string))

        #print(soup.prettify())
file_object.close()