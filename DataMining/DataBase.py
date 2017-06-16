# -*- coding: utf-8 -*-
import sqlite3

""" ----------------------------------------------------"""
"""         Código para Criação da Database             """
"""             com informções do MW                    """
"""-----------------------------------------------------"""

#Classe principal para inserir na database
class Banco():


    def __init__(self):
        self.conexao = sqlite3.connect('sistemareservadodb.db')
        self.criarTabela()

    #Cria a Tabela materia com as informações adequadas
    def criarTabela(self):
        bd = self.conexao.cursor()

        bd.execute("""

            create table if not exists materia (
            id int primary key ,
            nome varchar(45),
            codigo varchar(45),
            professor varchar(15),
            turma varchar(1),
			dias varchar(45),
            horario varchar(20),
			vagas varchar(5),
            local text
            )""")

        self.conexao.commit()
        bd.close()

    #insere as informações nas materias
    def inserirnaTabela(self, nome, codigo, professor, turma, dias, horario, vagas, local  ):

        try:
			
            c = self.banco.conexao.cursor()

            c.execute(
                "insert into materia ( nome, codigo, professor , turma, dias, horario, vagas, local) values ('"+ nome +"', '" + codigo + "', '" + professor + "', '" + turma + "', '" + dias + "', '" + horario + "', '"+ vagas + "', '" + local +  "'  )")

            banco.conexao.commit()
            c.close()

            return "Usuario cadastrado com sucesso!"
        except:
            e = sys.exc_info()
            print (e)
   
            return "Ocorreu um erro na insercao do usuario"
        
