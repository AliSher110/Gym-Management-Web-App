<?php

require '../../include/db_conn.php';
page_protect();

$sql = "SELECT dates FROM dates ORDER BY id DESC LIMIT 1;";

$lastdate;
$curdt = date("Y-m-d");

$uid=0;
$uname=0;
$ucont=0;
$attstatus;

$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
    // echo $row['dates'];
    $latestdate = $row['dates'];
    // echo $latestdate . "<br>";
    // echo $curdt;

    if($curdt != $latestdate){

        // echo "Helloo";
        $sql = "INSERT INTO dates (dates)
        VALUES ('$curdt')";

        if ($con->query($sql) === TRUE) {
        // echo "Date Updated";

        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

}
?>






    




<!DOCTYPE html>
<html lang="en">
<head>

    <title>Gym | Attendence</title>
   <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<style>
 	#button1
	{
	width:126px;
	}

	.page-container .sidebar-menu #main-menu li#hassubopen > a {
	background-color: #2b303a;
	color: #ffffff;
	}

	</style>

</head>
    <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			
					<!-- logo collapse icon -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php');
            
            

            ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li>Welcome <?php echo $_SESSION['full_name']; ?> 
							</li>								
						
							<li>
								<a href="logout.php">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3>Member Attendence</h3>

		<hr />

        <form action="getuser.php" method="post">

            <div class="input-group mb-3 w-75 px-3 ">
            <input type="text" class="form-control " name="att_id" placeholder="User Id"  aria-describedby="button-addon2">
            <div class="input-group-append mr-3">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
            </div>


            <input type="text" class="form-control" name="att_name" placeholder="Name"  aria-describedby="button-addon2">
            <div class="input-group-append mr-3">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
            </div>


            <input type="text" class="form-control" name="att_contact" placeholder="Contact" aria-label="Contact" aria-describedby="button-addon2">
            <div class="input-group-append mr-3">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
            </div>
            </div>
        </form>

		<hr />

        <?php
            if($_GET){
                $uid= $_GET['id'];
                $uname= $_GET['name'];
                $ucont= $_GET['contact'];

                if($uid=="" && $uname=="" && $ucont==""){
                    echo "<head>
                    <script>alert('can not submit empty ');</script>
                    </head>
                    </html>";
                }

            }else{
            echo "No User Selected";
            }
        ?>
		
		<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr><h2>
					<th>Member ID</th>
					<th>Name</th>
					<th>Contact</th>
					<th>E-Mail</th>
					<th>Gender</th>
					<th>Joining Date</th>
					<th>Fees Status</th>
					<th>Attendence</th>
					<th>Action</th></h2>
				</tr>
			</thead>
				<tbody>

					<?php
                     $curmon = date("F-y");
                     $feesstatus;
                    //For Id only
                    if($uid !="" && $uname=="" && $ucont==""){$query  = "SELECT * FROM users WHERE (userid='$uid') ";}
                    if($uid =="" && $uname!="" && $ucont==""){$query  = "SELECT * FROM users WHERE (username='$uname') ";}
                    if($uid =="" && $uname=="" && $ucont!=""){$query  = "SELECT * FROM users WHERE (mobile='$ucont') ";}
                    	    $result = mysqli_query($con, $query);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
							       
							                
							                echo "<tr>";
							                echo "<td>" . $row['userid'] . "</td>";	                
							                echo "<td>" . $row['username'] . "</td>";
							                echo "<td>" . $row['mobile'] . "</td>";
							                echo "<td>" . $row['email'] . "</td>";
							                echo "<td>" . $row['gender'] . "</td>";
							                echo "<td>" . $row['joining_date'] . "</td>";
							                

                                            $uid=$row['userid'];
											$query2  = "SELECT * FROM monthlyrecord WHERE (months='$curmon') ";
                                            $result2 = mysqli_query($con, $query2);
                                            if ($result2->num_rows > 0) {
                                                while($row1 = $result2->fetch_assoc()) {
                                                    $feesstatus=$row1[$uid];
                                                }  
                                            } else{echo "No Data Found";}

                                            if ($feesstatus==0){
                                                echo "<td style='color:red'>" . "NOT PAID" ."</td>";
                                            }elseif($feesstatus==1){
                                                echo "<td style='color:green'>" . "PAID" ."</td>";
                                            }

                                            // $uid=$row['userid'];
                                            
                                            $query2  = "SELECT * FROM dates WHERE (dates='$curdt') ";
                                            $result2 = mysqli_query($con, $query2);
                                            if ($result2->num_rows > 0) {
                                                while($row1 = $result2->fetch_assoc()) {
                                                    $attstatus=$row1[$uid];
                                                }  
                                            } else{echo "No Data Found";}

                                            if ($attstatus==0){
                                                echo "<td style='color:red'>" . "Absent" ."</td>";
                                            }elseif($attstatus==1){
                                                echo "<td style='color:green'>" . "Present" ."</td>";
                                            }
                
							                echo "<td><form action='present.php' method='post'>
                                            <input type='hidden' name='present' value='" . $uid . "'/>
                                            <input type='submit' class='a1-btn a1-green' id='button1' value='Present ' class='btn btn-info'/>
                                            </form></td></tr>";
							    }
							}else{echo "<td>" . "No Member Found ...!"   . "</td>"; }
						?>									
					</tbody>
				</table>


                
<script>
	
	function ConfirmDelete(name){
	
    var r = confirm("Are you sure! You want to Delete this User?");
    if (r == true) {
       return true;
    } else {
        return false;
    }
}

</script>
		
			<?php
            //  include('footer.php'); 
            ?>
    	</div>

    </body>
</html>