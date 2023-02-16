<?php
require '../../include/db_conn.php';
page_protect();

?>

<?php
$sql  = "select distinct inv_date from invoice ORDER BY inv_date";
$res = mysqli_query($con, $sql);

?>












<!DOCTYPE html>
<html lang="en">
<head>

    <title>Gym | Income</title>
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
		<h3>Income Details</h3>

		<!-- <hr /> -->
<!-- 
		<form action="" method="post">

<div class="input-group mb-3 w-100 px-3 ">
<input type="hidden" class="form-control " name="daily" placeholder="User Id"  aria-describedby="button-addon2">
<div class="input-group-append mr-3">
	<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Daily</button>
</div>


<input type="hidden" class="form-control" name="monthly" placeholder="Name"  aria-describedby="button-addon2">
<div class="input-group-append mr-3">
	<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Monthly</button>
</div>


<input type="hidden" class="form-control" name="yearly" placeholder="Contact" aria-label="Contact" aria-describedby="button-addon2">
<div class="input-group-append mr-3">
	<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Yearly</button>
</div>

</div>
</form> -->


<hr />
		
		<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr><h2>
					<th>Sl.No</th>
					<th>Date</th>
					<th>Income</th>
				
				</tr>
			</thead>
				<tbody>
                <!-- SELECT
    distinct(color, fruit), sum(rating)
FROM
    medleys -->
						<?php
								$query  = "select  inv_date, sum(amount) as amount from invoice group by inv_date";
							$result = mysqli_query($con, $query);
							$sno    = 1;
							$total=0;

							if ($result->num_rows > 0) {

								while($row = $result->fetch_assoc()) {

							                echo "<tr><td>".$sno."</td>";
							                echo "<td>" . $row['inv_date'] . "</td>";
							                echo "<td>" . $row['amount'] . "</td>";
											

								

							                
							                $total+=$row['amount'];
							                $sno++;
							       
							    }
							}
                            echo "<tr><td>" . "</td>";
                            echo "<td><b>TOTAL</b></td>";
                            echo "<td>" .$total. "</td>";

						?>									
					</tbody>
				</table>

		
			<?php include('footer.php'); ?>
    	</div>

    </body>
</html>


