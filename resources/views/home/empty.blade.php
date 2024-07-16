<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saintthethird</title>
    <link rel = "icon" id="header-logo" href = "saint/assets/images/sword.png" type = "image/x-icon" sizes="40x40">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="">

    <style>
       @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

body {
    background-color: #eee;
    font-family: 'Calibri', sans-serif !important;
}

.mt-100{
   margin-top:100px;

}


.card {
    margin-bottom: 30px;
    border: 0;
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    letter-spacing: .5px;
    border-radius: 8px;
    -webkit-box-shadow: 1px 5px 24px 0 rgba(68,102,242,.05);
    box-shadow: 1px 5px 24px 0 rgba(68,102,242,.05);
}

.card .card-header {
    background-color: #fff;
    border-bottom: none;
    padding: 24px;
    border-bottom: 1px solid #f6f7fb;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
}



.card .card-body {
    padding: 30px;
    background-color: transparent;
}

.btn-primary, .btn-primary.disabled, .btn-primary:disabled {
    background-color: black!important;
    border-color: black!important;
    padding:6px 30px;
}
    </style>
</head>
<body>
    
    <div class="container-fluid  mt-100">
		<div class="row">
				 
			<div class="col-md-12">
					
				<div class="card">
					<div class="card-body cart">
						<div class="col-sm-12 empty-cart-cls text-center">
							<img src="/img/empty-cart.png" width="130" height="130" class="img-fluid mb-4 mr-3">
							 <h3><strong>Your Cart is Empty</strong></h3>
							 <h4>Dear comrade kindly go back to our >></h4>
							 <a href="{{url('/shop')}}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">shop</a>
									
						</div>

					</div>
				</div>
						
					
			</div>
				 
		</div>
				
	</div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>