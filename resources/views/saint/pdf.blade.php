<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      width: 80%;
      margin: 0 auto;
      padding: 20px;
      background-color: #f5f5f5;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    .row {
      margin-bottom: 10px;
    }

    .label {
      font-weight: bold;
      width: 150px;
      display: inline-block;
      color: #555;
    }

    .value {
      display: inline-block;
      color: #333;
    }

    img {
      max-width: 250px;
      max-height: 200px;
      margin-top: 5px;
    }
  </style>

</head>
<body>
   
  <div class="container">
    <h1>Order Details</h1>
    
    <div class="row">
      <span class="label">First Name:</span>
      <span class="value">{{$orders->name}}</span>
    </div>
    <div class="row">
      <span class="label">Last Name:</span>
      <span class="value">{{$orders->lastName}}</span>
    </div>
    <div class="row">
      <span class="label">Email:</span>
      <span class="value">{{$orders->email}}</span>
    </div>
    <div class="row">
      <span class="label">Phone Number:</span>
      <span class="value">{{$orders->phone}}</span>
    </div>
    <div class="row">
      <span class="label">Country:</span>
      <span class="value">{{$orders->country}}</span>
    </div>
    <div class="row">
      <span class="label">Town:</span>
      <span class="value">{{$orders->town}}</span>
    </div>
    <div class="row">
      <span class="label">State:</span>
      <span class="value">{{$orders->state}}</span>
    </div>
    <div class="row">
      <span class="label">Post Code:</span>
      <span class="value">{{$orders->postCode}}</span>
    </div>
    <div class="row">
      <span class="label">Address:</span>
      <span class="value">{{$orders->address}}</span>
    </div>
    <div class="row">
      <span class="label">Apartment:</span>
      <span class="value">{{$orders->apartment}}</span>
    </div>

    <div class="row">
      <span class="label">User ID:</span>
      <span class="value">{{$orders->userId}}</span>
    </div>

    <div class="row">
      <span class="label">Product Title:</span>
      <span class="value">{{$orders->productTitle}}</span>
    </div>

    <div class="row">
      <span class="label">Quantity:</span>
      <span class="value">{{$orders->quantity}}</span>
    </div>

    <div class="row">
      <span class="label">Color:</span>
      <span class="value">{{$orders->color}}</span>
    </div>
    <div class="row">
      <span class="label">Size:</span>
      <span class="value">{{$orders->size}}</span>
    </div>
    <div class="row">
      <span class="label">Price:</span>
      <span class="value">{{$orders->price}}</span>
    </div>
    <div class="row">
      <span class="label">Product ID:</span>
      <span class="value">{{$orders->productId}}</span>
    </div>
    <div class="row">
      <span class="label">Payment Status:</span>
      <span class="value">{{$orders->paymentStatus}}</span>
    </div>
    <div class="row">
      <span class="label">Transaction Reference:</span>
      <span class="value">{{$orders->trxRef}}</span>
    </div>
    <div class="row">
      <span class="label">Transaction ID:</span>
      <span class="value">{{$orders->trxId}}</span>
    </div>

    <div class="row">
      <span class="label">Image</span>
      <br>
      <img src="productImage/{{$orders->image}}" alt="Product Image">
    </div>
    
    <div class="row">
      <span class="label">Delivery Status:</span>
      <span class="value">{{$orders->deliveryStatus}}</span>
    </div>
  </div>

</body>
</html>