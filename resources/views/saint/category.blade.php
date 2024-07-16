<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        .cntr{
        text-align: center;
        padding-top: 30px;
        }

        .tlt_font{
            font-size:35px;
            padding-bottom:30px;
        }

        .input_color{
            color:black;
        }

        .center{
          margin:auto;
          width:50%;
          text-align:center;
          margin-top:30px;
          border:3px solid #0090e7;
        }
        tr{
          border-bottom:1px solid #0090e7;
          padding-top:5px;
          padding-bottom:5px;
        
        }

        td{
          padding-top:5px;
          padding-bottom:5px;
        }

        #bd{
          font-weight:bold;
        }
 
    </style>
    <!-- Required meta tags -->
    @include('saint.css')
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

            <div class="cntr" >
                <h2 class="tlt_font">Add Category</h2>

                <form action="{{url('/addCategory')}}" method="POST" >

                   @csrf

                    
                   <input class="input_color" type="text" name="category" placeholder="Type category name" >

                   <input type="submit" class="btn btn-primary" name="submit" value="Add Category">

                </form>


            </div>

            <table class="center">

              <tr>
                <td id="bd">ID</td>
                <td id="bd">CATEGORY NAME</td>
                <td id="bd">ACTION</td>
              </tr>

              
            @foreach($categoryData as $categoryData)

              <tr>
                <td>{{$categoryData->id}}</td>

                <td>{{$categoryData->categoryName}}</td>

                <td>
                  <a onclick="return confirm('Are You Certain To Delete This Category')" class="btn btn-danger" href="{{url('deleteCategory', $categoryData->id)}}">Delete</a>
                </td>
              </tr>

              @endforeach

         

            </table>

          </div>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('saint.script')
    <!-- End custom js for this page -->
  </body>
</html>