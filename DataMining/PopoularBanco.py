# -*- coding: utf-8 -*-
import sys
from DataBase import Banco

__author__      = "Bruno Vieira Dutra"
__copyright__   = "Copyright 2017, Projeto transversal A"

ARQUIVO_DE_CODIGOS = "cod.txt"

""" ------------------------------------------------------------"""
"""         Código para Popular a Database                      """
"""             com informções do MW                            """
"""-------------------------------------------------------------"""

# Classe principal que retira informações dos aquivos recebidos
# Recebe uma lista de arquivos como parametro
class Populacao(object):

    def __init__(self, lista_de_arquivos):

        self.lista_de_arquivos  = lista_de_arquivos

        try:
            self.PopulaDatabase()

        except Exception, e:
            print (self.lista_de_arquivos)
            print("Ocorreu a seguinte exceção: %s"%(e))



    #Método para popular a database
    def PopulaDatabase(self):

        desc_codigos = open(ARQUIVO_DE_CODIGOS, 'r')
        os_codigos = desc_codigos.readlines()

        nome = ''
        codigo  = ''
        professor = ''
        turma = []
        horario = []
        vagas = []
        local = []

        for arquivo in self.lista_de_arquivos:

            # Adquire Informações das disciplinas
            informacoes_da_disciplina = open(arquivo, 'r')
            texto = informacoes_da_disciplina.readlines()
            indice = 0

            for linha in texto:


                if ("Busca" in linha):
                    codigo = texto[indice + 1]


                elif( "Obs" in linha):
                    turma.append(texto[indice + 1])

                elif ( "<font color=red>30</font>" in linha):
                    vagas.append(texto[indice - 1])

                elif ( "<font color=red>0</font>" in linha):
                    proximo1 = texto[indice + 1]
                    proximo2 = texto[indice + 2]
                    proximo3 = texto[indice + 3]
                    proximo4 = texto[indice + 4]

                    horario1 = "\n" + proximo1 + proximo2[0:proximo2.index("<")] + "-" + proximo2[proximo2.index("brown")+6:]
                    horario2 =        proximo3 + proximo4[0:proximo4.index("<")] + "-" + proximo4[proximo4.index("brown")+6:]
                    horario.append(str(horario1 + horario2))
                indice += 1
				
	    #popula Banco com as inforamações
		banco.popular(nome, codigo, professor, turma, horario, vagas, )
       

if ( __name__ == "__main__"):


    try:

		tentativa1 = Populacao(["info.txt"])


    except Exception, e:

        print ("Exceção: %s"%(e))
