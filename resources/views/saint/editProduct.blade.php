<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('saint.css')

    <style>
        .div_ctr{
            padding top: 30px;
        }

        .tlt_font{
            font-size:35px;
            padding-bottom:30px;
            padding-left:60px;
            
        }

        .txt_color{
          color:black;
          padding-bottom:15x;
          margin-bottom:10px;        }

        label{
          display: inline-block;
          width:210px;
         
        }

        .container{
          width:100%;
        
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


          <div class="div_ctr">
            <h1 class="tlt_font">Edit & Update Product</h1>

           <div class="container" >

           

           <form action="{{url('/confirmEdit', $editProduct->id)}}" method="POST" enctype="multipart/form-data" >

           @csrf
           
            <div> 

            <label for="">Product Title :</label>
            <input class="txt_color" type="text" name="title" placeholder="Add product title" required="" value="{{$editProduct->title}}">

            </div>

            <div>

            <label for="">Product Description :</label>
            <input class="txt_color" type="text" name="description" placeholder="Add product description"required="" value="{{$editProduct->description}}">

            </div>

            <div>

            <label for="">Product Size :</label>
            <input class="txt_color" type="text" name="size" placeholder="Add available sizes"required="" value="{{$editProduct->size}}">

            </div>
            <div>

            <label for="">Product Color  :</label>
            <input class="txt_color" type="text" id="myInput" onblur="appendComma()" name="color" placeholder="Add available colors"required="" value="{{$editProduct->color}}">

            </div>

            <div>

            <label for="">Product Price :</label>
            <input class="txt_color" type="number" name="price" placeholder="Add product price"required="" value="{{$editProduct->price}}">

            </div>

            

            <div>

            <label for="">Discount Price :</label>
            <input class="txt_color" type="number" name="discountPrice" placeholder="What discount apply" value="{{$editProduct->discountPrice}}">
             
            </div>            

            <div>

            <label for="">Product Quantity :</label>
            <input class="txt_color" type="number" name="quantity" min="0" placeholder="Add product quantity"required="" value="{{$editProduct->quantity}}">

            </div>

            <div>

            <label for="">Product Category :</label>
            <select name="category" id="" class="txt_color" required="" >
               <option value="{{$editProduct->category}}" selected>{{$editProduct->category}}</option>

               
               @foreach($category as $category)
                
              <option value="{{$category->categoryName}}">{{$category->categoryName}}</option>

              @endforeach



            </select>

            </div>

            <div> 
              
              <label for="">Current Product Image Front :</label>
              <img height="100" width="100" class="img-size" src="/productImage/{{$editProduct->image}}" alt="">
            </div>

            <div> 

            <div> 
              
              <label for="">Current Product Image Back :</label>
              <img height="100" width="100" class="img-size" src="/productImage/{{$editProduct->imageII}}" alt="">
            </div>

            <div> 
            <div> 
              
              <label for="">Current Product Image with Model I :</label>
              <img height="100" width="100" class="img-size" src="/productImage/{{$editProduct->imageIII}}" alt="">
            </div>

            <div> 
            <div> 
              
              <label for="">Current Product Image with Model II :</label>
              <img height="100" width="100" class="img-size" src="/productImage/{{$editProduct->imageIV}}" alt="">
            </div>

            <div> 
              
              <label for="">Edit Product Image Front :</label>
              <input  type="file" name="image"  placeholder="Add product image"  value="{{$editProduct->image}}">
  
            </div>

            <div> 
              
              <label for="">Edit Product Image Back :</label>
              <input  type="file" name="imageII"  placeholder="Add product image"  value="{{$editProduct->imageII}}">
  
            </div>

            <div> 
              
              <label for="">Edit Product Image with Model I :</label>
              <input  type="file" name="imageIII"  placeholder="Add product image"  value="{{$editProduct->imageIII}}">
  
            </div>

            <div> 
              
              <label for="">Edit Product Image with Model II :</label>
              <input  type="file" name="imageIV"  placeholder="Add product image"  value="{{$editProduct->imageIV}}">
  
            </div>


            <div>
              <input type="submit" value="Edit Product" class="btn btn-primary">
            </div>

          </form>
          </div>


           </div>
            
          </div>


          </div>
        </div>  

      
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('saint.script')
    <!-- End custom js for this page -->
    <script>
    function appendComma() {
    var input = document.getElementById("myInput");
    var value = input.value.trim();

    if (value !== "" && !value.endsWith(",")) {
      input.value = value + ",";
    }
  }
</script>
  </body>
</html>