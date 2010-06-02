#! /usr/bin/env python3.1
# -*- coding: utf-8 -*-
import re, os

def latexpng(filename, what):
    f=open(filename+'.tex','w')
    f.write(preamble)
    f.write('\n\\begin{document}\n')
    f.write('\\thispagestyle{empty}')
    f.write(what)
    f.write('\n\\end{document}\n')
    f.write('\n')
    f.close()
    os.system('latex -interaction batchmode '+filename+'.tex')
    os.system('dvipng -o '+filename+'.png -T tight -bg Transparent -D 140 '+filename+'.dvi')
    os.remove(filename+'.tex')
    os.remove(filename+'.log')
    os.remove(filename+'.aux')
    os.remove(filename+'.dvi')
    
regExpPreg=re.compile(r'\\begin\{Pregunta\}\{(\d*)\}\{(\d*)\}\s*(.*?)\s*(\\Opcion\s*.*?)\\end\{Pregunta\}',re.DOTALL)
regExpOp=re.compile(r'\\Opcion(.*?)(?=(\\Opcion)|\Z)',re.DOTALL)
regExpVars=re.compile(r'\%BEGINVARS\n(.*)\%ENDVARS',re.DOTALL)
regExpFields=re.compile(r'\%BEGINFIELDS\n(.*)\%ENDFIELDS',re.DOTALL)
regExpDefs=re.compile(r'\%BEGINDEFS\n(.*)\%ENDDEFS',re.DOTALL)
regExpStyle=re.compile(r'\%BEGINSTYLE\n(.*)\%ENDSTYLE',re.DOTALL)

#This variables should not be here
nameExam="matVII"

quiz="quiz.tex"

letters='abcdefghijklmnopqrstuvwxyz'
f = open(quiz, 'r')
text=f.read()
f.close()
mystyles=regExpStyle.search(text)

mydefs=regExpDefs.search(text)
myvars=regExpVars.search(text)

myfields=regExpFields.search(text)
preamble=mydefs.group(1)

#mydefs=regExpDefs.search(examtex)

#preamble=preamble+mydefs.group(1)
regExpVar=re.compile(r'(.*?)=(.*)')
regExpField=re.compile(r'(.*?)\((\d*?)\)=(.*)')

variables=regExpVar.findall(myvars.group(0))
campos=regExpField.findall(myfields.group(0))

regExpOpcionBody=re.compile(r'\%BEGINOPCION\n(.*)\n\%ENDOPCION',re.DOTALL)
regExpPreguntaBody=re.compile(r'\%BEGINPREGUNTA\n(.*)\n\%ENDPREGUNTA',re.DOTALL)
regExpHeadBody=re.compile(r'\%BEGINHEADDEF\n(.*)\n\%ENDHEADDEF',re.DOTALL)
regExpCommands=re.compile(r'\%BEGINEXAMCOMMAND\n(.*)\n\%ENDEXAMCOMMAND',re.DOTALL)

#if os.path.isdir(nameExam)!=True :
    #os.mkdir(nameExam)
#os.chdir(nameExam)
#if os.path.isdir('images')!=True :
    #os.mkdir('images')
#os.chdir('images')

for x in range(len(variables)):
    latexpng(variables[x][0],variables[x][1])
for x in range(len(campos)):
    latexpng(campos[x][0],campos[x][2])
    

ListaPreguntas=regExpPreg.findall(text)



# Here we capture all the questions and options. The value of each option and the right option 
# We save them in a list Questions

MAX=0 #Guarda en número de opciones de la pregunta con más opciones. Es para saber cuantas imágenes a), b) c)... generar
Questions=[]
# question [ numero de pregunta, valor, válida, pregunta , [ [ numero opcion, opocion] .... ] This should be better, there is no need now.
for i,preg in enumerate(ListaPreguntas):
    question=[]
    question.append(str(i))
    question.append(preg[0])
    question.append(preg[1])
    question.append(preg[2])
    ListaOpciones=regExpOp.findall(preg[3])
    opciones=[]
    for j,opt in enumerate(ListaOpciones):
        opcion=[j,opt[0]]
        opciones.append(opcion)
    if MAX<j: MAX=j
    question.append(opciones)
    Questions.append(question)


# Genera las imagenes    
for i in range(MAX+1):
    latexpng('letra'+letters[i],letters[i]+')')
latexpng('letra','\\fbox{\\phantom{a)}}')
for i in range(len(Questions)):
    latexpng('p'+str(i),Questions[i][3])
    latexpng('preg'+str(i),'P'+str(i+1))
    for j in range(len(Questions[i][4])):
        latexpng('o'+str(j)+'p'+str(i),Questions[i][4][j][1])


f=open("imagenes.dat","w")
for i in range(len(Questions)):
    f.write(str(len(Questions[i][4])))
    if i != len(Questions)-1 :
        f.write(',')
f.write('\n')
for x in range(len(variables)):
    f.write(variables[x][0])
    if x != len(variables)-1: f.write(',')
f.write('\n');
for x in range(len(campos)):
    f.write(campos[x][0])
    f.write('|')
    f.write(campos[x][1])
    if x != len(campos)-1: f.write(',')
f.write('\n')
f.close()
#os.chdir('..')

#