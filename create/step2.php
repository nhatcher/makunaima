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
    <li><a href="step1.php" id="before">anterior</a></li>
    <li><a href="step3.php" id="next">siguiente</a></li>
  </ul>
<h1> Paso 2: subir archivos al servidor </h1>
En este paso vamos a subir las imágenes y archivos extra que necesites.<br/><br/>
<?php
if(isset($_FILES['userfile'])){
$uploaddir = 'images/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Archivo correcto.\n";
} else {
    echo "Archivo demasiado largo.\n";
}
print "</pre>";
}
?>
<form enctype="multipart/form-data" action="" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    Enviar este archivo: <input name="userfile" type="file" />
    <input type="submit" value="Enviar" />
</form><br/>
Archivos subidos hasta ahora:<br/>
<?php
if ($handle = opendir('images')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            echo "$file\n<br/>";
        }
    }
    closedir($handle);
}
?>


</body>