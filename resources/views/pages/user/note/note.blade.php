@extends('components.layouts.main2')

@include('components.partials.sidebar')
@section('container')
<section class="pl-24 pr-20 my-10 ml-56 flex-grow">
    <h1 class="text-[42px] mb-10 font-bold">{{ $title }} 📝</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter your name" required>
            </div>

            <div class="mb-4">
                <label for="pic" class="block text-gray-700 text-sm font-bold mb-2">PIC Name:</label>
                <select id="pic" name="pic"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    <option value="">Choose PIC Name</option>
                    @foreach ($pics as $pic)
                        <option value="{{ $pic->id }}" {{ old('pic') == $pic->id ? 'selected' : '' }}>
                            {{ $pic->pic_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                <select id="location" name="location"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    <option value="">Choose Location</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location') == $location->id ? 'selected' : '' }}>
                            {{ $location->location_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="facility" class="block text-gray-700 text-sm font-bold mb-2">Facility:</label>
                <select id="facility" name="facility"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Choose Facility</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                <select id="category" name="category"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Choose Category</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="item" class="block text-gray-700 text-sm font-bold mb-2">Item:</label>
                <select id="item" name="item"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Choose Item</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                <input type="date" id="date" name="date" value="{{ old('date') }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <div class="mb-4">
                <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Time:</label>
                <input type="time" id="time" name="time" value="{{ old('time') }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <div class="mb-4">
                <label for="problem" class="block text-gray-700 text-sm font-bold mb-2">Problem:</label>
                <textarea id="problem" name="problem" rows="4"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>{{ old('problem') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="activity" class="block text-gray-700 text-sm font-bold mb-2">Activity:</label>
                <textarea id="activity" name="activity" rows="4"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>{{ old('activity') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                <select id="status" name="status"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    <option value="todo" {{ old('status') == 'todo' ? 'selected' : '' }}>To Do</option>
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="inprogress" {{ old('status') == 'inprogress' ? 'selected' : '' }}>In Progress</option>
                    <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                    <option value="cancel" {{ old('status') == 'cancel' ? 'selected' : '' }}>Cancel</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                <input type="file" id="image" name="image"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Save Note</button>
            </div>
        </div>
    </form>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const locationSelect = document.getElementById('location');
        const facilitySelect = document.getElementById('facility');
        const categorySelect = document.getElementById('category');
        const itemSelect = document.getElementById('item');

        // Fetch facilities when location is selected
        locationSelect.addEventListener('change', function() {
            const locationId = this.value;
            if(locationId) {
                fetch(`/api/facilities/${locationId}`)
                    .then(response => response.json())
                    .then(data => {
                        facilitySelect.innerHTML = '<option value="">Choose Facility</option>';
                        data.forEach(facility => {
                            facilitySelect.innerHTML += `<option value="${facility.id}">${facility.facility_name}</option>`;
                        });
                        categorySelect.innerHTML = '<option value="">Choose Category</option>';
                        itemSelect.innerHTML = '<option value="">Choose Item</option>';
                    })
                    .catch(error => console.error('Error fetching facilities:', error));
            } else {
                facilitySelect.innerHTML = '<option value="">Choose Facility</option>';
                categorySelect.innerHTML = '<option value="">Choose Category</option>';
                itemSelect.innerHTML = '<option value="">Choose Item</option>';
            }
        });

        // Fetch categories when facility is selected
        facilitySelect.addEventListener('change', function() {
            const facilityId = this.value;
            if(facilityId) {
                fetch(`/api/categories/${facilityId}`)
                    .then(response => response.json())
                    .then(data => {
                        categorySelect.innerHTML = '<option value="">Choose Category</option>';
                        data.forEach(category => {
                            categorySelect.innerHTML += `<option value="${category.id}">${category.category_name}</option>`;
                        });
                        itemSelect.innerHTML = '<option value="">Choose Item</option>';
                    })
                    .catch(error => console.error('Error fetching categories:', error));
            } else {
                categorySelect.innerHTML = '<option value="">Choose Category</option>';
                itemSelect.innerHTML = '<option value="">Choose Item</option>';
            }
        });

        // Fetch items when category is selected
        categorySelect.addEventListener('change', function() {
            const categoryId = this.value;
            if(categoryId) {
                fetch(`/api/items/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        itemSelect.innerHTML = '<option value="">Choose Item</option>';
                        data.forEach(item => {
                            itemSelect.innerHTML += `<option value="${item.id}">${item.item_name}</option>`;
                        });
                    })
                    .catch(error => console.error('Error fetching items:', error));
            } else {
                itemSelect.innerHTML = '<option value="">Choose Item</option>';
            }
        });
    });
</script>