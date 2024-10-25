@extends('components.layouts.main2')
@include('components.partials.sidebar')

@section('container')
<section class="pl-24 pr-20 my-10 ml-56 flex-grow">
    <div class="justify-between items-center">
        <h1 class="text-[42px] font-bold">View Activity by Category</h1>
        @include('components.partials.activitybar')
    </div>

    <div>
        <form action="{{ route('activity.filter') }}" method="GET">
            <input type="hidden" name="filter_type" value="category">
            <div class="mb-4 mt-5">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                <select id="category" name="filter_value" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Choose Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="rounded-md bg-[#0045A4] w-[110px] h-[40px] flex items-center justify-center text-[18px] text-white">
                Check
            </button>
        </form>
    </div>

    <div>
        @foreach($notes as $note)
            <a href="">
                <div class="bg-white mt-5 p-5 rounded-xl shadow-md flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-semibold">{{ $note->problem }}</h3>
                        <p class="text-xl">{{ $note->activity }}</p>
                        <p class="mt-3">Date: {{ $note->date }}</p>
                    </div>
                    <div class="bg-gray-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                        {{ ucfirst($note->status) }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>
@endsection
