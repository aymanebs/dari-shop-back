@extends('layouts.home')
@section('title','Checkout Delivery')  
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
  
        <div class="flex-grow">
          <section
            class="container mx-auto max-w-[1200px] py-5 lg:flex lg:flex-row lg:py-10"
          >
            <h2 class="mx-auto px-5 text-2xl font-bold md:hidden">
              Delivery Method
            </h2>
            <!-- form  -->
            <section
              class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10"
            >
              <table class="hidden lg:table">
                <thead class="h-16 bg-neutral-100">
                  <tr>
                    <th>ADDRESS</th>
                    <th class="bg-neutral-600 text-white">DELIVERY METHOD</th>
                    <th>ORDER REVIEW</th>
                    <th>PAYMENT METHOD</th>
                   
                  </tr>
                </thead>
              </table>
  
              <div class="py-5">
                <form
                  class="grid w-full grid-cols-1 gap-3 lg:grid-cols-2"
                  action="{{route('checkout.save-delivery')}}" method="POST"
                >
                @csrf
                <input type="hidden" name="orderId" value='{{$orderId}}'>
                  <div class="flex w-full justify-between gap-2">
                    <div class="flex w-full cursor-pointer flex-col border">
                      <div class="flex bg-pink-400 px-4 py-2">
                        <input class="outline-pink-400" type="radio" name="delivery_method" value="2" />
  
                        <p class="ml-3 font-bold">Livraison a domicile</p>
                      </div>
  
                      <div class="px-4 py-3">
                        <p class="pb-3 font-bold text-violet-900">FREE</p>
                        <p class="text-sm">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit.
                          Qui nulla dolorum obcaecati, sequi, quidem quo eligendi
                          soluta modi accusamus esse explicabo exercitationem!
                        </p>
                      </div>
                    </div>
                  </div>
  
                  <div class="flex w-full cursor-pointer flex-col border">
                    <div class="flex bg-pink-400 px-4 py-2">
                      <input class="outline-pink-400" type="radio" name="delivery_method" value="2"/>
  
                      <p class="ml-3 cursor-pointer font-bold">Point relais</p>
                    </div>
  
                    <div class="px-4 py-3">
                      <p class="pb-3 font-bold text-violet-900">&dollar;300</p>
                      <p class="text-sm">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Qui nulla dolorum obcaecati, sequi, quidem quo eligendi
                        soluta modi accusamus esse explicabo exercitationem!
                      </p>
                    </div>
                  </div>
  
               
                
              </div>
  
              <div class="flex w-full items-center justify-between">
                <a
                  href="catalog.html"
                  class="hidden text-sm text-violet-900 lg:block"
                  >&larr; Back to the shop</a
                >
  
                <div class="mx-auto flex justify-center gap-2 lg:mx-0">
                  <a
                    href="checkout-address.html"
                    class="bg-purple-900 px-4 py-2 text-white"
                    >Previous step</a
                  >
  
                  <button  class="bg-pink-400 px-4 py-2" type="submit"
                    >Order review
                </button>
                
                </div>

              </form>
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
                    <p>$1280</p>
                  </div>
  
                  <div class="flex justify-between border-b py-5">
                    <p>Shipping</p>
                    <p>Free</p>
                  </div>
  
                  <div class="flex justify-between py-5">
                    <p>Total</p>
                    <p>$1280</p>
                  </div>
                </div>
              </div>
            </section>
          </section>
  
          <!-- /Summary -->
  
          <!-- Cons bages -->
  
          <section
            class="container mx-auto my-8 flex flex-col justify-center gap-3 lg:flex-row"
          >
            <!-- 1 -->
  
            <div
              class="mx-5 flex flex-row items-center justify-center border-2 border-pink-400 py-4 px-5"
            >
              <div class="">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="h-6 w-6 text-violet-900 lg:mr-2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"
                  />
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
  
            <div
              class="mx-5 flex flex-row items-center justify-center border-2 border-pink-400 py-4 px-5"
            >
              <div class="">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="h-6 w-6 text-violet-900 lg:mr-2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"
                  />
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
  
            <div
              class="mx-5 flex flex-row items-center justify-center border-2 border-pink-400 py-4 px-5"
            >
              <div class="">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="h-6 w-6 text-violet-900 lg:mr-2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"
                  />
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
  
        <!-- Desktop Footer  -->
  
        <footer
          class="mx-auto w-full max-w-[1200px] justify-between pb-10 flex flex-col lg:flex-row"
        >
          <div class="ml-5">
            <img
              class="mt-10 mb-5"
              src="./assets/images/company-logo.svg"
              alt="company logo"
            />
            <p class="pl-0">
              Lorem ipsum dolor sit amet consectetur <br />
              adipisicing elit.
            </p>
            <div class="mt-10 flex gap-3">
              <a href="https://github.com/bbulakh">
                <img
                  class="h-5 w-5 cursor-pointer"
                  src="./assets/images/github.svg"
                  alt="github icon"
                />
              </a>
              <a href="https://t.me/b_bulakh">
                <img
                  class="h-5 w-5 cursor-pointer"
                  src="./assets/images/telegram.svg"
                  alt="telegram icon"
                />
              </a>
              <a href="https://www.linkedin.com/in/bogdan-bulakh-393284190/">
                <img
                  class="h-5 w-5 cursor-pointer"
                  src="./assets/images/linkedin.svg"
                  alt="twitter icon"
                />
              </a>
            </div>
          </div>
  
          <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="mx-5 mt-10">
              <p class="font-medium text-gray-500">FEATURES</p>
              <ul class="text-sm leading-8">
                <li><a href="#">Marketing</a></li>
                <li><a href="#">Commerce</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Merchendise</a></li>
              </ul>
            </div>
  
            <div class="mx-5 mt-10">
              <p class="font-medium text-gray-500">SUPPORT</p>
              <ul class="text-sm leading-8">
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Docs</a></li>
                <li><a href="#">Audition</a></li>
                <li><a href="#">Art Status</a></li>
              </ul>
            </div>
  
            <div class="mx-5 mt-10">
              <p class="font-medium text-gray-500">DOCUMENTS</p>
              <ul class="text-sm leading-8">
                <li><a href="#">Terms</a></li>
                <li><a href="#">Conditions</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">License</a></li>
              </ul>
            </div>
  
            <div class="mx-5 mt-10">
              <p class="font-medium text-gray-500">DELIVERY</p>
              <ul class="text-sm leading-8">
                <li><a href="#">List of countries</a></li>
                <li><a href="#">Special information</a></li>
                <li><a href="#">Restrictions</a></li>
                <li><a href="#">Payment</a></li>
              </ul>
            </div>
          </div>
        </footer>
        <!-- /Desktop Footer  -->
  
        <!-- Payment and copyright  -->
  
        <section class="h-11 bg-pink-400">
          <div
            class="mx-auto flex max-w-[1200px] items-center justify-between px-4 pt-2"
          >
            <p>&copy; Bogdan Bulakh, 2023</p>
            <div class="flex items-center space-x-3">
              <img
                class="h-8"
                src="https://cdn-icons-png.flaticon.com/512/5968/5968299.png"
                alt="Visa icon"
              />
              <img
                class="h-8"
                src="https://cdn-icons-png.flaticon.com/512/349/349228.png"
                alt="AE icon"
              />
              <img
                class="h-8"
                src="https://cdn-icons-png.flaticon.com/512/5968/5968144.png"
                alt="Apple pay icon"
              />
            </div>
          </div>
        </section>
      </main>
      <!-- /Payment and copyright  -->
@endsection
