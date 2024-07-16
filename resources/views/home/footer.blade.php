<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/sttlogo2.png" width="200px" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a ><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="{{url('/shop')}}">Clothing Store</a></li>
                            <li><a href="{{url('/shop')}}">Accessories</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Inquiry</h6>
                        <ul>
                            <li><a href="{{url('/contact_us')}}">Contact Us</a></li>
                            <li><a href="{{url('/about_us')}}">About Us</a></li>
                            <li><a href="https://flutterwave.com/ng/payment-protection-promise">Payment Method</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="{{url('/subscribed')}}" method="POST" id="subscribeForm">
                                @csrf
                                @if($isSubscribed)
                                <input type="email" name="email" value="SUBSCRIBED" style="color:white; font-weight:bold;" readonly>
                          
                               @else
                               <input type="email" name="email" placeholder="Your email" style="color:white;">
                               @endif
                                
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | saintthethird.com 
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form action="{{url('/search')}}" class="search-model-form" method="GET">
                @csrf
                <input type="text" name="search" id="search-input" placeholder="Search here.....">

                <button type="submit" class="search-icon" style="background-color:white;">
                <img src="img/icon/search.png" alt="">
                </button>
            </form>
        </div>
    </div>
    <!-- Search End -->
<script type="text/javascript">
    
    function setCookie(name, value, days) {
      var expires = "";
      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }
  
    function getCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
      }
      return null;
    }
  
    function changeCurrency(selectedCurrency) {
      if (selectedCurrency === "NGN") {
        document.cookie = "selectedCurrency=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    
      }
  
      const url = `/api/exchange-rate/${selectedCurrency}`;
      fetch(url)
        .then(response => response.json())
        .then(data => {
          const exchangeRate = data.exchange_rate;
          const priceElements = document.querySelectorAll('.product-price');
          priceElements.forEach(element => {
              
            const originalPrice = parseFloat(element.dataset.price);
            if (!isNaN(originalPrice)) {
              const convertedPrice = Math.round(originalPrice / exchangeRate);
              element.textContent = convertedPrice.toFixed(0);
            }
          });
          const currencyCodeElement = document.querySelector('#currency-code');
          currencyCodeElement.textContent = selectedCurrency;
          setCookie("selectedCurrency", selectedCurrency, 365);
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  
    function applySelectedCurrency() {
    var selectedCurrency = getCookie("selectedCurrency");
    if (selectedCurrency) {
      var selectElement = document.querySelector('#currency-select select');
      selectElement.value = selectedCurrency;
      changeCurrency(selectedCurrency);
    } else {
      // Default selection if the cookie is not set
      var defaultOption = document.querySelector('#currency-select select option[selected]');
      defaultOption.selected = true;
    }
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    applySelectedCurrency();
  });
  
  
  
  





    

</script>
     <!-- Js Plugins -->
     @include('home.script')
    <!-- Js Plugins End-->

    

