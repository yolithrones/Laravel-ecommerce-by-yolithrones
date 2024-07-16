

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                @if (Route::has('login'))

                @auth
                @if (Auth::check())
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endif
                    <a href="#">FAQs</a>
                @else  

                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}" >Sign in</a>
                                
                @endauth
                @endif 
                <a style="margin-left:-15px; margin-bottom:-6px;  ">
                
                    <div id="currency-select">
                        <select onchange="changeCurrency(this.value)" style="background-color:black" >
                            <option value="" selected>NGN</option>
                            @foreach($currency as $currencies)

                            <option value="{{$currencies->currency_code}}">{{$currencies->currency_code}}</option>

                            @endforeach
                       
                        </select>
                    </div>
                </a>
            </div>
            
        </div>
        <div class="offcanvas__nav__option" style="padding-bottom:25px; margin-top:-15px;">
            <a href="#" class="search-switch"><img src="/img/icon/search.png" alt=""></a>
            <a href="#"><img src="/img/icon/bell.png" width="19.3px" alt=""> <span class="icon-button_badge" id="show_notif" style="color:white; 
            font-size: 10px;"></span></a>
            <a href="{{url('/displayCart')}}"><img src="/img/icon/cart.png" alt="">
                @if (Route::has('login'))
                 @auth
                 @if ($cartCount > 0)
                 <span id="cartCount">{{ $cartCount }}</span></a>
                        
                 @else
                 <span id="cartCount"></span></a>
                 @endif 
            
                 @else  
                 <span id="cartCount_min"></span>
                 

                 @endauth
                 @endif 
               </a>
               <a href="#"></a>
               <a href="#"></a>
               <a href="#"></a>
                <div class="log" style="width:0%; margin-left:100px; margin-top:-45px;">
                 @if (Route::has('login'))
                 @auth
                 <x-app-layout >
                 </x-app-layout>
   
                 @else  

                 @endauth
                 @endif 
             </div>

        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                            @if (Route::has('login'))

                            @auth
                            @if (Auth::check())
                              <a href="{{ route('logout') }}"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                               </form>
                            @else
                              <a href="{{ route('login') }}">Login</a>
                            @endif
                               <a href="#">FAQs</a>
                            @else  

                                <a href="{{ route('login') }}">Login</a>
                                <a href="{{ route('register') }}" >Sign in</a>
                                
                            @endauth
                            @endif 

                            <a style="width:0%; margin-top:15px;">
                             <div id="currency-select" >
                             <select  onchange="changeCurrency(this.value)" style="background-color:black">
                                <option value="" selected>NGN</option>
                                @foreach($currency as $currencies)

                                <option value="{{$currencies->currency_code}}">{{$currencies->currency_code}}</option>

                               @endforeach
                       
                            </select>
                             </div>
                            </a>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="{{url('/shopsaints')}}"><img src="/img/sttlogo1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu" style="padding-top:75px;">
                        <ul>
                            <li class="active"><a href="{{url('/shopsaints')}}">Home</a></li>
                            <li><a href="{{url('/shop')}}">Shop</a></li>
                            <li><a href="{{url('/order')}}">Order</a> </li>
                            <li><a href="{{url('/contact_us')}}">Contacts</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option" style="padding-top:75px;">
                        <a class="search-switch"><img src="/img/icon/search.png" alt=""></a>

      
                       <a href="javascript:void(0);" class="dropbtn"><img src="/img/icon/bell.png" width="19.3px" alt=""> <span class="icon-button_badge" id="show_notif" style="color:white; 
                        	font-size: 10px;"></span>
                        </a>


                
                        <a href="{{url('/displayCart')}}"><img src="/img/icon/cart.png" alt="">  
                        @if (Route::has('login'))
                        @auth
                        @if ($cartCount > 0)
                        <span id="cartCount">{{ $cartCount }}</span></a>
                        
                        @else
                        <span id="cartCount"></span></a>
                        @endif 
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>

                        @else  
                        <span id="cartCount"></span></a>

                        @endauth
                        @endif 
                       
                        <div class="log" style="width:0%; margin-left:130px; margin-top:-45px;">
                        @if (Route::has('login'))
                        @auth
                        <x-app-layout >
                        </x-app-layout>
   
                        @else  

                        @endauth
                        @endif 
                        </div>
                            
                    </div>
                </div>
            <div class="canvas__open" style="margin-top:48px;"><i class="fa fa-bars"></i></div>


        </div>
    </header>

  



    

