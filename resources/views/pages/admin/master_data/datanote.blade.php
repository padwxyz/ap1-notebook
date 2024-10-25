@extends('components.layouts.main2')

@include('components.partials.sidebaradmin')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Manajemen Data Datanote</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200"
                onclick="toggleModal('addDatanoteModal')">
                <i class="fas fa-plus mr-2"></i>Tambah Datanote
            </button>
        </div>

        <table class="w-full mt-6 text-left table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nama Pengguna</th>
                    <th class="px-4 py-2 border">PIC</th>
                    <th class="px-4 py-2 border">Lokasi</th>
                    <th class="px-4 py-2 border">Fasilitas</th>
                    <th class="px-4 py-2 border">Kategori</th>
                    <th class="px-4 py-2 border">Item</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Waktu</th>
                    <th class="px-4 py-2 border">Masalah</th>
                    <th class="px-4 py-2 border">Aktivitas</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Gambar</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datanotes as $datanote)
                    <tr>
                        <td class="px-4 py-2 border">{{ $datanote->id }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->user->name }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->pic->pic_name }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->location->location_name }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->facility->facility_name }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->category->category_name }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->item->item_name }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->name }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->date }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->time }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->problem }}</td>
                        <td class="px-4 py-2 border">{{ $datanote->activity }}</td>
                        <td class="px-4 py-2 border">{{ ucfirst($datanote->status) }}</td>
                        <td class="px-4 py-2 border">
                            <img src="{{ asset('storage/' . $datanote->image) }}" alt="Gambar"
                                class="w-16 h-16 object-cover">
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600"
                                    onclick="toggleModal('editDatanoteModal{{ $datanote->id }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600"
                                    onclick="toggleModal('viewAdminModal{{ $datanote->id }}')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <form action="{{ route('datanote.delete', $datanote->id) }}" method="POST"
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

                    <!-- Modal Edit Datanote -->
                    <div id="editDatanoteModal{{ $datanote->id }}"
                        class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded shadow-lg w-1/3">
                            <h2 class="text-2xl mb-6 font-semibold">Edit Datanote</h2>
                            <form action="{{ route('datanote.update', $datanote->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" value="{{ $datanote->name }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="mb-4">
                                    <label for="date">Tanggal</label>
                                    <input type="date" name="date" value="{{ $datanote->date }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="mb-4">
                                    <label for="time">Waktu</label>
                                    <input type="time" name="time" value="{{ $datanote->time }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="mb-4">
                                    <label for="problem">Masalah</label>
                                    <input type="text" name="problem" value="{{ $datanote->problem }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="mb-4">
                                    <label for="activity">Aktivitas</label>
                                    <input type="text" name="activity" value="{{ $datanote->activity }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="mb-4">
                                    <label for="status">Status</label>
                                    <select name="status" class="border rounded w-full px-3 py-2 mt-1">
                                        <option value="todo" @if ($datanote->status == 'todo') selected @endif>To Do
                                        </option>
                                        <option value="pending" @if ($datanote->status == 'pending') selected @endif>Pending
                                        </option>
                                        <option value="inprogress" @if ($datanote->status == 'inprogress') selected @endif>In
                                            Progress</option>
                                        <option value="done" @if ($datanote->status == 'done') selected @endif>Done
                                        </option>
                                        <option value="cancel" @if ($datanote->status == 'cancel') selected @endif>Cancel
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="image">Gambar</label>
                                    <input type="file" name="image" class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Simpan</button>
                                    <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                        onclick="toggleModal('editDatanoteModal{{ $datanote->id }}')">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Tambah Datanote -->
        <div id="addDatanoteModal"
            class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                <h2 class="text-2xl mb-6 font-semibold">Tambah Datanote</h2>
                <form action="{{ route('datanote.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="date">Tanggal</label>
                        <input type="date" name="date" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="time">Waktu</label>
                        <input type="time" name="time" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="problem">Masalah</label>
                        <input type="text" name="problem" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="activity">Aktivitas</label>
                        <input type="text" name="activity" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="location_id">Lokasi</label>
                        <select id="location_id" name="location_id" class="border rounded w-full px-3 py-2 mt-1"
                            onchange="updateFacilityOptions()">
                            <option value="">Pilih Lokasi</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="facility_id">Fasilitas</label>
                        <select id="facility_id" name="facility_id" class="border rounded w-full px-3 py-2 mt-1"
                            onchange="updateCategoryOptions()">
                            <option value="">Pilih Fasilitas</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="category_id">Kategori</label>
                        <select id="category_id" name="category_id" class="border rounded w-full px-3 py-2 mt-1"
                            onchange="updateItemOptions()">
                            <option value="">Pilih Kategori</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="item_id">Item</label>
                        <select id="item_id" name="item_id" class="border rounded w-full px-3 py-2 mt-1">
                            <option value="">Pilih Item</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Tambah</button>
                        <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                            onclick="toggleModal('addDatanoteModal')">Batal</button>
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

        function updateFacilityOptions() {
            let locationId = document.getElementById('location_id').value;
            let facilitySelect = document.getElementById('facility_id');

            facilitySelect.innerHTML = '<option value="">Pilih Fasilitas</option>';

            if (locationId) {
                fetch(`/getFacilitiesByLocation/${locationId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(facility => {
                            let option = document.createElement('option');
                            option.value = facility.id;
                            option.textContent = facility.facility_name;
                            facilitySelect.appendChild(option);
                        });
                    });
            }
        }

        function updateCategoryOptions() {
            let facilityId = document.getElementById('facility_id').value;
            let categorySelect = document.getElementById('category_id');

            categorySelect.innerHTML = '<option value="">Pilih Kategori</option>';

            if (facilityId) {
                fetch(`/getCategoriesByFacility/${facilityId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(category => {
                            let option = document.createElement('option');
                            option.value = category.id;
                            option.textContent = category.category_name;
                            categorySelect.appendChild(option);
                        });
                    });
            }
        }

        function updateItemOptions() {
            let categoryId = document.getElementById('category_id').value;
            let itemSelect = document.getElementById('item_id');

            itemSelect.innerHTML = '<option value="">Pilih Item</option>';

            if (categoryId) {
                fetch(`/getItemsByCategory/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(item => {
                            let option = document.createElement('option');
                            option.value = item.id;
                            option.textContent = item.item_name;
                            itemSelect.appendChild(option);
                        });
                    });
            }
        }
    </script>
@endsection
