<?php
include './include/db_conn.php';
page_protect();

$sql = "UPDATE apst SET apstts='1' WHERE id=100";
$result=mysqli_query($con,$sql);
if ($result !=0) {
    header("location: ./index.php");
  } else {
    
  }
?>