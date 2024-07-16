<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="/public">

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

  
</head>

<body>
    @include('sweetalert::alert')
    <!-- Page Preloder -->
    @include('home.header')
    <!-- Header Section End -->

     <!-- Shop Details Section Begin -->
     <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="/productImage/{{$item->image}}">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="/productImage/{{$item->imageII}}">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="/productImage/{{$item->imageIII}}">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="/productImage/{{$item->imageIV}}">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="/productImage/{{$item->image}}" width="320px" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="/productImage/{{$item->imageII}}" width="320px" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="/productImage/{{$item->imageIII}}" width="320px" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="/productImage/{{$item->imageIV}}" width="320px" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
            <form action="{{url('addCart', $item->id)}}" method="POST" >
            @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$item->title}}</h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - {{$commentCount}} Reviews</span>
                            </div>
                            
                            <h3>${{$item->price}}
                                              @if ($item->discountPrice)   
                                             <span>
                                                 ${{$item->discountPrice}}
                                            </span>
                                            @endif
                            </h3>
                            <p>{{$item->description}}</p>
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    
                                    @foreach ($sizes as $size)
                                    <label for="{{ $size }}"  onclick="selectSize('{{ $size }}')">{{ $size }}
                                        <input type="radio"  id="{{ $size }}">
                                    </label>

                        
                                   @endforeach
                                         <!-- Hidden input field to store the selected color -->
                                     <input type="hidden" id="selectedSize" name="size"value="" >

                                  </div>

                                  

                                <div class="product__details__option__color">
                                <div class="product__details__option__color">
                                       <span >Color:<br><input type="text" id="colorInput" style="width: 27px; height: 7px; border: none; border-radius: 4px; margin-bottom:-25px; " readonly></span>
                                   </div>
                                    @foreach ($colors as $color)
                                
                                        <label style="background-color: {{ $color }}" onclick="selectColor('{{ $color }}')">
                                            <input type="radio"  >
                                        </label>
                    
                                    @endforeach
                                    
                                   
                
                                    <!-- Hidden input field to store the selected color -->
                                   <input type="hidden" id="selectedColor" name="color" value="">
                               
                                </div>
                            </div>
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="qty" min="1" >
                                    </div>
                                </div>
                                @if ($item->quantity > 0)
                               
                                <a>
                                 <input type="submit" id="ppp"  class="primary-btn" style="background-color:black; color:white;" value="+ Add To Cart">
                                
                               </a>
                               @else
                               <h5 id="sold" style="padding-top:20px;">Sold Out</h5>
                              @endif

                            </div>
                            <div class="product__details__btns__option">
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="" alt="Flutterwave">
                                <ul>
                                    <li><span>SKU:</span> {{$item->quantity}}</li>
                                    <li><span>Categories:</span> {{$item->category}}</li>
                                    <li><span>Tag:</span> Clothes</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
             </div>
            </div>
        </div>        
                
    <div class="row px-xl-5">
       <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" id="hvr" href="#tab-pane-1" style="color:black">Description</a>
                <a class="nav-item nav-link" data-toggle="tab" id="hvr" href="#tab-pane-3" style="color:black">Reviews ({{$commentCount}})</a>
            </div>

            <div class="tab-content">
                 <div class="tab-pane fade show active" id="tab-pane-1">
                     <h4 class="mb-3">Product Description</h4>
                     <p>{{$item->description}}. Category{{$item->category}}.Available number of units left in shop to be sold | {{$item->quantity}}</p>
                </div>

                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                         <div class="col-md-6">
                             <h4 class="mb-4"> {{$commentCount}} review for "{{$item->title}}"</h4>
                              @foreach($comment as $text)      
                            <div class="media mb-4">
                                <div class="media-body">
                                    <h6 id="cmtname">{{$text->name}}<small> - <i>{{ Carbon\Carbon::parse($text->created_at)->diffForHumans() }}</i></small></h6>
                                    <div class="rating">
                                       <span id="ratingValue">
                                       <?php
                                           $rating = $text->startRating;
                                           $emptyStars = 5 - $rating; // Calculate the number of empty stars

                                           // Display filled stars
                                           for ($i = 0; $i < $rating; $i++) {
                                              echo '<i class="fa fa-star" style="color: #f7941d; font-size:20px;"></i>';
                                            }

                                             // Display empty stars
                                            for ($i = 0; $i < $emptyStars; $i++) {
                                              echo '<i class="fa fa-star" style="color: lightgray; font-size:20px;"></i>';
                                            }
                                        ?>
                                    
                                       </span>


                                   
                                   
                                    </div>
                                    
                                    <p id="cmtext">{{$text->comment}}.</p>
                                    <a id="cmtreplybtn" href="javascript:void(0);" onclick="reply(this)" data-commentId="{{$text->id}}" class="reply-btn">Reply</a>

                                    @foreach($reply->take(2) as $replied)
                                        @if($replied->commentId==$text->id)
                                            <div class="reply-section">
                                                <span class="username">{{$replied->name}}</span>
                                                <span class="timestamp"><small><i>{{ Carbon\Carbon::parse($replied->created_at)->diffForHumans() }}</small></i></span>
                                                <p><span id="ply">replied </span> {{ $replied->reply }}!</p>
                                                <a href="javascript:void(0);" class="cmtreplybtn" onclick="reply(this)" data-commentId="{{$text->id}}">Reply</a>
                                            </div>
                                        @endif
                                    @endforeach

                                    @if($reply->where('commentId', $text->id)->count() > 2)
                                        <div class="reply-count" onclick="toggleReplies(this)">
                                            <span class="reply-count-text" style="color:black">{{$reply->where('commentId', $text->id)->count() - 2}} replies</span>
                                        </div>
                                    @endif

                                    <div class="hidden-replies">
                                        @foreach($reply->where('commentId', $text->id)->skip(2) as $replied)
                                            <div class="reply-section">
                                                <span class="username">{{$replied->name}}</span>
                                                <span class="timestamp"><small><i>{{ Carbon\Carbon::parse($replied->created_at)->diffForHumans() }}</small></i></span>
                                                <p><span id="ply">replied</span>{{$replied->reply}}!</p>
                                                <a href="javascript:void(0);" onclick="reply(this)" data-commentId="{{$text->id}}" class="reply-btn">Reply</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-6">
                    <form action="{{url('drop_comment')}}" method="POST">
                    @csrf
                        <h4 class="mb-4">Leave a review</h4>
                        <div class="d-flex my-3">
                            <p class="mb-0 mr-2">Your Rating *</p>

                             <div class="rating">
                                <label>
                                  <input type="radio" name="stars" value="1" />
                                   <span class="icon"><i class="fa fa-star"></i></span>
                                </label>

                                <label>
                                <input type="radio" name="stars" value="2" />
                                   <span class="icon">  <i class="fa fa-star"></i></span>
                                   <span class="icon">  <i class="fa fa-star"></i></span>
                                </label>

                                <label>
                                   <input type="radio" name="stars" value="3" />
                                   <span class="icon"> <i class="fa fa-star"></i></span>
                                   <span class="icon"> <i class="fa fa-star"></i></span>
                                   <span class="icon"> <i class="fa fa-star"></i></span>   
                                </label>

                                <label>
                                    <input type="radio" name="stars" value="4" />
                                    <span class="icon"> <i class="fa fa-star"></i></span>
                                    <span class="icon"> <i class="fa fa-star"></i></span>
                                    <span class="icon"> <i class="fa fa-star"></i></span>
                                    <span class="icon"> <i class="fa fa-star"></i></span>
                               </label>

                               <label>
                                   <input type="radio" name="stars" value="5" />
                                   <span class="icon"> <i class="fa fa-star"></i></span>
                                   <span class="icon"> <i class="fa fa-star"></i></span>
                                   <span class="icon"> <i class="fa fa-star"></i></span>
                                   <span class="icon"> <i class="fa fa-star"></i></span>
                                   <span class="icon"> <i class="fa fa-star"></i></span>
                                </label> 
                            </div>
                        </div>

                     
                            <input type="hidden" name="product_id" value="{{$item->id}}">
                            <div class="form-group">
                                <label for="message">Your Review *</label>
                                <textarea id="message" name="comment" cols="30" rows="5" class="form-control" required></textarea>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" id="form-button">Leave Your Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
       </div>
    </div>
  </div>

    <!-- Shop Detail End -->


    <div class="reply-form" style="display: none;">
      <form action="{{url('reply_users')}}" method="POST">
        @csrf
           <input type="text" id="commentId" name="commentId" hidden="">
           <input type="text" name="product_id" value="{{$item->id}}" hidden="">
           <textarea id="rf" name="reply" placeholder="reply to.." required></textarea>

           <div class="input-group">
               <button type="submit" class="button-up">Reply</button>
               <button type="submit" onclick="reply_close(this)" class="button-up">X</button>
            </div>
      </form>
    </div>



   

    <!-- Footer Section Begin -->
    @include('home.footer')
    <!-- Footer Section End -->

    
    <!-- Js Plugins -->
    <script src="{{asset('home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('home/js/mixitup.min.js')}}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('home/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script>
    document.getElementById('logout-btn').addEventListener('click', function() {
        var form = document.createElement('form');
        form.action = "{{ route('logout') }}";
        form.method = 'POST';
        form.style.display = 'none';
        var csrfToken = document.createElement('input');
        csrfToken.setAttribute('name', '_token');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        form.appendChild(csrfToken);
        document.body.appendChild(form);
        form.submit();
    });

    

    function selectColor(color) {
        // Set the value of the hidden input field to the selected color
        document.getElementById('selectedColor').value = color;

        // Apply visual feedback to the selected color button
        var colorButtons = null;
        var colorButtons = document.getElementsByClassName('details');
        for (var i = 0; i < colorButtons.length; i++) {
            colorButtons[i].classList.remove('active');
        }
        event.target.classList.add('active');

        // Set the background color of the input field
        var inputField = document.getElementById('colorInput');
        inputField.style.backgroundColor = color;
    }


    function selectSize(size) {
        // Set the value of the hidden input field to the selected color
        document.getElementById('selectedSize').value = size;

        // Apply visual feedback to the selected color button
        var colorButtons = document.getElementsByClassName('size-option');
        for (var i = 0; i < colorButtons.length; i++) {
            colorButtons[i].classList.remove('selected');
        }
        event.target.classList.add('selected');
    }


</script>

<script type="text/javascript">
  function reply(caller) {
    document.getElementById('commentId').value=$(caller).attr('data-commentId');
    $('.reply-form').insertAfter($(caller));
    $(".reply-form").show();
  }

  function reply_close(caller) {
    $('.reply-form').hide();
    $('.reply-form').hide();
  
  }

  function toggleReplies(element) {
  var hiddenReplies = element.nextElementSibling;
  hiddenReplies.style.display = hiddenReplies.style.display === "none" ? "block" : "none";
}

$(':radio').change(function() {
  console.log('New star rating: ' + this.value);
});



    document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
 
</script>






</body>

</html>