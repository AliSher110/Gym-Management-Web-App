<?php
require '../../include/db_conn.php';
page_protect();
?>


<?php
$uid;
$uname="";
$ucont="";




?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Gym | Fees</title>
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

		<h3>Fees</h3>

		<hr />

        <form action="feesuser.php" method="post">

            <div class="input-group mb-3 w-75 px-3 ">
            <input type="text" class="form-control " name="f_id" placeholder="User Id"  aria-describedby="button-addon2">
            <div class="input-group-append mr-3">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
            </div>


            <input type="text" class="form-control" name="f_name" placeholder="Name"  aria-describedby="button-addon2">
            <div class="input-group-append mr-3">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
            </div>


            <input type="text" class="form-control" name="f_contact" placeholder="Contact" aria-label="Contact" aria-describedby="button-addon2">
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


				$query ;
				if($uid !="" && $uname=="" && $ucont==""){$query  = "select * from users WHERE (userid='$uid') ";}
				elseif($uid =="" && $uname!="" && $ucont==""){$query  = "select * from users WHERE (username='$uname') ";}
				elseif($uid =="" && $uname=="" && $ucont!=""){$query  = "select * from users WHERE (mobile='$ucont') ";}
				

            }else{
				$query  = "select * from users ORDER BY joining_date";
				
            }
			// echo $query;
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
					<th>Dues</th>
					<th>Fees Status</th>
					<th>Action</th></h2>
				</tr>
			</thead>
				<tbody>

					<?php
                   $curmon = date("F-y");
				   $feesstatus;
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
							                echo "<td>" . $row['dues'] . "</td>";
							                

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
											// echo "<td>" . $row['feesStatus'] ."</td>";

                                            
                                            
                
							                echo "<td><form action='submit_fees.php' method='post'>
                                            <input type='hidden' name='pay' value='" . $uid . "'/>
                                            <input type='submit' class='a1-btn a1-green' id='button1' value='Pay Fees ' class='btn btn-info'/>
                                            </form></td></tr>";
							    }
							}
                        
						?>									
					</tbody>
				</table>


                

		
			<?php
            //  include('footer.php'); 
            ?>
    	</div>

    </body>
</html>