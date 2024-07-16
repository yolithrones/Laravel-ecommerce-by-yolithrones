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


        .table_deg{
            border:2px solid white;
            width:100%;
            margin:auto;
            text-align:center;
            
        }

        .th_deg{
            background-color:skyblue;
        }

        #dlv{
            color:#00d25b;
            font-weight:bold;
            font-size:15px;
        }

        .search-form {
        position: relative;
        display: inline-block;
        margin-bottom:30px;
         }

      .search-input {
        padding-right: 30px; /* Adjust the padding to accommodate the search icon */
        width:350px;
        border-radius:5px;
        color:black;
        }

      .search-input::placeholder {
         color: #999999;
        }

      .search-input:focus {
        outline: none;
        
      }

     .search-icon {
      position: absolute;
      top: 50%;
      right: -10px;
      transform: translateY(-50%);
      width: 60px;
      height: 30px;   
      font-size: 20px;
      background-color: transparent;
      border: none;
      cursor: pointer;
      color: black;
      font-weight:bold;
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
            <h1 class="title_sz">Alll Saints Orders</h1>

            <div style="padding-left:400px;">
              <form action="{{url('/search')}}" method="GET" class="search-form">
                @csrf
                 <input type="text" name="query" class="search-input" value="{{ request('query') }}" placeholder="Search...">

                 <button type="submit" class="search-icon">
                 <i class="mdi mdi-magnify"></i>
                </button>

              </form>
            </div>

          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Country</th>
                            <th>Town</th>
                            <th>State</th>
                            <th>PostCode</th>
                            <th>Address</th>
                            <th>Apartment</th>
                            <th>UserId</th>
                            <th>ProductTitle</th>
                            <th>Quantity</th>   
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>ProductId</th>
                            <th>Special Order Note</th>
                            <th>PaymentStatus</th>
                            <th>TrxRef</th>
                            <th>TrxId</th>
                            <th>Delivery Status</th>
                            <th>Image</th>
                            <th>Delivered</th>
                            <th>Print PDF</th>
                            <th>Send Mail</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                        
                            @forelse($order as $orders)
            
                            <td>{{$orders->name}}</td>
                            <td>{{$orders->lastName}}</td>
                            <td>{{$orders->email}}</td>
                            <td>{{$orders->phone}}</td>
                            <td>{{$orders->country}}</td>
                            <td>{{$orders->town}}</td>
                            <td>{{$orders->state}}</td>
                            <td>{{$orders->postCode}}</td>
                            <td>{{$orders->address}}</td>
                            <td>{{$orders->apartment}}</td>
                            <td>{{$orders->userId}}</td>
                            <td>{{$orders->productTitle}}</td>
                            <td>{{$orders->quantity}}</td>
                
                            <td>{{$orders->color}}</td>
                            <td>{{$orders->size}}</td>
                            <td>{{$orders->price}}</td>
                            <td>{{$orders->productId}}</td>
                            <td>{{$orders->order_note}}</td>
                            <td>{{$orders->paymentStatus}}</td>
                            <td>{{$orders->trxRef}}</td>
                            <td>{{$orders->trxId}}</td>
                            <td>{{$orders->deliveryStatus}}</td>
                
                            <td>
                              <img class="img-size" src="/productImage/{{$orders->image}}" alt="">
                            </td>

                          <td>
                          @if($orders->deliveryStatus=='pending...')
                            <a href="{{url('delivered', $orders->id)}}" onclick="return confirm('Do you confirm that this product has been delivered ?')" class="bt btn-primary">Delivered</a>
                          @else
                            <p id="dlv">Delivered ✓</p>
                          @endif
                          </td>

                          <td>
                           <a href="{{url('print_pdf', $orders->id)}}" class="btn btn-secondary">Print Pdf</a>
                          </td>

                           <td>
                            <a href="{{url('customer_mailling', $orders->id)}}" class="btn btn-info">Email</a>
                          </td>
                          </tr>

                          @empty

                          <tr class="title_sz">
                            <td clospan="16">
                            No Data Found

                         </td>
                            
                          </tr>


                        
                        </tbody>
                        @endforelse
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