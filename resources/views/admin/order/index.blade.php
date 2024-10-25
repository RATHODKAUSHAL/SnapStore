@extends('admin.layouts.default')

@section('main')

<div class="container mx-auto px-4">
    <!-- Header Section -->
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7">
        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-semibold text-gray-900">
                Orders
            </h1>
            <div class="flex items-center gap-2 text-sm font-medium text-gray-600">
                <!-- Optional additional information can go here -->
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="grid gap-6 lg:gap-8 border rounded-md">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-800">
                    Orders
                </h3>
                <td class="px-4 py-2 w-4 border text-left">
                    <div class="flex items-center gap-4 ">
                        <div class="relative">
                            <button class="flex items-center focus:outline-none" >
                                <img class="w-5" src=""
                                    alt="">Filter
                            </button>
                            <!-- Action buttons -->
                            <div class="absolute w-64 h-auto right-10 hidden bg-white shadow-lg rounded-md action-buttons p-3 mr-6">
                                <form action="" method="GET" enctype="multipart/form-data" id="filter_form">
                                    {{-- {{ route('admin.cities.index') }} --}}
                                    <div class="flex flex-row p-3">
                                        <div class="flex flex-col gap-2 justify-between">
                                            <label class="text-sm" for="city_name">City Name</label>
                                            <input class="border border-gray-900 w-full rounded-md" type="text" id="city_name" name="city_name"
                                                value=""> {{-- {{ request()->city_name }} --}}
                                        </div>
                                    </div>
                            
                                    <div class="flex flex-col p-3">
                                        <label for="state_id">State Name</label>
                                        <select id="select_state" name="state_id" class="border border-gray-900 rounded-md"
                                            data-placeholder="Search state">
                                            <option value="">Select State</option>
                                            {{-- @foreach ($states as $state)
                                                <option value="{{ $state->id }}" {{ request()->state_id == $state->id ? 'selected' : '' }}>
                                                    {{ $state->state_name }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                            
                                    <div class="flex flex-row items-center gap-3 p-2">
                                        <button type="submit" class="btn btn-sm border border-blue-700 btn-primary">Filter</button>
                                        <a href="" class="btn btn-sm border border-gray-300 rounded-md bg-gray-200 p-[5px]">
                                            {{-- {{ route('admin.cities.index') }} --}}
                                            Reset
                                        </a>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </td>
            </div>
            <div class="p-4">
                <div data-datatable="true" id="city_table" data-datatable-page-size="20" data-datatable-state-save="true">
                    <div>
                        <table class="min-w-full table-fixed border text-gray-600  text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 border text-left w-5">
                                        <span class="cursor-pointer">
                                            #
                                        </span>
                                    </th>
                                    <th class="px-4 py-2  text-left border min-w-[150px]">
                                        <span class="cursor-pointer">
                                            Orders
                                        </span>
                                    </th>
                                    <th class="px-4 py-2  text-left border min-w-[150px]">
                                        <span class="cursor-pointer">
                                            See Orders
                                        </span>
                                    </th>
                                    <th class="px-4 py-2  w-24  text-left">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @if (count($orders) == 0)
                                
                                    <tr>
                                        <td colspan="9" class="text-center">There is no record available.</td>
                                    </tr>
                                @else
                                    @foreach ($orders as $key=>$order)
                                        <tr class="text-gray-500" draggable="true" ondragstart="drag(event)" id="row-{{ $order->id }}">
                                            <td class="px-7 py-4 border-b font-medium  text-left w-5">
                                                {{ $key + 1 }}
                                            </td>
                                            <td class="px-7 py-4  text-left font-medium border  min-w-[150px]">
                                                {{ $order->user->first_name }} {{ $order->user->last_name }} 

                                            </td>
                                            <td class="px-7 py-4  text-left font-medium border  min-w-[150px]">
                                                 <a href="{{ route('order.show', $order->id) }}" class="px-4 py-2 bg-orange-600 text-white text-sm font-semibold rounded-lg hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500">Orders</a>

                                            </td>
                                            <td class="px-4 py-2 w-4 border text-left">
                                                <div class="flex items-center gap-4 ">
                                                    <div class="relative">
                                                        <button class="flex items-scenter focus:outline-none"
                                                        onclick="toggleActions(event)"> 
                                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                        </button>
                                                        <!-- Action buttons -->
                                                        <div
                                                            class="absolute w-32 right-10 hidden bg-white shadow-lg rounded-md action-buttons">
                                                            <form
                                                                action="" {{-- {{ route('admin.cities.destroy', $city->id) }} --}}
                                                                method="POST" class="block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="flex flex-row p-3">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                    <button type="submit"
                                                                        class="w-full font-medium text-left px-4  text-gray-800">Remove</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="flex justify-between items-center p-4 text-gray-600 text-sm">
                        <div class="flex items-center gap-2">
                            <span>Show</span>
                            <select data-datatable-size="true" name="perpage"
                                class="w-16 px-2 py-1 border border-gray-300 rounded focus:ring focus:ring-indigo-500">
                                <option value="5"  {{ request()->perpage == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request()->perpage == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ request()->perpage == 20 ? 'selected' : '' }}>20</option>
                            </select>
                            Per Page
                        </div>
                        <div class="flex items-center gap-4">
                            <span>Showing {{ $cities->firstItem() }} to {{ $cities->lastItem() }} of {{ $cities->total() }}
                                cities</span>
                            <!-- Render pagination links -->
                            {{ $cities->links('pagination::tailwind') }}
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection