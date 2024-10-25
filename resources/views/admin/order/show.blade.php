@extends('admin.layouts.default')

@section('main')
<div id="productContainer" class="flex flex-nowrap gap-4 mt-3 overflow-x-auto scroll-smooth"> 
    @foreach ($order as $orders)
    <!-- Wrap product card in a clickable link -->
    <a  class="bg-white p-3 w-64 flex-none flex flex-col rounded-md hover:shadow-lg transition-shadow duration-300"> <!-- Adjust width to fit more cards -->
        <div class="">
            <img class="w-full h-auto" src="" alt="">
        </div>
        <div class="flex flex-row gap-2 mt-2">
            <button class="bg-red-700 rounded-md p-1 text-sm text-white">-% off</button>
            <p class="text-red-700 text-sm font-medium">Great Indian festival</p>
        </div>
        <div class="mt-2">
            <p class="text-base">
                {{-- ₹{{$order->final_price }} --}}
                <del class="text-[10px]"></del>
            </p>
            <p class="text-[12px]"></p>
        </div>
    </a>
    @endforeach
</div>
@endsection