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

    <!-- Hero Section Begin -->
    @include('home.slider')
    <!-- Hero Section End -->


    <!-- Banner Section Begin -->
    @include('home.banner')
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    @include('home.product')
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    @include('home.category')
    <!-- Categories Section End -->
   
    
    

    <!-- Footer Section Begin -->
    @include('home.footer')
    <!-- Footer Section End -->

    
    <!-- Js Plugins -->
    @include('home.script')
    <!-- Js Plugins End-->
   

</body>

</html>