<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('saint.css')

    <style>
    .tlt_font{
      font-size:30px;
      padding-bottom:30px;
      text-align:center;
            
    }
        

    .form-control:focus{
      color:black;
      background-color:white;
    }

    [type=file] {
    background: unset;
    border-color: inherit;
    border-width: 0;
    border-radius: 0;
    margin-left: 50px;

    font-size: unset;
    line-height: inherit;
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
            <h1 class="tlt_font">Add New Product Merch</h1>

           <div class="container" >

           <div class="col-10 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{url('/addProduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label>Product Titile</label>
                        <input type="text" class="form-control"  type="text" name="title" placeholder="Add product title" required="">
                      </div>

                      <div class="form-group">
                        <label for="">Product Description</label>
                        <input class="form-control" type="text" name="description" placeholder="Add product description"required="">

                      </div>
                    

                      <div class="form-group">
                        <label for="">Product Price</label>
                        <input class="form-control" type="number" name="price" placeholder="Add product price"required="">

                      </div>

                      <div class="form-group">
                        <label for="">Discount Price</label>
                        <input class="form-control" type="number" name="discountPrice" placeholder="What discount apply">

                      </div>

                      <div class="form-group">
                        <label for="">Available Colors</label>
                        <input class="form-control"  type="text" name="color" placeholder="Add available colors seperated with a comma [ , ] sign "required="">

                      </div>

                      <div class="form-group">
                        <label for="">Available Sizes</label>
                        <input class="form-control"  type="text" name="size" placeholder="Add available colors seperated with a comma [ , ] sign "required="">

                      </div>

                      <div class="form-group">
                        <label for="">Available Sales Quaintity</label>
                        <input class="form-control" type="number" name="quantity" min="0" placeholder="Add product quantity"required="">

                      </div>

                      <div class="form-group">
                        <label>Product Category</label>
                        <select class="js-example-basic-single"  name="category" required="" style="width:100%">
                        <option value="null" selected>Add Category below</option>
                        @foreach($category as $category)
                 
                        <option value="{{$category->categoryName}}">{{$category->categoryName}}</option>

                        @endforeach
                       
                        </select>
      
                      </div>



                      <div class="form-group">
                        <label>Product Image Front</label>
                        <input type="file" name="image"  placeholder="Add product image" required="" >

                      </div>

                      <div class="form-group">
                        <label>Product Image Back </label>
                        <input type="file" name="imageII"  placeholder="Add product image" required="" >

                      </div>

                      <div class="form-group">
                        <label>Model with Product Image I</label>
                        <input type="file" name="imageIII"  placeholder="Add product image" required="" >

                      </div>

                      <div class="form-group">
                        <label>Model with Product Image II</label>
                        <input type="file" name="imageIV"  placeholder="Add product image" required="" >

                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Post Product</button>
                    </form>
                  </div>
                </div>
              </div>
           

          

            
          

  
   




      
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('saint.script')
    <!-- End custom js for this page -->

    
  </body>
</html>