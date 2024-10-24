@extends('admin.layouts.default')

@section('main')
<div class="container mx-auto px-4">
    <!-- Header Section -->
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-8">
        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-semibold text-gray-600">
                @if(@$products)
                            Update Product
                        @else
                            Create Product
                        @endif
            </h1>
            <div class="flex items-center gap-2 text-sm font-medium text-gray-600">
                <!-- Add any additional information here -->
            </div>
        </div>
        <div class="flex items-center gap-3">
            <!-- Add optional buttons or links here -->
        </div>
    </div>

    <!-- State Form Section -->
    <div class="bg-white border shadow-lg rounded-lg p-6">
        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-600">
                @if(@$products)
                    Update Product
                @else
                    Create Product
                @endif
            </h3>
        </div>

        <form method="POST" action="@if(@$products) {{route('product.update', $products)}} @else {{ route('product.store') }} @endif" enctype="multipart/form-data"> 
            
            
            <!-- Input Fields Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                @csrf
            @if (@$products)
            {{ method_field('PUT') }}
        @endif
                <div>
                    <label for="product_name" class="block text-sm font-medium text-gray-500 mb-2">Product Name</label>
                    <input  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="product_name" name="product_name" type="text" value="{{ old('product_name', @$products->product_name) }}" placeholder="Enter a Product Name"/> 
                    @if ($errors->has('product_name'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('product_name') }}</p>
                    @endif
                </div>
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-500 mb-2">Company Name</label>
                    <input  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="company_name" name="company_name" type="text" value="{{ old('company_name', @$products->company_name) }}" placeholder="Enter company Name"/> 
                    @if ($errors->has('company_name'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('company_name') }}</p>
                    @endif
                </div>
                {{-- category ID via name --}}
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-500 mb-2">Company Category</label>
                    <select  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="category_id" name="category_id" type="text" value="{{ old('category_id', @$products->category_id) }}" placeholder="Enter company Name" required>
                           <option value="select category">select category</option>
                            @foreach ($category as $Category)
                                <option value="{{ $Category->id }}">{{ $Category->category_name }}</option>
                            @endforeach
                        </select> 
                    @if ($errors->has('category_id'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('category_id') }}</p>
                    @endif
                </div>
                <div>
                    <label for="product_size" class="block text-sm font-medium text-gray-500 mb-2">Product Size</label>
                    <input  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="product_size" name="product_size" type="text" value="{{ old('product_size', @$products->product_size) }}" placeholder="Enter Product Size"/> 
                    @if ($errors->has('product_size'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('product_size') }}</p>
                    @endif
                </div>
                <div>
                    <label for="product_model" class="block text-sm font-medium text-gray-500 mb-2">Product Model</label>
                    <input  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="product_model" name="product_model" type="text" value="{{ old('product_model', @$products->product_model) }}" placeholder="Enter Product Model"/> 
                    @if ($errors->has('product_model'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('product_model') }}</p>
                    @endif
                </div>
                <div>
                    <label for="product_price" class="block text-sm font-medium text-gray-500 mb-2">Product Price</label>
                    <input  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="product_price" name="product_price" type="text" value="{{ old('product_price', @$products->product_price) }}" placeholder="Enter Product Model"/> 
                    @if ($errors->has('product_price'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('product_price') }}</p>
                    @endif
                </div>
                <div>
                    <label for="product_image" class="block text-sm font-medium text-gray-500 mb-2">Product Image</label>
                    <input  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="product_image" name="product_image" type="file" value="{{ old('product_image', @$products->product_image) }}" placeholder="Enter Product Model"/> 
                    @if ($errors->has('product_image'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('product_image') }}</p>
                    @endif
                </div>
                <div>
                    <label for="product_discount" class="block text-sm font-medium text-gray-500 mb-2">Product Discount</label>
                    <input  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="product_discount" name="product_discount" type="text" value="{{ old('product_discount', @$products->product_discount) }}" placeholder="Enter Product Discount"/> 
                    @if ($errors->has('product_discount'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('product_discount') }}</p>
                    @endif
                </div>
                <div>
                    <label for="final_price" class="block text-sm font-medium text-gray-500 mb-2">Final Price</label>
                    <input  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="final_price" name="final_price" type="text" value="{{ old('final_price', @$products->final_price) }}" placeholder="Enter Product Final Price"/> 
                    @if ($errors->has('final_price'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('final_price') }}</p>
                    @endif
                </div>
                <div>
                    <label for="product_description" class="block text-sm font-medium text-gray-500 mb-2">Product Description</label>
                    <textarea  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="product_description" name="product_description" type="text" value="{{ old('product_description', @$products->product_description) }}" placeholder="Enter Product Model"></textarea> 
                    @if ($errors->has('product_description'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('product_description') }}</p>
                    @endif
                </div>
                <div>
                    <label for="product_rating" class="block text-sm font-medium text-gray-500 mb-2">ratings</label>
                    <textarea  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="product_rating" name="product_rating" type="text" value="{{ old('product_rating', @$products->product_rating) }}" placeholder="Enter Product Model"></textarea> 
                    @if ($errors->has('product_rating'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('product_rating') }}</p>
                    @endif
                </div>
            </div>

            <!-- Action Buttons Section -->
            <div class="mt-6">
                <div class="flex gap-3">
                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save
                    </button>
                    <a href="{{ route('product.index') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                        Back
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
