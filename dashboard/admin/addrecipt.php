<?php
require '../../include/db_conn.php';
page_protect();
?>

<?php
if($_GET){
    $uid= $_GET['id'];
}else{
echo "No User Selected";
}


$query  = "select * from users where userid='$uid'";
$query2  = "select * from invoice order by inv_id desc limit 1";

$result = mysqli_query($con, $query);
$result2 = mysqli_query($con, $query2);

while($row = $result->fetch_assoc()) {
    $name = $row['username'];
    $phone = $row['mobile'];
    $email = $row['email'];
    $addr = $row['area']." ".$row['city'];
}
while($row = $result2->fetch_assoc()) {
    $invid = $row['inv_id'];
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Recipt</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<style>
    .waterMark{

        

        background-image: url("opacity logo.png");
        background-repeat: no-repeat;
        background-size: 40%;
        background-position: center;
        background-attachment: fixed;        

    }

    .list-group-item{
        opacity: 0.7;
        font-weight: bold;
        
    }

    .print{
        margin-left: 80%;
    }



</style>


<body class="waterMark">

    
     


<div class="container">
    
  <div class="row">
      
    <div class="col-md">
      
      <div class = "d-md-flex"> 
          <img src="logo1.png" alt="">
      </div>

      <br>

      <div class="row">
          <h3>&nbsp; <b><?php echo strtoupper($name) ?></b> </h3>
      </div>

      <br>

      <div class="row">
          <h4>&nbsp; <b>Mobile : </b> <?php echo $phone ?></h4>
      </div>

      

      <div class="row">
          <h4>&nbsp; <b>Email : </b><?php echo $email ?></h4>
      </div>

   

      <div class="row">
          <h4>&nbsp; <b>Address : </b><?php echo $addr ?></h4>
      </div>

      <br>
      <br>
   

      <div class="row">
          <h2 class="ml-5" > <b><?php echo $invid ?></b></h2>
      </div>

      <br>

      <div class="row w-70">
      <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col"><b>Decription</b></th>
              <th scope="col"><b>Amount</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Addmission Fees : </td>
                <td>3000/-</td>
            </tr>
            <tr>
                <td><b>Total : </b></td>
                <td><b>3000/</b></td>
            </tr>

        </tbody>    
        </table>
      </div>
      <div class="row ">
                <br>
                <h3 class="thanks ml-5 pl-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THANKS </h3>
                <h5 class="thanks ml-5 pl-5"><b>For Being Part of SmartLife</b> </h5>
            
            </div>  
</div>


    <div class="col-md">
      
      <br>
      <div class = "d-sm">
          <br>

          <div class="row">
              <i class="fa-solid fa-location-dot fa-2x"></i>
              <h5> &nbsp;  Opp: Salateen Hotel, Hala Naka, Hyderabad, Sindh</h5>
          </div>

          <br>

          <div class="row">
              <i class="fa-brands fa-whatsapp fa-2x"></i>
          <h5> &nbsp;  +92 334 3620757</h5></div>

          <br> <br>
          <h1 class="rules ml-5 pl-5"> &nbsp;&nbsp;&nbsp;&nbsp;<b> RULES</b></h1>
          <br>
          <div class="row ml-4 pl-3">
              <ul class="list-group">
                  <li class="list-group-item"><b>Avoid Talking Midset</b></li>
                  <li class="list-group-item"><b>Don't use cell phone during workout</b></li>
                  <li class="list-group-item"><b>Bring a towel. Use it</b></li>
                  <li class="list-group-item"><b>Wear Proper Footwear</b></li>
                  <li class="list-group-item"><b>Be focused with your workout</b></li>
                <li class="list-group-item"><b>Don't Sing Out Loud</b></li>
                  <li class="list-group-item"><b> Don't drop your weights</b></li>
                  <li class="list-group-item"><b> Put Weights Back, Where They Belong</b></li>
                  <li class="list-group-item"><b>Be careful with your personal items</b></li>
                </ul>
            </div>

            <br>
            

            <div class="print" >
            <button  type="button" id="hideOnClick" class="btn btn-primary btn-lg" onclick="printInvoice()">Print</button>
            </div>

      
      </div>

      
    
  </div>
</div>


<script>
    function printInvoice() {
        document.getElementById('hideOnClick').style.visibility = 'hidden'
        window.print();

    }
</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>