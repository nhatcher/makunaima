<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Show students</title>
<link rel="stylesheet" type="text/css" href="general.css"/>

</head>
<body id="show">
  <ul id="mainNav">
    <li><a href="../index.php" id="homeLink">yageX</a></li>
    <li><a href="example.php" id="exampleLink">ejemplo</a></li>
    <li><a href="show.php" id="showLink">estudiantes</a></li>
  </ul>
<?php

$link = mysql_connect('localhost', 'belga', 'yo')
    or die('No pude conectar: ' . mysql_error());
echo 'Conexión realizada con éxito';
mysql_select_db('examen') or die('No he podido seleccionar la base de datos');

$query = 'SELECT * FROM students';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
echo "<table border=\"1\">\n";
$line = mysql_fetch_array($result, MYSQL_ASSOC);
    echo "\t<tr>\n";
        echo "\t\t<th>#</th>\n";
    foreach (array_keys($line) as $col_value) {
        echo "\t\t<th>$col_value</th>\n";
    }
    echo "\t</tr>\n";
$i=0;
do  {
    echo "\t<tr>\n";
    $i++;
    echo "\t\t<th>$i</th>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}while ($line = mysql_fetch_array($result, MYSQL_ASSOC));
echo "</table>\n";

mysql_free_result($result);

mysql_close($link);
?>
</body>
</html>