@extends('components.layouts.main2')

@include('components.partials.sidebaradmin')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Facility Management Data</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200"
                onclick="toggleModal('addFacilityModal')">
                <i class="fas fa-plus mr-2"></i>Add Facility
            </button>
        </div>

        <table class="w-full mt-6 text-left table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Facility Name</th>
                    <th class="px-4 py-2 border">Location</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facilities as $facility)
                    <tr>
                        <td class="px-4 py-2 border">{{ $facility->id }}</td>
                        <td class="px-4 py-2 border">{{ $facility->facility_name }}</td>
                        <td class="px-4 py-2 border">{{ $facility->location->location_name }}</td>
                        <td class="px-4 py-2 border">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600"
                                    onclick="toggleModal('editFacilityModal{{ $facility->id }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600"
                                    onclick="toggleModal('viewFacilityModal{{ $facility->id }}')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <form action="{{ route('facility.delete', $facility->id) }}" method="POST"
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

                    <div id="editFacilityModal{{ $facility->id }}"
                        class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded shadow-lg w-1/3">
                            <h2 class="text-2xl mb-6 font-semibold">Edit Fasilitas</h2>
                            <form action="{{ route('facility.update', $facility->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="facility_name" class="block text-gray-700">Nama Fasilitas</label>
                                    <input type="text" name="facility_name" value="{{ $facility->facility_name }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="mb-4">
                                    <label for="location_id" class="block text-gray-700">Lokasi</label>
                                    <select name="location_id" class="border rounded w-full px-3 py-2 mt-1">
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}"
                                                @if ($location->id == $facility->location_id) selected @endif>
                                                {{ $location->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Simpan</button>
                                    <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                        onclick="toggleModal('editFacilityModal{{ $facility->id }}')">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="viewFacilityModal{{ $facility->id }}"
                        class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded shadow-lg w-1/3">
                            <h2 class="text-2xl mb-6 font-semibold">Details Data Facility</h2>
                            <div class="mb-4">
                                <label for="facility_name" class="block text-gray-700">Facility Name</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">{{ $facility->facility_name }}</p>
                            </div>
                            <div class="mb-4">
                                <label for="location_name" class="block text-gray-700">Facility Location</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">{{ $facility->location->location_name }}
                                </p>
                            </div>
                            <div class="mb-4">
                                <label for="created_at" class="block text-gray-700">Created At</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">
                                    @if ($facility->created_at)
                                        {{ $facility->created_at->format('Y-m-d H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                            <div class="mb-4">
                                <label for="updated_at" class="block text-gray-700">Updated At</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">
                                    @if ($facility->updated_at)
                                        {{ $facility->updated_at->format('Y-m-d H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>

                            <div class="flex justify-end">
                                <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                    onclick="toggleModal('viewFacilityModal{{ $facility->id }}')">Close</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        <div id="addFacilityModal"
            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                <h2 class="text-2xl mb-6 font-semibold">Tambah Fasilitas</h2>
                <form action="{{ route('facility.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="facility_name" class="block text-gray-700">Nama Fasilitas</label>
                        <input type="text" name="facility_name" class="border rounded w-full px-3 py-2 mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label for="location_id" class="block text-gray-700">Lokasi</label>
                        <select name="location_id" class="border rounded w-full px-3 py-2 mt-1" required>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Tambah</button>
                        <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                            onclick="toggleModal('addFacilityModal')">Batal</button>
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
