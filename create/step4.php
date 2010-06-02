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
<title>Paso 4</title>
<style  type="text/css">
.ejemplo
{
    margin-left:50px;
    font-family:Arial,Helvetica,sans-serif;
    border-style:dotted;
    background:lightgrey;
    width:1200px;
}
.clearboth { clear: both; }
.variable
{
    text-align: center;
    border-style: solid;
    padding: 5px;
    margin: 5px;
    float: left;
    position: relative;
}
.theline
{

clear:both;
margin-bottom:2px;
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
    <li><a href="step3.php" id="before">anterior</a></li>
    <li><a href="step5.php" id="next">siguiente</a></li>
  </ul>
<h1> Paso 4: revisión de imágenes </h1><br/>
yaex ha creado las imágenes por ti. Aquí debes ver las imágenes de las variables, los campos y el examen.
Si todo es corrrecto puedes dar al siguiente paso.<br/>
<?php
chdir("images");
print('Creando imágenes');
exec("imagemaker.py");
$letra="abcdefghijklmnopqrstuvwxyz";
$file_data= fopen('imagenes.dat','r');
$line_of_text = fgets($file_data);
$questions=explode(',',$line_of_text);
$line_of_text = fgets($file_data);
$line_of_text =substr_replace($line_of_text,"",-1);
$variables=explode(',',$line_of_text);
$line_of_text = fgets($file_data);
$line_of_text =substr_replace($line_of_text,"",-1);
$campos=explode(',',$line_of_text);
echo '<h2 class="theline"> Tus variables </h2><br/>';
echo '<div class="campos">';
for($i=0; $i<sizeof($variables); $i++)
{
    echo '<div class="variable">'; print("\n");
    echo '<img src="images/'.$variables[$i].'.png" alt="" /><br/>';print("\n");
    echo $variables[$i];print("\n");
    echo '</div>';print("\n");
}
echo '</div>';print("\n");
echo '<br/><h2 class="theline">Tus campos </h2><br/>';print("\n");

echo '<div class="campos">';print("\n");
for($i=0; $i<sizeof($campos); $i++)
{
    $nombres=explode('|',$campos[$i]);
    echo '<div class="variable">';print("\n");
    echo '<table class="option"><tr><td><img src="images/'.$nombres[0].'.png" alt="" /> </td><td><input type="text" size="'.$nombres[1].'"</td></tr></table><br/>';print("\n");
    echo $nombres[0];print("\n");
    echo '</div>';print("\n");
}
echo '</div>';print("\n");


echo '<br/><h2 class="theline">Vista del examen:</h2><br/>';print("\n");
echo '<div class="campos">';print("\n");
for($i=0; $i<sizeof($questions); $i++)
{
print("<fieldset><legend>Pregunta "); print($i+1); print(" </legend><br/>");
    print("<img src=\"images/p"); print($i); print(".png\" alt=\"\"/> <br/><br/>");
    for($j=0;$j<$questions[$i];$j++){
        print("<table class=\"option\">\n");
        printf("<tr><td><img src=\"images/letra"); print($letra[$j]); print(".png\" alt=\"\" /></td><td><input type=\"radio\" name=\"p");
        print($sec[$i][0]); print("\" value=\"o"); print($j); print("p"); print($i); print("\""); 
        print(" id=\"o"); print($j);  print("p"); print($i); print("\"/>  </td><td><img src=\"images/o");
        print($j); print("p");
        print($i);
        print(".png\" alt=\"\"/></td></tr>\n</table><br/><br/>\n");
    } 
    print("</fieldset>");print("\n");
}
echo '</div>';print("\n");
?>

</body>
</html>