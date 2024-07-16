<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('saint.css')

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}" type="text/css">

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
 

            <div class="switch-form">
                <form action="{{ url('closed') }}" method="POST" id="toggleForm">
                 @csrf
                   <button type="submit" class="btn btn-primary">
                     @if ($switch && $switch->is_under_construction)
                      Remove Web's <br>  Under Construction
                     @else
                      Set Web's <br>  Under Construction
                     @endif
                   </button>
                </form> 
            </div>


            @if ($switch && $switch->is_under_construction)
        <div class="container-scroller">
       <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-info">
          <div class="row flex-grow">

            <div class="col-lg-7 mx-auto text-white">
              <div class="row align-items-center d-flex flex-row">
                <div class="col-lg-6 text-lg-right pr-lg-4">
                  <h1 class="display-1 mb-0">500</h1>
                </div>
                <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                  <h2>SORRY!</h2>
                  <h3 class="font-weight-light">Page is under construction</h3>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 text-center mt-xl-2">
                  <a class="text-white font-weight-medium" href="../../index.html"></a>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 mt-xl-2">
                  <p class="text-white font-weight-medium text-center">Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | saintthethird.com</p>
                </div>
              </div>
            </div>
          </div>
          @else

          <div class="container">
               @include('home.header')
  
               @include('home.slider')

                @include('home.footer')


    
                   <!-- Js Plugins -->
                <script src="home/js/jquery-3.3.1.min.js"></script>
                <script src="home/js/bootstrap.min.js"></script>
                <script src="home/js/jquery.nice-select.min.js"></script>
                <script src="home/js/jquery.nicescroll.min.js"></script>
                <script src="home/js/jquery.magnific-popup.min.js"></script>
                <script src="home/js/jquery.countdown.min.js"></script>
                <script src="home/js/jquery.slicknav.js"></script>
                <script src="home/js/mixitup.min.js"></script>
                <script src="home/js/owl.carousel.min.js"></script>
                <script src="home/js/main.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    
            </div>

           @endif
            
        <div>
    <div>        
     
    <!-- plugins:js -->
    @include('saint.script')
    <!-- End custom js for this page -->
    
  </body>

  <script>
    document.getElementById('toggleForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent form submission

        if (confirm('Are you sure you want to toggle the Under Construction mode?')) {
            this.submit(); // Proceed with form submission
        } else {
            // Handle cancellation
        }
    });
</script>
</html>