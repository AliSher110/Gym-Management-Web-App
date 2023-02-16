<?php
require '../../include/db_conn.php';
page_protect();

$uid=0;
$uname=0;
$ucont=0;
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Gym | View Members</title>
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
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
				<div style="display:flex; align-items: center; justify-content: center;" class="col-md-10">
					<img src="..\..\images\logo.png" alt="">
					</div>
					
					<!-- Raw Links -->
					<div class="col-md-2 col-sm-4 clearfix hidden-xs">
						
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
				
			<br>
		<h3>Member Detail</h3>

		<hr />

		<form action="getmem.php" method="post">

<div class="input-group mb-3 w-100 px-3 ">
<input type="text" class="form-control " name="mem_id" placeholder="User Id"  aria-describedby="button-addon2">
<div class="input-group-append mr-3">
	<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
</div>


<input type="text" class="form-control" name="mem_name" placeholder="Name"  aria-describedby="button-addon2">
<div class="input-group-append mr-3">
	<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
</div>


<input type="text" class="form-control" name="mem_contact" placeholder="Contact" aria-label="Contact" aria-describedby="button-addon2">
<div class="input-group-append mr-3">
	<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
</div>
<input type="hidden" class="form-control" name="all_mem" placeholder="" value="" aria-label="all" aria-describedby="button-addon2">
<div class="input-group-append mr-3">
	<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Show All</button>
</div>
</div>
</form>


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

<hr />
		
		<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr><h2>
					<th>Sl.No</th>
					<th>Member ID</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Gender</th>
					<th>DOB</th>
					<th>Address</th>
					<th>Joining Date</th>
					<th>Joining weight</th>
					<th>Plan</th>
					<th>Dues</th>
					<th>Fees Status</th>
					<th>Action</th></h2>
				</tr>
			</thead>
				<tbody>

						<?php
						 $curmon = date("F-y");
						 $feesstatus;
							$query ;
						    if($uid !="" && $uname=="" && $ucont==""){$query  = "select * from users WHERE (userid='$uid') ";}
							elseif($uid =="" && $uname!="" && $ucont==""){$query  = "select * from users WHERE (username='$uname') ";}
							elseif($uid =="" && $uname=="" && $ucont!=""){$query  = "select * from users WHERE (mobile='$ucont') ";}
							else{
								$query  = "select * from users ORDER BY joining_date";
							}
							$result = mysqli_query($con, $query);
							$sno    = 1;
							

							if ($result->num_rows > 0) {
							// if (mysqli_affected_rows($con) != 0) {
							    // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
								while($row = $result->fetch_assoc()) {

							                echo "<tr><td>".$sno."</td>";
							                echo "<td>" . $row['userid'] . "</td>";
											$uid=$row['userid'];
							                echo "<td>" . $row['username'] . "</td>";
							                echo "<td>" . $row['mobile'] . "</td>";
							                // echo "<td>" . $row['email'] . "</td>";
							                echo "<td>" . $row['gender'] . "</td>";
							                echo "<td>" . $row['dob'] . "</td>";
							                echo "<td>" . $row['area'] . " " . $row['city'] . "</td>";
							                echo "<td>" . $row['joining_date'] . "</td>";
							                echo "<td>" . $row['weight'] . "</td>";
							                echo "<td>" . $row['plan'] . "</td>";
											$dues = $row['dues'];
											if($dues == "0"){echo "<td style='color:green'>" . $dues . "</td>";}
											else{echo "<td style='color:red'>" . $dues . "</td>";}

											
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

							                
							                
							                $sno++;
							       
							                echo "<td><form action='fees.php' method='post'><input type='hidden' name='id' value='" . $uid . "'/><input type='submit' class='a1-btn a1-blue' id='button1' value='Pay Fees ' class='btn btn-info btn-sm'/></form></td></tr>";
							                $msgid = 0;
							    }
							}
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
		
			<?php include('footer.php'); ?>
    	</div>

    </body>
</html>


