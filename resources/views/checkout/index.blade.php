@extends('layouts.home')
@section('title', 'Checkout Adress')
@section('content')
    <!-- breadcrumbs  -->

    <nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
        <ul class="flex items-center">
            <li class="cursor-pointer">
                <a href="{{route('home')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path
                            d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path
                            d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                </a>
            </li>
            <li>
                <span class="mx-2 text-gray-500">&gt;</span>
            </li>

            <li class="text-gray-500">Checkout</li>
        </ul>
    </nav>
    <!-- /breadcrumbs  -->
    </div>

    <div class="flex-grow">
        <section class="container mx-auto max-w-[1200px] py-5 lg:flex lg:flex-row lg:py-10">

            <!-- Steps guide  -->
            <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">
                <table class="hidden lg:table" id="orderTable">
                    <thead class="h-16 bg-neutral-100">
                        <tr>
                            <th class=" stepIndicator bg-neutral-600 text-white  ">ADDRESS</th>
                            <th class="stepIndicator">DELIVERY METHOD</th>
                            <th class="stepIndicator">ORDER REVIEW</th>
                            <th class="stepIndicator">GO TO PAYEMENT PAGE</th>

                        </tr>
                    </thead>
                </table>
                {{--  step 1 --}}
                <div class="form-section py-5" style="display: block">
                    <form class="flex w-full flex-col gap-3">
                        @csrf

                        {{-- <input type="hidden" name="orderId" value='{{ $orderId }}'> --}}
                        <div class="flex  flex-col">
                            <label class="flex" for="name">Adresse<span
                                    class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
                            <input  class="w-full border px-4 py-2 outline-pink-400" type="text"
                                placeholder="Adresse" name="shipping_adress" value="" />
                            @error('shipping_adress')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror

                        </div>




                        <div class="flex w-full justify-between gap-2">
                            <div class="flex w-1/2 flex-col">
                                <label class="flex" for="name">Region<span
                                        class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
                                <input x-mask="999999" class="w-full border px-4 py-2 outline-pink-400" placeholder="176356"
                                    name="shipping_region" value="" />
                                @error('shipping_region')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex w-1/2 flex-col">
                                <label class="flex" for="name">Ville<span
                                        class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
                                <input class="w-full border px-4 py-2 outline-pink-400" type="text" placeholder="Ville"
                                    name="shipping_city" value="" />
                                @error('shipping_city')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="">Information supplémentaire</label>
                            <textarea class="border px-4 py-2 outline-pink-400" type="text" name="additional_info"></textarea>
                            @error('additional_info')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>

                </div>
                {{-- /  step  1 --}}

                {{--  step 2 --}}

                <div class="form-section py-5" style="display: none;">
                    <form class="grid w-full grid-cols-1 gap-3 lg:grid-cols-2" action="" method="POST">
                        @csrf

                        <div class="flex w-full justify-between gap-2">
                            <div class="flex w-full cursor-pointer flex-col border">
                                <div class="flex bg-pink-400 px-4 py-2">
                                    <input  class="outline-pink-400" type="radio" name="delivery_method"
                                        value="1" />
                                    <p class="ml-3 font-bold">Home Delivery</p>
                                </div>

                                <div class="px-4 py-3">
                                    <p class="pb-3 font-bold text-violet-900">FREE</p>
                                    <p class="text-sm">
                                        Get your items delivered right to your doorstep with our convenient home delivery
                                        service.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex w-full cursor-pointer flex-col border">
                            <div class="flex bg-pink-400 px-4 py-2">
                                <input class="outline-pink-400" type="radio" name="delivery_method" value="2" />
                                <p class="ml-3 cursor-pointer font-bold">Pick-Up Point</p>
                            </div>

                            <div class="px-4 py-3">
                                <p class="pb-3 font-bold text-violet-900">FREE</p>
                                <p class="text-sm">
                                    Collect your order from one of our convenient pick-up points near you.
                                </p>
                            </div>
                        </div>

                        @error('delivery_method')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                </div>


                {{-- / step 2  --}}

                {{--  step 3 --}}
                <div class="form-section overflow-x-auto" style="display: none;">
                    <table class="w-full lg:table">
                        <thead class="h-16 bg-neutral-100">
                            <tr>
                                <th class="pl-5 md:pl-8 text-left">ITEM</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">
                            <!-- 1 -->

                            <tr class="h-[100px] border-b">
                                <td class="align-middle">
                                    <div class="flex items-center">
                                        <img class="w-[70px] md:w-[120px] mr-3" src="" alt="image" />
                                        <div class="flex flex-col justify-center">
                                            <p class="text-lg md:text-xl font-bold md:whitespace-nowrap">
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="mx-auto text-center align-middle">&#36;</td>
                                <td class="text-center align-middle"></td>
                                <td class="mx-auto text-center align-middle">&#36;</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                {{-- / step 3 --}}

                {{-- step 4 --}}

                <div class="form-section py-5" style="display: none;">
                    <h2 class="mt-10 text-left text-xl font-medium">
                        Payment Method:
                    </h2>
                    <p class="mt-3 text-center text-gray-600">
                        Secure Payment
                    </p>
                    <p class="mt-1 text-center text-gray-600">
                        Complete Your Purchase
                    </p>
                    <section class="flex items-center justify-center mt-5">
                        <img class="w-48 cursor-pointer" src="{{ asset('img/payment-method-stripe.svg') }}"
                            alt="Stripe icon">
                    </section>
                    <div class="mt-5 flex items-center justify-center">
                        <input id="terms_checkbox" type="checkbox" id="acceptTerms"
                            class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                        <label  for="acceptTerms" class="ml-2 block text-sm leading-5 text-gray-900">
                            I accept the <a href="#" class="text-indigo-600 hover:text-indigo-900">Terms and
                                Conditions</a>
                        </label>
                    </div>
                </div>
                {{--  /step 4    --}}

                {{-- buttons --}}
                <div class="flex w-full items-center justify-between">
                    <a href="{{ route('catalog.index') }}" id="catalog_link" class="text-sm text-violet-900">&larr; Back
                        to the shop</a>
                    <button id="prev-btn" type="button" class="bg-pink-400 px-4 py-2">Previous</button>
                    <button id="next-btn" type="button" class="bg-pink-400 px-4 py-2">Next</button>
                </div>
                </form>
            </section>
            <!-- /buttons  -->

            <!-- Summary  -->


        </section>

        <!-- /Summary -->

        <!-- Cons bages -->

        <section class="container mx-auto my-8 flex flex-col justify-center gap-3 lg:flex-row">
            <!-- 1 -->

            <div class="mx-5 flex flex-row items-center justify-center border-2 border-pink-400 py-4 px-5">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6 text-violet-900 lg:mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                </div>

                <div class="ml-6 flex flex-col justify-center">
                    <h3 class="text-left text-xs font-bold lg:text-sm">
                        Free Delivery
                    </h3>
                    <p class="text-light text-center text-xs lg:text-left lg:text-sm">
                        Orders from $200
                    </p>
                </div>
            </div>

            <!-- 2 -->

            <div class="mx-5 flex flex-row items-center justify-center border-2 border-pink-400 py-4 px-5">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6 text-violet-900 lg:mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                </div>

                <div class="ml-6 flex flex-col justify-center">
                    <h3 class="text-left text-xs font-bold lg:text-sm">
                        Money returns
                    </h3>
                    <p class="text-light text-left text-xs lg:text-sm">
                        30 Days guarantee
                    </p>
                </div>
            </div>

            <!-- 3 -->

            <div class="mx-5 flex flex-row items-center justify-center border-2 border-pink-400 py-4 px-5">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6 text-violet-900 lg:mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                </div>

                <div class="ml-6 flex flex-col justify-center">
                    <h3 class="text-left text-xs font-bold lg:text-sm">
                        24/7 Supports
                    </h3>
                    <p class="text-light text-left text-xs lg:text-sm">
                        Consumer support
                    </p>
                </div>
            </div>
        </section>

        <!-- /Cons bages  -->
    </div>
    </main>
    <!-- /Payment and copyright  -->

    <script>
        const formSections = document.querySelectorAll(".form-section");
        const prevtBtn = document.getElementById("prev-btn");
        const nextBtn = document.getElementById("next-btn");
        const paymentForm = document.querySelector('#paymentForm');
        const stepIndicators = document.getElementsByClassName('stepIndicator');

        let formData = {};
        let currentStep = 0;
        prevtBtn.style.display = "none";



        // function that displays each step of the form

        function showStep(currentStep) {
            for (let i = 0; i < formSections.length; i++) {
                if (i === currentStep) {
                    formSections[i].style.display = "block";
                } else {
                    formSections[i].style.display = "none";
                }

                if (currentStep === 0) {
                    prevtBtn.style.display = "none";
                    catalog_link.style.display = "inline";
                } else {
                    prevtBtn.style.display = "inline";
                    catalog_link.style.display = "none";
                }

                if (currentStep === formSections.length - 1) {
                    nextBtn.textContent = "Finish";
                } else {
                    nextBtn.textContent = "Next";
                }
            }
        }

        function stepIndicator(currentStep) {

            for (let i = 0; i < stepIndicators.length; i++) {
                if (i == currentStep) {
                    stepIndicators[i].classList.add('bg-neutral-600', 'text-white');
                } else {
                    stepIndicators[i].classList.remove('bg-neutral-600', 'text-white');
                }
            }

        }

        // function formValidation(currentStep) {
        //     const inputs = formSections[currentStep].querySelectorAll('input:not([type="radio"]), textarea');
        //     const radios = formSections[currentStep].querySelectorAll('input[type="radio"]');
        //     const terms_checkbox = formSections[currentStep].querySelector('input[type="checkbox"]');
        //     const currentFormSection = formSections[currentStep];
    
        //     let valid = true;

     
        //     inputs.forEach(input => {
        //         if (input.value.trim() === "") {
        //             valid = false;
        //             input.classList.add('border-red-500');
        //         } else {
        //             input.classList.remove('border-red-500');
        //         }
        //     });
                
        //     return valid;
        // }



        // function that saves the data from the forms
        function saveData() {
            formData.shipping_adress = document.querySelector('input[name="shipping_adress"]').value;
            formData.shipping_region = document.querySelector('input[name="shipping_region"]').value;
            formData.shipping_city = document.querySelector('input[name="shipping_city"]').value;
            formData.additional_info = document.querySelector('textarea[name="additional_info"]').value;

            const deliveryMethodRadios = document.querySelectorAll('input[name="delivery_method"]');
            for (const radio of deliveryMethodRadios) {
                if (radio.checked) {
                    formData.delivery_method = radio.value;
                    break;
                }
            }
        }

        // function that fetches the order data from the database
        function fetchOrderData() {

            fetch('http://127.0.0.1:8000/cart/cartData')
                .then(response => response.json())
                .then(data => {
                    // Handle the received data here

                    const table_body = document.getElementById("table_body");
                    table_body.innerHTML = "";
                    data.forEach(product => {
                        let totalPrice = product.price * product.pivot.quantity;
                        const row = `
                    <tr class="h-[100px] border-b">
                        <td class="align-middle">
                            <div class="flex items-center">
                                <img class="w-[70px] md:w-[120px] mr-3" src="${product.image}" alt="image" />
                                <div class="flex flex-col justify-center">
                                    <p class="text-lg md:text-xl font-bold md:whitespace-nowrap">
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="mx-auto text-center align-middle">&#36; ${product.price}</td>
                        <td class="text-center align-middle">${product.pivot.quantity}</td>
                        <td class="mx-auto text-center align-middle">&#36;${totalPrice}</td>
                    </tr>
                    `;

                        table_body.insertAdjacentHTML('beforeend', row);
                    })

                })
                .catch(error => {
                    console.error('Error fetching cart data:', error);
                });

        }

        // function to create order 

        async function createOrder() {

            if (orderId !== 0) {
                return orderId;
            }

            const response = await fetch('/orderCreate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },

                body: JSON.stringify(formData),
            })


            if (!response.ok) {
                console.log('Failed to submit order');
            }

            const data = await response.json();
            return orderId = data.orderId;

        }


        // function to handle payment
        function payment(orderId) {
            fetch('/checkout/payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },

                    body: JSON.stringify({
                        orderId: orderId
                    }),
                })
                .then(response => {
                    console.log(response)

                    if (!response.ok) {
                        console.log('Failed to submit payment');
                    }
                    return response.json();
                })

        }

        let orderId = 0;
        // Event lisener on the next button
        nextBtn.addEventListener("click", async function() {


            event.preventDefault();

            console.log("step before incrementation :", currentStep);
            // if (formValidation(currentStep)) {
            //     console.log("validation passed");
            //         
            // }
            
            currentStep++; 
            console.log("step after incrementation: ", currentStep);
            

            // if (!formValidation(currentStep)) {
            //     console.log("validation failed");
            //     return;
                
            // }

            console.log("step after incrementation: ", currentStep);

            // if (currentStep >= formSections.length) {
            //     currentStep = formSections.length - 1;
            // }

            if (currentStep == 2) {
                await saveData();
                await fetchOrderData();
            }

            if (currentStep == 3) {
            orderId = await createOrder();
            }


            console.log("step after createOrder:", currentStep);


            if (currentStep >= formSections.length) {

                try {
                    const response = await fetch('/checkout/payment', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Access-Control-Allow-Origin': '*',
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },

                        body: JSON.stringify({
                            orderId: orderId
                        }),
                    });

                    if (response.ok) {
                        console.log('Request sent successfully');

                        // Fetch the session URL from the response
                        const {
                            url
                        } = await response.json();

                        // Redirect the user to the Stripe Checkout page
                        window.location.href = url;
                    } else {
                        console.log('Request failed');
                    }
                } catch (error) {
                    console.log('Error occurred during the request', error);
                }
                return false;
            }


            showStep(currentStep);
            
            stepIndicator(currentStep);



        });

        // Event listener on the previous button
        prevtBtn.addEventListener("click", function() {
            currentStep--;
            if (currentStep < 0) {
                currentStep = 0;
            }
            stepIndicator(currentStep);
            showStep(currentStep);
        });
    </script>


@endsection
