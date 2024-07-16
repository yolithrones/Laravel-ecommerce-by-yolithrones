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
            <h1 class="title_sz">All Saints Subcribers</h1>

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Subscriber Table</h4>
                    <p class="card-description"> View subscriber <code>.table</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Subscriber Email</th>
                            <th>Subscriber ID</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribers as $subscriber)
                          <tr>
                            <td>{{$subscriber->id}}</td>
                            <td>{{$subscriber->subscriber_email}}</td>
                            <td>{{$subscriber->subscriber_id}}</td>
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