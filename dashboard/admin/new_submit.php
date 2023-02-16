
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/recipt.css">
</head>
<?php
require '../../include/db_conn.php';
page_protect();

 $uid;
 $uname=$_POST['u_name'];
 $area=$_POST['street_name'];
 $city=$_POST['city'];
 $weight=$_POST['weight'];

 $gender=$_POST['gender'];
 $dob=$_POST['dob'];
 $phn=$_POST['mobile'];
 $email=$_POST['email'];
 $jdate=$_POST['jdate'];
 $plan=$_POST['plan'];
 $addfees=$_POST['addfees'];

 $curdt = date("Y-m-d");

//inserting into users table
$query="insert into users(username,gender,mobile,email,weight,dob,joining_date,dues,area,city,plan,add_fees) values('$uname','$gender','$phn','$email','$weight','$dob','$jdate','NO-DUES','$area','$city','$plan','$addfees')";
    if(mysqli_query($con,$query)==1){

        //Get user id of current user entered in table
        $sql1 = "SELECT userid FROM users ORDER BY userid DESC LIMIT 1;";
        $result1 = mysqli_query($con,$sql1);
        while($row = mysqli_fetch_array($result1)){
            $uid = $row['userid'];
        }


        //Add Invoice Information in Database
        $sql3 = "insert into invoice(u_id,descr,amount,inv_date) values('$uid','$plan','$addfees','$curdt')";
        $result3  = mysqli_query($con,$sql3);


      //Add User in Attendence table 
      $query2="ALTER TABLE `dates` ADD `$uid` INT(1) NOT NULL DEFAULT '0' ;";
      $result=mysqli_query($con,$query2);
            if($result){
        //Add User in MonthlyRecord table 
            $query4="ALTER TABLE `monthlyrecord` ADD `$uid` INT(1) NOT NULL DEFAULT '0' ;";
            $result4=mysqli_query($con,$query4);
                    if($result4){
                        $curmon = date("F-y");
                        $query5="UPDATE `monthlyrecord` SET `$uid` = '1' WHERE `monthlyrecord`.`months` = '$curmon';";
                        $result5=mysqli_query($con,$query5);

                        $curdt = date("Y-m-d");
                        $query6="UPDATE `dates` SET `$uid` = '1' WHERE `dates`.`dates` = '$curdt';";
                        $result6=mysqli_query($con,$query6);
               echo "<head>
               <script>alert('Member Added ');</script>
               </head>
               </html>";

               
               //for Addmission recipt 
               header("Location: addrecipt.php?id=".$uid."");
            ?>

<?php
date_default_timezone_set('Asia/Karachi');
?>




        <?php
            //    echo "<meta http-equiv='refresh' content='0; url=new_entry.php'>";
              
          }
          else{
            echo "<head><script>alert('Member Added Failed');</script></head></html>";
            echo "error: ".mysqli_error($con);
            //Deleting record of users if inserting to enrolls_to table failed to execute
             $query3 = "DELETE FROM users WHERE userid='$memID'";
             mysqli_query($con,$query3);
          }
        }

         
    }
        

    
    
?>



