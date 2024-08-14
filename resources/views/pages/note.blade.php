@extends('components.layouts.main2')

@include('components.layouts.sidebar')

@section('container')
<section class="pl-24 pr-20 my-10 ml-56 flex-grow">
    <div>
        <h1 class="text-[42px] mb-10 font-bold">Let's start making your daily notes!📝</h1>
        <div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" placeholder="Input Your Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="pic" class="block text-gray-700 text-sm font-bold mb-2">PIC Name:</label>
                <select id="pic" name="pic" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Choose PIC Name</option>
                    <option value="pic1">PIC 1</option>
                    <option value="pic2">PIC 2</option>
                    <option value="pic3">PIC 3</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                <select id="location" name="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Choose Location</option>
                    <option value="location1">Lokasi 1</option>
                    <option value="location2">Lokasi 2</option>
                    <option value="location3">Lokasi 3</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Facility</label>
                <select id="category" name="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Choose Facility</option>
                    <option value="category1">Fasilitas 1</option>
                    <option value="category2">Fasilitas 2</option>
                    <option value="category3">Fasilitas 3</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                <select id="category" name="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Choose Category</option>
                    <option value="category1">Kategori 1</option>
                    <option value="category2">Kategori 2</option>
                    <option value="category3">Kategori 3</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Item:</label>
                <select id="category" name="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Choose Item</option>
                    <option value="category1">Item 1</option>
                    <option value="category2">Item 2</option>
                    <option value="category3">Item 3</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                <input type="date" id="date" name="date" placeholder="Input Your Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Time:</label>
                <input type="time" id="time" name="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="activity" class="block text-gray-700 text-sm font-bold mb-2">Problem:</label>
                <textarea id="activity" name="activity" rows="2" placeholder="Example: Bad wifi signal..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>

            <div class="mb-4">
                <label for="activity" class="block text-gray-700 text-sm font-bold mb-2">Activity:</label>
                <textarea id="activity" name="activity" rows="4" placeholder="Example: Repairing aeroplanes..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                <div class="flex items-center mb-2">
                    <input type="radio" id="pending" name="status" value="pending" class="mr-2 leading-tight" required>
                    <label for="todo" class="text-gray-700">To Do</label>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" id="pending" name="status" value="pending" class="mr-2 leading-tight" required>
                    <label for="pending" class="text-gray-700">Pending</label>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" id="in-progress" name="status" value="in-progress" class="mr-2 leading-tight" required>
                    <label for="in-progress" class="text-gray-700">In Progress</label>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" id="completed" name="status" value="completed" class="mr-2 leading-tight" required>
                    <label for="completed" class="text-gray-700">Done</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="cancel" name="status" value="cancel" class="mr-2 leading-tight" required>
                    <label for="cancel" class="text-gray-700">Cancel</label>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Submit</button>
                <button type="reset" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Reset</button>
            </div>
        </div>
    </div>
</section>
@endsection