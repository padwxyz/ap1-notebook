@extends('components.layouts.main2')

@include('components.partials.sidebaradmin')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Manajemen PIC</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200"
                onclick="toggleModal('addPicModal')">
                <i class="fas fa-plus mr-2"></i>Tambah PIC
            </button>
        </div>

        <table class="w-full mt-6 text-left table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nama PIC</th>
                    <th class="px-4 py-2 border">Posisi</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pics as $pic)
                    <tr>
                        <td class="px-4 py-2 border">{{ $pic->id }}</td>
                        <td class="px-4 py-2 border">{{ $pic->pic_name }}</td>
                        <td class="px-4 py-2 border">{{ $pic->position }}</td>
                        <td class="px-4 py-2 border">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600"
                                    onclick="toggleModal('editPicModal{{ $pic->id }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600"
                                    onclick="toggleModal('viewPicModal{{ $pic->id }}')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <form action="{{ route('pic.delete', $pic->id) }}" method="POST"
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

                    <!-- Modal Edit PIC -->
                    <div id="editPicModal{{ $pic->id }}"
                        class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded shadow-lg w-1/3">
                            <h2 class="text-2xl mb-6 font-semibold">Edit PIC</h2>
                            <form action="{{ route('pic.update', $pic->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="pic_name" class="block text-gray-700">Nama PIC</label>
                                    <input type="text" name="pic_name" value="{{ $pic->pic_name }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="mb-4">
                                    <label for="position" class="block text-gray-700">Posisi</label>
                                    <input type="text" name="position" value="{{ $pic->position }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Simpan</button>
                                    <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                        onclick="toggleModal('editPicModal{{ $pic->id }}')">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal for View Data PIC -->
                    <div id="viewPicModal{{ $pic->id }}"
                        class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded shadow-lg w-1/3">
                            <h2 class="text-2xl mb-6 font-semibold">Details Data PIC</h2>
                            <div class="mb-4">
                                <label for="pic_name" class="block text-gray-700">PIC Name</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">{{ $pic->pic_name }}</p>
                            </div>                    
                            <div class="mb-4">
                                <label for="position" class="block text-gray-700">PIC Position</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">{{ $pic->position }}</p>
                            </div>                    
                            <div class="mb-4">
                                <label for="created_at" class="block text-gray-700">Created At</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">
                                    @if ($pic->created_at)
                                        {{ $pic->created_at->format('Y-m-d H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                            <div class="mb-4">
                                <label for="updated_at" class="block text-gray-700">Updated At</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">
                                    @if ($pic->updated_at)
                                        {{ $pic->updated_at->format('Y-m-d H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>

                            <div class="flex justify-end">
                                <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                    onclick="toggleModal('viewPicModal{{ $pic->id }}')">Close</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Tambah PIC -->
        <div id="addPicModal" class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                <h2 class="text-2xl mb-6 font-semibold">Tambah PIC</h2>
                <form action="{{ route('pic.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="pic_name" class="block text-gray-700">Nama PIC</label>
                        <input type="text" name="pic_name" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label for="position" class="block text-gray-700">Posisi</label>
                        <input type="text" name="position" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Tambah</button>
                        <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                            onclick="toggleModal('addPicModal')">Batal</button>
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
