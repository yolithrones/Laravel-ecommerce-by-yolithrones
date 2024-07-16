<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('saint.css')

    <style>
       .title_sz{
            text-align:center;
            font-size:25px;
            font-weight:bold;
            padding-bottom:40px;
        }

        #add-currency{
            margin-left:480px;
        
        }

        @media (max-width: 768px) {
	        #add-currency {
                margin-left:230px;
	       }    
        }


        .dropdown .dropdown-menu .dropdown-item:hover {
         font-size: 1rem;
         padding: 0.25rem 1.5rem;
         color:white;
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
            <h1 class="title_sz">All Saints Selling Currencies</h1>

            @if(session()->has('message'))
             <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>

                {{session()->get('message')}}
           
             </div>

          @endif

            <div class="col-lg-8 grid-margin stretch-card">
                
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Currency Table</h4>  
        
                    <a href="{{url('/new_currency')}}" id="add-currency" class="btn btn-primary">Add Currency</a>
                    <p class="card-description"> View currency <code>.table</code> 
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Currency Code</th>
                            <th>Currency Icon</th>
                            <th>Exchange Rate</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($currencies as $currency)
                          <tr>
                            <td>{{$currency->id}}</td>
                            <td>{{$currency->currency_code}}</td>
                            <td>{{$currency->currency_icon}}</td>
                            <td>{{$currency->exchange_rate}}</td>
                            <td>{{$currency->status}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions </button>
                                    <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                       <a class="dropdown-item"href="{{url('/edit_currency', $currency->id )}}">Edit </a>
                                       @if($currency->status == 1)
                                       <a class="dropdown-item" href="{{url('/status', $currency->id )}}">Deactivate</a>
                                       @else
                                       <a class="dropdown-item" href="{{url('/status', $currency->id )}}">Activate</a>
                                       @endif
                                       <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this currency ')" href="{{url('/delete_currency', $currency->id )}}">Delete</a>
                                     
                                    </div>
                                </div>
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
    <div>        
     
    <!-- plugins:js -->
    @include('saint.script')
    <!-- End custom js for this page -->
    
  </body>
</html>