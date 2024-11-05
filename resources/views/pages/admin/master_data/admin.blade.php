@extends('components.layouts.main2')

@include('components.partials.sidebaradmin')

@section('container')
    <section class="pl-24 pr-20 my-10 ml-56 flex-grow">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Admin Management Data</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200"
                onclick="toggleModal('addAdminModal')">
                <i class="fas fa-plus mr-2"></i>Add Admin
            </button>
        </div>

        <table class="w-full mt-6 text-left table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td class="px-4 py-2 border">{{ $admin->id }}</td>
                        <td class="px-4 py-2 border">{{ $admin->name }}</td>
                        <td class="px-4 py-2 border">{{ $admin->email }}</td>
                        <td class="px-4 py-2 border">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600"
                                    onclick="toggleModal('editAdminModal{{ $admin->id }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600"
                                    onclick="toggleModal('viewAdminModal{{ $admin->id }}')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <form action="{{ route('admin.delete', $admin->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal for Edit Data Admin -->
                    <div id="editAdminModal{{ $admin->id }}"
                        class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded shadow-lg w-1/3">
                            <h2 class="text-2xl mb-6 font-semibold">Edit Data Admin</h2>
                            <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700">Admin Name</label>
                                    <input type="text" name="name" value="{{ $admin->name }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700">Email</label>
                                    <input type="email" name="email" value="{{ $admin->email }}"
                                        class="border rounded w-full px-3 py-2 mt-1">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Save</button>
                                    <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                        onclick="toggleModal('editAdminModal{{ $admin->id }}')">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal for View Data Admin -->
                    <div id="viewAdminModal{{ $admin->id }}"
                        class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded shadow-lg w-1/3">
                            <h2 class="text-2xl mb-6 font-semibold">Details Data Admin</h2>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700">Admin Name</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">{{ $admin->name }}</p>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700">Admin Email</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">{{ $admin->email }}</p>
                            </div>
                            <div class="mb-4">
                                <label for="created_at" class="block text-gray-700">Created At</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">
                                    @if ($admin->created_at)
                                        {{ $admin->created_at->format('Y-m-d H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                            <div class="mb-4">
                                <label for="updated_at" class="block text-gray-700">Updated At</label>
                                <p class="border rounded w-full px-3 py-2 mt-1">
                                    @if ($admin->updated_at)
                                        {{ $admin->updated_at->format('Y-m-d H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>

                            <div class="flex justify-end">
                                <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                                    onclick="toggleModal('viewAdminModal{{ $admin->id }}')">Close</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        <!-- Modal for Add Admin -->
        <div id="addAdminModal" class="fixed inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded shadow-lg w-1/3">
                <h2 class="text-2xl mb-6 font-semibold">Add Admin</h2>
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Admin Name</label>
                        <input type="text" name="name" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" name="email" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" name="password" class="border rounded w-full px-3 py-2 mt-1">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Add</button>
                        <button type="button" class="bg-gray-300 px-4 py-2 rounded"
                            onclick="toggleModal('addAdminModal')">Cancel</button>
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
