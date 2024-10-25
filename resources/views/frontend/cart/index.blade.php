<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link class='h-14 w-20' href="{{ asset('assets/img/SnapStore.png') }}" rel="shortcut icon" />
    @vite('resources/css/app.css')

    <title>Snapstore</title>
</head>
<style>
    @layer utilities {
      /* Hide spinner controls in Chrome, Safari, Edge, and Opera */
      .no-spinner::-webkit-outer-spin-button,
      .no-spinner::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
      
      /* Hide spinner controls in Firefox */
      .no-spinner {
        -moz-appearance: textfield;
      }
    }
  </style>

<body class="bg-gray-200">

    <div class='h-16 bg-gray-900 w-full flex items-center p-4 shadow-lg'>
        <nav class='flex items-center justify-between w-full'>
            <a href="{{ route('dashboard') }}"><img class='h-14 w-20' src="{{ asset('assets/img/SnapStore.png') }}"
                    alt="SnapStore" /></a>

            <div class='flex items-center text-white space-x-2'>
                <i class="fa-solid fa-location-dot"></i>
                <div class='flex flex-col'>
                    <p class='text-[11px]'>Delivering to Ahmedabad</p>
                    <p class='font-bold cursor-pointer hover:underline text-sm'>Update Your Location</p>
                </div>
            </div>

            <div
                class='flex items-center flex-grow mx-4 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500'>
                <select data-url="{{ route('find.category') }}" name="category_name" id="category_name"
                    class='bg-gray-300 text-sm text-black py-[10px] gap-2 px-4 rounded-l-md flex items-center hover:bg-gray-400 transition duration-200'>
                    <option value="All category">All</option>
                    @foreach ($cart as $carts)
                        <option value="{{ $carts->id }}">{{ $carts->product->category->category_name }}</option>
                    @endforeach
                </select>
                <input type="text" class='h-10 w-full px-3 border border-gray-300' placeholder='Search in SnapStore' />
                <button
                    class='bg-orange-500 text-white py-3 px-4 rounded-r-md flex items-center hover:bg-orange-600 transition duration-200'>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

            <div class='text-white flex items-center space-x-1'>
                <p>En</p>
                <i class="fa-solid fa-globe"></i>
            </div>

            <div class='flex flex-col text-white text-right ml-4'>
                <div class="flex flex-row gap-2">
                    <i class="fa-solid fa-sort-down"></i>
                    @auth
                        <a href="{{ route('auth.logout') }}" class='text-sm'>Hello, {{ auth()->user()->last_name }} </a>
                    @endauth
                    @guest
                        <a href="{{ route('auth.login') }}" class='text-sm'>Hello, sign in</a>
                    @endguest
                </div>
                <p class='font-bold cursor-pointer text-sm hover:underline'>Account & Lists</p>
            </div>

            <div class=''>
                <a href="{{ route('cart.index') }}" class='text-white text-lg flex items-center gap-2 hover:underline'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    Cart
                </a>
            </div>
        </nav>
    </div>
    <nav class='h-10 bg-gray-800 w-full flex items-center text-white pl-2'>
        <ul class='flex flex-row gap-4'>
            <li>All</li>
            <li>MX Player</li>
            <li>Sell</li>
            <li>Best Seller</li>
            <li>Today's Deals</li>
            <li>Mobile</li>
            <li>Electronics</li>
            <li>Home & Kitchen</li>
            <li>Prime</li>
            <li>Customer Service</li>
            <li>Fashion</li>
            <li>New Releases</li>
            <li>Amazon Pay</li>
            <li>Computer</li>
        </ul>
    </nav>
    <section class="flex flex-row">
        <div class="bg-white m-8 w-full">
            <div class="p-4">
                <div>
                    <h1 class="text-3xl py-2">Shopping Cart</h1>
                    <a href="" class="text-green-800">Deselect all items</a>
                </div>
                <hr>
                @if ($cart->isEmpty())
                <section class="flex flex-col items-center justify-center w-full py-10">
                    <h2 class="text-xl font-semibold text-gray-800">Your cart is empty</h2>
                    <p class="text-sm text-gray-500">Add items to your cart to see them here.</p>
                </section>
                @else
                @foreach ($cart as $carts)
                    <div class="flex flex-row p-4 bg-white rounded-lg w-full items-center space-x-4">
                        <div class="w-1/4">
                            <a href="{{ route('products.show', $carts->product) }}"><img
                                    class="w-full h-auto object-cover rounded-md"
                                    src="{{ asset($carts->product->product_image) }}" alt="Product Image"></a>
                        </div>

                        <div class="flex-1 space-y-2">
                            <h2 class="text-xl font-semibold text-gray-800">{{ $carts->product->product_name }}</h2>
                            <p class="text-sm text-green-600 font-medium">In Stock</p>
                            <p class="text-sm text-gray-500">Size: {{ $carts->product->product_size }}</p>
                            <div class="flex items-center gap-3 pt-3">
                                <i class="fa-solid fa-trash"></i>
                                <input id="quantity-{{ $carts->id }}" data-unit-price="{{ $carts->product->final_price }}"
                                    onchange="calculateFinalPrice()" value="1" type="number"
                                    class="quantity border-black border w-8  text-center rounded-full " min="1" />
                                <button onclick="increaseQuantity({{ $carts->id }})"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <div class="flex pt-4 flex-row gap-3 text-sm text-emerald-600">
                                <form action="{{ route('cart.destroy', $carts->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:text-teal-500 hover:underline">Delete</button> |
                                </form>
                                <a class="hover:text-teal-500 hover:underline" href="">Save For later</a> |
                                <a class="hover:text-teal-500 hover:underline" href="">See More Like This</a> |
                                <a class="hover:text-teal-500 hover:underline" href="">Share</a>
                            </div>
                        </div>

                        <div class="flex flex-col items-end space-y-2">
                            <p class="item-total" id="item-total-{{ $carts->id }}">₹{{ $carts->product->final_price }}</p>
                            @if ($carts->product->product_discount)
                                <p class="text-sm text-red-500 font-semibold">Discount: -{{ $carts->product->product_discount }} Off</p>
                            @endif
                            <p class="text-sm"><del>₹{{ $carts->product->product_price }}</del></p>
                        </div>
                    </div>
                    <hr>
                @endforeach

            </div>
            <div class="flex flex-row justify-end p-5">
                <h1 class="font-medium text-xl">Final price:</h1>
                <p class="text-xl font-medium" id="finalprice">₹0.00</p>
            </div>
        </div>

        <div class="mt-8 h-1/2 bg-white w-1/4">
            <div class="mt-5 m-3">
                <div class="flex flex-row gap-2">
                    <button class="w-4/5 bg-green-700 rounded-full text-green-700">.</button>
                <p class="gap-2 text-sm"><i class="fa-solid fa-indian-rupee-sign" class="text-green-700 text-sm">499</i></p>
                </div>
                @if ($carts->product->product_price > 499)
                   <div class="text-[12px] p-2">
                    <p class="text-green-700 font-medium">Your order is eligible for FREE Delivery.</p>
                    <p> Choose FREE Delivery option at checkout.</p>
                   </div>
                @else
                    <p>Your order is not eligible for FREE Delivery.</p>
                    <p>Add More Items To Get Free Delivery</p>
                @endif

                <div class="flex items-center justify-center">
                    <a type="submit" href="{{ route('orders.index') }}" class="w-4/5 p-1 font-mono text-center bg-yellow-300 rounded-full ">Procced To  Buy</a>
                </div>
            </div>

        </div>
    </section>
    @endif




    <script>
        function calculateFinalPrice() {
            let totalPrice = 0;

            document.querySelectorAll('.quantity').forEach(input => {
                const unitPrice = parseFloat(input.getAttribute('data-unit-price'));
                const quantity = parseInt(input.value);
                const itemTotal = unitPrice * quantity;
                totalPrice += itemTotal;

                const itemId = input.id.split('-')[1];
                document.getElementById(`item-total-${itemId}`).textContent = `₹${itemTotal.toFixed(2)}`;
            });

            document.getElementById('finalprice').textContent = `₹${totalPrice.toFixed(2)}`;
        }

        function increaseQuantity(id) {
            const quantityInput = document.getElementById(`quantity-${id}`);
            quantityInput.value = parseInt(quantityInput.value) + 1;
            calculateFinalPrice();
        }

        calculateFinalPrice();
    </script>

@include('frontend.products.index')
</body>
</html>
