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

    <style>
       
    </style>
</head>

<body>

    <!-- Page Preloder -->
    @include('home.header')
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/shopsaints')}}">Home</a>
                            <a href="{{url('/shop')}}">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    @if(session()->has('message'))
             <div class="alert alert-success" style="background-color:black; color:white;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color:white;">x</button>

                {{session()->get('message')}}
           
             </div>

          @endif
          


    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form  action="{{ url('/confirmBilling', $editAddress->id ) }}" method="POST" id="billingForm">
                 @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> <a></a> </h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="name" value="{{ $editAddress->name}}" readonly>
                                        <input type="hidden" name="userId" value="{{ $latestOrder->userId ?? '' }}">

                                    </div>

                                   
                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="lastName" value="{{ $editAddress->lastName}}" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" id="in3" name="country" value="{{ $editAddress->country}}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street/house address" class="checkout__input__add" name="address"   value="{{ $editAddress->address}}" required>
                                <input type="text" placeholder="Apartment, suite, unite ect (optional)" name="apartment" value="{{ $editAddress->apartment}}">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town" id="in6" value="{{ $editAddress->town}}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="state" id="in7" value="{{ $editAddress->state }}" required>
                            </div>
                     
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postCode" id="in8" value="{{ $editAddress->postCode }}" required>
                            </div>
                          
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Second Phone<span>*</span></p>
                                        <input type="text" name="phone"   value="{{ $editAddress->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="{{ $editAddress->email }}" readonly>
                                    </div>

                                </div>
                            </div> 


                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <textarea type="text" name="note" placeholder="Notes about your order, e.g. special notes for delivery." style="width:100%;"></textarea>
                            </div>
                          


                            <div class="checkout__input" id="size">
                                <input type="submit" >
                            </div>
                        </div>
                </form>
                      
                         <div class="col-lg-4 col-md-6">           
                            <div class="checkout__order"> 
                              <h4 class="order__title">Your order</h4>
                              <div class="checkout__order__products">Product <span>Total</span></div>
         
                            <?php $subtotalprice=0; ?>    
                            <?php $totalprice=0; ?>       
                            @foreach($cart as $itemOrdered)
                              
                                <ul class="checkout__total__products">
                                    <li id="ok">{{$itemOrdered->productTitle}}<span> ${{$itemOrdered->price}}</span></li> 
                                    
                                    <p id="fck">

                                    Qty                 <span id="op">{{$itemOrdered->quantity}}</span><br>
                                    Color               <span id="oq"></span>{{$itemOrdered->color}}<br>  
                                    Size                <span id="or">{{$itemOrdered->size}}</span> 

                                    </p>
                                </ul>

                                <?php $subtotalprice = $subtotalprice + $itemOrdered->price ?>
                                <?php $totalprice = $subtotalprice + 1 ?> 
                            @endforeach 

                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>${{$subtotalprice}}</span></li>
                                    <li>Fee <span id="yy">+$1</span></li>
                                    <li>Total <span>${{$totalprice}}</span></li>
                                </ul>
                                <form action=" {{url('/payment')}}" method="POST" >
                                @csrf
                                    <input type="hidden" name="phone" value="{{ $editAddress->phone }}" />
                                    <input type="hidden" name="email" value="{{ $editAddress->email }}" />
                                    <input type="hidden" name="name" value="{{ $editAddress->name }}" />
                                    <input type="hidden" name="lastName" value="{{ $editAddress->lastName }}" />
                                    <input type="hidden" name="amount" value="{{$totalprice}}" />
                                    <input type="hidden" name="redirect_url"  value="route('primeroute')">
                                    <input type="hidden" name="paymentStatus" value="{{ $latestOrder->paymentStatus ?? '' }}">
                                     
                                    <button type="submit" id="paymentButton" name="pay">Checkout</button><br>

                                
                                </form>
                                
                            </div>
                    
                    </div>

            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    @include('home.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

     <!-- Js Plugins -->
     @include('home.script')
    <!-- Js Plugins End-->




    

</body>

</html>