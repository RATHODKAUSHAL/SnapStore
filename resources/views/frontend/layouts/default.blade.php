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

    <style>
        .account-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            min-width: 300px;
            border-radius: 5px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 50;
            transition: opacity 0.3s ease;
            opacity: 0;
        }

        .account-section:hover .account-dropdown {
            display: block;
            opacity: 1;
        }

        .account-dropdown a {
            padding: 10px 8px;
            display: flex;
            align-items: center;
            border-radius: 4px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .account-dropdown a:hover {
            color: #FF8C00;
            background-color: #f3f4f6;
            text-decoration: none;
        }

        .account-section {
            position: relative;
        }
    </style>
</head>

<body>

    <div class='h-16 bg-gray-900 w-full flex items-center p-4 shadow-lg'>
        <nav class='flex items-center justify-between w-full'>
            <img class='h-14 w-20' src="{{ asset('assets/img/SnapStore.png') }}" alt="SnapStore" />

            {{-- Location Section --}}
            <div class='flex items-center text-white space-x-2'>
                <i class="fa-solid fa-location-dot"></i>
                <div class='flex flex-col'>
                    <p class='text-[11px]'>Delivering to Ahmedabad</p>
                    <p class='font-bold cursor-pointer hover:underline text-sm'>Update Your Location</p>
                </div>
            </div>

            {{-- Search Section --}}
            <div
                class='flex items-center flex-grow mx-4 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500'>
                <select data-url="{{ route('find.category') }}" name="category_name" id="category_name"
                    class='bg-gray-300 text-sm text-black py-[10px] gap-2 px-4 rounded-l-md flex items-center hover:bg-gray-400 transition duration-200'>
                    <option class="bg-white" value="All category">All</option>
                    @foreach ($category as $category)
                        <option class="bg-white" value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <input type="text" class='h-10 w-full px-3 border border-gray-300'
                    placeholder='Search in SnapStore' />
                <button
                    class='bg-orange-500 text-white py-3 px-4 rounded-r-md flex items-center hover:bg-orange-600 transition duration-200'>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

            {{-- Language Section --}}
            <div class='text-white flex items-center space-x-1'>
                <i class="fa-solid fa-sort-down"></i>
                <p>En</p>
                <img src="https://flagsapi.com/IN/flat/32.png">
            </div>

            {{-- Account Section with Dropdown --}}
            <div class='flex flex-col text-white text-right ml-4 account-section'>
                <div class="flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-sort-down"></i>
                    @auth
                        <a href="" class='text-sm'>Hello, {{ auth()->user()->last_name }}</a>
                    @endauth
                    @guest
                        <a href="{{ route('auth.login') }}" class='text-sm'>Hello, sign in</a>
                    @endguest
                </div>
                <p class='font-bold text-sm hover:underline cursor-pointer'>Account & Lists</p>

                <!-- Dropdown Menu -->
                <div class="account-dropdown bg-white text-gray-800">
                    <div class="flex flex-row p-4">
                        <div class="border-r px-6 py-4">
                            <p class="text-base font-semibold">Your List</p>
                            <div class="text-[11px] space-y-2">
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-user"></i> Your Account
                                </a>
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-heart"></i> Your Wishlist
                                </a>
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-star"></i> Recommendations
                                </a>
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-bell"></i> Product Alerts
                                </a>
                                <a href="" class="flex items-center gap-1 hover:text-orange-500">
                                    <i class="fa-solid fa-crown"></i>Prime Membership
                                </a>
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-video"></i> Prime Video
                                </a>
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-box"></i> Subscribed Items
                                </a>
                            </div>
                        </div>
                        <div class="pl-4">
                            <div class="border-b">
                                <p class="text-base font-semibold">Your Profile</p>
                                <p class="text-[11px] text-gray-600">Switch Account</p>
                                <a href="{{ route('auth.logout') }}"
                                    class="text-sm text-red-500 hover:underline">Logout</a>
                            </div>
                            <div class="text-[11px] space-y-2">
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-user"></i> Your Account
                                </a>
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-heart"></i> Your Wishlist
                                </a>
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-star"></i> Recommendations
                                </a>
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-bell"></i> Product Alerts
                                </a>
                                <a href="" class="flex items-center gap-1 hover:text-orange-500">
                                    <i class="fa-solid fa-crown"></i>Prime Membership
                                </a>
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-video"></i> Prime Video
                                </a>
                                <a href="" class="flex items-center gap-2 hover:text-orange-500">
                                    <i class="fa-solid fa-box"></i> Subscribed Items
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Cart Section --}}
            <div>
                <a href="{{ route('cart.index') }}"
                    class='text-white text-lg flex items-center gap-2 hover:underline'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    Cart
                </a>
            </div>
        </nav>
    </div>

    <nav class='h-10 bg-gray-800 w-full flex items-center text-white pl-2'>
        <div class='flex flex-row items-center justify-center'>
            <ul class='flex flex-row gap-4 cursor-pointer'>
                <li class="hover:underline hover:text-orange-500">All</li>
                <li class="hover:underline hover:text-orange-500">MX Player</li>
                <li class="hover:underline hover:text-orange-500">sell</li>
                <li class="hover:underline hover:text-orange-500">Best Seller</li>
                <li class="hover:underline hover:text-orange-500">Today's Deals</li>
                <li class="hover:underline hover:text-orange-500">Mobile</li>
                <li class="hover:underline hover:text-orange-500">Electronics</li>
                <li class="hover:underline hover:text-orange-500">Home & Kitchen</li>
                <li class="hover:underline hover:text-orange-500">Prime</li>
                <li class="hover:underline hover:text-orange-500">Customer Service</li>
                <li class="hover:underline hover:text-orange-500">Fashion</li>
                <li class="hover:underline hover:text-orange-500">New Releases</li>
                <li class="hover:underline hover:text-orange-500">Amazon Pay</li>
                <li class="hover:underline hover:text-orange-500">Computer</li>
            </ul>
        </div>
    </nav>

    @yield('content')
    @include('frontend.products.index')
    @include('frontend.footer.index')
</body>

</html>
