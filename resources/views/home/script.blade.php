    <script src="{{asset('home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('home/js/mixitup.min.js')}}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('home/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script type="text/javascript">

    document.getElementById('logout-btn').addEventListener('click', function() {
        var form = document.createElement('form');
        form.action = "{{ route('logout') }}";
        form.method = 'POST';
        form.style.display = 'none';
        var csrfToken = document.createElement('input');
        csrfToken.setAttribute('name', '_token');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        form.appendChild(csrfToken);
        document.body.appendChild(form);
        form.submit();
    });

      function selectColor(color) {
        // Set the value of the hidden input field to the selected color
        document.getElementById('selectedColor').value = color;

        // Apply visual feedback to the selected color button
        var colorButtons = document.getElementsByClassName('color-option');
        for (var i = 0; i < colorButtons.length; i++) {
            colorButtons[i].classList.remove('selected');
        }
        event.target.classList.add('selected');

    
       //
    }

    function selectClr(element) {
         element.classList.add('selected');
        }




    // Get the second form's submit button
    var paymentSubmitButton = document.getElementById('paymentButton');

    // Add a click event listener to the second form's submit button
    paymentSubmitButton.addEventListener('click', function(event) {
        // Get the input fields of the first form
        var countryInput = document.getElementById('in3');
        var townInput = document.getElementById('in6');
        var stateInput = document.getElementById('in7');
        var postCodeInput = document.getElementById('in8');

        // Check if the input fields are empty
        if (countryInput.value.trim() === '' || townInput.value.trim() === '' || stateInput.value.trim() === '' || postCodeInput.value.trim() === '') {
            // Prevent the form submission
            event.preventDefault();

            // Display an error message or perform any other desired action
            alert('Please fill in all the required fields for your Billing Address.');
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
    // Get the input field
    var addressInput = document.querySelector('input[name="address"]');

    // Store the initial value
    var initialValue = addressInput.value;

    // Add an event listener for input changes
    addressInput.addEventListener('input', function(event) {
        var currentValue = event.target.value;
        
        // Update the value if it has changed
        if (currentValue !== initialValue) {
            initialValue = currentValue;
        }
    });
});


const dismissAll = document.getElementById('dismiss-all');
const dismissBtns = Array.from(document.querySelectorAll('.dismiss-notification'));

const notificationCards = document.querySelectorAll('.notification-card');

dismissBtns.forEach(btn => {
  btn.addEventListener('click', function(e){
    e.preventDefault;
    var parent = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
    parent.classList.add('display-none');
  })
});

dismissAll.addEventListener('click', function(e){
  e.preventDefault;
  notificationCards.forEach(card => {
    card.classList.add('display-none');
  });
  const row = document.querySelector('.notification-container');
  const message = document.createElement('h4');
  message.classList.add('text-center');
  message.innerHTML = 'All caught up!';
  row.appendChild(message);
})

document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
   



  </script>