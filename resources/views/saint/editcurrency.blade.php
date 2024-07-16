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
            <h1 class="tlt_font">Edit & Update Currencyt</h1>

           <div class="container" >

           

           <form action="{{url('/confirmEdit_currency', $editCurrency->id)}}" method="POST" >

           @csrf
           
            <div> 

            <label for="">Currency Code :</label>
            <input class="txt_color" type="text" name="currencyCode" placeholder="Edit currency code" required="" value="{{$editCurrency->currency_code}}">

            </div> 
            
            <div> 

            <label for="">Currency Code :</label>
            <input class="txt_color" type="text" name="currencyIcon" placeholder="Edit currency icon" required="" value="{{$editCurrency->currency_icon}}">

            </div> 

            <div>

            <label for="">Exhange Rate  :</label>
            <input class="txt_color" type="number" name="exchageRate" placeholder="Edit exchange rate" required="" value="{{$editCurrency->exchange_rate}}">
             
            </div>            

            <div>


            <div>
              <input type="submit" value="Edit Currency" class="btn btn-primary">
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
  

  </body>
</html>