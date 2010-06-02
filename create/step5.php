<?php
if(isset($_POST['headx'])) $headx=$_POST['headx']; else $headx="1000";
if(isset($_POST['heady'])) $heady=$_POST['heady']; else $heady="400";
if(isset($_POST['headcolor'])) $headcolor=$_POST['headcolor']; else $headcolor="lightgrey";
chdir("images");
$letra="abcdefghijklmnopqrstuvwxyz";
$file_data= fopen('imagenes.dat','r');
$line_of_text = fgets($file_data);
$line_of_text = fgets($file_data);
$line_of_text =substr_replace($line_of_text,"",-1);
$variables=explode(',',$line_of_text);
$line_of_text = fgets($file_data);
$line_of_text =substr_replace($line_of_text,"",-1);
$campos=explode(',',$line_of_text);

for($i=0; $i<sizeof($variables); $i++)
{
    if(isset($_POST[$variables[$i].'posx'])) $varposx[$i]=$_POST[$variables[$i].'posx']; else $varposx[$i]="0px";
    if(isset($_POST[$variables[$i].'posy'])) $varposy[$i]=$_POST[$variables[$i].'posy']; else $varposy[$i]="0px";
}

for($i=0; $i<sizeof($campos); $i++)
{
    $nombres=explode('|',$campos[$i]);
    if(isset($_POST[$nombres[0].'posx'])) $camposx[$i]=$_POST[$nombres[0].'posx']; else $camposx[$i]="0px";
    if(isset($_POST[$nombres[0].'posy'])) $camposy[$i]=$_POST[$nombres[0].'posy']; else $camposy[$i]="0px";
}

if(isset($_POST['respuestasposx'])) $respuestasx=$_POST['respuestasposx']; else $respuestasx="0px";
if(isset($_POST['respuestasposy'])) $respuestasy=$_POST['respuestasposy']; else $respuestasy="0px";


if(isset($_POST['codigoposx'])) $codigox=$_POST['codigoposx']; else $codigox="0px";
if(isset($_POST['codigoposy'])) $codigoy=$_POST['codigoposy']; else $codigoy="0px";

if(isset($_POST['passwordposx'])) $passwordx=$_POST['passwordposx']; else $passwordx="0px";
if(isset($_POST['passwordposy'])) $passwordy=$_POST['passwordposy']; else $passwordy="0px";

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
#header
{
    background: <?php echo $headcolor; ?>;
    width: <?php echo $headx; ?>px;
    height: <?php echo $heady; ?>px;
    float: left;
    position: relative;
}

.dragme{
   position: absolute;
}
/*#coso
{
    background: lightgrey;
    border-style: dotted;
}*/
table.resp {
    border-width: 1px;
    border-spacing: 2px;
    border-style: solid;
    border-color: gray;
    border-collapse: separate;
    background-color: white;
    text-align: left;

}

table.resp td {
    border-width: 2px;
    padding: 3px;
    border-style: groove;
    border-color: red;
    background-color: rgb(250, 240, 230);
}

</style>

<script type="text/javascript">

var isdrag=false;
var x,y;
var dobj;

function movemouse(e)
{
  if (isdrag)
  {
    dobj.style.left = (tx + e.pageX - x).toString()+'px';
    dobj.style.top  = (ty + e.pageY - y).toString()+'px';
    return false;
  }
}

function selectmouse(e) 
{
  var fobj = e.target;
   var topelement = "html";
   while (fobj.tagName != topelement && fobj.className != "dragme")
   {
     fobj = fobj.parentNode;
   }

  if (fobj.className=="dragme")
  {
    isdrag = true;
    dobj = fobj;
    tx = parseInt(dobj.style.left+0);
    ty = parseInt(dobj.style.top+0);
    x = e.pageX;
    y = e.pageY;
    document.onmousemove=movemouse;
    return false;
  }
}

