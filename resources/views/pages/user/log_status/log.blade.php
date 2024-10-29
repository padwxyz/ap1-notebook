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
                        <th class="px-4 py-2 border">Nama Barang</th>
                        <th class="px-4 py-2 border">Kategori</th>
                        <th class="px-4 py-2 border">Fasilitas</th>
                        <th class="px-4 py-2 border">Lokasi Fasilitas</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                        <th class="px-4 py-2 border">Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td class="px-4 py-2 border">{{ $item->id }}</td>
                            <td class="px-4 py-2 border">{{ $item->item_name }}</td>
                            <td class="px-4 py-2 border">{{ $item->category->category_name }}</td>
                            <td class="px-4 py-2 border">{{ $item->category->facility->facility_name }}</td>
                            <td class="px-4 py-2 border">{{ $item->category->facility->location->location_name }}</td>
                            <td class="px-4 py-2 border">{{ $item->quantity }}</td>
                            <td class="px-4 py-2 border">{{ $item->condition }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-2 px-4 border-b border-gray-300">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4">
            <div class="text-sm text-gray-600">
                Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }} entries
            </div>
            <div>
                {{ $items->links() }}
            </div>
        </div>
    </section>
@endsection
