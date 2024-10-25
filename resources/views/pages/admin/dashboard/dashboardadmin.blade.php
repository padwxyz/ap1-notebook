@extends('components.layouts.main2')

@include('components.partials.sidebaradmin')

@section('container')
<section class="pl-24 pr-20 my-10 ml-56 flex-grow">
    <div class="grid grid-cols-2 justify-items-start">
        <div>
            <h1 class="text-[42px] font-bold text-left">Welcome {{-- {{ Auth::user()->name }} --}}👋</h1>
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