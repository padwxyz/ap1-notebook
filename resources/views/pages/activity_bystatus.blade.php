@extends('components.layouts.main2')

@include('components.layouts.sidebar')

@section('container')
<section class="pl-24 pr-20 my-10 ml-56 flex-grow">
    <div class="justify-between items-center">
        <h1 class="text-[42px] font-bold">View Activity by Status</h1>
        @include('components.layouts.activitybar')
    </div>
    <div class="grid grid-cols-5 gap-6 mt-5">
        <div>
            <div class="p-3 mb-2 h-[60px] flex justify-center items-center bg-gray-500 text-white text-center rounded-xl">
                <h2 class="text-lg font-semibold">To Do</h2>
            </div>
            <div class="p-5 bg-white rounded-xl shadow-lg">
                <h3 class="font-semibold text-lg">Problem</h3>
                <h3>Name of activity</h3>
                <p>Date</p>
                <p class="bg-slate-500 text-white text-sm w-[120px] h-[35px] py-2 px-4 mt-5 rounded-lg flex justify-center items-center">To Do</p>
            </div>
            <div class="p-5 mt-3 bg-white rounded-xl shadow-lg">
                <h3 class="font-semibold text-lg">Problem</h3>
                <h3>Name of activity</h3>
                <p>Date</p>
                <p class="bg-slate-500 text-white text-sm w-[120px] h-[35px] py-2 px-4 mt-5 rounded-lg flex justify-center items-center">To Do</p>
            </div>
            <div class="p-5 mt-3 bg-white rounded-xl shadow-lg">
                <h3 class="font-semibold text-lg">Problem</h3>
                <h3>Name of activity</h3>
                <p>Date</p>
                <p class="bg-slate-500 text-white text-sm w-[120px] h-[35px] py-2 px-4 mt-5 rounded-lg flex justify-center items-center">To Do</p>
            </div>
        </div>
        <div>
            <div class="p-3 mb-2 h-[60px] flex justify-center items-center bg-yellow-500 text-white text-center rounded-xl">
                <h2 class="text-lg font-semibold">Pending</h2>
            </div>
            <div class="p-5 bg-white rounded-xl shadow-lg">
                <h3 class="font-semibold text-lg">Problem</h3>
                <h3>Name of activity</h3>
                <p>Date</p>
                <p class="bg-yellow-500 text-white text-sm w-[120px] h-[35px] py-2 px-4 mt-5 rounded-lg flex justify-center items-center">Pending</p>
            </div>
        </div>
        <div>
            <div class="p-3 mb-2 h-[60px] flex justify-center items-center bg-blue-500 text-white text-center rounded-xl">
                <h2 class="text-lg font-semibold">In Progress</h2>
            </div>
            <div class="p-5 bg-white rounded-xl shadow-lg">
                <h3 class="font-semibold text-lg">Problem</h3>
                <h3>Name of activity</h3>
                <p>Date</p>
                <p class="bg-blue-500 text-white text-sm w-[120px] h-[35px] py-2 px-4 mt-5 rounded-lg flex justify-center items-center">In Progress</p>
            </div>
            <div class="p-5 mt-3 bg-white rounded-xl shadow-lg">
                <h3 class="font-semibold text-lg">Problem</h3>
                <h3>Name of activity</h3>
                <p>Date</p>
                <p class="bg-blue-500 text-white text-sm w-[120px] h-[35px] py-2 px-4 mt-5 rounded-lg flex justify-center items-center">In Progress</p>
            </div>
        </div>
        <div>
            <div class="p-3 mb-2 h-[60px] flex justify-center items-center bg-green-500 text-white text-center rounded-xl">
                <h2 class="text-lg font-semibold">Done</h2>
            </div>
            <div class="p-5 bg-white rounded-xl shadow-lg">
                <h3 class="font-semibold text-lg">Problem</h3>
                <h3>Name of activity</h3>
                <p>Date</p>
                <p class="bg-green-500 text-white text-sm w-[120px] h-[35px] py-2 px-4 mt-5 rounded-lg flex justify-center items-center">Done</p>
            </div>
        </div>
        <div>
            <div class="p-3 mb-2 h-[60px] flex justify-center items-center bg-red-500 text-white text-center rounded-xl">
                <h2 class="text-lg font-semibold">Cancel</h2>
            </div>
            <div class="p-5 bg-white rounded-xl shadow-lg">
                <h3 class="font-semibold text-lg">Problem</h3>
                <h3>Name of activity</h3>
                <p>Date</p>
                <p class="bg-red-500 text-white text-sm w-[120px] h-[35px] py-2 px-4 mt-5 rounded-lg flex justify-center items-center">Cancel</p>
            </div>
            <div class="p-5 mt-3 bg-white rounded-xl shadow-lg">
                <h3 class="font-semibold text-lg">Problem</h3>
                <h3>Name of activity</h3>
                <p>Date</p>
                <p class="bg-red-500 text-white text-sm w-[120px] h-[35px] py-2 px-4 mt-5 rounded-lg flex justify-center items-center">Cancel</p>
            </div>
        </div>
    </div>
</section>
@endsection