@extends('components.layouts.main2')

@include('components.layouts.sidebar')

@section('container')
<section class="pl-24 pr-20 my-10 ml-56 flex-grow">
    <div class="dlex justify-between items-center">
        <h1 class="text-[42px] font-bold">Your Note History</h1>
        <div>
            <div class="bg-white mt-3 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-gray-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    To Do
                </div>
            </div>
        </div>
        <div>
            <div class="bg-white mt-3 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-yellow-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    Pending
                </div>
            </div>
        </div>
        <div>
            <div class="bg-white mt-3 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-blue-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    In Progress
                </div>
            </div>
        </div>
        <div>
            <div class="bg-white mt-3 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-green-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    Compelated
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white mt-3 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-gray-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    To Do
                </div>
            </div>
        </div>
        <div>
            <div class="bg-white mt-3 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-yellow-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    Pending
                </div>
            </div>
        </div>
        <div>
            <div class="bg-white mt-3 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-blue-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    In Progress
                </div>
            </div>
        </div>
        <div>
            <div class="bg-white mt-3 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">Problem</h3>
                    <p class="text-xl">activity</p>
                    <p class="mt-3">Date: dd/mm/yyyy</p>
                </div>
                <div class="bg-green-500 text-white w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center">
                    Compelated
                </div>
            </div>
        </div>
    </div>
</section>
@endsection