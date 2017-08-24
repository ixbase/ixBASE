<?php
if(!isset($_GET['MOD'])){
print "<meta name=viewport content=width=device-width,initial-scale=1.0>
<style>
body{margin:40px;font-family:Arial;}
A:link   {text-decoration:none;color:000060;}
A:visited{text-decoration:none;color:000090;}
A:active {text-decoration:none;color:005000;}
A:hover  {text-decoration:none;color:000090;}
</style>
<a href=myadmin.php><button><font color=blue size=5>myAdmin</font></button></a>  
<a href=v.php?ix=myAPP><button><font color=900000 size=5>myApp</font></button></a>
<a href=v.php?ix=mySMStest><button><font color=green size=5>Termux:API</font></button></a>
<a href=http://myshopper.click/v.php?ix=bv><button><font color=105080 size=5>BeriVse</font></button></a>
<hr><br><br><b>/sdcard/www/</b><br>
<font color=105080>";
$d = dir(".");
while (false !== ($entry = $d->read())) {
   print "<a href=index.php?MOD=2&id=$entry>$entry</a><p>";
}
$d->close();
print "<br><br><br>
<script>
function DB(){location.href='mydb.php';}
function TB(){location.href='create.php';}
</script>";
}else{
 $id=$_GET['id'];
 print "<meta name=viewport content=width=device-width,initial-scale=1.0>";
 print $id;
 $fd=fopen($id,"r");
 $m=fread($fd,filesize($id));
 print "<pre>".htmlspecialchars($m);
}
?>
