<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<title>Latex Viewer</title>
</head>
<body>
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
</form>


</body>
</html>