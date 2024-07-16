<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('saint.css')

    <style>

        .center{
          margin:auto;
          width:fit-content;
          border:2px solid white;
          margin-top:40px;
          text-align:center;
        }
        

        tr{
          border-bottom:1px solid white;
          padding-top:5px;
          padding-bottom:5px;
        
        }

        .fnt-sz{
            text-align:center;
            font-size:30px;
            padding-top:20px;
            padding-bottom:20px;
        }

        .img-size{
            width:155px;
            height:115px;
            padding-top:10px;
            padding-bottom:10px;
        }

       

      

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('saint.sidebar')
      <!-- partial -->
     @include('saint.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          @if(session()->has('message'))
             <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                {{session()->get('message')}}
           
             </div>

          @endif

          <h2 class="fnt-sz">All Product & Merchandise</h2>


          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
            
                    <th>Product Title</th>
                    <th>Product Description</th>
                    <th>Product Quantity</th>
                    <th>Product Category</th>
                    <th>Product Size</th>
                    <th>Product Color</th>
                    <th>Product Price</th>
                    <th>Discount Price</th>
                    <th>Product Image Front</th>
                    <th>Product Image Back</th>
                    <th>Model with Product Image I</th>
                    <th>Model with Product Image II</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($displayProduct as $product)

                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->size}}</td>
                    <td>{{$product->color}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discountPrice}}</td>
                    <td>
                        <img class="img-size" src="/productImage/{{$product->image}}" alt="">
                    </td>

                    <td>
                        <img class="img-size" src="/productImage/{{$product->imageII}}" alt="">
                    </td>

                    <td>
                        <img class="img-size" src="/productImage/{{$product->imageIII}}" alt="">
                    </td>

                    <td>
                        <img class="img-size" src="/productImage/{{$product->imageIV}}" alt="">
                    </td>

                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product ')" href="{{url('/deleteProduct', $product->id )}}">Delete</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('/editProduct', $product->id )}}">Edit</a>
                    </td>
      
                </tr>

                @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

          <div> 
            <table class="center">
                
               
            </table>

      </div>


          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('saint.script')
    <!-- End custom js for this page -->
  </body>
</html>