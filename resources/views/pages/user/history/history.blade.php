@extends('components.layouts.main2')

@include('components.partials.sidebar')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <h1 class="text-[42px] font-bold mb-10">Your Note History</h1>

        @foreach ($notes as $note)
            <div class="bg-white mt-3 p-5 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-bold pb-4">{{ $note->problem }}</h3>
                    <p class="text-lg">{{ $note->note }}</p>
                    <p class="text-gray-500 text-lg">Date:
                        {{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}</p>
                    <a href="{{ route('activity-details', ['id' => $note->id]) }}" class="text-blue-500 underline">View
                        Details</a>
                </div>
                <div
                    class="w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center text-white
                @if ($note->status == 'todo') bg-gray-500
                @elseif($note->status == 'pending') bg-yellow-500
                @elseif($note->status == 'inprogress') bg-blue-500
                @elseif($note->status == 'done') bg-green-500
                @elseif($note->status == 'cancel') bg-red-500 @endif">
                    {{ ucfirst($note->status) }}
                </div>
            </div>
        @endforeach

        @if ($notes->isEmpty())
            <div class="text-center mt-10">
                <p class="text-xl text-gray-500">You don't have any notes yet.</p>
            </div>
        @endif
    </section>
@endsection
