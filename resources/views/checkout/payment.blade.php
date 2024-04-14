@extends('layouts.home')
@section('title', 'Checkout Payement')
@section('content')
        <!-- breadcrumbs  -->

        <nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
            <ul class="flex items-center">
              <li class="cursor-pointer">
                <a href="index.html">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="h-5 w-5"
                  >
                    <path
                      d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"
                    />
                    <path
                      d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"
                    />
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
  
        <section class="flex-grow">
          <section
            class="container mx-auto max-w-[1200px] py-5 lg:flex lg:flex-row lg:py-10"
          >
            <h2 class="mx-auto px-5 text-2xl font-bold md:hidden">
              Payment Method
            </h2>
            <!-- form  -->
            <section
              class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10"
            >
              <table class="hidden lg:table">
                <thead class="h-16 bg-neutral-100">
                  <tr>
                    <th>ADDRESS</th>
                    <th>DELIVERY METHOD</th>
                    <th>ORDER REVIEW</th>
                    <th class="bg-neutral-600 text-white">PAYMENT METHOD</th>
                    
                  </tr>
                </thead>
              </table>
    
              <div class="py-5">
                <form class="flex w-full flex-col gap-3" action="{{route('checkout.payment')}}" method="POST">
                  @csrf
                
                  <input type="hidden" name="orderId" value="{{$orderId}}">
                  <div class="flex w-full flex-col">
                    <label class="flex" for="name">Payment Card Number</label>
                    <input
                      x-mask="9999 9999 9999 9999"
                      class="w-full border px-4 py-2 lg:w-1/2"
                      placeholder="4242 4242 4242 4242"
                      name="card_number"
                    />
                    @error('card_number')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                  </div>
  
                  <div class="flex w-full flex-col">
                    <label class="flex" for="name">Card Holder</label>
                    <input
                      class="w-full border px-4 py-2 lg:w-1/2"
                      type="text"
                      placeholder="SARAH JOHNSON"
                      name="card_holder"
                    />
                    @error('card_holder')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                  </div>
  
                  <div class="flex items-center gap-5 lg:w-1/2">
                    <div class="flex flex-col">
                      <label class="flex" for="name">Expiry Date</label>
  
                      <div class="flex w-[150px] items-center gap-1">
                        <input
                          x-mask="99"
                          class="w-1/2 border px-4 py-2 text-center"
                          name="exp_month"
                          id=""
                          placeholder="10"
                        />
                       
  
                        <span>&bsol;</span>
  
                        <input
                          x-mask="99"
                          class="w-1/2 border px-4 py-2 text-center"
                          name="exp_year"
                          id=""
                          placeholder="36"
                        />
                      </div>
                    
                    </div>
  
                    <div class="flex flex-col w-[60px] lg:w-[110px]">
                      <label class="flex" for="">CVC</label>
                      <input
                        name="cvc"
                        x-mask="999"
                        class="w-full border py-2 text-center lg:w-1/2"
                        type="password"
                        placeholder="&bull;&bull;&bull;"
                      />
                 
                    </div>

             
                  </div>

                  @error('exp_month')
                  <span class="text-red-500">{{ $message }}</span>
                  @enderror
                  
                  @error('exp_year')
                  <span class="text-red-500">{{ $message }}</span>
                  @enderror
                  @error('cvc')
                  <span class="text-red-500">{{ $message }}</span>
                  @enderror
  
                  <!-- another payment-methods -->
  
                  <h2 class="mt-10 text-left text-xl font-medium">
                    Another methods:
                  </h2>
                  <section
                    class="my-4 grid w-fit grid-cols-3 gap-4 lg:grid-cols-5"
                  >
                    <img
                      class="w-[100px] cursor-pointer"
                      src="{{asset('img/payment-method-bitcoin.svg')}}"
                      alt="bitcoin icon"
                    />
                    <img
                      class="w-[100px] cursor-pointer"
                      src="{{asset('img/payment-method-paypal.svg')}}"
                      alt="paypal icon"
                    />
                    <img
                      class="w-[100px] cursor-pointer"
                      src="{{asset('img/payment-method-stripe.svg')}}"
                      alt="stripe icon"
                    />
                    <img
                      class="w-[100px] cursor-pointer"
                      src="{{asset('img/payment-method-visa.svg')}}"
                      alt="visa icon"
                    />
                    <img
                      class="w-[100px] cursor-pointer"
                      src="{{asset('img/payment-method-mastercard.svg')}}"
                      alt="mastercard icon"
                    />
                  </section>
                  <!-- another payment-methods -->

                  <button type="submit"  class="bg-pink-400 px-4 py-2"
                  >Confirm payment</button
                >
                </form>
              </div>
  
              <div class="flex w-full items-center justify-between">
                <a
                  href="catalog.html"
                  class="hidden text-sm text-violet-900 lg:block"
                  >&larr; Back to the shop</a
                >
  
                <div class="mx-auto flex justify-center gap-2 lg:mx-0">
                 
  
                 
                </div>
              </div>
            </section>
            <!-- /form  -->
  
            <!-- Summary  -->
  
            <section class="mx-auto w-full px-4 md:max-w-[400px]">
              <div class="">
                <div class="border py-5 px-4 shadow-md">
                  <p class="font-bold">ORDER SUMMARY</p>
                  
                  <div class="flex justify-between border-b py-5">
                    <p>Subtotal</p>
                    <p>${{$subtotal}}</p>
                  </div>
  
                  <div class="flex justify-between border-b py-5">
                    <p>Shipping</p>
                    <p>Free</p>
                  </div>
  
                  <div class="flex justify-between py-5">
                    <p>Total</p>
                    <p>${{$subtotal}}</p>
                  </div>
                </div>
              </div>
            </section>
          </section>
  
          <!-- /Summary -->
  
  

@endsection