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
          <h3>&nbsp; <b>Ali Aashir</b> </h3>
      </div>

      <br>

      <div class="row">
          <h4>&nbsp; <b>Mobile : </b> 03322667938</h4>
      </div>

      

      <div class="row">
          <h4>&nbsp; <b>Email : </b>khowaja@gmail.com</h4>
      </div>

   

      <div class="row">
          <h4>&nbsp; <b>Address : </b>Mubarak colony, Hyderabad</h4>
      </div>

      <br>
      <br>
   

      <div class="row">
          <h2 class="ml-5" > <b>INVOICE # 102</b></h2>
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
                <td>Payment : </td>
                <td>1000/-</td>
            </tr>
            <tr>
                <td><b>Total : </b></td>
                <td><b>1000/</b></td>
            </tr>

        </tbody>    
        </table>
      </div>
      <div class="row ">
                <br>
                <h3 class="thanks ml-5 pl-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>THANKS</b> </h3>
                <h5 class="thanks ml-5 pl-5"><b>For Being Part of SmartLife Gym</b> </h5>
            
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
                  <li class="list-group-item"><b>Avoid the chitchat</b></li>
                  <li class="list-group-item"><b>Don't use cell phone during workout</b></li>
                  <li class="list-group-item"><b>Bring a towel. Use it</b></li>
                  <li class="list-group-item"><b>No one allowed without shoes</b></li>
                  <li class="list-group-item"><b>Be focused on your workout</b></li>
                <li class="list-group-item"><b>Respact your srounding & don't use abusive language</b></li>
                  <li class="list-group-item"><b> Keep the equipment where it belongs</b></li>
                  <li class="list-group-item"><b>Put your weights back</b></li>
                </ul>
            </div>

            <br>
            

            <!-- <div class="row ">
                <br>
                <h3 class="thanks ml-5 pl-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>THANKS</b> </h3>
                <h5 class="thanks ml-5 pl-5"><b>For Being Part of SmartLife Gym</b> </h5>
            
            </div> -->

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