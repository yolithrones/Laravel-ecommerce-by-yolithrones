<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">

    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saintthethird</title>
    <link rel = "icon" id="header-logo" href = "saint/assets/images/sword.png" type = "image/x-icon" sizes="40x40">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}" type="text/css">

</head>

<body>
  @include('sweetalert::alert')
    <!-- Page Preloder -->
    @include('home.header')
    <!-- Header Section End -->

    
    @if(session()->has('message'))
             <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                {{session()->get('message')}}
           
             </div>

          @endif


           <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="breadcrumb__text">
                        <h4>Order </h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Order History</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container" id="contain" >
        <main>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Items</th>
                    <th>Quantities</th>
                    <th>Total Amount</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Estimated Delivery Date</th>
             
                </tr>
            </thead>
            <tbody>
                @foreach($order as $orders)
                <tr>
                    <td>{{$orders->id}}</td>
                    <td>{{$orders->created_at->format('Y-m-d')}}</td>
                    <td>{{$orders->productTitle}}</td>
                    <td>{{$orders->quantity}}</td>
                    <td>{{$orders->price}}</td>
                    <td>{{$orders->paymentStatus}}</td>
                    <td>{{$orders->deliveryStatus}}</td>
                    <td>{{ $orders->created_at->copy()->addWeek()->format('Y-m-d') }}</td>

                </tr>

                @endforeach
                

                
                <!-- End of example data -->
            </tbody>
        </table>
    </main>
        </div>
    </section>
    <!-- Shop Section End -->

   

    <!-- Footer Section Begin -->
    @include('home.footer')
    <!-- Footer Section End -->

    
    <!-- Js Plugins -->
    @include('home.script')
    <!-- Js Plugins End-->

</body>

</html>