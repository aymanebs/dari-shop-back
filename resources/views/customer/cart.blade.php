@extends('layouts.home')
@section('title', 'Cart')
@section('content')

    {{-- @if (session('success'))

    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
      <p>{{ session('success') }}</p>
      <svg onclick="this.parentElement.parentElement.style.display='none'" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <title>Close</title>
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M14.95 5.05a.75.75 0 01-1.06 1.06L10 11.06 6.05 7.11a.75.75 0 00-1.06 1.06L8.94 12l-4.95 4.95a.75.75 0 101.06 1.06L10 13.06l3.95 3.95a.75.75 0 001.06-1.06L11.06 12l4.95-4.95z"
        ></path>
      </svg>
  </div>
  @endif --}}

    <section class="container mx-auto flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">


        <!-- Mobile cart table  -->
        <section class="container mx-auto my-3 flex w-full flex-col gap-3 px-4 md:hidden">
            <!-- 1 -->

            <div class="flex w-full border px-4 py-4">
                <img class="self-start object-contain" width="90px" src="./assets/images/bedroom.png" alt="bedroom image" />
                @foreach ($cart->products as $product)
                    <div class="ml-3 flex w-full flex-col justify-center">
                        <div class="flex items-center justify-between">
                            <p class="text-xl font-bold">{{ $product->name }}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path
                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                            </svg>
                        </div>
                        <p class="text-sm text-gray-400">Size: XL</p>
                        <p class="py-3 text-xl font-bold text-violet-900">$320</p>
                        <div class="mt-2 flex w-full items-center justify-between">
                            <div class="flex items-center justify-center">
                                <button
                                    class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500">
                                    &minus;
                                </button>
                                <div
                                    class="flex h-8 w-8 cursor-text items-center justify-center border-t border-b active:ring-gray-500">
                                    1
                                </div>
                                <button
                                    class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500">
                                    &#43;
                                </button>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="m-0 h-5 w-5 cursor-pointer">
                                <path fill-rule="evenodd"
                                    d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>
        <!-- /Mobile cart table  -->

        <!-- Desktop cart table  -->
        <section class="hidden h-[600px] w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 md:grid">

            <table class="table-fixed">
                <thead class="h-16 bg-neutral-100">
                    <tr>
                        <th>ITEM</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>TOTAL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 1 -->
                    @foreach ($cart->products as $product)
                        <tr class="h-[100px] border-b">
                            <td class="align-middle">
                                <div class="flex">
                                    <img class="w-[90px]" src="{{ $product->getFirstMediaUrl('products') }}"
                                        alt="bedroom image" />
                                    <div class="ml-3 flex flex-col justify-center">
                                        <p class="text-xl font-bold">{{ $product->name }}</p>
                                        <p class="text-sm text-gray-400">Size: XL</p>
                                    </div>
                                </div>
                            </td>
                            <td class="mx-auto text-center">&#36;{{ $product->price }}</td>
                            <td class="align-middle">
                                <div class="flex items-center justify-center">

                                    <button
                                        class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500 decrement-btn"
                                        data-product-id="{{ $product->id }}">
                                        &minus;
                                    </button>
                                    <div class="flex h-8 w-8 cursor-text items-center justify-center border-t border-b active:ring-gray-500 quantity"
                                        id="quantity_{{ $product->id }}" data-product-id="{{ $product->id }}">
                                       {{ $product->pivot->quantity }}
                                    </div>

                                    <button
                                        class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500 increment-btn"
                                        data-product-id="{{ $product->id }}">
                                        &#43;
                                    </button>


                                </div>
                            </td>
                            <td class="mx-auto text-center">&#36;320</td>
                            <td class="align-middle">
                                <form action="{{ route('cart.remove', ['product' => $product->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="m-0 h-5 w-5 cursor-pointer">
                                            <path fill-rule="evenodd"
                                                d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </section>
        <!-- /Desktop cart table  -->

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

                    <a href="{{ route('checkout.create') }}">
                        <button class="w-full bg-violet-900 px-5 py-2 text-white">
                            Proceed to checkout
                        </button>
                    </a>
                </div>
            </div>
        </section>
    </section>

    <!-- /Summary -->
    {{-- // for(let i=0;i<increment_btn.length;i++){
      //   increment_btn[i].addEventListener("click", function() {
      //   localStorage.setItem("quantity",quantity.textContent++)
      //   }); --}}

    {{-- // let quantity = localStorage.getItem(`quanity_${productId}`); --}}


    <script>
        document.querySelectorAll('.increment-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const quantityElement = document.getElementById('quantity_' + productId);
                let quantity = parseInt(quantityElement.innerText);
                quantity++;
                quantityElement.innerText = quantity;
                localStorage.setItem("product_" + productId + "_quantity", quantity);

             

                // Send AJAX request to update quantity on the server after a delay
                setTimeout(() => {
                    updateQuantity(productId, quantity);
                }, 500); // Delay in milliseconds (adjust as needed)
            });
        });

        document.querySelectorAll('.decrement-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const quantityElement = document.getElementById('quantity_' + productId);
                let quantity = parseInt(quantityElement.innerText);
                if (quantity > 1) {
                    quantity--;
                    quantityElement.innerText = quantity;
                    localStorage.setItem("product_" + productId + "_quantity", quantity);

                    // Send AJAX request to update quantity on the server after a delay
                    setTimeout(() => {
                        updateQuantity(productId, quantity);
                    }, 500); // Delay in milliseconds (adjust as needed)
                }
            });
        });

        function updateQuantity(productId, quantity)

        {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Send an AJAX request to update quantity on the server
            fetch('/update-cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        productId: productId,
                        quantity: quantity
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to update quantity');
                    }
                    // Handle success if needed

                })
                .catch(error => {
                    console.error('Error updating quantity:', error);
                });
        }









        // decrement_btn.addEventListener("click", function() {
        //     const productId = this.dataset.productId;
        //     const action ="decrement";
        //     localStorage.setItem("quantity",quantity.textContent--);
        // });
        // quantity.textContent = localStorage.getItem("quantity")
        // async function updateCart(product, action) {
        //     console.log("action : " , action)
        //     const formData = new FormData();

        //     formData.append('action', action);


        //     try {
        //         const response = await fetch(`http://127.0.0.1:8000/cart/update/${product}`, {
        //             method : "PATCH",
        //             body : formData,
        //             headers: {
        //                 'Content-Type': 'multipart/form-data',
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token to the header
        //             }
        //         });

        //         if (!response.ok) {
        //             throw new Error('Network response was not ok.');
        //         }

        //         const data = await response.json();
        //         console.log("data:", data);
        //     } catch (error) {
        //         console.error('There was an error with the fetch operation:', error);
        //     }
        // }
    </script>

@endsection
