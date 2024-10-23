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

<body class="bg-gray-200">

    <div class='h-16 bg-gray-900 w-full flex items-center p-4 shadow-lg'>
        <nav class='flex items-center justify-between w-full'>
            <a href="{{ route('dashboard') }}"><img class='h-14 w-20' src="{{ asset('assets/img/SnapStore.png') }}"
                    alt="SnapStore" /></a>

            {{-- {/* Location Section */} --}}
            <div class='flex items-center text-white space-x-2'>
                {{-- <LocationOnOutlinedIcon /> --}}
                <i class="fa-solid fa-location-dot"></i>
                <div class='flex flex-col'>
                    <p class='text-[11px]'>Delivering to Ahmedabad</p>
                    <p class='font-bold cursor-pointer hover:underline text-sm'>Update Your Location</p>
                </div>
            </div>

            {{-- {/* Search Section */} --}}
            <div
                class='flex items-center  flex-grow mx-4  rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500'>
                <select data-url="{{ route('find.category') }}" name="category_name" id="category_name"
                    class='bg-gray-300 text-sm text-black py-[10px] gap-2 px-4 rounded-l-md flex items-center hover:bg-gray-400 transition duration-200'>
                    <option value="All category">All</option>
                    @foreach ($cart as $carts)
                        <option value="{{ $carts->id }}">{{ $carts->product->category->category_name }}</option>
                    @endforeach
                    <i class="fa-solid fa-sort-down"></i>
                </select>
                <input type="text" class='h-10 w-full px-3 border border-gray-300'
                    placeholder='Search in SnapStore' />
                <button
                    class='bg-orange-500 text-white py-3 px-4 rounded-r-md flex items-center hover:bg-orange-600 transition duration-200'>
                    {{-- <SearchIcon /> --}}
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

            {{-- {/* Language Section */} --}}
            <div class='text-white flex items-center space-x-1'>
                <p>En</p>
                {{-- <ArrowDropDownIcon /> --}}
                <i class="fa-solid fa-globe"></i>
            </div>

            {{-- {/* Account Section */} --}}
            <div class='flex flex-col text-white text-right ml-4'>
                <div class="flex flex-row gap-2">
                    <i class="fa-solid fa-sort-down"></i>
                    @auth
                        <a href="{{ route('auth.logout') }}" class='text-sm'>Hello,
                            {{ auth()->user()->last_name }} </a>
                    @endauth
                    @guest
                        <a href="{{ route('auth.login') }}" class='text-sm'>Hello,
                            sign in
                        </a>
                    @endguest

                </div>
                <p class='font-bold cursor-pointer text-sm hover:underline'>Account & Lists</p>
            </div>

            {{-- {/* Cart Section */} --}}
            <div class=''>
                <a href="{{ route('cart.index') }}" class='text-white text-lg flex items-center gap-2 hover:underline'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    Cart {{-- <ShoppingCartOutlinedIcon sx={{ fontSize: 30 }} /> --}}
                </a>
            </div>
        </nav>

    </div>
    <nav class='h-10 bg-gray-800 w-full flex items-center text-white pl-2'>
        <div class='flex flex-row items-center justify-center '>
            {{-- <MenuOutlinedIcon sx={{color : "#FFFFFF"}}/> --}}
            <ul class='flex flex-row gap-4'>
                <li>All</li>
                <li>MX Player</li>
                <li>sell</li>
                <li>Best Seller</li>
                <li>Today's Deals</li>
                <li>Mobile</li>
                <li>Elecronics</li>
                <li>Home & Kitchen</li>
                <li>Prime</li>
                <li>Customer Service</li>
                <li>Fashion</li>
                <li>New Realses</li>
                <li>Amazon Pay</li>
                <li>Computer</li>

            </ul>
        </div>
    </nav>
    <div class="bg-white m-10">
        <div class="p-4">
            <div class="">
                <h1 class="text-3xl py-2">Shopping Cart</h1>
                <a href="" class="text-green-800">Deselect all items</a>
            </div>
            <hr>

            @foreach ($cart as $carts)
                <div class="flex flex-row p-4 bg-white rounded-lg w-full items-center space-x-4">
                    <!-- Product Image -->
                    <div class="w-1/4">
                        <img class="w-full h-auto object-cover rounded-md"
                            src="{{ asset($carts->product->product_image) }}" alt="Product Image">
                    </div>

                    <!-- Product Details -->
                    <div class="flex-1 space-y-2">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $carts->product->product_name }}</h2>
                        <p class="text-sm text-green-600 font-medium">In Stock</p>
                        <p class="text-sm text-gray-500">Size: {{ $carts->product->product_size }}</p>
                    </div>

                    <!-- Product Price and Discount -->
                    <div class="flex flex-col items-end space-y-2">
                        <p>{{ number_format(floatval((int) $carts->product->product_price)) }}</p>

                        @if ($carts->product->product_discount)
                            <p class="text-sm text-red-500 font-semibold">Discount:
                                {{ $carts->product->product_discount }} Off</p>
                        @endif
                        <p class="text-sm"><del>{{ $carts->product->product_price }}</del> ₹</p>

                    </div>
                </div>
                <hr>
            @endforeach

        </div>
        <div class="text-right pr-5">
           <div>
            <h1 class="font-medium text-xl"> Final price :</h1>

        </div>
    </div>
</body>

</html>
