@extends('components.layouts.main2')

@include('components.partials.sidebar')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="justify-between items-center mb-5">
            <h1 class="text-[42px] font-bold">Log Status Details</h1>
        </div>

        <!-- Filter dan Search -->
        <div class="flex justify-between items-center mb-4">
            <div>
                <label for="entries" class="mr-2">Show</label>
                <select id="entries" class="border rounded py-1 px-2">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="ml-2">entries</span>
            </div>
            <div>
                <label for="search" class="mr-2">Search:</label>
                <input type="text" id="search" class="border rounded py-1 px-2" placeholder="Search...">
            </div>
        </div>

        <!-- Tabel Log Status -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">No</th>
                        <th class="py-2 px-4 border-b border-gray-300">Location</th>
                        <th class="py-2 px-4 border-b border-gray-300">Facility</th>
                        <th class="py-2 px-4 border-b border-gray-300">Category</th>
                        <th class="py-2 px-4 border-b border-gray-300">Item</th>
                        <th class="py-2 px-4 border-b border-gray-300">Problem</th>
                        <th class="py-2 px-4 border-b border-gray-300">Activity</th>
                        <th class="py-2 px-4 border-b border-gray-300">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notes as $note)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $note->location->location_name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $note->facility->facility_name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $note->category->category_name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $note->item->item_name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $note->problem }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $note->activity }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <span class="px-2 py-1 rounded-lg 
                            @if($note->status == 'todo') bg-gray-500 text-white 
                            @elseif($note->status == 'pending') bg-yellow-500 text-white 
                            @elseif($note->status == 'inprogress') bg-blue-500 text-white 
                            @elseif($note->status == 'done') bg-green-500 text-white 
                            @elseif($note->status == 'cancel') bg-red-500 text-white 
                            @endif">
                                {{ ucfirst($note->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-2 px-4 border-b border-gray-300">No records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4">
            <div class="text-sm text-gray-600">
                Showing {{ $notes->firstItem() }} to {{ $notes->lastItem() }} of {{ $notes->total() }} entries
            </div>
            <div>
                {{ $notes->links() }}
            </div>
        </div>
    </section>
@endsection