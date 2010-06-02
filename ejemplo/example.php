<?php include("toselectandprotect.php"); ?>
 <?php
$disabled=false;
$code=$_SESSION['code'];
if( isset($_POST['pass'])) $clave=$_POST['pass']; else $clave="";
$nombre=$_SESSION['nombre'];
$carnet=$_SESSION['carnet'];
$seccion=$_SESSION['seccion'];
$profesor=$_SESSION['profesor'];
if(isset($_POST['p0'])) $p0=$_POST['p0']; else $p0='off';
if(isset($_POST['p1'])) $p1=$_POST['p1']; else $p1='off';
if(isset($_POST['p2'])) $p2=$_POST['p2']; else $p2='off';
if(isset($_POST['p3'])) $p3=$_POST['p3']; else $p3='off';
if(isset($_POST['p4'])) $p4=$_POST['p4']; else $p4='off';
if(isset($_POST['p5'])) $p5=$_POST['p5']; else $p5='off';
if($clave=='letmein'){
	$nota=0;
	if($p0=='o1p0') $nota=$nota+3;
	if($p1=='o3p1') $nota=$nota+3;
	if($p2=='o2p2') $nota=$nota+4;
	if($p3=='o0p3') $nota=$nota+3;
	if($p4=='o0p4') $nota=$nota+4;
	if($p5=='o0p5') $nota=$nota+3;
$link = mysql_connect('localhost', 'belga', 'yo')
        or die('No pude conectar: ' . mysql_error());
    mysql_select_db('examen') or die('No he podido seleccionar la base de datos');
    $query=sprintf('update students set nota=%d where carnet=\'%s\'',$nota,$carnet);
    mysql_query($query);	unset($_SESSION['valid_user']);
	session_destroy();
	$disabled=true;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Examenes</title>
<link rel="stylesheet" type="text/css" href="examen.css"/>
<script type="text/javascript">
function sel(preg,letter){
document.getElementById(preg).src = "images/letra"+letter+".png";
}
</script>
</head>

<body id="examBody">

<form title="myExam" method="post" action="" > 
<div id="upstream">
    <div id="logo">
        <img src="images/logo.png" alt="" /><br/>                           
        <img src="images/universidad.png" alt="" /><br/>
        <img src="images/departamento.png" alt="" />
    </div>
    <div id="datos">
        <div id="carnetlabel">
    <img src="images/carnet.png" alt=""/>
    </div>
    <div id="carnetfield">
    <input id="carnet" type="text" size="16.0" alt="" readonly value="<?php print($carnet);?>"/>
    </div>
        <br/><br/>
        <div id="nombrelabel">
    <img src="images/nombre.png" alt=""/>
    </div>
    <div id="nombrefield">
    <input id="nombre" type="text" size="28.0" alt="" readonly value="<?php print($nombre);?>"/>
    </div>
        <div id="seccionlabel">
    <img src="images/seccion.png" alt=""/>
    </div>
    <div id="seccionfield">
    <input id="seccion" type="text" size="8.0" alt="" readonly value="<?php print($seccion);?>"/>
    </div>
    <br/><br/>
        <div id="profesorlabel">
    <img src="images/profesor.png" alt=""/>
    </div>
    <div id="profesorfield">
    <input id="profesor" type="text" size="28.0" alt="" readonly value="<?php print($profesor);?>"/>
    </div>
    </div><br/>
    <div id="materia">
        <img src="images/materia.png" alt="" />
    </div>
    <br/>
    <div id="trimestre">
        <img src="images/trimestre.png" alt="" />
    </div>
    <div id="titulo">
        <img src="images/titulo.png" alt="" />
    </div>
</div>  <!-- cierra upstream -->
<div id="cont">
<strong>
Introduce Contraseña:
</strong> 
<input name="pass" type="password" <?php if($disabled) echo ' readonly '; ?> size="10"/> 
<input id="entButton" type="submit" value="<?php if($disabled) echo ' Salir '; else echo 'Entregar'; ?>" />
</div>
<div id="codigo">
<strong> Código: </strong> <?php print($code) ?> <input name="code" type="hidden" value="<?php print($code) ?>" />
</div>
<?php
if($disabled){
print("<div id=\"nota\">\n");
print("Nota final: "); print($nota);
print("\n</div>\n");
};
?>
<table class="resp">
<tr><td><img src="images/preg0.png" alt=""/></td><td><img src="images/preg1.png" alt=""/></td><td><img src="images/preg2.png" alt=""/></td><td><img src="images/preg3.png" alt=""/></td><td><img src="images/preg4.png" alt=""/></td><td><img src="images/preg5.png" alt=""/></td></tr>
<tr><td><img src="images/letra.png" id="preg0" alt=""/></td>
<td><img src="images/letra.png" id="preg1" alt=""/></td>
<td><img src="images/letra.png" id="preg2" alt=""/></td>
<td><img src="images/letra.png" id="preg3" alt=""/></td>
<td><img src="images/letra.png" id="preg4" alt=""/></td>
<td><img src="images/letra.png" id="preg5" alt=""/></td>
</tr></table>
<div id="cuerpo">
<?php

$letra="abcdefghijklmnopqrstuvwxyz";
$file_handle = fopen("keyReading.dat", "r");
$i=0;
while (!feof($file_handle) ) {
    $line_of_text = fgets($file_handle);
    if($i==$code) $resp=$line_of_text;
    $i=$i+1;
}
fclose($file_handle);
$sec=array(array());
$questions=explode("P",$resp);
 for($i=1;$i<sizeof($questions);$i++){
      $options=explode("O",$questions[$i]);
      for($j=0;$j<sizeof($options);$j++){
          $sec[$i][$j]=$options[$j];
  }
}

for($i=1;$i<sizeof($sec);$i++){
    print("<fieldset><legend>Pregunta "); print($i); print(" </legend><br/>");
    print("<img src=\"images/p"); print($sec[$i][0]); print(".png\" alt=\"\"/> <br/><br/>");
    for($j=1;$j<sizeof($sec[$i]);$j++){
        print("<table class=\"option\">\n");
        printf("<tr><td><img src=\"images/letra"); print($letra[$j-1]); print(".png\" alt=\"\" /></td><td><input type=\"radio\" name=\"p");
        print($sec[$i][0]); print("\" value=\"o"); print($sec[$i][$j]); print("p"); print($sec[$i][0]); print("\""); 
        if($disabled) echo ' disabled ';
        print(" id=\"o"); print($sec[$i][$j]); print("p"); print($sec[$i][0]); print("\"");
        print(" onclick=\"sel('preg"); print($i-1); 
        print("','"); print($letra[$j-1]);print("')\" />  </td><td><img src=\"images/o");
        print($sec[$i][$j]); print("p");
        print($sec[$i][0]);
        print(".png\" alt=\"\"/></td></tr>\n</table><br/><br/>\n");
    } 
    print("</fieldset>");
}

?>
</div>
</form>
<script type="text/javascript">
<?php
if($p0!='off') print("document.getElementById('".$p0."').checked=true;\n");
if($p1!='off') print("document.getElementById('".$p1."').checked=true;\n");
if($p2!='off') print("document.getElementById('".$p2."').checked=true;\n");
if($p3!='off') print("document.getElementById('".$p3."').checked=true;\n");
if($p4!='off') print("document.getElementById('".$p4."').checked=true;\n");
if($p5!='off') print("document.getElementById('".$p5."').checked=true;\n");
?>
</script>

</body>
</html>