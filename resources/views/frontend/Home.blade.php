@extends('frontend.layouts.default')

@section('content')

<div class='relative flex flex-col'>
    {{-- {/* Multiple Promotion Cards */} --}}
    <div class='absolute top-3/4 left-5 transform -translate-y-1/2 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 z-20'>
      {{-- {cardsData.map((card) => ( --}}
        <div 
          {{-- key={card.id}  --}}
          class='bg-white border border-gray-200 shadow-lg w-72 p-5 rounded-lg transition-transform transform hover:scale-105 hover:shadow-xl duration-300'>
          <h1 class='text-base font-bold mb-2'> Great Indian festival | New deals added everyday</h1>
          <img src="{{ asset('assets/img/festival_diwali.jpg') }}" alt="" class='mt-4 rounded-md' /> {{--  --}}
          <a 
            href={card.link} 
            class='text-blue-600 mt-4 inline-block font-semibold hover:underline'>
            Explore Now
          </a>
        </div>
      {{-- ))} --}}
    </div>

    {{-- {/* Background Image */} --}}
    <div class='relative w-full h-auto'>
      {{-- {/* Image */} --}}
      <img class='w-full h-[600px] object-cover z-0' src="{{ asset('assets/img/home_diwali.jpg') }}" alt="Home Diwali" /> {{-- {home_diwali} --}}
      
      {{-- {/* Gradient Background starting from image bottom to white */} --}}
      <div 
        class='absolute bottom-0 w-full h-80 bg-gradient-to-b from-purple-800 to-white z-10'
        {{-- style={{ top: '100%' }} --}}
      ></div>
    </div>
    
  </div>

    
@endsection