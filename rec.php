<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/recipt.css">
</head>

<?php
date_default_timezone_set('Asia/Karachi');
?>

<div class="col-md-12">   
      <div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<!-- <div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
						</div>
					</div> -->
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5><img src="images/logo.png" alt="" style = "margin-left: 20px;"></h5>
							<p><i class="fa-brands fa-whatsapp"></i> +92 334 3620757 </p>
							<!-- <p>company@gmail.com <i class="fa fa-envelope-o"></i></p> -->
							<p> <i class="fa-solid fa-location-dot"></i> Opp: Salateen Hotel, Hala Naka, Hyderabad, Sindh </p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5>Ali Sher </h5>
							<p><b>Mobile :</b> +1 12345-4569</p>
							<p><b>Email :</b> alisher@gmail.com</p>
							<p><b>Address :</b> Mubarak Colony, Hyd</p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h3>INVOICE # 102</h3>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9">Addmission fees</td>
                            <td class="col-md-3">1000/-</td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Payment for May 2022</td>
                            <td class="col-md-3"> 1500/-</td>
                        </tr>

                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong> 2500/-</strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> <?php echo date('d-m-y h:i:s') ?></p>
							<h5 style="color: rgb(140, 140, 140);">Thanks For Becoming a Part Of <br> SMARTLIFE GYM</h5>
						</div>
					</div>
					<!-- <div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Stamp</h1>
						</div>
					</div> -->
				</div>
            </div>
			
        </div>    
	</div>
</div>