function viewcss(e)
{
  var fobj = e.target;
  //document.getElementById("coso").innerHTML=fobj.name;
   var topelement = "html";
   if(fobj.id=="header"){
    dobj = fobj;
    document.getElementById("nameOfwidget").innerHTML="Encabezado";
    document.getElementById("headx").value=dobj.style.width;
    document.getElementById("heady").value=dobj.style.height;
    document.getElementById("headcolor").value=dobj.style.background;
    }
   while (fobj.tagName != topelement && fobj.className != "dragme")
   {
     fobj = fobj.parentNode;
   }

  if (fobj.className=="dragme")
  {
    dobj = fobj;
    document.getElementById("nameOfwidget").innerHTML=dobj.id;
    document.getElementById("headx").value=dobj.style.left;
    document.getElementById("heady").value=dobj.style.top;
    document.getElementById("headcolor").value=dobj.style.background;
    
  } 
}

function setup()
{
window.document.onmousedown=selectmouse;
window.document.onclick=viewcss;
window.document.onmouseup=new Function("isdrag=false");
}

function repaint()
{
<?php
for($i=0;$i<sizeof($variables);$i++){
    print('document.getElementById("'.$variables[$i].'img").style.left="'.$varposx[$i].'";');print("\n");
    print('document.getElementById("'.$variables[$i].'img").style.top="'.$varposy[$i].'";');print("\n");
}

for($i=0;$i<sizeof($campos);$i++){
    $nombres=explode('|',$campos[$i]);
    print('document.getElementById("'.$nombres[0].'img").style.left="'.$camposx[$i].'";');print("\n");
    print('document.getElementById("'.$nombres[0].'img").style.top="'.$camposy[$i].'";');print("\n");
}

print('document.getElementById("respuestasimg").style.left="'.$respuestasx.'";');print("\n");
print('document.getElementById("respuestasimg").style.top="'.$respuestasy.'";');print("\n");

print('document.getElementById("codigoimg").style.left="'.$codigox.'";');print("\n");
print('document.getElementById("codigoimg").style.top="'.$codigoy.'";');print("\n");

print('document.getElementById("passwordimg").style.left="'.$passwordx.'";');print("\n");
print('document.getElementById("passwordimg").style.top="'.$passwordy.'";');print("\n");



?>
}

function resizeheader()
{
// document.getElementById("header").style.width=document.getElementById("headx").value+'px';
// document.getElementById("header").style.height=document.getElementById("heady").value+'px';
// document.getElementById("header").style.background=document.getElementById("headcolor").value;
// document.getElementById("header").style.border=document.getElementById("border").value;

dobj.style.width=document.getElementById("headx").value+'px';
dobj.style.height=document.getElementById("heady").value+'px';
dobj.style.background=document.getElementById("headcolor").value;
dobj.style.border=document.getElementById("border").value;
}
function saveform()
{
<?php
for($i=0;$i<sizeof($variables);$i++){
    print('document.getElementById("'.$variables[$i].'posx").value=document.getElementById("'.$variables[$i].'img").style.left;');print("\n");
    print('document.getElementById("'.$variables[$i].'posy").value=document.getElementById("'.$variables[$i].'img").style.top;');print("\n");
}

for($i=0;$i<sizeof($campos);$i++){
    $nombres=explode('|',$campos[$i]);
    print('document.getElementById("'.$nombres[0].'posx").value=document.getElementById("'.$nombres[0].'img").style.left;');print("\n");
    print('document.getElementById("'.$nombres[0].'posy").value=document.getElementById("'.$nombres[0].'img").style.top;');print("\n");
}
print('document.getElementById("respuestasposx").value=document.getElementById("respuestasimg").style.left;');print("\n");
print('document.getElementById("respuestasposy").value=document.getElementById("respuestasimg").style.top;');print("\n");

print('document.getElementById("codigoposx").value=document.getElementById("codigoimg").style.left;');print("\n");
print('document.getElementById("codigoposy").value=document.getElementById("codigoimg").style.top;');print("\n");

print('document.getElementById("passwordposx").value=document.getElementById("passwordimg").style.left;');print("\n");
print('document.getElementById("passwordposy").value=document.getElementById("passwordimg").style.top;');print("\n");

?>
}
</script>

<title>Create</title>
</head>

<body>
<form name="headerproperties" method="post" onsubmit="saveform()" action="">

