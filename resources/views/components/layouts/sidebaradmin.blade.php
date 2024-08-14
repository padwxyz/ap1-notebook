<div id="sidebar"
    class="bg-white h-screen md:block shadow-xl px-5 w-40 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out flex flex-col fixed"
    x-data="{ sidenav: true, open: false }" x-show="sidenav" @click.away="sidenav = false">
    <div class="space-y-6 md:space-y-5 mt-10 flex flex-col">
        <div class="flex items-center justify-center">
            <a href=""><img src="{{ asset('img/logo.png') }}" class="h-6" alt=""></a>
        </div>
        <h1 class="font-bold text-4xl text-center md:hidden">
            Angkasa Pura I <span class="text-[#0045A4]">Notebook</span>
        </h1>
        <h1 class="hidden md:block font-bold text-sm md:text-xl text-center">
            Angkasa Pura I <span class="text-[#0045A4]">Notebook</span>
        </h1>

        <div></div>

        <div id="menu" class="flex flex-col space-y-3 mt-10 flex-grow">
            <a href=""
                class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                <span class="">Dashboard</span>
            </a>

            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out w-full flex items-center">
                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 text-left">Data Master</span>
                    <svg class="w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="absolute left-0 flex flex-col bg-white shadow-md rounded-md mt-1 w-full z-10 p-2"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95">
                    <a href=""
                        class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Data
                        Admin</a>
                    <a href=""
                        class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Data
                        User</a>
                    <a href=""
                        class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Data
                        PIC</a>
                    <a href=""
                        class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Data
                        Note</a>
                    <a href=""
                        class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Data
                        Lokasi</a>
                    <a href=""
                        class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Data
                        Fasilitas</a>
                    <a href=""
                        class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Data
                        Kategori</a>
                    <a href=""
                        class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Data
                        Item</a>
                </div>
            </div>
            

            <a href=""
                class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="">Calendar</span>
            </a>
            <a href=""
                class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 4a1 1 0 112 0v5h3a1 1 0 110 2H9a1 1 0 01-1-1V4z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="">History</span>
            </a>
            <a href=""
                class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-[#0045A4] hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 100 2h2a1 1 0 100-2H9zM4 5a2 2 0 012-2h8a2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 6a1 1 0 011-1h6a1 1 0 110 2H8a1 1 0 01-1-1zm0 4a1 1 0 011-1h6a1 1 0 110 2H8a1 1 0 01-1-1zM7 7a1 1 0 100 2h6a1 1 0 100-2H7z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="">Log Status</span>
            </a>
        </div>
    </div>
    <div id="logout" class="mt-32 mb-10">
        <a href=""
            class="text-sm font-medium text-gray-700 py-2 px-3 hover:bg-red-600 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 4a1 1 0 011-1h10a1 1 0 011 1v2a1 1 0 11-2 0V5H4v10h8v-1a1 1 0 112 0v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"
                    clip-rule="evenodd"></path>
                <path fill-rule="evenodd"
                    d="M14.293 7.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L15.586 12H9a1 1 0 110-2h6.586l-1.293-1.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="">Log Out</span>
        </a>
    </div>
</div>
