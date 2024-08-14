@extends('components.layouts.main2')

@include('components.layouts.sidebar')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="justify-between items-center mb-5">
            <h1 class="text-[42px] font-bold">Log Status Details</h1>
        </div>

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
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">No</th>
                        <th class="py-2 px-4 border-b border-gray-300">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Quantity</th>
                        <th class="py-2 px-4 border-b border-gray-300">Condition</th>
                        <th class="py-2 px-4 border-b border-gray-300">Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">1</td>
                        <td class="py-2 px-4 border-b border-gray-300">X-Ray</td>
                        <td class="py-2 px-4 border-b border-gray-300">10</td>
                        <td class="py-2 px-4 border-b border-gray-300">Normal</td>
                        <td class="py-2 px-4 border-b border-gray-300">Berfungsi dengan baik</td>
                    </tr>
                    <!-- Tambahkan baris lain sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
        <div class="flex justify-between items-center mt-4">
            <div class="text-sm text-gray-600">
                Showing 1 to 10 of 57 entries
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#"
                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        Previous
                    </a>
                    <a href="#" aria-current="page"
                        class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        1
                    </a>
                    <a href="#"
                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        2
                    </a>
                    <a href="#"
                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        3
                    </a>
                    <a href="#"
                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        4
                    </a>
                    <a href="#"
                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        5
                    </a>
                    <a href="#"
                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        6
                    </a>
                    <a href="#"
                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        Next
                    </a>
                </nav>
            </div>
        </div>
    </section>
@endsection
