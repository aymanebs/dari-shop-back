<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/register-style.css') }}">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
  <div id="loading-overlay" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-60" style="display: none">
    
    <svg class="animate-spin h-8 w-8 text-white mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
        </path>
    </svg>

    <span class="text-white text-3xl font-bold">Loading...</span>

</div>

    <h1 class="text-lg font-bold text-gray-700 leading-tight text-center mt-12 mb-5">Form Wizard - Multi Step Form</h1>
    <form action="{{ route('register') }}" method="post" id="signUpForm"
        class="p-12 shadow-md rounded-2xl bg-white mx-auto border-solid border-2 border-gray-100 mb-8"
        enctype="multipart/form-data">
        @csrf
        <!-- start step indicators -->
        <div class="form-header flex gap-3 mb-4 text-xs text-center">
            <span class="stepIndicator flex-1 pb-8 relative">Account Setup</span>
            <span class="stepIndicator flex-1 pb-8 relative">Social Profiles</span>
            <span class="stepIndicator flex-1 pb-8 relative">Personal Details</span>
        </div>
        <!-- end step indicators -->

        <!-- step one -->
        <div class="step">
            <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Create your account</p>


            <div class="mb-6">
                <input type="email" placeholder="Email Address" name="email" id="email"
                    class=" w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                    oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'"
                    value="{{ old('email') }}" />
                    @error('email')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
            </div>


            <div class="mb-6">
                <input  type="password" placeholder="Password" name="password" id="password"
                    class=" w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                    oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'"
                    value="{{ old('password') }}" />
                    @error('password')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
            </div>
            <div class="mb-6">
                <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation"
                    class=" w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                    oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                    @error('password_confirmation')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
            </div>

        </div>

        <!-- step two -->
        <div class="step">
            <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Your presence on the social network</p>
            <ul class="grid w-full gap-6 md:grid-cols-2 mt-8 mb-5">
                <li>
                    <input type="radio" id="buyer-radio" name="role" value="1" class="hidden peer"
                        required="">
                    <label for="buyer-radio"
                        class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-2 text-green-400 w-9  h-9"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                            </svg>
                            <div class="w-full text-lg font-semibold">S'inscrire comme un acheteur</div>
                            <div class="w-full text-sm"></div>
                        </div>
                    </label>
                </li>
                <li>
                    <input type="radio" id="seller-radio" name="role" onchange="toggleSellerFields()"
                        value="2" class="  hidden peer">
                    <label for="seller-radio"
                        class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <svg class="mb-2 w-9 h-9 text-sky-500  " xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-building-store">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21l18 0" />
                                <path
                                    d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                <path d="M5 21l0 -10.15" />
                                <path d="M19 21l0 -10.15" />
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                            </svg>
                            <div class="w-full text-lg font-semibold">S'inscrire comme un vendeur</div>
                            <div class="w-full text-sm"></div>
                        </div>
                    </label>
                    @error('role')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
                </li>

            </ul>





        </div>

        <!-- step three -->
        <div class="step">
            <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">We will never sell it</p>


            <div class="mb-6" id="sellerFields" style="display: none">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload
                    file</label>
                <input type="file" name="justify" id="justify"
                    class="w-full  rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                    oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF, SVG, PNG, JPG or
                    GIF (MAX. 800x400px).</p>
                    @error('justify')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
            </div>

            <div class="mb-6">
                <input type="text" placeholder="Full name" name="name"
                    class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                    oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'"
                    value="{{ old('name') }}" />
                    @error('name')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
            </div>
            <div class="mb-6">
                <input type="text" placeholder="Mobile" name="phone"
                    class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                    oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                    @error('phone')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
            </div>
            <div class="mb-8">
                <input type="text" placeholder="Address" name="adress"
                    class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                    oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                    @error('adress')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
                 
            </div>
        </div>

        <!-- start previous / next buttons -->
        <div class="form-footer flex gap-3 ">
            <button type="button" id="prevBtn"
                class="flex-1 focus:outline-none border border-gray-300 py-2 px-5 rounded-lg shadow-sm text-center text-gray-700 bg-white hover:bg-gray-100 text-lg"
                onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn"
                class="flex-1 border border-transparent focus:outline-none p-3 rounded-md text-center text-white bg-indigo-600 hover:bg-indigo-700 text-lg"
                onclick="nextPrev(1)">Next</button>
        </div>
        <!-- end previous / next buttons -->
    </form>



    <!-- tailwind css -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" />
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <script>
      var currentTab = 0; // Current tab is set to be the first tab (0)
      showTab(currentTab); // Display the current tab

      function showTab(n) {
          // This function will display the specified tab of the form...
          var x = document.getElementsByClassName("step");
          x[n].style.display = "block";
          //... and fix the Previous/Next buttons:
          if (n == 0) {
              document.getElementById("prevBtn").style.display = "none";
          } else {
              document.getElementById("prevBtn").style.display = "inline";
          }
          if (n == (x.length - 1)) {
              document.getElementById("nextBtn").innerHTML = "Submit";
          } else {
              document.getElementById("nextBtn").innerHTML = "Next";
          }
          //... and run a function that will display the correct step indicator:
          fixStepIndicator(n)
      }

      function nextPrev(n) {
          // This function will figure out which tab to display
          var x = document.getElementsByClassName("step");

        
          // Exit the function if any field in the current tab is invalid:
          if (n == 1 && !validateForm()) return false;
          // Hide the current tab:
          x[currentTab].style.display = "none";
          // Increase or decrease the current tab by 1:
          currentTab = currentTab + n;

          if (currentTab == 2) {
              toggleSellerFields();
          }
         
          // if you have reached the end of the form...
          if (currentTab >= x.length) {
              // ... the form gets submitted:
              document.getElementById("loading-overlay").style.display = "flex";
              document.getElementById("signUpForm").submit();
              return false;
          }


          // Otherwise, display the correct tab:
          showTab(currentTab);
      }

      function validateForm() {
        // This function deals with validation of the form fields
        var pass = document.getElementById("password");
        var confirmPass = document.getElementById("password_confirmation");
        var email = document.getElementById("email");
        var x, y, i, valid = true;
        x = document.getElementsByClassName("step");
        y = x[currentTab].getElementsByTagName("input");



         // Check the selected role
         var buyerRadio = document.getElementById("buyer-radio");
        if (buyerRadio.checked) {
        var justifyInput = document.getElementById("justify");
        
        y = Array.from(y).filter(function(input) {
            return input !== justifyInput;
        });
        console.log(y);
    }

        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
           
          // If a field is empty...
          if (y[i].value == "") {
            // console.log("invalid field");
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
          }
        }
        
        if(pass.value.length < 8 || pass.value != confirmPass.value){
          pass.className += " invalid";
          valid = false;
        }

        if(! /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)){
          email.className += " invalid";
          valid = false;
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
          document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
        }
        return valid; // return the valid status
      }

      function fixStepIndicator(n) {
          // This function removes the "active" class of all steps...
          var i, x = document.getElementsByClassName("stepIndicator");
          for (i = 0; i < x.length; i++) {
              x[i].className = x[i].className.replace(" active", "");
          }
          //... and adds the "active" class on the current step:
          x[n].className += " active";
      }

      function toggleSellerFields() {
          var sellerFields = document.getElementById("sellerFields");
          var sellerRadio = document.getElementById("seller-radio");
          var buyerRadio = document.getElementById("buyer-radio");

          if (sellerRadio.checked) {
              sellerFields.style.display = "block";
          } else if (buyerRadio.checked) {
              sellerFields.style.display = "none";
          }

      }
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
