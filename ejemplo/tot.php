<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<title>Examenes</title>


<style>
.dragme{
   position:relative;
}
</style>

<script type="text/javascript">

//var nn6=document.getElementById;

var isdrag=false;
var x,y;
var dobj;

function movemouse(e)
{
  if (isdrag)
  {
 //   dobj.style.left = nn6 ? tx + e.clientX - x : tx + event.clientX - x;
 //   dobj.style.top  = nn6 ? ty + e.clientY - y : ty + event.clientY - y;
    dobj.style.left = tx + e.clientX - x;
    dobj.style.top  = ty + e.clientY - y;
    return false;
  }
}

function selectmouse(e) 
{
  var fobj       = e.target;
  var topelement = "html";// nn6 ? "HTML" : "BODY";

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
    x = e.clientX;
    y = e.clientY;
    document.onmousemove=movemouse;
    return false;
  }
}

document.onmousedown=selectmouse;
document.onmouseup=new Function("isdrag=false");

</script>




</head>

<body id="examBody">

<div id="upstream">
    <div id="logo">
        <img src="images/logo.png" alt="" /><br/>                           
        <img src="images/universidad.png" alt="" /><br/>
        <img src="images/departamento.png" alt="" />
    </div>
    <div id="datos">
        <div id="carnetlabel">
    <img src="images/carnet.png" alt="" class="dragme"/>
    </div>
    <div id="carnetfield">
    <input id="carnet" type="text" size="16.0" alt="" readonly value="" class="dragme" />
    </div>
        <br/><br/>
        <div id="nombrelabel">
    <img src="images/nombre.png" alt="" class="dragme"/>
    </div>
    <div id="nombrefield">
    <input id="nombre" type="text" size="28.0" alt="" readonly value=""/>
    </div>
        <div id="seccionlabel">
    <img src="images/seccion.png" alt="" class="dragme"/>
    </div>
    <div id="seccionfield">
    <input id="seccion" type="text" size="8.0" alt="" readonly value=""/>
    </div>
    <br/><br/>
        <div id="profesorlabel">
    <img src="images/profesor.png" alt="" class="dragme"/>
    </div>
    <div id="profesorfield">
    <input id="profesor" type="text" size="28.0" alt="" readonly value=""/>
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


</body>
</html>