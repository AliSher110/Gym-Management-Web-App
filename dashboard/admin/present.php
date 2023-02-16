<?php
require '../../include/db_conn.php';
page_protect();

$curdt = date("Y-m-d");
$id = $_POST['present'];
$uname="";
$contact="";

$query2="UPDATE `dates` SET `$id` = '1' WHERE `dates`.`dates` = '$curdt';";
$result=mysqli_query($con,$query2);

                echo "<head>
               <script>alert('Attendence Marked ');</script>
               </head>
               </html>";
header("Location: attendence.php?id=".$id."&name=".$uname.""."&contact=".$contact."");
                

?>