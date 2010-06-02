<?php
if(isset($_POST['latex'])) $formula=$_POST['latex']; else $formula="\$E=mc^2\$";
$filename = "images/test";
//$Content = "\documentclass[12pt]{article}\n\usepackage[utf8]{inputenc}\n\usepackage[spanish]{babel}\n\usepackage{amsmath,amstext,amscd,amsfonts,amssymb,amsthm}\n\usepackage{epsfig}\n";
//$Content.= "\begin{document}\n\\thispagestyle{empty}\n".$formula."\n\end{document}";
$Content=$formula;

$handle = fopen($filename.".tex", 'w+');
fwrite($handle, $Content);
fclose($handle);
chdir("images");
exec("latex -interaction batchmode test.tex");
exec('dvipng -o test.png -T tight -bg Transparent -D 140 test.dvi');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<title>Latex Viewer</title>
</head>
<body>
<form title="latexform" method="post" action="" > 
<strong> Introduce latex: </strong><br/>
<textarea name="latex" rows="20" cols="80">
 <?php echo $formula; ?>
</textarea>
</div>
<input id="entButton" type="submit" value="Enviar" /><br/>
Resultado:<br/>
<img src="images/test.png" alt="" />
</form>


</body>
</html>