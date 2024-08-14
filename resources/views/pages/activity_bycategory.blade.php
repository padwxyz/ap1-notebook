@extends('components.layouts.main2')

@include('components.layouts.sidebar')

@section('container')
<section class="pl-24 pr-20 my-10 ml-56 flex-grow">
    <div class="justify-between items-center">
        <h1 class="text-[42px] font-bold">View Activity by Category</h1>
        @include('components.layouts.activitybar')
    </div>

    <div>
        <div class="mb-4 mt-5">
            <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
            <select id="location" name="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="">Choose Category</option>
                <option value="location1">Kategori 1</option>
                <option value="location2">Kategori 2</option>
                <option value="location3">Kategori 3</option>
            </select>
        </div>
        <a href="">
            <button class="rounded-md bg-[#0045A4] w-[110px] h-[40px] flex items-center justify-center text-[18px] text-white">
                Check
            </button>
        </a>
    </div>

    <div>
        <a href="">
            <div class="bg-white mt-5 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-gray-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    To Do
                </div>
            </div>
        </a>
        <a href="">
            <div class="bg-white mt-5 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-gray-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    To Do
                </div>
            </div>
        </a>
        <a href="">
            <div class="bg-white mt-5 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-gray-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    To Do
                </div>
            </div>
        </a>
    </div>
</section>
@endsection