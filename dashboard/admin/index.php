<?php
require '../../include/db_conn.php';
page_protect();
?>
<!DOCTYPE html>
<html lang="en">
<head> 

    
    <title> SMARTLIFE GYM | Dashboard </title>

    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
     <style>
    	.page-container .sidebar-menu #main-menu li#dash > a {
    	background-color: #2b303a;
    	color: #ffffff;
		}

		body{
			
			background-image: url("../../images/bg5.jpg");
			height:auto;
			width:auto;
		}


    </style>

</head>
    <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
		
			<header class="logo-env">
			
	
			<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content ">
		
				<div class="row">

				<div style="display:flex; align-items: center; justify-content: center;" class="col-lg-12">
					<img src="..\..\images\logo.png" alt="">
					</div>
					
					<!-- Raw Links -->
					<!-- <div class="col-md-2 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li>Welcome <?php echo $_SESSION['full_name']; ?> 
							</li>								
						
							<li>
								<a href="logout.php">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div> -->
					
				</div>

			<!-- <h2>Gym Dashboard</h2> -->

			<hr>
		
			<div class="col-sm-3"><a href="attendence.php">			
				<div class="tile-stats tile-red">
					
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
						<h2>Attendence </h2>
						
						</div>
				</div></a>
			</div>
			

			<div class="col-sm-3"><a href="table_view.php">			
				<div class="tile-stats tile-green">
					
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
						<h2>Member View</h2>	
							
						</div>
				</div></a>
			</div>	
				
			<div class="col-sm-3"><a href="new_entry.php">			
				<div class="tile-stats tile-aqua">
					
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
						<h2>Register New</h2>
							
						</div>
				</div></a>			
			</div>

			<div class="col-sm-3"><a href="fees.php">			
				<div class="tile-stats tile-blue">
					
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
						<h2>Fees Pay</h2>		
						
							
						</div>
				</div></a>
			</div>
			

			
   
    	
</div>

  
    </body>
</html>


<?php
$lastdate;
$curdt = date("Y-m-d");

$sql = "SELECT dates FROM dates ORDER BY id DESC LIMIT 1;";
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


<?php 
$users = array();
$i=0;
$sql2 = "SELECT * FROM users ORDER BY userid";
$result = mysqli_query($con,$sql2);
while($row = $result->fetch_assoc()){
$users[$i] = $row['userid'];
$i++;
}
// print_r($users);
?>


<?php
$sql3 = "SELECT months FROM monthlyRecord ORDER BY id DESC LIMIT 1;";

$latestmon;
$curmon = date("F-y");
// echo $curmon;

$result3 = mysqli_query($con,$sql3);
while($row = mysqli_fetch_array($result3)){
    // echo $row['months'];
    $latestmon = $row['months'];
    // echo $latestmon . "<br>";
    // echo $curmon;

    if($curmon != $latestmon){

        echo "Helloo";
        $sql = "INSERT INTO monthlyRecord (months)
         VALUES ('$curmon')";

        if ($con->query($sql) === TRUE) {
        // echo "month Updated";
		$sql5="UPDATE `users` SET `feesStatus` = 'Paid' ";
        $result5=mysqli_query($con,$sql5);
		
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
		


    }

}

?>
