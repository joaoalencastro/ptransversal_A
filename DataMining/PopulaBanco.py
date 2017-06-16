# -*- coding: latin-1 -*-

from DataBase import Banco
import re

""" ------------------------------------------------------------"""
"""         Código para Popular a Database                      """
"""             com informções do MW                            """
"""-------------------------------------------------------------"""


__author__      = "Bruno Vieira Dutra"
__copyright__   = "Copyright 2017, Projeto transversal A"

ARQUIVO_DE_CODIGOS = "cod.txt"
arquivos  = ["info.txt", "info2.txt"]




nome = ''
codigo = ''
professor = ''  
turma = list()
dias = list()
horario = []
vagas = ''
local = ''

turmas = []

for i in range(len(arquivos)):
        a = open(arquivos[0], "r")
        b = a.readlines()
        cont = 0
        
        for i in b:
                if ( "Busca" in i ):
                        codigo = b[cont + 1]
                        codigo = re.search(r'(.*)\n', codigo).group(1)
                        
                elif( "Obs" in i):
                        turma_achada =  b[cont +1]
                        turma_achada = re.search(r'(.*)\n', turma_achada).group(1)
                        turma.append(turma_achada); vagas = b[cont+2]; vagas = re.search(r'(.*)\n', vagas).group(1)
						
						
                elif("<font color=red>0</font>" in i):
					dia_parcial = b[cont + 1];dia_primeira_parte = re.search(r'(.*)\n', dia_parcial).group(1);dia_parcial = b[cont + 3]; dia_segunda_parte = re.search(r'(.*)\n', dia_parcial).group(1);dia_def  = dia_primeira_parte +" "+ dia_segunda_parte;dias.append(dia_def);
					horario_parcial = b[cont + 2]
					horario_parcial1 = re.search(r'(.*)</font>', horario_parcial).group(1)
					horario_parcial2 = re.search(r'color=brown>(.*)\n', horario_parcial).group(1)
					horario_parcial = horario_parcial1 + "-" + horario_parcial2
					horario.append(horario_parcial)
					
					
                cont += 1
				
				
                
codigos = open(ARQUIVO_DE_CODIGOS, 'r')
linhas = codigos.readlines()
for linha in linhas:
	if (codigo in linha):
		nome = re.search(r'\t(.*)\t', linha).group(1)
				
				
bd  =  Banco()
bd.inserirnatabela(nome, codigo, turma[0],dias[0], horario[0], vagas, local)
bd.inserirnatabela(nome, codigo, turma[1],dias[1], horario[1], vagas, local)
# Descomente para teste ---¬
#print ( nome, codigo, turma[0], turma[1], dias[0], dias[1] , horario[0], horario[1], vagas )
	
