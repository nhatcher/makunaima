<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Paso 1</title>
<style  type="text/css">
.ejemplo
{
    margin-left:50px;
    font-family:Arial,Helvetica,sans-serif;
    border-style:dotted;
    background:lightgrey;
    width:1200px;
}
#mainNav {
  margin: 0;
  padding: 0;
  list-style: none;
  border-left: 1px dashed #999;
  overflow: hidden; 
  zoom: 1;
}

#mainNav li {
    float: left;
    width: 200px ;
}


#mainNav a {
  color: #000;
  font-size: 11px;
  text-transform: uppercase;
  text-decoration: none;
    border: 1px dashed #999;
    border-left: none; 
  padding: 7px 5px 7px 30px;
    display: block;
    background-color: #E7E7E7; 
  zoom: 1;
}

#mainNav a:hover {
  font-weight: bold;
  background-color: #B2F511;
}

#before #next, 
{
  background-color: #FFFFFF;
  padding-right: 15px;
  padding-left: 30px;
  font-weight: bold;
}



</style>

</head>


<body>
    <ul id="mainNav">
    <li><a href="step0.php" id="before">anterior</a></li>
    <li><a href="step2.php" id="next">siguiente</a></li>
  </ul>
<h1> Creando el examen. Paso 1: preparación </h1>
Vale, quieres crear un examen tu mismo de selección simple.
Para eso debes preparte primero. Seguramente va a costarte unos 15 minutos así que sientate y relájate.
Debes tener preparado:
<ol>
<li> Los enunciados y opciones de las preguntas (escritos en latex)
<li> Un conjunto de variables que definen el examen (nombre de la universidad, departamento, logo, asignatura...)
<li> Un conjunto de campos que definen al estudiante (nombre, número de identidad, clase...)
</ol>
Vamos a ver cada uno de ellos.<br/>
<h2> Enunciados y opciones </h2>
Las preguntas con las opciones se introducen de acuerdo al siguiente esquema:<br/><br/>
<div class="ejemplo">
\begin{Pregunta}{Valor de la pregunta}{Respuesta correcta}<br/>
Enunciado <br/>
\Opcion <br/>
Primera opción <br/>
\Opcion <br/>
Segunda opción <br/>
.....<br/>
\Opcion <br/>
Última opción <br/>
\end{Pregunta}
</div><br/>
Por ejemplo: <br/><br/>
<div class="ejemplo">
\begin{Pregunta}{4}{0}<br/>
La integral ${\displaystyle\int\frac{2x^2-5x+2}{x^3+x}{\rm d}x}$ es igual a:<br/>
\Opcion<br/>
${\displaystyle2{\rm ln}|x|-5{\rm arctg}(x)+C}$<br/>
\Opcion<br/>
${\displaystyle2{\rm ln}|x|-\frac{1}{\sqrt{5}}{\rm arctg}(\frac{x}{\sqrt{5}})+C}$<br/>
\Opcion<br/>
${\displaystyle{\rm ln}\left|\frac{-x^2-5x+1}{x^3+x}\right|+C}$<br/>
\Opcion<br/>
${\displaystyle2{\rm ln}\left|\frac{1-x^2}{x^3+x}\right|+C}$<br/>
\end{Pregunta}<br/>
</div>
En este caso la pregunta vale 4 puntos y la respuesta correcta es la primera. En general cuando hagamos listas el primer elemento es el número 0.
Una pregunta, puede contener imágenes. Todas las imágenes que desee incluir he de subirlas al servidor. Eso se hará en el próximo paso. <br/>
Es muy importante que tengas preparadas las imágenes en formato eps. Casi todos los programas gráficos te permiten guardar en ese formato. <br/>
En el próximo paso podrás subir tus imágenes al servidor. <br/>
<br/> Tambien debes tener preparadas tus definiciones de latex. Por ejemplo, puede ser algo así como<br/>
<div class="ejemplo">
\documentclass[12pt]{article}<br/>
\usepackage[utf8]{inputenc}<br/>                                                                        
\usepackage[spanish]{babel}<br/>
\usepackage{amsmath,amstext,amscd,amsfonts,amssymb,amsthm}<br/>
\usepackage{epsfig}<br/>
\newcommand{\re}{\mathbb R}<br/>
\newcommand{\Ln}{\textrm{Ln}}<br/>
</div><br/>
<h2> Variables </h2><br/>
Las variables son simplemente títulos informativos acerca del examen, puedes considerarlas etiquetas. Son muy importantes para el diseño del examen. Cada variable se compone de un nombre y un contenido.<br/>
El nombre es algo corto sin espacios ni carácteres especiales y el contenido es cualquier cosa que quieras inventar en latex.<br/>
Las variables de nuestro ejemplo son:
<div class="ejemplo">
universidad=Universidad Simon Bolivar<br/>
departamento=\begin{center}Departamento de Matem\'aticas\\Puras y Aplicadas\end{center}<br/>
trimestre=Enero-Marzo 2010<br/>
titulo=$4^{\mbox{to}}$ Ex\'amen Parcial (20\%)<br/>
materia=Matem\'aticas II (MA-1112)<br/>
logo=\includegraphics[scale=0.2]{usb}<br/>
</div>
Aquí puedes ver como hay algo de diversidad. La variable universidad contiene sólo texto, la variable departamento contiene dos lineas centradas. 
La variable titulo contiene una fórmula de latex. Finálmente la variable logo contiene un gráfico. Al igual que para las preguntas, los gráficos que esten aquí debven subirse al servidor en formato eps.
Se suponen, entonces, que hemos subido una gráfica que se llama usb.eps.<br/>
No es necesario que utilices una variable por cada objeto que quieras colocar en el examen. Por ejemplo, tambien es válido:<br/>
<div class="ejemplo">
universidad=\begin{center}\includegraphics[scale=0.2]{usb}\\Universidad Simon Bolivar\\Departamento de Matem\'aticas\\Puras y Aplicadas\end{center}<br/>
titulo=Enero-Marzo 2010\\$4^{\mbox{to}}$ Ex\'amen Parcial (20\%)<br/>
materia=Matem\'aticas II (MA-1112)<br/>
</div><br/>
y contiene exátamente la misma información que el anterior. En el anterior, el logo, la universidad y el departamento pueden colocarse en sitios diferentes, aquí no. <br/>
Fíjate que el contenido de cada variable sólo puede ocupar una línea. Eso lo mejoraré en futuras versiones. <br/>
Tambien aquí se usan los encabezados de latex que hemos usado más arriba.<br/>
<h2> Campos </h2><br/>
Los campos se componen de un nombre para el campo, los carácteres que ocupa el campo, y un contenido que se muestra de la misma forma que una variable.<br/>
Los campos del ejemplo son:<br/>
<div class="ejemplo">
nombre(20)=Nombre:<br/>
carnet(8)=Carnet:<br/>
seccion(2)=Grupo:<br/>
profesor(20)=Profesor:<br/>
</div><br/>
Aquí el nombre del alumno es un campo que contiene a lo sumo 20 carácteres, el carnet contiene 8, por ejemplo.
El nombre del campo es muy importante porque debemos crear una base de datos con los datos de cada estudiante
</body>
</html>