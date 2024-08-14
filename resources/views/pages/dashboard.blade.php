@extends('components.layouts.main2')

@include('components.layouts.sidebar')

@section('container')
<section class="pl-24 pr-20 my-10 ml-56 flex-grow">
    <div class="grid grid-cols-2 justify-items-center">
        <div>
            <h1 class="text-[42px] font-bold">Welcome Bhargo Ananda👋</h1>
        </div>
        <div class="bg-[#009BE0] w-[180px] h-[50px] relative rounded-md flex items-center justify-center font-medium text-[18px] text-white my-auto ml-auto">
            <a href="{{ route('note') }}" class="flex items-center justify-center">
                <svg class="w-6 h-6 fill-current mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"></path>
                </svg>
                <button class="">New Notes</button>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-5 gap-6 mt-5">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-gray-500 text-lg font-semibold">To Do Activity</h3>
            <p class="text-2xl font-bold">18</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-yellow-500 text-lg font-semibold">Pending Activity</h3>
            <p class="text-2xl font-bold">18</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-blue-500 text-lg font-semibold">In Progress Activity</h3>
            <p class="text-2xl font-bold">18</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-green-500 text-lg font-semibold">Done Activity</h3>
            <p class="text-2xl font-bold">18</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-red-500 text-lg font-semibold">Cancel Activity</h3>
            <p class="text-2xl font-bold">18</p>
        </div>
    </div>

    <!-- Diagrams Section -->
    <div class="grid grid-cols-2 gap-6 mt-10">
        <!-- Line Chart -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
            <h3 class="text-blue-500 text-lg font-semibold mb-4">Activity Overview</h3>
            <div class="flex-grow">
                {{-- <canvas id="earningsChart" class="w-full h-full"></canvas> --}}
            </div>
        </div>
        <!-- Doughnut Chart -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
            <h3 class="text-blue-500 text-lg font-semibold mb-4">Activity Range</h3>
            <div class="flex justify-center items-center flex-grow">
                <canvas id="revenueChart" class="w-3/4 h-3/4"></canvas>
            </div>
        </div>
    </div>
</section>
@endsection