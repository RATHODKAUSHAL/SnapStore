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
                    {{-- @foreach ($category as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach --}}
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
                <button class='text-white text-lg flex items-center gap-2 hover:underline'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    Cart {{-- <ShoppingCartOutlinedIcon sx={{ fontSize: 30 }} /> --}}
                </button>
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

    <footer>
        <section class="bg-gray-700 h-10 flex items-center text-white justify-center cursor-pointer">
            <p>Back To Top</p>
        </section>
        <section class="bg-gray-800 flex items-center text-white justify-center  gap-20 p-10">
            <div>
                <h1 class="font-bold">Get to know Us</h1>
                <ul>
                    <li>About Snapshore</li>
                    <li>career</li>
                    <li>news release</li>
                    <li>Snapstore Science</li>
                </ul>
            </div>
            <div>
                <h1 class="font-bold">Connect With Us</h1>
                <ul>
                    <li>Facebook</li>
                    <li>instagram</li>
                    <li>Github</li>
                    <li>Twitter</li>
                </ul>
            </div>
            <div>
                <h1 class="font-bold">Make Money With Us</h1>
                <ul>
                    <li>Sell on Snapshore</li>
                    <li>Sell under Snapshore Accelerator</li>
                    <li>Protect and Build Your Brand</li>
                    <li>Snapshore Global Selling</li>
                    <li>Supply to Snapshore</li>
                    <li>Become an Affiliate
                        Fulfilment by Snapshore</li>
                    <li>Advertise Your Products</li>
                    <li>Amazon Pay on Merchants
                    </li>
                </ul>
            </div>
            <div>
                <h1 class="font-bold">Let Us Help You</h1>
                <ul>
                    <li>Your Account</li>
                    <li>Returns Centre</li>
                    <li>Recalls and Product Safety Alerts</li>
                    <li>100% Purchase Protection</li>
                    <li>Snapshore App Download</li>
                    <li>Help</li>
                </ul>
            </div>
        </section>
        <section class="bg-gray-700 border-gray-500 border-t  text-white h-20 flex gap-5 items-center justify-center">
            <div>
                <img class="h-14 w-20" src="{{ asset('assets/img/SnapStore.png') }}" alt="Snapstore">
            </div>
            <button class="border rounded-md p-2">
                <i class="fa-solid fa-globe"></i>
                English
            </button>
            <button class="border rounded-md p-2">
                <i class="fa-solid fa-globe"></i>
                india
            </button>
        </section>
        <section class="bg-gray-800 p-10 flex-col flex text-[10px] gap-4 items-center justify-center text-gray-400">
            <div class="flex items-center justify-between w-1/2">
                <div>
                    <h1 class="font-bold">AbeBooks</h1>
                    <p>AbeBooks
                        Books, art</p>
                    <p>& collectibles</p>
                </div>
                <div>
                    <h1 class="font-bold">Snapshore Web Services</h1>
                    <p>Scalable Cloud</p>
                    <p>Computing Services</p>
                </div>
                <div>
                    <h1 class="font-bold">Audible</h1>
                    <p>Download
                    </p>
                    <p>Audio Books</p>
                </div>
                <div>
                    <h1 class="font-bold">IMDb</h1>
                    <p>Movies, TV
                    </p>
                    <p>& Celebrities</p>
                </div>
            </div>
            <div class="flex items-center justify-between w-1/2">
                <div>
                    <h1 class="font-bold">Shopbop</h1>
                    <p>Designer</p>
                    <p>Fashion Brands</p>
                </div>
                <div>
                    <h1 class="font-bold">Snapshore Business</h1>
                    <p>Everything For</p>
                    <p>Your Business</p>
                </div>
                <div>
                    <h1 class="font-bold">Audible</h1>
                    <p>Download</p>
                    <p>Audio Books</p>
                </div>
                <div>
                    <h1 class="font-bold">IMDb</h1>
                    <p>Movies, TV</p>
                    <p>& Celebrities</p>
                </div>
            </div>
            <div class="text-sm text-gray-400 p-3">
                <p>Conditions of Use & Sale Privacy Notice
                </p>
                <p>Interest-Based Ads
                    © 1996-2024, Amazon.com, Inc. or its affiliates.</p>
            </div>
        </section>
    </footer>
</body>

</html>


