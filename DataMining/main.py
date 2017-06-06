# -*- coding: utf-8 -*-

from bs4 import BeautifulSoup
import urllib2
import re

""""" Code for information colection of ENE's HTMLs source codes """""
"""       Projeto transversal de redes 1 - Turma B - Grupo A       """

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

""" Funcao que organiza as informacoes do txt """

def organizeInfoFile(file_number):
    f = open("infoTeste" + str(file_number) + ".txt", "r")
    first_line = ""
    first_line = file.read(f)
    indice = 0                              # Contador primario
    tmp = 0                                 # Contador secundario
    tmp_string = ""                         # Nada alem de uma string temporaria
    info_list = []                          # Lista de informacoes uteis!!

    first_line = first_line.split("'u'")
    f.close()
    f = open("infoTeste" + str(file_number) + ".txt", "w")
    f.writelines(first_line)
    f.close()



#get_HREFs_from("https://matriculaweb.unb.br/graduacao/oferta_dis.aspx?cod=163")

"""   ----   ====  ----  ====   ----   """

""" Funcionalidade principal do codigo """

"""   ----   ====  ----  ====   ----   """

file_object = open("HREFs.txt", "r")
label = 0
url = ""
for line in file_object:
    print line,
    if line[0] == 'o':
        label = label + 1
        url = htmlSourceCode("https://matriculaweb.unb.br/graduacao/" + line)
        #soup = BeautifulSoup(url)

        #write_on_txt("teste" + str(label) + ".txt", url)


        marquers = re.findall(r'<b>(.+?)</b>', url)
        f = open("infoTeste" + str(label) + ".txt", 'a')

        for marquer in marquers:
            f.write(marquer + '\n')
            print marquer + '\n'

        f.close()
file_object.close()