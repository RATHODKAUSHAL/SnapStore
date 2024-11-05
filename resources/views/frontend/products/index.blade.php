<style>
    /* Hide scrollbar for Chrome, Safari, and Opera */
    #productContainer::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge, and Firefox */
    #productContainer {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
    }
</style>

<div class="mt-10 mx-6">
    <div class="bg-yellow-200 p-4 rounded-sm relative">
        <h1 class="text-2xl font-bold">Blockbuster Deals</h1>

        <!-- Left and Right Scroll Buttons -->
        <button id="scrollLeft" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full z-10">
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <button id="scrollRight" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full z-10">
            <i class="fa-solid fa-angle-right"></i>
        </button>

        {{-- card section --}}
        <div id="productContainer" class="flex flex-nowrap gap-4 mt-3 overflow-x-auto scroll-smooth"> 
            @foreach ($products as $product)
            <!-- Wrap product card in a clickable link -->
            <a href="{{ route('products.show', $product) }}" class="bg-white p-3 w-64 flex-none flex flex-col rounded-md hover:shadow-lg transition-shadow duration-300"> <!-- Adjust width to fit more cards -->
                <div class="">
                    <img class="w-44 h-48" src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}">
                </div>
                <div class="flex flex-row gap-2 mt-2">
                    <button class="bg-red-700 rounded-md p-1 text-sm text-white">-{{ $product->product_discount }}% off</button>
                    <p class="text-red-700 text-sm font-medium">Great Indian festival</p>
                </div>
                <div class="mt-2">
                    <p class="text-base">
                        ₹{{$product->final_price }}
                        <del class="text-[10px]">₹{{ $product->product_price }}</del>
                    </p>
                    <p class="text-[12px]">{{ $product->product_name }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

<!-- Add JavaScript for Sliding Functionality -->
<script>
    const productContainer = document.getElementById('productContainer');
    const scrollLeftButton = document.getElementById('scrollLeft');
    const scrollRightButton = document.getElementById('scrollRight');

    scrollLeftButton.addEventListener('click', () => {
        productContainer.scrollBy({
            left: -300, // Scroll left by 300px
            behavior: 'smooth'
        });
    });

    scrollRightButton.addEventListener('click', () => {
        productContainer.scrollBy({
            left: 300, // Scroll right by 300px
            behavior: 'smooth'
        });
    });
</script>
