@extends('admin.layouts.default')

@section('main')
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-8">
            <div class="flex flex-col gap-2">
                <h1 class="text-2xl font-semibold text-gray-600">
                    @if (@$heading)
                        Update Card
                    @else
                        Create Card
                    @endif
                </h1>
            </div>
        </div>

        <!-- State Form Section -->
        <div class="bg-white border shadow-lg rounded-lg p-6">
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-600">
                    @if (@$heading)
                        Update Card
                    @else
                        Create Card
                    @endif
                </h3>
            </div>

            <form method="POST" action="@if(@$heading) {{route('heading.update', $heading)}} @else {{ route('heading.store') }} @endif">
                @csrf
                @if (@$heading)
                    {{ method_field('PUT') }}
                @endif

                <!-- Input Fields Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                    <div class="flex flex-col">
                        <div>
                            <label for="card_heading" class="block text-sm font-medium text-gray-500 mb-2">Card
                                Heading</label>
                            <input
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="card_heading" name="card_heading" type="text"
                                value="{{ old('card_heading', @$heading->card_heading) }}"
                                placeholder="Enter a Card Heading" />
                            @if ($errors->has('card_heading'))
                                <p class="mt-2 text-sm text-red-600">{{ $errors->first('card_heading') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Action Buttons Section -->
                <div class="mt-6">
                    <div class="flex gap-3">
                        <button type="submit"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save
                        </button>
                        <a href="{{ route('heading.index') }}"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                            Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
