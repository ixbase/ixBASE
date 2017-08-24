<?php
error_reporting(-1);
ini_set('display_errors','On');
if(!isset($_GET['MOD']))$MOD='???';
else $MOD=$_GET['MOD'];

if($MOD=='A'){

if(!isset($_GET['mv'])) $mv='';
else                    $mv=$_GET['mv'];
if(!isset($_GET['add']))$add='';
else                    $ad=$_GET['add'];
$db = new SQLite3('ixbase.db');
if(isset($ad)){
 $mv=trim($_POST['mv']);
 $q=$db->query("SELECT count(*) FROM blkinf00 where p4='$mv'");
 $p=$q->fetchArray();
 if($mv>'' and $p[0]==0){$db->exec("INSERT into blkinf00 (p2,p4)values('myshopper.click','$mv')");}
 exit;
}
$q=$db->query("SELECT * FROM blkinf00 where p4 like '$mv%' order by p4");
if(!$q){print "No data";
 $db->exec('CREATE TABLE blkinf00 (
p0 INTEGER PRIMARY KEY AUTOINCREMENT,
p1 DATETIME DEFAULT CURRENT_TIMESTAMP,
p2 STRING,
p3 STRING,
p4 STRING,
p5 TEXT,
p6 TEXT,
p7 STRING,
p8 STRING,
p9 STRING
)');
$db->exec("INSERT INTO blkinf00 (p2,p4,p5) VALUES ('mysms.click','_myfile','start')");
print "<script>location.href='myadmin.php?MOD=A';</script>";
exit;
}
print "
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
<style type='text/css'>
body{margin:0px;font-family:Arial;}
A:link   {text-decoration:none;color:000060;}
A:visited{text-decoration:none;color:000090;}
A:active {text-decoration:none;color:005000;}
A:hover  {text-decoration:none;color:000090;}
.tc{border-radius:6px;width:26px;background-color:#e9e9c0;color:#930000;border:none;margin:0px;margin-left:0px;text-align:center;border:0px;}
tr:hover{background:#aDe1e9}
</style><div style=margin:8px><font color=105080><b>myAdmin</b></font></div>
<br><br>";
$sl='';$i=1;
while($p=$q->fetchArray()){
    $sl.="<tr id=R$i onclick=cl($i,$p[0])><td><input class=tc>
<td><a target=B href=myadmin.php?MOD=B&p0=$p[0]&p4=$p[4]&i=$i><font id=F$i>$p[4]</font></a>
<td align=right><a target=B href=myadmin.php?MOD=B&p0=$p[0]&p4=$p[4]&i=$i><font color=aaaaaa style=padding-left:10px>$p[0]
<td><font color=green style=padding-left:10px;font-size:0.8em>$p[1]";
 $i++;
}
print "<table style=padding-left:3%>$sl</table>
<input id=RW value=1 type=hidden>
<p>&nbsp;ok
<script>
function CL(i,p0){
// B.location.href='myadmin.php?MOD=B&p0='+p0+'&i='+i;
}
function cl(i,p0){
 parent.B.location.href='myadmin.php?MOD=B&p0='+p0+'&i='+i;
 k=document.getElementById('RW').value;
   document.getElementById('R'+k).style.background='';
   document.getElementById('R'+i).style.background='#eeeeaa';
   document.getElementById('RW').value=i;
}
</script>";
 exit;

}else if($MOD=='B'){

if(!isset($_GET['p0']))$p0='';
else                   $p0=$_GET['p0'];
print "
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
<style type='text/css'>
body{margin:0px;font-family:Arial;}
A:link   {text-decoration:none;color:000060;}
A:visited{text-decoration:none;color:000090;}
A:active {text-decoration:none;color:005000;}
A:hover  {text-decoration:none;color:000090;}
.tc{border-radius:6px;width:26px;background-color:#e9e9c0;color:#930000;border:none;margin:0px;margin-left:0px;text-align:center;border:0px;}
#B1{position:fixed;top:0px;right:0px;height:30px;left:180px}
</style>
";
$db = new SQLite3('ixbase.db');
$q=$db->query("SELECT * FROM blkinf00 where p0='$p0'");
$p=$q->fetchArray();
if(!isset($_GET['S']))$S='';
else                  $S=$_GET['S'];
if(!isset($_GET['i']))$i='';
else                  $i=$_GET['i'];
if($S>''){
 $T=$_POST['T'];
 $T=str_replace("'","''",$T);
 $db->exec("update blkinf00 set p5='$T' where p0='$p0'");
 print "<font id=OK color=green>OK</font>
<script>
function X(){document.getElementById('OK').innerHTML='';}
setTimeout(X,3000);
</script>";
}else{
 if(!isset($_GET['R']))$R='';
 else                  $R=$_GET['R'];
 if($R>''){
  $pp=$_POST['pp'];
  $db->exec("update blkinf00 set p4='$pp' where p0='$p0'");
  print "<div style=margin:4px> OK</div>
<script>
 parent.parent.A.document.getElementById('F$i').innerHTML='$pp';
</script>";
  exit;
 }
$REN="<div style=padding:4px><tr><td><form target=K action=myadmin.php?MOD=B&p0=$p0&R=1&i=$i method=post><input name=pp value=$p[4]><input type=submit value=NEW_name><iframe style=height:26px name=K frameborder=0></iframe></form></div>";

print "<table width=100% height=100%><tr><td height=40px>
<table><tr><td width=60>
<td><form target=KK action=myadmin.php?MOD=B&S=1&p0=$p0 method=post><input type=submit value=SAVE style=color:blue>
<td valign=top><iframe name=KK style=height:26px frameborder=0></iframe>
</table>
<tr><td height=100%><textarea name=T style=height:100%;width:100%;padding:12px;font-size:1.3em>$p[5]
</textarea></form>
</table>
<div id=B1 align=right><font id=REN><table style=padding-top:5px width=100%><tr>
<td align=left width=100%><font color=999999> $p[4]
<td onclick=clREN()><button><font color=green>Rename</font></button><td>#$p0<td><font id=DEL></font><font id=YES><a><font onclick=clDEL()><button><font color=900000>DEL</font></button></font></a></font> 
<td><iframe style=height:30px name=K frameborder=0></iframe>
</table></font></div>

<script>
function clDEL(){
 document.getElementById('DEL').innerHTML='<button><font color=red>DEL</font> - yes</button>';
 document.getElementById('YES').innerHTML='';
}
function clREN(){
 document.getElementById('REN').innerHTML='$REN';
}
</script>";
}
exit;

}else if($MOD=='H'){

print "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<style>
body{margin:0px;}
A:link   {text-decoration:none;color:000060;}
A:visited{text-decoration:none;color:000090;}
A:active {text-decoration:none;color:005000;}
A:hover  {text-decoration:none;color:000090;}

th:hover{background-color:rgba(230,230,160,0.8);
box-shadow: inset 0px 0px 10px rgba(120,120,120,0.9);}
</style>
<table width=100% cellpadding=0 cellspacing=0 height=36
style='box-shadow: inset 0px 0px 10px rgba(140,140,140,0.9);'><tr height=36>";
$i=0;$k=0;
while($i<100){
 if($k==3)
 print "<th id=D$k width=5% onclick=cl($k) bgcolor=ffffcc style='box-shadow: inset 0px 0px 10px rgba(140,140,140,0.9);'>";
 else if($k==17)
 print "<td align=right id=D$k width=5% style=cursor:pointer;background:rgba(200,200,200,0.5)><font color=red size=6><";
 else if($k==18)
 print "<td align=center id=D$k width=5% style=cursor:pointer;background:rgba(200,200,200,0.5)><font color=red size=6><";
 else if($k==19)
 print "<td id=D$k width=5% style=cursor:pointer;background:rgba(200,200,200,0.5)><font color=red size=6><";
 else
 print "<th id=D$k width=5% onclick=cl($k)>";
 $i+=5;$k++;
}
print "<td><input id=RW value=15% type=hidden></table>";
print "
<div style='position:fixed;top:0px;left:10px'><a target=C href=e.php?ix=bvAF>
<font color=green size=3 style='text-shadow: 0px 4px 4px #555'>$M1
</div>";
print "<script>
function cl(k){
 n=document.getElementById('RW').value;
   document.getElementById('RW').value=k*5+'%';
   parent.document.getElementById('B').style.left=k*5+'%';
}
</script>";
exit;

} else
 print "
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
<meta name=viewport content=width=device-width,initial-scale=1.0>
<style type='text/css'>
body{margin:0px;font-family:Arial;background:rgba(230,230,200,0.3);}
A:link   {text-decoration:none;color:000060;}
A:visited{text-decoration:none;color:000090;}
A:active {text-decoration:none;color:005000;}
A:hover  {text-decoration:none;color:000090;}
.tc{border-radius:6px;width:26px;background-color:#e9e9c0;color:#930000;border:none;margin:0px;margin-left:0px;text-align:center;border:0px;}
tr:hover{background:#aDe1e9}
#A{position:fixed;top:0px;right:0px;bottom:0px;left:0px}
#B{position:fixed;top:10px;right:30px;bottom:40px;left:15%}
#S{position:fixed;top:36px;left:30px}
#H{position:fixed;height:40px;right:0px;bottom:0px;left:0%}

</style>
<div id=A><iframe frameborder=0 name=A height=100% width=100% src=myadmin.php?MOD=A></iframe></div>
<div id=S><form target=A action=myadmin.php?MOD=A&add=1 method=post><button>++</button><input autocomplete=off id=SS name=mv onkeyup=ku()></form></div>
<div id=B><iframe frameborder=0 name=B height=100% width=100%></iframe></div>
<div id=H><iframe frameborder=0 name=H width=100% height=100% frameborder=0 src=myadmin.php?MOD=H></iframe></div>
<script>
function ku(i,p0){
 mv=document.getElementById('SS').value;
 A.location.href='myadmin.php?MOD=A&mv='+mv;
}
</script>
";
?>
