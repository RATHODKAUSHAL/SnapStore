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

    <title>Snapstore - Checkout</title>
</head>

<body class="bg-gray-100">

    <!-- Navigation -->
   <form action="{{ route('stripe.session') }}" method="POST"> <nav class="bg-white shadow-md h-20 flex items-center justify-between px-10">
    <!-- Logo Section -->
    @csrf
    <a href="{{ route('dashboard') }}" class="flex items-center">
        <img class='h-14 w-20' src="{{ asset('assets/img/SnapStore.png') }}" alt="SnapStore Logo">
    </a>

    <!-- Checkout Title -->
    <div class="flex items-center">
        <p class="text-2xl font-semibold text-gray-800">Checkout</p>
    </div>

    <!-- Lock Icon for Secure Checkout -->
    <div class="flex items-center">
        <i class="fa-solid fa-lock text-gray-600 text-xl"></i>
        <span class="ml-2 text-gray-600 text-sm">Secure Checkout</span>
    </div>
</nav>

<!-- Content Section -->
<div class="max-w-7xl mx-auto p-6 bg-white mt-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Review Your Order</h1>

    <!-- Sample Order Item (You can loop over items here) -->
    @foreach ($cart as $carts)
    <div class="flex flex-col md:flex-row items-center justify-between bg-gray-50 p-4 rounded-lg shadow-sm mb-6">
        <div class="flex items-center space-x-4">
            <img src="{{ asset($carts->product->product_image) }}" alt="Product Image"
                class="h-24 w-24 rounded-md object-cover">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">{{ $carts->product->product_name }}</h2>
                <p class="text-sm w-1/2 text-gray-500">{{ $carts->product->product_description }}</p>
            </div>
        </div>
        <div class="mt-4 md:mt-0">
            <p class="text-lg font-semibold text-gray-800">{{ $carts->product->final_price }}</p>
            <p class="text-sm font-semibold text-gray-500"><del>{{ $carts->product->product_price }}</del></p>
            <p class="text-sm text-green-600">In Stock</p>
        </div>
    </div>
    @endforeach

    <!-- Order Summary Section -->
    <div class="flex flex-col items-end">
        <div class="w-full md:w-1/2 bg-gray-50 p-6 rounded-lg shadow-sm">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Order Summary</h2>
            <div class="flex justify-between items-center mb-2">
                <p class="text-sm text-gray-600">Subtotal</p>
                <p class="text-sm font-semibold text-gray-800" id="finalprice">
                <input class="hidden" type="number" name="finalprice" id="">
                ₹</p>
            </div>
            <div class="flex justify-between items-center mb-2">
                <p class="text-sm text-gray-600">Shipping</p>
                <p class="text-sm font-semibold text-gray-800" id="shipping charge">Free</p>
            </div>
            <div class="flex justify-between items-center mb-4">
                <p class="text-sm text-gray-600">Tax</p>
                <p class="text-sm font-semibold text-gray-800" id="tax">₹
                    <input type="text" class="hidden" name="tax"> 
                    @if ($carts->product->final_price <= 2000)
                        100
                    @elseif ($carts->product->final_price > 2000 && $carts->product->final_price < 100000)
                        500
                    @else
                    1000
                    @endif
                </p>
            </div>
            <hr class="border-gray-300 mb-4">
            <div class="flex justify-between items-center">
                <p class="text-lg font-bold text-gray-800">Total</p>
                <p class="text-lg font-bold text-gray-800" id="total price">₹ 
                    <input type="text" class="hidden" name="total price"></p>
            </div>
        </div>
    </div>

    <!-- Place Order Button -->
    <div class="flex justify-end mt-6">
        <button type="submit"
            class="bg-orange-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition duration-200">
            Place Order
        </button>
    </div>
</div></form>

</body>
<script>
    // Get the final price, total price, and tax elements
    const finalPriceElement = document.getElementById('finalprice');
    const totalPriceElement = document.getElementById('total price');
    const taxElement = document.getElementById('tax');

    // Initialize total price variable
    let totalPrice = 0;

    // Loop through each cart item and add the final price
    @foreach ($cart as $carts)
        totalPrice += parseFloat('{{ $carts->product->final_price }}');
    @endforeach

    // Display the total price in the final price element (Subtotal)
    finalPriceElement.textContent = `₹ ${totalPrice.toFixed(2)}`;

    // Calculate tax based on the total price
    let taxAmount = 0;
    if (totalPrice <= 2000) {
        taxAmount = 100;
    } else if (totalPrice > 2000 && totalPrice < 100000) {
        taxAmount = 500;
    } else {
        taxAmount = 1000;
    }

    // Display the tax amount
    taxElement.textContent = `₹ ${taxAmount.toFixed(2)}`;

    // Calculate the final total (Subtotal + Tax)
    const finalTotal = totalPrice + taxAmount;

    // Display the final total price
    totalPriceElement.textContent = `₹ ${finalTotal.toFixed(2)}`;
</script>


</html>
