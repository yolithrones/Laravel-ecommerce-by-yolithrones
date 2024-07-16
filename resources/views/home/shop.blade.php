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
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{url('/search')}}" method="GET">
                             @csrf
                                <input type="text" name="search"  placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                            
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach ($categories as $category)
                                                    <li><a href="{{ route('shop', ['category' => $category->categoryName]) }}">{{ $category->categoryName }}</a></li>
                                                    @endforeach
    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                <li><a href="{{ route('shop', ['price_range' => '0-50']) }}">$0.00 - $50.00</a></li>
                                                <li><a href="{{ route('shop', ['price_range' => '50-100']) }}">$50.00 - $100.00</a></li>
                                                <li><a href="{{ route('shop', ['price_range' => '100-150']) }}">$100.00 - $150.00</a></li>
                                                <li><a href="{{ route('shop', ['price_range' => '150-200']) }}">$150.00 - $200.00</a></li>
                                                <li><a href="{{ route('shop', ['price_range' => '200-250']) }}">$200.00 - $250.00</a></li>
                                                <li><a href="{{ route('shop', ['price_range' => '250+']) }}">250.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">

                                            <form action="{{ route('shop') }}" method="GET">
                                                @csrf
                                                @foreach ($sizes as $size)
                                                   <label class="{{ $size }}" for="sp-{{ $size }}" >{{ $size }}
                                                    <input type="radio" name="size" id="sp-{{ $size }}" value="{{ $size }}" 
                                                    {{ $selectedSize == $size ? 'checked' : '' }}>
                                                </label>
                                                @endforeach
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-heading">
                                       <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                    </div>
                                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                       <div class="card-body">
                                           <div class="shop__sidebar__color">
                                              <form action="{{ route('shop') }}" method="GET">
                                               @csrf
                                                @foreach ($colors as $color)
                                                   <label class="{{ $color }}" for="sp-{{ $color }}" style="background-color:{{ $color }};" onclick="selectClr(this)" >
                                                   <input type="radio" id="sp-{{ $color }}"  name="color" value="{{ $color }}"
                                                   {{ $selectedColor == $color ? 'checked' : '' }}>
                                                   </label>
                                                @endforeach
                                                </form>
                                            </div>
                                        </div>   
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__tags">
                                                <a href="#">Product</a>
                                                <a href="#">Bags</a>
                                                <a href="#">Shoes</a>
                                                <a href="#">Fashio</a>
                                                <a href="#">Clothing</a>
                                                <a href="#">Hats</a>
                                                <a href="#">Accessories</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <?php 
                                       $from = 1; 
                                       $to = 12; 
                                       $output = "Showing " . $from . "–" . $to . " of " . $totalResults . " results";  
                                    ?>

                                <p><?php echo $output; ?></p>

                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            <form action="{{ route('shop') }}" method="GET">
                                @csrf
                                <div class="shop__product__option__right">
                                <p>Sort by</p>
                                   <select name="sort_by" onchange="this.form.submit()">
                                      <option value="">Default</option>
                                      <option value="price_low_high" {{ $selectedSortBy === 'price_low_high' ? 'selected' : '' }}>By price: Low To High</option>
                                      <option value="price_high_low" {{ $selectedSortBy === 'price_high_low' ? 'selected' : '' }}>By price: High To Low</option>
                                      <option value="popularity" {{ $selectedSortBy === 'popularity' ? 'selected' : '' }}>Popularity</option>
                                      <option value="average" {{ $selectedSortBy === 'average' ? 'selected' : '' }}>Average</option>
                                      <option value="latest" {{ $selectedSortBy === 'latest' ? 'selected' : '' }}>Latest</option>
                                   </select>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

                   <div class="row">
                     @foreach($filteredProducts as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <form action="{{url('addCart', $product->id)}}" method="POST" >
                        @csrf
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="productImage/{{$product->image}}">
                                    <ul class="product__hover">
                                        <li><a href="{{url('/search')}}"><img src="img/icon/search.png" alt=""></a></li>
                                        <li><a href="{{url('itemDetails', $product->id)}}"><img src="img/icon/view.png" width="40px" alt=""> <span>Details</span></a></li>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{$product->title}}</h6>
                                    @if ($product->quantity > 0)
                                    <a>
                               
                                     <input type="submit" id="ppp"  class="add-to-cart-button" value="+ Add To Cart">
                                     <span><input type="number" id="ooo" min="1" value="1" name="qty" hidden></span>
                           
                                   
                                    </a>

                                     <h5 class="product-price" data-price="{{$product->price}}">${{$product->price}}</h5>
             
                    

                                      @if ($product->discountPrice)
                                      <h5><del class="product-price" data-price="{{$product->discountPrice}}">${{$product->discountPrice}}</del></h5>
                                      @endif

                                    @else
                                    <h5 id="sold">Sold Out</h5>
                                    <a>
                               
                                    <input type="submit" id="ppp"  class="add-to-cart-button" value="+ Add To Cart" hidden>
                                    <span><input type="number" id="ooo" min="1" value="1" name="qty" hidden></span>
                     
                             
                                  </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </form>    
                        @endforeach
                        
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                            {!!$filteredProducts->withQueryString()->links('pagination::bootstrap-5')!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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