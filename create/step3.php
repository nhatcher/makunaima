<?php
if(isset($_POST['latex'])){
$filename = "images/quiz.tex";
$handle = fopen($filename, 'w+');
fwrite($handle, $_POST['latex']);
fclose($handle);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Paso 2</title>
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
    <li><a href="step2.php" id="before">anterior</a></li>
    <li><a href="step4.php" id="next">siguiente</a></li>
  </ul>
<h1> Paso 3: mandar el examen </h1>
En este paso vamos a subir las imágenes y archivos extra que necesites.<br/>
Introduce el examen en el área que te doy para ello:
<br/>
<form title="latexform" method="post" action="step4.php" > 
<textarea name="latex" rows="100" cols="120">
 <?php echo $quiz; ?>
</textarea>
</div>
<input id="entButton" type="submit" value="Enviar" /><br/>
</form>



Aqui tienes el ejemplo, puedes cortar y pegar:
<pre style='color:#141312;background-color:#ffffff;'>
<span style='color:#0057ae;background:#e0e9f8;'>%BEGINFIELDS</span>
nombre(7)=Nombre: 
carnet(4)=Carnet:
seccion(2)=Grupo:
profesor(7)=Profesor: 
<span style='color:#0057ae;background:#e0e9f8;'>%ENDFIELDS</span>

<span style='color:#0057ae;background:#e0e9f8;'>%BEGINVARS</span>
universidad=Universidad Simon Bolivar
departamento=<span style='color:#f00000;'>\begin</span>{<span style='color:#0000d0;'>center</span>}Departamento de Matem<span style='color:#800000;'>\'</span>aticas<span style='color:#800000;'>\\</span>Puras y Aplicadas<span style='color:#f00000;'>\end</span>{<span style='color:#0000d0;'>center</span>}
trimestre=Enero-Marzo 2010
titulo=<span style='color:#00a000;'>$4^{</span><span style='color:#606000;'>\mbox</span>{to}<span style='color:#00a000;'>}$</span> Ex<span style='color:#800000;'>\'</span>amen Parcial (20<span style='color:#800000;'>\%</span>)
materia=Matem<span style='color:#800000;'>\'</span>aticas II (MA-1112)
logo=<span style='color:#800000;'>\includegraphics</span>[scale=0.2]{usb}
<span style='color:#0057ae;background:#e0e9f8;'>%ENDVARS</span>

<span style='color:#0057ae;background:#e0e9f8;'>%BEGINSTYLE</span>
ExamStylePDF=JeanPierre
HeadStylePDF=JeanPierre
ExamStyleHTMP=Plain
HeadStylePDF=Plain
<span style='color:#0057ae;background:#e0e9f8;'>%ENDSTYLE</span>

<span style='color:#0057ae;background:#e0e9f8;'>%BEGINDEFS</span>
<span style='color:#800000;'>\documentclass</span>[12pt]{article}
<span style='color:#800000;'>\usepackage</span>[utf8]{inputenc}                                                                               
<span style='color:#800000;'>\usepackage</span>[spanish]{babel}    
<span style='color:#800000;'>\usepackage</span>{amsmath,amstext,amscd,amsfonts,amssymb,amsthm}
<span style='color:#800000;'>\usepackage</span>{epsfig}         
<span style='color:#800000;'>\newcommand</span>{\re}{\mathbb R}                                                                               
<span style='color:#800000;'>\newcommand</span>{\Ln}{\textrm{Ln}}                                                                             
<span style='color:#0057ae;background:#e0e9f8;'>%ENDDEFS</span>

<span style='color:#0057ae;background:#e0e9f8;'>%BEGINEXAM                                                                                         </span>
<span style='color:#f00000;'>\begin</span>{<span style='color:#0000d0;'>Pregunta</span>}{3}{1}                                                                                    
El valor del <span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\int</span><span style='color:#00a000;'>_{-</span><span style='color:#606000;'>\infty</span><span style='color:#00a000;'>}^</span><span style='color:#606000;'>\infty\frac</span><span style='color:#00a000;'>{{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> d}x}{1+x^2}}$</span> es igual a:                  
<span style='color:#800000;'>\Opcion</span>                                                                                                   
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\frac</span><span style='color:#00a000;'>{</span><span style='color:#606000;'>\pi</span><span style='color:#00a000;'>}{2}}$</span>                                                                            
<span style='color:#800000;'>\Opcion</span>                                                                                                   
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\pi</span><span style='color:#00a000;'>}$</span>                                                                                      
<span style='color:#800000;'>\Opcion</span>                                                                                                   
No converge                                                                                               
<span style='color:#800000;'>\Opcion</span>                                                                                                   
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>-</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{</span><span style='color:#606000;'>\pi</span><span style='color:#00a000;'>}{4}}$</span>                                                                           
<span style='color:#f00000;'>\end</span>{<span style='color:#0000d0;'>Pregunta</span>}                                                                                            


<span style='color:#f00000;'>\begin</span>{<span style='color:#0000d0;'>Pregunta</span>}{3}{3}
La integral <span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\int\frac</span><span style='color:#00a000;'>{{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> d}x}{1-{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> sen}x+{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> cos}x}}$</span> es igual a:
<span style='color:#800000;'>\Opcion</span>                                                                              
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> ln}</span><span style='color:#606000;'>\left</span><span style='color:#00a000;'>|1+{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> tg}</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{x}{2}</span><span style='color:#606000;'>\right</span><span style='color:#00a000;'>|+C}$</span>                        
<span style='color:#800000;'>\Opcion</span>                                                                              
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>-{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> ln}</span><span style='color:#606000;'>\left</span><span style='color:#00a000;'>|1+{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> tg}</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{x}{2}</span><span style='color:#606000;'>\right</span><span style='color:#00a000;'>|+C}$</span>                       
<span style='color:#800000;'>\Opcion</span>                                                                              
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> ln}</span><span style='color:#606000;'>\left</span><span style='color:#00a000;'>|1-{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> tg}</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{x}{2}</span><span style='color:#606000;'>\right</span><span style='color:#00a000;'>|+C}$</span>                        
<span style='color:#800000;'>\Opcion</span>                                                                              
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>-{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> ln}</span><span style='color:#606000;'>\left</span><span style='color:#00a000;'>|1-{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> tg}</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{x}{2}</span><span style='color:#606000;'>\right</span><span style='color:#00a000;'>|+C}$</span>                       
<span style='color:#f00000;'>\end</span>{<span style='color:#0000d0;'>Pregunta</span>}

