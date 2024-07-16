<section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                        <li data-filter=".new-arrivals">New Arrivals</li>
                        <li data-filter=".hot-sales">Hot Sales</li>
                    </ul>
                </div>
            </div>

            <div class="row product__filter">
            @foreach($item as $items)

            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">

                <form action="{{url('addCart', $items->id)}}" method="POST" >
                @csrf
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="productImage/{{$items->image}}">
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                <li><a href="{{url('itemDetails', $items->id)}}"><img src="img/icon/view.png" width="40px" alt=""> <span>Details</span></a></li>
                                
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$items->title}}</h6>


                              <a>
                               
                                <input type="submit" id="ppp"  class="add-to-cart-button" value="+ Add To Cart">
                                <span><input type="number" id="ooo" min="1" value="1" name="qty"></span>
                                
                              </a>  
                            
                
                               
                                <h5 class="product-price" data-price="{{$items->price}}">${{$items->price}}</h5>
 
                                @if($items->discountPrice!=null)

                                <h5><del class="product-price" data-price="{{$items->discountPrice}}">${{$items->discountPrice}}</del></h5>

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
            @endforeach
        </div>
    </section>




   
 

    