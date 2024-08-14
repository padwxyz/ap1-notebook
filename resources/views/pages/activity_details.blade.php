@extends('components.layouts.main2')

@include('components.layouts.sidebar')

@section('container')
<section class="pl-24 pr-20 my-10 ml-56 flex-grow">
    <div>
        <div class="bg-white mt-2 p-5 rounded-xl shadow-md flex items-start justify-between">
            <div class="flex-1">
                <h3 class="text-2xl font-semibold">Problem</h3>
                <p class="mt-4">Status:</p>
                <p>Date: dd/mm/yyyy</p>
                <p>Time:</p>
                <p class="mt-2">Name:</p>
                <p>PIC Name:</p>
            </div>
            <div class="flex-1 ml-10">
                <p class="mt-12">Location:</p>
                <p>Facility:</p>
                <p>Category:</p>
                <p>Item:</p>
            </div>
        </div>
    </div>
</section>
@endsection