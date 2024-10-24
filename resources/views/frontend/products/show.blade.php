
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
        <a href="{{ route('dashboard') }}"><img class='h-14 w-20' src="{{ asset('assets/img/SnapStore.png') }}" alt="SnapStore" /></a>

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

{{-- peoduct section --}}
<form action="{{ route('cart.store',  $product->id) }}" method="POST">

    @csrf
<div>
    <div>
        <div class="m-4">
            <p class="text-gray-600 text-sm">{{ $product->category->category_name }} > {{ $product->product_name }}</p>
        </div>
        <div>
            <div class="flex flex-row">
                <img class="m-5" src="{{ asset( $product->product_image ) }}" alt="">
                <div class="text-2xl font-medium">
                    <p>
                        {{ $product->product_description }}
                    </p>
                    <a href="https://www.apple.com/in/store" class="text-blue-500 underline text-[10px]" target="_black">
                        visit the {{ $product->company_name }} Store
                    </a>
                    <p class="text-sm">4.6 <i class="fa-solid fa-star" style="color: #f05400;"></i><i class="fa-solid fa-star" style="color: #f05400;"></i><i class="fa-solid fa-star" style="color: #f05400;"></i><i class="fa-solid fa-star" style="color: #f05400;"></i><i class="fa-solid fa-star-half-stroke" style="color: #f05400;"></i></p>
                    <button class="bg-gray-800 text-[10px] text-white flex flex-row  rounded-sm">Snapstore's<p class="text-orange-600"> choice</p></button>
                    <p class="text-sm my-2">5K+ bought in past month</p>
                    <hr>    
                    <div>
                        <button class="bg-red-700 text-white text-sm p-1 rounded-md">great indian festival</button>
                        <div class="flex flex-row gap-2 my-2">
                            <p class="text-red-700 font-normal">-{{ $product->product_discount }}%</p>
                        <p>₹{{ $product->final_price }}.00</p>
                        </div>
                        <del class="text-sm font-normal">₹{{ $product->product_price }}</del>
                    </div>
                    <div class="my-3">
                        <p class="text-sm font-normal">inclusive of all taxes</p>
                        <p class="text-sm font-normal">EMI staring at ₹2499. no cost EMI available</p>
                    </div>
                    <hr>
                    
                    <div class="flex flex-row">
                        
                        <div class="h-10  w-24">
                            <i class="fa-solid fa-box-archive text-lg" style="color: #f56e00;"></i>
                            <p class="text-sm font-normal">7  days service center Replacement </p>
                        </div>
                        <div class="h-10  w-24">
                            <i class="fa-solid fa-truck-fast" style="color: #f56e00;"></i>
                            <p class="text-sm font-normal">fast delivery</p>
                        </div>
                        <div class="h-10  w-24">
                            <i class="fa-solid fa-shield" style="color: #f56e00;"></i>
                            <p class="text-sm font-normal">1 year warrany</p>
                        </div>
                        <div class="h-10  w-24">
                            <i class="fa-solid fa-award" style="color: #f56e00;"></i>
                            <p class="text-sm font-normal">Top brand</p>
                        </div>
                        <div class="h-10  w-24">
                            <i class="fa-solid fa-screwdriver-wrench" style="color: #f56e00;" ></i>
                            <p class="text-sm font-normal">Installation available</p>
                        </div>
                        <div class="h-10  w-24">
                            <i class="fa-solid fa-truck-ramp-box" style="color: #f56e00;"></i>
                            <p class="text-sm font-normal">Snapstore Deliver</p>
                        </div>
                        <div class="h-10  w-24">
                            <i class="fa-solid fa-lock" style="color: #f56e00;"></i>
                            <p class="text-sm font-normal">Secure transction</p>
                        </div>
                    </div>
                    
                        <div class="mt-20">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="px-10 p-2 bg-yellow-500 hover:bg-yellow-400 rounded-full text-lg text-white">Add to cart</button>
                            <a href="" class="px-10 p-2 bg-orange-600 hover:bg-orange-500 rounded-full text-lg text-white">Buy Now</a>
                        </div> 
                    
                </div>
                <div class="w-2/5 border left-10 mr-5 rounded-md">
                    <div class="bg-gray-300  p-5 border-b border-gray-400 ">
                        <p class=" font-medium">With Exchange</p>
                        <p class="text-red-500 text-sm">Up to ₹11,990.00 off</p>
                        
                    </div>
                </div>
                <div>

                </div>
                
            </div>  
           
        </div>
    </div>      
</div>
</form>

</body>

</html>