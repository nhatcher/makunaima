<?php 
//include("/home/nicolas/webdev/password_protect.php"); ?>
<html>
  <head><title>Examen</title></head>
  <form name="myExam" method="post" action="check.php" onSubmit="check.php">
  
  <img src="../images/encabezado.png">
  <input id="entButton" type="submit" value="Entregar">
    <fieldset><legend>Datos</legend>
    <b>Nombre del estudiante</b> 
    <input name="user" type="text" size=30><br>
    <b>Introduce Contraseña: </b>
    <input name="pass" type="password" size=10><br><br>
    </fieldset>
    <fieldset><legend>Pregunta 1</legend><br>
	<img src="../images/p1.png"> <br><br>
	<input type="radio" name="p1" value="o11"/>     <img src="../images/o11.png"><br><br>
	<input type="radio" name="p1" value="o12"/>  <img src="../images/o12.png"><br><br>
	<input type="radio" name="p1" value="o13"/>  <img src="../images/o13.png"><br><br>
	<input type="radio" name="p1" value="o14"/>  <img src="../images/o14.png"><br><br>
	</fieldset>
	<br><br>
<fieldset><legend>Pregunta 2</legend>
	<img src="../images/p2.png"> <br>
	<input type="radio" name="p2" value="o21"/>  <img src="../images/o21.png"> <br>
	<input type="radio" name="p2" value="o22"/>  <img src="../images/o22.png"><br>
	<input type="radio" name="p2" value="o23"/>  <img src="../images/o23.png"><br>
	<input type="radio" name="p2" value="o24"/>  <img src="../images/o24.png"><br>
	</fieldset>
	<fieldset><legend>Pregunta 3</legend>
	<img src="../images/p3.png"> <br>
	<input type="radio" name="p3" value="o31"/>  <img src="../images/o31.png"> <br>
	<input type="radio" name="p3" value="o32"/>  <img src="../images/o32.png"><br>
	<input type="radio" name="p3" value="o33"/>  <img src="../images/o33.png"><br>
	<input type="radio" name="p3" value="o34"/>  <img src="../images/o34.png"><br>
	</fieldset>
		<fieldset><legend>Pregunta 4</legend>
	<img src="../images/p4.png"> <br>
	<input type="radio" name="p4" value="o41"/>  <img src="../images/o41.png"> <br>
	<input type="radio" name="p4" value="o42"/>  <img src="../images/o42.png"><br>
	<input type="radio" name="p4" value="o43"/>  <img src="../images/o43.png"><br>
	<input type="radio" name="p4" value="o44"/>  <img src="../images/o44.png"><br>

  </form>
</html>
