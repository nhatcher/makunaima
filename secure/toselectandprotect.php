<?php
session_start();
if(!isset($_SESSION['carnet'])){
if(!function_exists('showSelector')) {
    function showSelector($error_msg) {
?>
<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<title>To select and Protect</title>
<link rel="stylesheet" type="text/css" href="general.css"/>

</head>
<body id="example">
  <ul id="mainNav">
    <li><a href="../index.php" id="homeLink">yageX</a></li>
    <li><a href="ejemplo.php" id="exampleLink">ejemplo</a></li>
    <li><a href="show.php" id="showLink">estudiantes</a></li>
    <li><a href="ejemplo.pdf" id="showLink">pdf</a></li>
  </ul>

<form title="selector" method="post" action=""> 
 <font color="red"><?php echo $error_msg; ?></font><br />
¿Qué examen deseas ver?
<input name="code" type="text" size="16.0" alt=""/> <br/>
¿Cual es el número de carnet del estudiante?
<input name="carnet" type="text" size="16.0" alt=""/><br/>
 <input id="entButton" type="submit" value="Entregar"/>
</form>

</body>
</html>

<?php
  die();
}
}
if (isset($_POST['carnet'])) {

    $code = isset($_POST['code']) ? $_POST['code'] : '';
    $carnet = $_POST['carnet'];
    $link = mysql_connect('localhost', 'belga', 'yo')
        or die('No pude conectar: ' . mysql_error());
    mysql_select_db('examen') or die('No he podido seleccionar la base de datos');
    $query ="select * from students  where carnet=".$carnet;
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
    mysql_free_result($result);
    mysql_close($link);
    if($row[1]!=$carnet){
        showSelector('Carnet inválido: ');
    }
    else {
        if($row[5]!=-1) showSelector('El alumno ya entregó examen y obtuvo un '.$row[5]);
        $_SESSION['carnet'] = $carnet;
        $_SESSION['nombre'] = $row[2];
        $_SESSION['seccion'] = $row[4];
        $_SESSION['code']=$code;

    }

}
else
{
    showSelector("");
}
}
?>



