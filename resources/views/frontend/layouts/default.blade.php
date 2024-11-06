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

<body>

    <div class='h-16 bg-gray-900 w-full flex items-center p-4 shadow-lg'>
        <nav class='flex items-center justify-between w-full'>
            <img class='h-14 w-20' src="{{ asset('assets/img/SnapStore.png') }}" alt="SnapStore" />

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
                <select
                data-url="{{ route('find.category') }}"
                name="category_name" id="category_name"
                    class='bg-gray-300 text-sm text-black py-[10px] gap-2 px-4 rounded-l-md flex items-center hover:bg-gray-400 transition duration-200'>
                    <option value="All category">All</option>
                    @foreach ($category as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                <i class="fa-solid fa-sort-down"></i>
                <p>En</p>
                <img src="https://flagsapi.com/IN/flat/32.png">
                {{-- <ArrowDropDownIcon /> --}}
                {{-- <i class="fa-solid fa-globe"></i>   --}}
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
    @yield('content')
    @include('frontend.products.index')
    @include('frontend.footer.index')
</body>

</html>


