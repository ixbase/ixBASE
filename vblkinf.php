<?php
$_m=file_get_contents("http://mysms.click/vget.php?ix=$ix");
$_a=explode('<td !>',$_m);
$_a[5]=str_replace("'","''",$_a[5]);
$_a[6]=str_replace("'","''",$_a[6]);
$db->exec("insert into blkinf00 (p1,p2,p3,p4,p5,p6)values('$_a[1]','$_a[2]','$_a[3]','$_a[4]','$_a[5]','$_a[6]')");
?>
