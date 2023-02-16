<?php

require '../../include/db_conn.php';
page_protect();

$uid=$_POST['f_id'];
$uname=$_POST['f_name'];
$contact=$_POST['f_contact'];


header("Location: fees.php?id=".$uid."&name=".$uname."&contact=".$contact."");


?>