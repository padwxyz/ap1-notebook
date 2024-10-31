@extends('components.layouts.main2')
@include('components.partials.sidebar')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="justify-between items-center">
            <h1 class="text-[42px] font-bold">View Activity by Item</h1>
            @include('components.partials.activitybar')
        </div>

        <div>
            <form action="{{ route('activity.filter') }}" method="GET">
                <input type="hidden" name="filter_type" value="item">
                <div class="mb-4 mt-5">
                    <label for="item" class="block text-gray-700 text-sm font-bold mb-2">Item:</label>
                    <select id="item" name="filter_value"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                        <option value="">Choose Item</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="rounded-md bg-[#0045A4] w-[110px] h-[40px] flex items-center justify-center text-[18px] text-white">
                    Check
                </button>
            </form>
        </div>

        <div>
            @if ($notes && $notes->isNotEmpty())
                @foreach ($notes as $note)
                    <div class="mt-8 mb-5">
                        <a href="{{ route('activity-details', ['id' => $note->id]) }}">
                            <div class="flex items-center justify-between bg-white p-4 rounded-lg shadow-md"">
                                <div>
                                    <h3 class="text-2xl font-bold pb-2">{{ $note->problem }}</h3>
                                    <p class="text-lg">{{ $note->activity }}</p>
                                    <p class="text-gray-500 text-sm pb-2">Date:
                                        {{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}</p>
                                </div>
                                <div
                                    class="w-[130px] h-[40px] py-2 px-4 rounded-lg flex justify-center items-center 
                            @if ($note->status == 'todo') bg-gray-500 text-white
                            @elseif ($note->status == 'pending') bg-yellow-500 text-white
                            @elseif ($note->status == 'inprogress') bg-blue-500 text-white
                            @elseif ($note->status == 'done') bg-green-500 text-white
                            @elseif ($note->status == 'cancel') bg-red-500 text-white @endif">
                                    {{ ucfirst($note->status) }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p class="mt-5 text-xl">No activities found for the selected location.</p>
            @endif
        </div>
    </section>
@endsection
