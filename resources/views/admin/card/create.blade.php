@extends('admin.layouts.default')

@section('main')
<div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-8">
        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-semibold text-gray-700">
                @if(@$card)
                    Update Card
                @else
                    Create Card
                @endif
            </h1>
        </div>
    </div>

    <div class="bg-white border shadow-lg rounded-lg p-6">
        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-700">
                @if(@$card)
                    Update Card
                @else
                    Create Card
                @endif
            </h3>
        </div>

        <form method="POST" action="{{ route('card.store') }}" enctype="multipart/form-data">
            {{-- @if(@$card) {{ route('card.update', $card) }} @else  @endif  --}}
            @csrf
            @if (@$card)
                {{ method_field('PUT') }}
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card Heading Selection (Multiple) -->
                <div>
                    <label for="card_heading" class="block text-sm font-medium text-gray-500 mb-2">Card Heading</label>
                    <select 
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        id="card_heading" 
                        name="card_heading"      
                        required    
                        onchange="updateSelectedItems()">
                        @foreach ($cardheading as $Cardheading)
                            <option value="{{ $Cardheading->id }}">{{ $Cardheading->card_heading }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('card_heading'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('card_heading') }}</p>
                    @endif
                </div>

                <!-- Product Selection (Multiple) -->
                <div>
                    <label for="product" class="block text-sm font-medium text-gray-500 mb-2">Product</label>
                    <select 
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        id="product" 
                        name="product[]" 
                        multiple="multiple"
                        required
                        onchange="updateSelectedItems()">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" 
                                data-name="{{ $product->product_name }}"
                                data-image="{{ $product->product_image }}"
                                data-description="{{ $product->product_model }}">
                                {{ $product->product_name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('product'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('product') }}</p>
                    @endif
                </div>
            </div>

            <!-- Action Buttons Section -->
            <div class="mt-6 flex gap-3 flex-wrap">
                <button type="submit" class="inline-flex justify-center px-6 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save
                </button>
                <a href="{{ route('card.index') }}" class="inline-flex justify-center px-6 py-3 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                    Back
                </a>
            </div>
        </form>
    </div>

    <!-- Display Selected Headings and Products -->
    <div id="selectedItems" class="mt-10 p-6 bg-white border shadow-lg rounded-lg hidden">
        <h3 class="text-lg font-medium text-gray-700 mb-4">Selected Headings and Products</h3>

        <!-- Selected Card Headings -->
        <h4 class="text-md font-medium text-gray-700 mt-4">Selected Card Headings</h4>
        <ul id="selectedHeadings" class="font-medium pl-5 text-gray-600"></ul>
        
        <!-- Selected Products -->
        <div id="selectedProducts" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-4"></div>
    </div>
</div>

<script>
    function updateSelectedItems() {
        const productSelect = document.getElementById('product');
        const headingSelect = document.getElementById('card_heading');
        const selectedHeadings = document.getElementById('selectedHeadings');
        const selectedProducts = document.getElementById('selectedProducts');
        const selectedItemsDiv = document.getElementById('selectedItems');

        // Clear previous selections
        selectedHeadings.innerHTML = '';
        selectedProducts.innerHTML = '';

        // Display selected headings
        let selectedHeadingOptions = Array.from(headingSelect.selectedOptions);
        selectedHeadingOptions.forEach(option => {
            let p = document.createElement('p');
            p.classList.add('text-gray-700');
            p.textContent = option.text;
            selectedHeadings.appendChild(p);
        });

        // Display selected products with details
        let selectedProductOptions = Array.from(productSelect.selectedOptions);
        selectedProductOptions.forEach(option => {
            let productDiv = document.createElement('div');
            productDiv.classList.add('border', 'rounded', 'p-4', 'shadow-sm', 'bg-gray-100', 'flex', 'flex-col', 'items-center', 'text-center');

            // Product Name
            let productName = document.createElement('h5');
            productName.classList.add('text-sm', 'font-medium', 'text-gray-700');
            productName.textContent = option.getAttribute('data-name');
            productDiv.appendChild(productName);

            // Product Image
            let productImage = document.createElement('img');
            productImage.classList.add('mt-2', 'w-20', 'h-28', 'object-cover', 'rounded-md');
            productImage.src = option.getAttribute('data-image');
            productDiv.appendChild(productImage);

            // Product Description
            let productDescription = document.createElement('p');
            productDescription.classList.add('mt-2', 'text-xs', 'text-gray-600');
            productDescription.textContent = option.getAttribute('data-description');
            productDiv.appendChild(productDescription);

            selectedProducts.appendChild(productDiv);
        });

        // Show the selection section if there are any selected items
        selectedItemsDiv.style.display = (selectedHeadingOptions.length || selectedProductOptions.length) ? 'block' : 'none';
    }
</script>
@endsection
