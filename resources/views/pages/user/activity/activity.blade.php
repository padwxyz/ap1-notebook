@extends('components.layouts.main2')

@include('components.partials.sidebar')

@section('container')
<section class="pl-24 pr-20 my-10 ml-56 flex-grow">
    <div class="justify-between items-center">
        <h1 class="text-[42px] font-bold">All Activity</h1>
        @include('components.partials.activitybar')
    </div>

    <div>
        @foreach ($notes as $note)
        <a href="{{ route('activity-details', ['id' => $note->id]) }}">
            <div class="bg-white mt-5 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-semibold">{{ $note->problem }}</h3>
                    <p class="text-xl">{{ $note->activity }}</p>
                    <p class="mt-3">Date: {{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}</p>
                </div>
                <div class="w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center 
                @if ($note->status == 'todo') bg-gray-500 text-white
                @elseif ($note->status == 'pending') bg-yellow-500 text-white
                @elseif ($note->status == 'inprogress') bg-blue-500 text-white
                @elseif ($note->status == 'done') bg-green-500 text-white
                @elseif ($note->status == 'cancel') bg-red-500 text-white
                @endif">
                    {{ ucfirst($note->status) }}
                </div>
            </div>
        </a>
        @endforeach

        @if ($notes->isEmpty())
            <div class="text-center mt-10">
                <p class="text-xl text-gray-500">No activities found.</p>
            </div>
        @endif
    </div>
</section>
@endsection