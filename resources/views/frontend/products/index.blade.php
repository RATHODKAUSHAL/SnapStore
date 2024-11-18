<style>
    /* Hide scrollbar across all browsers */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
    }
</style>

<div class="mt-14 mx-6 space-y-12">
    <div class="bg-yellow-200 p-5 rounded-xl shadow-lg relative">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Blockbuster Deals</h1>

        <!-- Scroll Buttons -->
        <button id="scrollLeft-1"
            class="absolute bg-gradient-to-r from-gray-200 to-gray-400 hover:from-gray-300 hover:to-gray-500 border h-12 w-12 flex items-center justify-center left-1 top-1/2 transform -translate-y-1/2 text-black text-3xl rounded-full z-10 shadow-lg transition-all duration-300 ease-in-out">
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <button id="scrollRight-1"
            class="absolute bg-gradient-to-l from-gray-200 to-gray-400 hover:from-gray-300 hover:to-gray-500 border h-12 w-12 flex items-center justify-center right-1 top-1/2 transform -translate-y-1/2 text-black text-3xl rounded-full z-10 shadow-lg transition-all duration-300 ease-in-out">
            <i class="fa-solid fa-angle-right"></i>
        </button>

        <!-- Product Cards Section -->
        <div id="productContainer-1" class="flex flex-nowrap gap-6 mt-3 overflow-x-auto scroll-smooth no-scrollbar">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product) }}"
                    class="bg-white p-4 w-60 flex-none flex flex-col rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out transform">
                    <img class="w-full h-48 object-cover rounded-md" src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}">
                    <div class="flex items-center gap-2 mt-3">
                        <button class="bg-red-600 rounded-md px-3 py-1 text-xs text-white">-{{ $product->product_discount }}% Off</button>
                        <p class="text-red-600 text-sm font-semibold">Festival Deal</p>
                    </div>
                    <div class="mt-3">
                        <p class="text-lg font-semibold text-gray-900">₹{{ $product->final_price }}
                            <del class="text-xs text-gray-500 ml-2">₹{{ $product->product_price }}</del>
                        </p>
                        <p class="text-sm text-gray-600 mt-1 truncate">{{ $product->product_name }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- cards --}}
    <div class='left-6 right-10 transform  grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6'>
        @php
          $cardsData = [
              ['title' => 'Biggest Deal On | Headphones', 'img' => 'assets/img/Headphone.png', 'link' => '#', 'price' => '₹ 1999', 'dicount' => '50', 'final_price' => '₹ 999' ],
              ['title' => 'Laptops', 'img' => 'uplods/productImage/1729587799.png', 'link' => '#', 'price' => '₹ 999', 'dicount' => '20', 'final_price' => '₹ 799' ],
              ['title' => 'Books', 'img' => 'assets/img/Books.png', 'link' => '#', 'price' => '₹ 999', 'dicount' => '20', 'final_price' => '₹ 799' ],
              ['title' => 'Games', 'img' => 'assets/img/Games.png', 'link' => '#', 'price' => '₹ 999', 'dicount' => '20', 'final_price' => '₹ 799' ],
              ['title' => 'Gifts', 'img' => 'assets/img/Gift.png', 'link' => '#', 'price' => '₹ 999', 'dicount' => '20', 'final_price' => '₹ 799' ],
          ];
        @endphp
  
  @foreach($cardsData as $card)
  <a href="{{ $card['link'] }}" class='text-black mt-4 inline-block  font-semibold'>
          <div class='bg-white border border-gray-200 shadow-lg w-72 p-5 rounded-lg transition-transform transform  duration-300'>
            <h1 class='text-base font-bold mb-2'>{{ $card['title'] }}</h1>
            <img src="{{ asset($card['img']) }}" alt="{{ $card['title'] }}" class='mt-4 rounded-md' />
            <div class="flex flex-row gap-2 items-center">
                <p class="p-1 text-white w-20 text-sm text-center bg-red-600 rounded-full">-{{ $card['dicount'] }}% off</p>
            <p class="text-red-500 text-sm ">Deal Of the day</p>
            </div>
           <div class="flex flex-row gap-2 items-center">
            <p class="text-base">{{ $card['final_price'] }}</p>
            <del class="text-gray-500 text-[12px]">{{ $card['price'] }}</del>
           </div>
            </div>
        </a>
        @endforeach
      </div>

    <!-- Repeat for Additional Sections -->
    @foreach ($cardheading as $Cardheading)
    <div class="bg-gray-200 p-5 rounded-xl shadow-lg relative ">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $Cardheading->card_heading }}</h1>
        
        <!-- Scroll Buttons -->
        <button id="scrollLeft-{{ $Cardheading->id }}"
            class="absolute bg-gradient-to-r from-gray-200 to-gray-400 hover:from-gray-300 hover:to-gray-500 border h-12 w-12 flex items-center justify-center left-1 top-1/2 transform -translate-y-1/2 text-black text-3xl rounded-full z-10 shadow-lg transition-all duration-300 ease-in-out">
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <button id="scrollRight-{{ $Cardheading->id }}"
            class="absolute bg-gradient-to-l from-gray-200 to-gray-400 hover:from-gray-300 hover:to-gray-500 border h-12 w-12 flex items-center justify-center right-1 top-1/2 transform -translate-y-1/2 text-black text-3xl rounded-full z-10 shadow-lg transition-all duration-300 ease-in-out">
            <i class="fa-solid fa-angle-right"></i>
        </button>

        <!-- Product Cards Section -->
        <div id="productContainer-{{ $Cardheading->id }}" class="flex flex-nowrap gap-6 mt-3 overflow-x-auto scroll-smooth no-scrollbar">
           <div class="bg-white flex flex-row rounded-md"> @foreach ($Cardheading->products as $product)
            <a href="{{ route('products.show', $product) }}"
                class="p-4 w-60 flex-none flex flex-col rounded-lg  transition-shadow duration-300 ease-in-out transform">
                <img class="w-full h-48 object-cover rounded-md" src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}">
                <p class="text-sm font-mono text-center">{{ $product->product_name }}</p>
            </a>
        @endforeach</div>
        </div>
    </div>
    @endforeach
</div>

<script>
    // Scroll functionality for all sections
    document.querySelectorAll("[id^='scrollLeft']").forEach(button => {
        button.addEventListener('click', () => {
            const containerId = button.id.replace('scrollLeft', 'productContainer');
            document.getElementById(containerId).scrollBy({ left: -800, behavior: 'smooth' });
        });
    });

    document.querySelectorAll("[id^='scrollRight']").forEach(button => {
        button.addEventListener('click', () => {
            const containerId = button.id.replace('scrollRight', 'productContainer');
            document.getElementById(containerId).scrollBy({ left: 800, behavior: 'smooth' });
        });
    });
</script>