<span style='color:#f00000;'>\begin</span>{<span style='color:#0000d0;'>Pregunta</span>}{4}{2}
El vol<span style='color:#800000;'>\'</span>umen del s<span style='color:#800000;'>\'</span>olido generado al rotar alrededor del eje <span style='color:#00a000;'>$Y$</span> la regi<span style='color:#800000;'>\'</span>on acotada por el eje <span style='color:#00a000;'>$Y$</span> y las gr<span style='color:#800000;'>\'</span>aficas de las funciones <span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'> y=x^3}$</span>, <span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'> y=1}$</span> y <span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'> y=8}$</span> es:
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'> 83</span><span style='color:#606000;'>\pi</span><span style='color:#00a000;'>}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\frac</span><span style='color:#00a000;'>{93}{15}</span><span style='color:#606000;'>\pi</span><span style='color:#00a000;'>}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\frac</span><span style='color:#00a000;'>{93}{5}</span><span style='color:#606000;'>\pi</span><span style='color:#00a000;'>}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\frac</span><span style='color:#00a000;'>{8}{5}</span><span style='color:#606000;'>\pi</span><span style='color:#00a000;'>}$</span>
<span style='color:#f00000;'>\end</span>{<span style='color:#0000d0;'>Pregunta</span>}


<span style='color:#f00000;'>\begin</span>{<span style='color:#0000d0;'>Pregunta</span>}{3}{0}
El <span style='color:#800000;'>\'</span>area de la regi<span style='color:#800000;'>\'</span>on encerrada por las gr<span style='color:#800000;'>\'</span>aficas de las funciones <span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'> f(x)=2x-x^2}$</span> y <span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'> g(x)=x-2}$</span> es igual a:
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\frac</span><span style='color:#00a000;'>{9}{2}}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>-</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{9}{2}}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\frac</span><span style='color:#00a000;'>{9}{4}}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>-</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{3}{4}}$</span>
<span style='color:#f00000;'>\end</span>{<span style='color:#0000d0;'>Pregunta</span>}

<span style='color:#f00000;'>\begin</span>{<span style='color:#0000d0;'>Pregunta</span>}{4}{0}
La integral <span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\int\frac</span><span style='color:#00a000;'>{2x^2-5x+2}{x^3+x}{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> d}x}$</span> es igual a:
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>2{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> ln}|x|-5{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> arctg}(x)+C}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>2{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> ln}|x|-</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{1}{</span><span style='color:#606000;'>\sqrt</span><span style='color:#00a000;'>{5}}{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> arctg}(</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{x}{</span><span style='color:#606000;'>\sqrt</span><span style='color:#00a000;'>{5}})+C}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> ln}</span><span style='color:#606000;'>\left</span><span style='color:#00a000;'>|</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{-x^2-5x+1}{x^3+x}</span><span style='color:#606000;'>\right</span><span style='color:#00a000;'>|+C}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>2{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> ln}</span><span style='color:#606000;'>\left</span><span style='color:#00a000;'>|</span><span style='color:#606000;'>\frac</span><span style='color:#00a000;'>{1-x^2}{x^3+x}</span><span style='color:#606000;'>\right</span><span style='color:#00a000;'>|+C}$</span>
<span style='color:#f00000;'>\end</span>{<span style='color:#0000d0;'>Pregunta</span>}

<span style='color:#f00000;'>\begin</span>{<span style='color:#0000d0;'>Pregunta</span>}{3}{0}
La integral <span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\int</span><span style='color:#00a000;'> x^3e^{x^2}{</span><span style='color:#606000;'>\rm</span><span style='color:#00a000;'> d}x}$</span> es igual a:
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\frac</span><span style='color:#00a000;'>{1}{2}e^{x^2}</span><span style='color:#606000;'>\left</span><span style='color:#00a000;'>(x^2-1</span><span style='color:#606000;'>\right</span><span style='color:#00a000;'>)+C}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'> e^{x^2}</span><span style='color:#606000;'>\left</span><span style='color:#00a000;'>(x^2-1</span><span style='color:#606000;'>\right</span><span style='color:#00a000;'>)+C}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle\frac</span><span style='color:#00a000;'>{1}{4}e^{x^2}</span><span style='color:#606000;'>\left</span><span style='color:#00a000;'>(1-x^2</span><span style='color:#606000;'>\right</span><span style='color:#00a000;'>)+C}$</span>
<span style='color:#800000;'>\Opcion</span>
<span style='color:#00a000;'>${</span><span style='color:#606000;'>\displaystyle</span><span style='color:#00a000;'>-e^{x^2}</span><span style='color:#606000;'>\left</span><span style='color:#00a000;'>(x^2-1</span><span style='color:#606000;'>\right</span><span style='color:#00a000;'>)}$</span>
<span style='color:#f00000;'>\end</span>{<span style='color:#0000d0;'>Pregunta</span>}
<span style='color:#0057ae;background:#e0e9f8;'>%ENDEXAM</span></pre>
</body>
</html>