<div id="header"/>
</div>
<div id="nameOfwidget"> Encabezado </div> <br/>
Izquierda: <input type="text" id="headx" name="headx" onkeyup="resizeheader()" value="<?php echo $headx; ?>"> <br/>
Derecha: <input type="text" id="heady" name="heady" onkeyup="resizeheader()" value="<?php echo $heady; ?>"> <br/>
Color de fondo: <input type="text" id="headcolor" name="headcolor" onchange="resizeheader()"  value="<?php echo $headcolor; ?>"><br/>
Tipo de borde: 
<select name="border" id="border" onchange="resizeheader()">
      <option>hidden</option>
      <option>dotted</option>
      <option>dashed</option>
      <option>solid</option>
      <option>groove</option>
      <option>ridge</option>
      <option>inset</option>
      <option>outsed</option>
   </select>

<br/>


<?php
for($i=0;$i<sizeof($variables);$i++){
    print('<input type="hidden" id="'.$variables[$i].'posx" name="'.$variables[$i].'posx" value="'.$varposx[$i].'"> ');print("\n");
    print('<input type="hidden" id="'.$variables[$i].'posy" name="'.$variables[$i].'posy" value="'.$varposy[$i].'"> ');print("\n");
}

for($i=0;$i<sizeof($campos);$i++){
    $nombres=explode('|',$campos[$i]);
    print('<input type="hidden" id="'.$nombres[0].'posx" name="'.$nombres[0].'posx" value="'.$camposx[$i].'"> ');print("\n");
    print('<input type="hidden" id="'.$nombres[0].'posy" name="'.$nombres[0].'posy" value="'.$camposy[$i].'"> ');print("\n");
}

print('<input type="hidden" id="respuestasposx" name="respuestasposx" value="'.$respuestasx.'"> ');print("\n");
print('<input type="hidden" id="respuestasposy" name="respuestasposy" value="'.$respuestasy.'"> ');print("\n");

print('<input type="hidden" id="codigoposx" name="codigoposx" value="'.$codigox.'"> ');print("\n");
print('<input type="hidden" id="codigoposy" name="codigoposy" value="'.$codigoy.'"> ');print("\n");

print('<input type="hidden" id="passwordposx" name="passwordposx" value="'.$passwordx.'"> ');print("\n");
print('<input type="hidden" id="passwordposy" name="passwordposy" value="'.$passwordy.'"> ');print("\n");
?>
<input type="submit" value="Guardar" >
</form>
<?php
for($i=0;$i<sizeof($variables);$i++){
    print('<img src="images/'.$variables[$i].'.png" id="'.$variables[$i].'img" class="dragme"  alt="" /> <br/>');    print("\n");
// <img src="images/'.$variables[$i].'.png" name="'.$variables[$i].'img2" alt="" /> </div><br/>');    print("\n");
}
for($i=0;$i<sizeof($campos);$i++){
    $nombres=explode('|',$campos[$i]);
    echo '<table  id="'.$nombres[0].'img" name="'.$nombres[0].'img" class="dragme"><tr><td><img src="images/'.$nombres[0].'.png" alt="" /> </td><td><input type="text" size="'.$nombres[1].'"></td></tr></table><br/>';print("\n");
    print("\n");
}
echo '<div id="respuestasimg" name="respuestasimg" class="dragme">';
echo '<table class="resp"><tr>';print("\n");
for($i=0;$i<6;$i++){
    printf('<td><img src="images/preg%d.png" alt=""/></td>',$i);print("\n");
}
echo '</tr><tr>';
for ($i=0;$i<6;$i++){
    printf('<td><img src="images/letra.png" id="preg%d" alt=""/></td>',$i); print("\n");
}
echo '</tr></table>';print("\n</div>\n");
?>
<div id="passwordimg" name="passwordimg" class="dragme">
<strong>
Introduce Contraseña:
</strong> 
<input name="pass" type="text" size="10"/> 
<input id="entButton" type="button" value="Entregar" />
</div>
<div id="codigoimg" name="codigoimg" class="dragme">
Código 77
</div>
<script type="text/javascript">
repaint();
window.onload=setup();
</script>
</body>

</html>