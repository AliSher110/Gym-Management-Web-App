<?php

require '../../include/db_conn.php';
page_protect();

$uid=$_POST['mem_id'];
$uname=$_POST['mem_name'];
$contact=$_POST['mem_contact'];



header("Location: table_view.php?id=".$uid."&name=".$uname."&contact=".$contact."");


?>