<?php 
/*
if(!isset($nm)){}else
{
  if(!isset($kd)) $kd=0;
  if(!isset($nd)) $nd='';
  if(!isset($txt))$txt='';
  $IPresult=$db->query("SELECT * FROM dbfuse00 WHERE k_y='$REMOTE_ADDR+$nm'");
  if($IPresult->num_rows > 0) $db->query("UPDATE dbfuse00 SET nom='$kd',nai='$nd',txt='$txt' WHERE k_y='$REMOTE_ADDR+$nm'");
  else $db->query("INSERT INTO dbfuse00 set k_y='$REMOTE_ADDR+$nm',nom='$kd',nai='$nd',txt='$txt'");
  $IPresult=$db->query("SELECT * FROM dbfuse00 WHERE k_y='$nm'");
  if($IPresult->num_rows > 0) $db->query("UPDATE dbfuse00 SET nom='$kd',nai='$nd' WHERE k_y='$nm'");
  else $db->query("INSERT INTO dbfuse00 set k_y='$nm',nom='$kd',nai='$nd'");
}
$IPresult= $db->query("SELECT * FROM ipaddr WHERE Adr='$REMOTE_ADDR'");
$number  = $IPresult->num_rows;
$_db_=date("Y-n-d");
if($number == 0){
   $db->query("INSERT INTO ipaddr set Adr='$REMOTE_ADDR',LangNA='1',data_beg='$_db_'");
}else {
   $Pr=$IPresult->fetch_row();
   $n=$Pr[1];
   $db->query("UPDATE ipaddr SET data_last='$_db_' WHERE Adr='$REMOTE_ADDR'");
}
if(isset($ind)   )  {$db->query("UPDATE ipaddr SET Ind     ='$ind'      WHERE Adr='$REMOTE_ADDR'");}
if(isset($LangNA))  {$db->query("UPDATE ipaddr SET LangNA  ='$LangNA'   WHERE Adr='$REMOTE_ADDR'");}
if(isset($NickNA))  {$db->query("UPDATE ipaddr SET NickNA  ='$NickNA'   WHERE Adr='$REMOTE_ADDR'");}
if(isset($LexeNA))  {$db->query("UPDATE ipaddr SET LexeNA  ='$LexeNA'   WHERE Adr='$REMOTE_ADDR'");}
if(isset($lexeme01)){$db->query("UPDATE ipaddr SET lexeme01='$lexeme01' WHERE Adr='$REMOTE_ADDR'");}
if(isset($logiNA))  {$db->query("UPDATE ipaddr SET LogiNA  ='$logiNA'   WHERE Adr='$REMOTE_ADDR'");}
if(isset($loginN))  {$db->query("UPDATE ipaddr SET LoginN  ='$loginN'   WHERE Adr='$REMOTE_ADDR'");}

$IPr=$db->query("SELECT * FROM ipaddr WHERE Adr='$REMOTE_ADDR'");  
if($IPr->num_rows>0) {
   $Pr=$IPresult->fetch_row();
   $LangNA  =$Pr[3];
   $NickNA  =$Pr[5];
   $LexeNA  =$Pr[6];
   $lexeme01=$Pr[7];
   $loginN  =$Pr[8];
   $logiNA  =$Pr[9];
}else{
   $LangNA  =1;
   $NickNA  ='';
   $LexeNA  =1;
   $lexeme01=1;
   $loginN  =1;
   $logiNA  =1;
}
if($LangNA==0) $LangNa=1;
*/
?>
