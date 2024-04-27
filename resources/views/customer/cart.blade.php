@extends('layouts.home')
@section('title', 'Cart')
@section('content')

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif


    <section class="container mx-auto flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">
        <!-- Desktop cart table  -->
        <section class=" sm:block w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 md:grid">
            <div class="overflow-x-auto">
                <table class="w-full lg:table">
                    <thead class="h-16 bg-neutral-100">
                        <tr>
                            <th class="px-4">ITEM</th>
                            <th class="px-4">PRICE</th>
                            <th class="px-4">QUANTITY</th>
                            <th class="px-4">TOTAL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 1 -->
                        @foreach ($cart->products as $product)
                            <tr class="h-auto lg:h-[100px] border-b">
                                <td class="align-middle px-4">
                                    <div class="flex flex-wrap">
                                        <img class="w-[90px] h-[90px] mr-3 mb-3"
                                            src="{{ $product->getFirstMediaUrl('products') }}" alt="bedroom image" />
                                        <div class="flex flex-col justify-center">
                                            <p class="text-xl font-bold">{{ $product->name }}</p>

                                        </div>
                                    </div>
                                </td>
                                <td class="mx-auto text-center px-4">&#36;{{ $product->price }}</td>
                                <td class="align-middle px-4">
                                    <div class="flex items-center justify-center">
                                        <button
                                            class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500 decrement-btn"
                                            data-product-id="{{ $product->id }}">&minus;</button>
                                        <div class="flex h-8 w-8 cursor-text items-center justify-center border-t border-b active:ring-gray-500 quantity"
                                            id="quantity_{{ $product->id }}" data-product-id="{{ $product->id }}">

                                            {{ $product->pivot->quantity }} </div>
                                        <button
                                            class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500 increment-btn"
                                            data-product-id="{{ $product->id }}"
                                            data-stock="{{ $product->stock }}">&#43;</button>
                                    </div>
                                </td>
                                <td class="mx-auto text-center px-4 " id="totalPrice_{{ $product->id }}" data-price="{{$product->price}}">&#36;{{ $totals[$product->id] }}</td>
                                <td class="align-middle px-4">
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
            </div>
        </section>


        <!-- /Desktop cart table  -->

        <!-- Summary  -->

        <section class="mx-auto w-full px-4 md:max-w-[400px]">
            <div class="">
                <div class="border py-5 px-4 shadow-md">
                    <a href="{{ route('checkout') }}">
                        <button class="w-full bg-violet-900 px-5 py-2 text-white">
                            Proceed to checkout
                        </button>
                    </a>
                </div>
            </div>
        </section>
    </section>

    <script>
        document.querySelectorAll('.increment-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const quantityElement = document.getElementById('quantity_' + productId);
                let quantity = parseInt(quantityElement.innerText);

                const stock = parseInt(this.dataset.stock);
                if (stock <= quantity) {
                    return;
                }
                quantity++;
                quantityElement.innerText = quantity;

                const totalPriceElement = document.getElementById('totalPrice_' + productId);
                console.log("dtaset price",totalPriceElement.dataset
                    .price);
                
                const price = parseFloat(totalPriceElement.dataset
                    .price);
                totalPriceElement.innerText = '$' + (quantity * price);
                

                console.log("stock: ", stock);
                console.log("quantity: ", quantity);

                if (quantity >= stock) {
                    this.disabled = true;
                }

                setTimeout(() => {
                    updateQuantity(productId, quantity);
                }, 500);
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

                    const totalPriceElement = document.getElementById('totalPrice_' + productId);
                   
                    const price = parseFloat(totalPriceElement.dataset
                    .price);
                    totalPriceElement.innerText = '$' + (quantity * price); 


                    // localStorage.setItem("product_" + productId + "_quantity", quantity);              
                    setTimeout(() => {
                        updateQuantity(productId, quantity);
                    }, 500);
                }
            });
        });

        function updateQuantity(productId, quantity) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('cart/update-cart', {
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

                })
                .then(data => {
                    console.log("data :", data);
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
    </script>

@endsection
