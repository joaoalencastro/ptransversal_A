# -*- coding: utf-8 -*-
import MySQLdb
import re

Locais ='''BT-34/15,
BT-25/15,
Aud-SG11,
Auditorio,
Lab 2,
Lab 2,
Lab 2,
Lab 2,
Lab 2,
Auditorio,
Auditorio,
BT-43/15,
Lab 2,
Lab 2,
Lab 2,
Lab 2,
Lab 2,
Lab 2,
Lab 2,
Lab 2,
Aud-SG11,
BT-16/15,
BT-25/15,
Aud-SG11,
Lab Controle,
Lab Controle,
Lab Controle,
Lab Controle,
Lab Controle,
BT-43/15,
BT-34/15,
Lab Controle,
Lab Controle,
Lab Controle,
Lab Controle,
BT-52/15,
BT-34/15,
BT-25/15,
Aud-SG11,
Lab 1,
Lab 1,
Lab 1,
Lab 1,
BT-43/15,
BT-43/15,
Lab Cont Pr Ind,
Lab Cont Pr Ind,
CDT,
SG-11 A1-39/12,
CDT,
CDT,
Aud-SG11,
Lab 1,
Lab 1,
Lab 1,
Lab 1,
BT-25/15,
Lab 2,
Lab 2,
Auditorio,
Lab Materiais,
Lab Materiais,
Lab Materiais,
Aud-SG11,
Aud-SG11,
BT-52/15,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
BT-34/15,
Auditorio,
BT-34/15,
Auditorio,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
Lab 3,
BT-16/15,
CDT,
SG11,
BT-16/15,
CDT,
BT-25/15,
Auditorio,
Auditorio,
Aud-SG11,
Lab Conv,
Lab Conv,
Lab Conv,
Lab Conv,
Lab Conv,
Lab Conv,
Lab Conv,
BT-16/15,
BT-16/15,
Lab Instalacoes,
Lab Instalacoes,
Lab Instalacoes,
Lab Instalacoes,
BT-34/15,
Lab Conv,
Lab Conv,
Lab Conv,
Lab Conv,
Auditorio,
Aud-SG11,
BT-43/15,
BT-43/15,
Lab Instalacoes,
Lab Instalacoes,
Lab Instalacoes,
Lab Instalacoes,
Lab Instalacoes,
Lab Instalacoes,
Lab Instalacoes,
Lab Instalacos,
BT-34/15,
BT-16/15,
CDT,
CDT,
BT-52/15,
LCCC,
LCCC,
LabRedes,
LCCC,
-,
BT-25/15,
BT-25/15,
BT-16/15,
LabRedes,
LabRedes,
LabRedes,
LabRedes,
LabRedes,
LabRedes,
-,
LabRedes,
Lab 1,
BT-16/15,
LabRedes,
LabRedes,
LCCC,
BT-25/15,
BT-16/15,
LabRedes,
-,
CDT,
CDT,
CDT,
CDT,
BT-52/15,
BT-52/15,
BT-25/15,
Lab Eletromag,
Lab Eletromag,
Lab Eletromag,
Lab Eletromag,
BT-52/15,
BT-52/15,
Lab 1,
Lab 1,
Lab 1,
Lab 1,
Lab 1,
BT-43/15,
BT-34/15,
LabCom,
BT-43/15,
'''



Locais = Locais.split(',')
con  = MySQLdb.connect(host='localhost', user='root', passwd='fiuza_gay',db='**')
c = con.cursor()


g = 2
for a in range(len(Locais)):
	if ("Lab" in Locais[a]):
		c.execute("INSERT INTO salas2 VALUES('%d','%s', '%d', '%d', '%d', '%d', '%d', '%d');"%(g, Locais[a],0,40,0,1,1, g))
		con.commit()
	else:
		c.execute("INSERT INTO salas2 VALUES('%d','%s', '%d', '%d', '%d', '%d', '%d', '%d');"%(g, Locais[a],0,40,0,1,0, g))
		con.commit()
	g+=1

