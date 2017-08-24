<?php
if(!isset($ix)){foreach($_REQUEST as $key=>$val){${$key}=$val;}}
foreach($_SERVER as $key=>$val){${$key}=$val;}
foreach($_COOKIE as $key=>$val){${$key}=$val;}
include_once('vdb.php');
$db = new SQLite3('ixbase.db');
$qq=$db->query("SELECT count(p4) FROM blkinf00 where p4='$ix'");
$pp=$qq->fetchArray();
if($pp[0]<1){include('vblkinf.php');}
$qq=$db->query("SELECT p5 FROM blkinf00 where p4='$ix'");
$pp=$qq->fetchArray();
if(substr($pp[0],0,1)=="<") print stripslashes($pp[0]);
else eval(stripslashes($pp[0]));
?>
