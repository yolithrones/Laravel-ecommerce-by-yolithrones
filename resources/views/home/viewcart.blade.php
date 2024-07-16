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
    <!-- Page Preloder -->
    @include('home.header')
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/shopsaints')}}">Home</a>
                            <a href="{{url('/shop')}}">Shop</a>
                            <span>Shopping Cart</span>
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

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
               
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $totalprice=0; ?>
                               
                                
                                @foreach($cart as $carts)
                               <form action="{{url('/updateCart', $carts->id)}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                      
                              
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                        <img width="150px"  src="/productImage/{{$carts->image}}" alt="">
                                        </div><br>
                                        <div class="product__cart__item__text">
                                        <h6 style="font-size:18px; font-weight:bold;">{{$carts->productTitle}}</h6>
                                            <h5></h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">

                                            <div class="pro-qty-2">
                                            <input type="text" name="qty[{{ $carts->id }}]" value="{{ $carts->quantity }}" onblur="if(this.value < 1) this.value = 1;">
                                            </div>

                                        </div>
                                    </td>
                                    <td class="cart__price">${{$carts->price}}</td>
                                    <input type="number" name="price" value="{{$carts->price}}" hidden>
                                    <td class="cart__close"><a href="{{url('removeCart', $carts->id )}}" onclick="return confirm('Are you sure to remove this item from cart ?')"><i class="fa fa-close"></i></a></td> 
                                </tr>
                                <tr>

                                
                                <?php $totalprice = $totalprice + $carts->price ?>
                    
                            </tbody>
                            @endforeach 
                        </table>
                      </div>
                   
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                 <a href="{{ route('shop') }}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a>
                                    <i class="fa fa-spinner">
                                    <input type="submit" value="UPDATE CART"></i> 
                                </a>
                            </div>
                        </div>
                      
                      </form>
                    </div>
           
                </div>

                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>${{$totalprice}} </span></li>
                            <li>Total <span>${{$totalprice}} </span></li>
                        </ul>
                        
                        <a href="{{url('saintCheckout')}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

 
   
    <!-- Footer Section Begin -->
    @include('home.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('home.script')
    <!-- Js Plugins End-->
</body>

</html>