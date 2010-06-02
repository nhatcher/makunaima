<?php
if(isset($_POST['headx'])) $headx=$_POST['headx']; else $headx="1000";
if(isset($_POST['heady'])) $heady=$_POST['heady']; else $heady="400";
if(isset($_POST['headcolor'])) $headcolor=$_POST['headcolor']; else $headcolor="lightgrey";
if(isset($_POST['logoposx'])) $logoposx=$_POST['logoposx']; else $logoposx="3px"; 
if(isset($_POST['logoposy'])) $logoposy=$_POST['logoposy']; else $logoposy="3px"; 
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
    position: relative;
}
#logoimg
{
    left: <?php echo $logoposx; ?>;
    top: <?php echo $logoposy; ?>;
    position: absolute;
}

.dragme{
   position: absolute;
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
   // document.getElementById("posx").value=tx+e.pageX-x;//dobj.style.left;
  //  dobj.style.position ="absolute";
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
  //  document.getElementById("posx").value=(document.getElementById("logoimg").style.left);
    x = e.pageX;
    y = e.pageY;
    document.onmousemove=movemouse;
    return false;
  }
}
function setup()
{
document.captureEvents(Event.MOUSEMOVE);
window.document.onmousedown=selectmouse;
window.document.onmouseup=new Function("isdrag=false");
//document.onmousedown=selectmouse;
//document.onmouseup=new Function("isdrag=false");
}

function repaint()
{
//document.getElementById("logoimg").style.left="<?php echo $logoposx; ?>";
//document.getElementById("logoimg").style.top="<?php echo $logoposy; ?>";
}

function resizeheader()
{
document.getElementById("header").style.width=document.getElementById("headx").value+'px';
document.getElementById("header").style.height=document.getElementById("heady").value+'px';
document.getElementById("header").style.background=document.getElementById("headcolor").value;
document.getElementById("header").style.border=document.getElementById("border").value;
}
function saveform()
{
// document.getElementById("logoposx").value=document.getElementById("logoimg").style.left;
// document.getElementById("logoposy").value=document.getElementById("logoimg").style.top;
// document.write((document.getElementById("logoimg").style.left));
}
</script>

<title>Create</title>
<!--<link rel="stylesheet" type="text/css" href="examen.css"/>-->
</head>

<body>
Propiedades del ecabezado <br/>
<form name="headerproperties" method="post" onsubmit="saveform()" action="">
Longitud: <input type="text" id="headx" name="headx" onkeyup="resizeheader()" value="<?php echo $headx; ?>"> <br/>
Altura: <input type="text" id="heady" name="heady" onkeyup="resizeheader()" value="<?php echo $heady; ?>"> <br/>
Color de fondo: <input type="text" id="headcolor" name="headcolor" onchange="resizeheader()"  value="<?php echo $headcolor; ?>"><br/>
Tipo de borde: 
<SELECT name="border" id="border" onchange="resizeheader()">
      <OPTION>hidden</OPTION>
      <OPTION>dotted</OPTION>
      <OPTION>dashed</OPTION>
      <OPTION>solid</OPTION>
      <OPTION>groove</OPTION>
      <OPTION>ridge</OPTION>
      <OPTION>inset</OPTION>
      <OPTION>outsed</OPTION>
   </SELECT>

<br/>
Posición: <input type="text" id="posx" name="posx" value="">
<div id="header"/>
</div>
<input type="hidden" id="logoposx" name="logoposx" value="<?php echo $logoposx; ?>"> <input type="hidden" id="logoposy" name="logoposy" value="<?php echo $logoposy; ?>">
<input type="submit" value="Guardar" >
</form>

       <div id="logoimg" name="logoimg" class=dragme> <img src="images/logo.png" name="logoimg2" alt="" /> </div><br/>                           

<script type="text/javascript">
repaint();
window.onload=setup();
//document.onmousedown=selectmouse;
//document.onmouseup=new Function("isdrag=false");
</script>
</body>

</html>