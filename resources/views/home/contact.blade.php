<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saintthethird</title>
    <link rel = "icon" id="header-logo" href = "saint/assets/images/sword.png" type = "image/x-icon" sizes="40x40">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

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
    @include('sweetalert::alert')
    <!-- Page Preloder -->
    @include('home.header')
    <!-- Header Section End -->

    
    @if(session()->has('message'))
             <div class="alert alert-success" style="background-color:black; color:white;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color:white;">x</button>

                {{session()->get('message')}}
           
             </div>

          @endif

       <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111551.9926412813!2d-90.27317134641879!3d38.606612219170856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Contact Us</h2>
                            <p>As you might expect of a company that began as a high-end concept of idealogy , we pay
                                strict attention.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Abuja Nigeria</h4>
                                <p>Saintthethird at your door step<br />+234 818 744 7727</p>
                            </li>
                            <li>
                                <h4>Lagos Nigeria</h4>
                                <p>Saintthethird at your door step <br />+234 703 298 2237</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="{{url('messagesaintthethird')}}" method="POST">
                         @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" name="name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" placeholder="Email" name="email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message" name="message"></textarea>
                                    <div class="continue__btn update__btn">
                                        <input type="submit" value="Send Message" style="background-color:black;"> 
                                    </div>
                                </div>

                                 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    @include('home.footer')
    <!-- Footer Section End -->

    
     <!-- Js Plugins -->
     @include('home.script')
    <!-- Js Plugins End-->
   



</body>

</html>