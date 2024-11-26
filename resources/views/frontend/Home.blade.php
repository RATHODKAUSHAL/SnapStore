@extends('frontend.layouts.default')

@section('content')

<div class='relative flex flex-col'>
    {{-- Multiple Promotion Cards --}}
    <div class='absolute top-3/4 left-6 right-10 transform -translate-y-1/2 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 z-20'>
      @php
        $cardsData = [
            ['title' => 'Great Indian festival | New deals added everyday', 'img' => 'assets/img/festival_diwali.jpg', 'link' => '#'],
            ['title' => 'SnapStore Devices', 'img' => 'uplods/productImage/1729587799.png', 'link' => '#'],
            ['title' => 'Books', 'img' => 'assets/img/Books.png', 'link' => '#'],
            ['title' => 'Games', 'img' => 'assets/img/Games.png', 'link' => '#'],
            ['title' => 'Gifts', 'img' => 'assets/img/Gift.png', 'link' => '#']
        ];
      @endphp

      @foreach($cardsData as $card)
        <div class='bg-white border border-gray-200 shadow-lg w-72 p-5 rounded-lg transition-transform transform  duration-300'>
          <h1 class='text-base font-bold mb-2'>{{ $card['title'] }}</h1>
          <img src="{{ asset($card['img']) }}" alt="{{ $card['title'] }}" class='mt-4 rounded-md' />
          <a href="{{ $card['link'] }}" class='text-blue-600 mt-4 inline-block  font-semibold hover:underline'>
            Explore Now
          </a>
        </div>
      @endforeach
    </div>

    {{-- Background Image --}}
    <div class="relative w-full h-auto">
      <img class="w-full h-[600px] object-cover z-0" src="{{ asset('assets/img/header.jpg') }}" alt="Home Diwali" />
  
      {{-- Gradient Background --}}
      <div
          class="absolute bottom-0 w-full h-80 bg-gradient-to-b from-transparent via-black to-red-700 z-10">
      </div>
  </div>
  
</div>

@endsection
