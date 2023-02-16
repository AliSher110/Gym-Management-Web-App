<?php
require '../../include/db_conn.php';
page_protect();

$curdt = date("Y-m-d");
$curmon = date("F-y");
$id = $_POST['pay'];

$query2="UPDATE `monthlyrecord` SET `$id` = '1' WHERE months = '$curmon';";
$result=mysqli_query($con,$query2);

                echo "<head>
               <script>alert('Attendence Marked ');</script>
               </head>
               </html>";
// header("Location: feesrecipt.php?id=".$id."");


$query  = "select * from users where userid='$id'";

$result = mysqli_query($con, $query);

while($row = $result->fetch_assoc()) {
    $name = $row['username'];
    $phone = $row['mobile'];
    $email = $row['email'];
    $addr = $row['area']." ".$row['city'];
    $plan = "Admission" . " " . $row['plan'];
}

if($plan="Muscle"){
    $fees = 2000;
}elseif($plan="Cardio"){
    $fees = 2500;
}


$sql3 = "insert into  invoice  (u_id,descr,amount,inv_date) values('$id','$plan','$fees','$curdt')";
$result3  = mysqli_query($con,$sql3);


header("Location: feesrecipt.php?id=".$id."");

?>