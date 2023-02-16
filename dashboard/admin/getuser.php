<?php

require '../../include/db_conn.php';
page_protect();

$uid=$_POST['att_id'];
$uname=$_POST['att_name'];
$contact=$_POST['att_contact'];


header("Location: attendence.php?id=".$uid."&name=".$uname.""."&contact=".$contact."");


?>