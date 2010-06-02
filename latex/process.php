<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<title>Crear imágenes</title>

<?php
if(isset($_POST['latex'])){
    chdir("images");
    print('Creando imágenes');
    exec("imagemaker.py");
    $letra="abcdefghijklmnopqrstuvwxyz";
    $file_data= fopen('imagenes.dat','r');
    $line_of_text = fgets($file_data);
    $questions=explode(',',$line_of_text);
    echo '<br/>Vista del examen:<br/>';
    for($i=0; $i<sizeof($questions); $i++)
    {
    print("<fieldset><legend>Pregunta "); print($i+1); print(" </legend><br/>");
        print("<img src=\"images/p"); print($i); print(".png\" alt=\"\"/> <br/><br/>");
        for($j=0;$j<$questions[$i];$j++){
            print("<table class=\"option\">\n");
            printf("<tr><td><img src=\"images/letra"); print($letra[$j]); print(".png\" alt=\"\" /></td><td><input type=\"radio\" name=\"p");
            print($sec[$i][0]); print("\" value=\"o"); print($j); print("p"); print($i); print("\""); 
        //  if($disabled) echo ' disabled ';
            print(" id=\"o"); print($j);  print("p"); print($i); print("\"/>  </td><td><img src=\"images/o");
            print($j); print("p");
            print($i);
            print(".png\" alt=\"\"/></td></tr>\n</table><br/><br/>\n");
        } 
        print("</fieldset>");
    }
    $line_of_text = fgets($file_data);
    $variables=explode(',',$line_of_text);
    echo '<br/> Tus variables <br/>';
    for($i=0; $i<sizeof($variables); $i++)
    {
        echo '<img src="images/'.$variables[$i].'.png" alt="" /><br/>';
    }
    echo '<br/>Tus campos <br/>';
    $line_of_text = fgets($file_data);
    $campos=explode(',',$line_of_text);
    for($i=0; $i<sizeof($campos); $i++)
    {
        $nombres=explode('|',$campos[$i]);
        echo '<img src="images/'.$nombres[0].'.png" alt="" /> <input type="text" size="'.$nombres[1].'"<br/>';
    }
}

?>
</head>
<body>
<form title="createform" method="post" action="" onsubmit="document.getElementbyId('latex').value='Si';" > 
<input id="entButton" type="submit" value="Crear Imágenes" /><br/>
<input type="hidden" name="latex"/>
</form>
</body>
</html>