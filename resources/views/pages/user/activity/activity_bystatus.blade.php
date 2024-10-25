@extends('components.layouts.main2')

@include('components.partials.sidebar')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="justify-between items-center">
            <h1 class="text-[42px] font-bold mb-6">View Activity by Status</h1>
            @include('components.partials.activitybar')
        </div>
        <div class="relative">
            <div class="absolute inset-0">
                <div class="overflow-x-auto mt-5">
                    <div class="flex space-x-4">
                        <!-- To Do Column -->
                        <div class="flex-none w-[320px] bg-blue-100 rounded-lg shadow-lg h-[600px]">
                            <div class="p-3 flex justify-center items-center bg-gray-500 text-white text-center rounded-t-lg">
                                <h2 class="text-lg font-semibold">To Do</h2>
                            </div>
                            <div class="p-5 flex-grow overflow-y-auto">
                                @foreach ($todos as $note)
                                    <a href="{{ route('activity-details', ['id' => $note->id]) }}">
                                        <div class="bg-white p-4 rounded-lg mb-3 shadow-sm">
                                            <h3 class="font-semibold text-lg text-gray-700">{{ $note->problem }}</h3>
                                            <p class="text-gray-500">{{ $note->activity }}</p>
                                            <p class="text-gray-400">{{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <!-- Pending Column -->
                        <div class="flex-none w-[320px] bg-yellow-100 rounded-lg shadow-lg h-[600px]">
                            <div class="p-3 flex justify-center items-center bg-yellow-500 text-white text-center rounded-t-lg">
                                <h2 class="text-lg font-semibold">Pending</h2>
                            </div>
                            <div class="p-5 flex-grow overflow-y-auto">
                                @foreach ($pendings as $note)
                                    <a href="{{ route('activity-details', ['id' => $note->id]) }}">
                                        <div class="bg-white p-4 rounded-lg mb-3 shadow-sm">
                                            <h3 class="font-semibold text-lg text-gray-700">{{ $note->problem }}</h3>
                                            <p class="text-gray-500">{{ $note->activity }}</p>
                                            <p class="text-gray-400">{{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- In Progress Column -->
                        <div class="flex-none w-[320px] bg-blue-100 rounded-lg shadow-lg h-[600px]">
                            <div class="p-3 flex justify-center items-center bg-blue-500 text-white text-center rounded-t-lg">
                                <h2 class="text-lg font-semibold">In Progress</h2>
                            </div>
                            <div class="p-5 flex-grow overflow-y-auto">
                                @foreach ($inProgress as $note)
                                    <a href="{{ route('activity-details', ['id' => $note->id]) }}">
                                        <div class="bg-white p-4 rounded-lg mb-3 shadow-sm">
                                            <h3 class="font-semibold text-lg text-gray-700">{{ $note->problem }}</h3>
                                            <p class="text-gray-500">{{ $note->activity }}</p>
                                            <p class="text-gray-400">{{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Done Column -->
                        <div class="flex-none w-[320px] bg-green-100 rounded-lg shadow-lg h-[600px]">
                            <div class="p-3 flex justify-center items-center bg-green-500 text-white text-center rounded-t-lg">
                                <h2 class="text-lg font-semibold">Done</h2>
                            </div>
                            <div class="p-5 flex-grow overflow-y-auto">
                                @foreach ($dones as $note)
                                    <a href="{{ route('activity-details', ['id' => $note->id]) }}">
                                        <div class="bg-white p-4 rounded-lg mb-3 shadow-sm">
                                            <h3 class="font-semibold text-lg text-gray-700">{{ $note->problem }}</h3>
                                            <p class="text-gray-500">{{ $note->activity }}</p>
                                            <p class="text-gray-400">{{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Cancel Column -->
                        <div class="flex-none w-[320px] bg-red-100 rounded-lg shadow-lg h-[600px]">
                            <div class="p-3 flex justify-center items-center bg-red-500 text-white text-center rounded-t-lg">
                                <h2 class="text-lg font-semibold">Cancel</h2>
                            </div>
                            <div class="p-5 flex-grow overflow-y-auto">
                                @foreach ($cancels as $note)
                                    <a href="{{ route('activity-details', ['id' => $note->id]) }}">
                                        <div class="bg-white p-4 rounded-lg mb-3 shadow-sm">
                                            <h3 class="font-semibold text-lg text-gray-700">{{ $note->problem }}</h3>
                                            <p class="text-gray-500">{{ $note->activity }}</p>
                                            <p class="text-gray-400">{{ \Carbon\Carbon::parse($note->date)->format('d/m/Y') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection