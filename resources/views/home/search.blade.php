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
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Search</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/shopsaints')}}">Home</a>
                            <span> <a href="{{url('/shop')}}">Shop</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->



    <!-- Shop Section Begin -->
    <section class="product spad"  >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <form action="{{url('/search')}}" class="search-page-form" method="GET">
                     @csrf
                        <input type="text" name="search" id="search-input" value="{{$searchMerch}}" placeholder="Search here.....">

                        <button type="submit" class="search-icon" style="background-color:white;">
                        <img src="img/icon/search.png" alt="">
                       </button>
                    </form>
                </div>
            </div>

          

            @if($searchMerch)
            <div class="shop__product__option__left">
                <p id="rff">Showing all result for {{$searchMerch}}</p>                  
                    
            </div>

            <div class="row product__filter">
            @forelse($item as $items)

            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">

                <form action="{{url('addCart', $items->id)}}" method="POST" >
                @csrf
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="productImage/{{$items->image}}">
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="{{url('itemDetails', $items->id)}}"><img src="img/icon/compare.png" alt=""> <span>Details</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$items->title}}</h6>


                              <a>
                               
                                <input type="submit" id="ppp"  class="add-to-cart-button" value="+ Add To Cart">
                                <span><input type="number" id="ooo" min="1" value="1" name="qty"></span>
                                
                              </a>  
                            
                
                               
                                <h5>${{$items->price}}</h5>
 
                                @if($items->discountPrice!=null)

                                <h5><del>${{$items->discountPrice}}</del></h5>

                                @endif


                                <div class="product__color__select">
                      
                                 @foreach (explode(',', $items->color) as $color)
                                    <button type="button" name="color" class="color-option" style="background-color: {{ trim($color) }};" onclick="selectColor('{{ $color }}')" ></button>
                                      <!-- Hidden input field to store the selected color -->
                                    <input type="hidden" id="selectedColor" name="color" value="">
                                @endforeach
                                </div>                                  

                            </div>

                        </div>
                  
                    </form>        
                 </div>

                 @empty
            </div>

          
                <h5 id="empty">Search Not Found</h5>
     

            @endforelse
            {!!$item->withQueryString()->links('pagination::bootstrap-5')!!}
        </div>


        @else
           
            <section class="nothing" style="height:250px;">

            </section>
    

         @endif
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