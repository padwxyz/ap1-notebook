@extends('components.layouts.main2')

@include('components.partials.sidebaradmin')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Manajemen Kategori</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200"
                onclick="toggleModal('addCategoryModal')">
                <i class="fas fa-plus mr-2"></i>Tambah Kategori
            </button>
        </div>

        <table class="w-full mt-6 text-left table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nama Kategori</th>
                    <th class="px-4 py-2 border">Fasilitas</th>
                    <th class="px-4 py-2 border">Lokasi Fasilitas</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="px-4 py-2 border">{{ $category->id }}</td>
                        <td class="px-4 py-2 border">{{ $category->category_name }}</td>
                        <td class="px-4 py-2 border">{{ $category->facility->facility_name }}</td>
                        <td class="px-4 py-2 border">{{ $category->facility->location->location_name }}</td>
                        <td class="px-4 py-2 border">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600"
                                    onclick="toggleModal('editCategoryModal{{ $category->id }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600"
                                    onclick="toggleModal('viewCategoryModal{{ $category->id }}')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <form action="{{ route('category.delete', $category->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit Kategori -->
                    <div id="editCategoryModal{{ $category->id }}"
                        class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded shadow-lg w-1/3">
                            <h2 class="text-2xl mb-6 font-semibold">Edit Data Category</h2>
                            <form action="{{ route('category.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="category_name" class="block text-gray-700">Category Name</label>
                                    <input type="text" name="category_name" value="{{ $category->category_name }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="mb-4">
                                    <label for="facility_id" class="block text-gray-700">Fasilitas</label>
                                    <select name="facility_id" class="border rounded w-full px-3 py-2 mt-1">
                                        @foreach ($facilities as $facility)
                                            <option value="{{ $facility->id }}"
                                                @if ($facility->id == $category->facility_id) selected @endif>
                                                {{ $facility->facility_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Simpan</button>
                                    <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                        onclick="toggleModal('editCategoryModal{{ $category->id }}')">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal for View Data Category -->
                    <div id="viewCategoryModal{{ $category->id }}"
                        class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded shadow-lg w-1/3">
                            <h2 class="text-2xl mb-6 font-semibold">Details Data Category</h2>
                            <div class="mb-4">
                                <label for="category_name" class="block text-gray-700">Category Name</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">{{ $category->category_name }}</p>
                            </div>
                            <div class="mb-4">
                                <label for="facility_name" class="block text-gray-700">Fasilitas</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">{{ $category->facility->facility_name }}
                                </p>
                            </div>
                            <div class="mb-4">
                                <label for="location_name" class="block text-gray-700">Lokasi Fasilitas</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">
                                    {{ $category->facility->location->location_name }}</p>
                            </div>
                            <div class="mb-4">
                                <label for="created_at" class="block text-gray-700">Created At</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">
                                    @if ($category->created_at)
                                        {{ $category->created_at->format('Y-m-d H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                            <div class="mb-4">
                                <label for="updated_at" class="block text-gray-700">Updated At</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">
                                    @if ($category->updated_at)
                                        {{ $category->updated_at->format('Y-m-d H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>

                            <div class="flex justify-end">
                                <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                    onclick="toggleModal('viewCategoryModal{{ $category->id }}')">Close</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Tambah Kategori -->
        <div id="addCategoryModal"
            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                <h2 class="text-2xl mb-6 font-semibold">Tambah Kategori</h2>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="category_name" class="block text-gray-700">Nama Kategori</label>
                        <input type="text" name="category_name" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label for="facility_id" class="block text-gray-700">Fasilitas</label>
                        <select name="facility_id" class="border rounded w-full px-3 py-2 mt-1" required>
                            @foreach ($facilities as $facility)
                                <option value="{{ $facility->id }}">{{ $facility->facility_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Tambah</button>
                        <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                            onclick="toggleModal('addCategoryModal')">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
@endsection