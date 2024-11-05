<nav id="navbar" class="fixed w-full z-10 top-0 left-0 py-1 bg-transparent transition-all duration-300">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex-shrink-0 w-[110px] h-[40px]">
                <img class="h-7 w-auto" src="{{ asset('img/logo.png') }}" alt="Your Company">
            </div>

            <div class="hidden sm:flex space-x-4 items-center justify-center flex-1">
                <a href="#Home"
                    class="rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">Home</a>
                <a href="#About"
                    class="rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">About</a>
                <a href="#Service"
                    class="rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">Service</a>
                <a href="#FAQ"
                    class="rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">FAQ</a>
            </div>

            <div class="hidden sm:flex items-center">
                <a href="{{ route('login') }}"
                    class="rounded-md bg-[#66B82D] w-[110px] h-[40px] flex items-center justify-center font-medium text-[18px] text-white hover:bg-green-600">Login</a>
            </div>

            <div class="sm:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#Home"
                class="block rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">Home</a>
            <a href="#About"
                class="block rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">About</a>
            <a href="#Service"
                class="block rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">Service</a>
            <a href="#FAQ"
                class="block rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">FAQ</a>
            <a href="{{ route('login') }}"
                class="block rounded-md bg-[#66B82D] px-3 py-2 text-[18px] font-medium text-white hover:bg-green-600">Login</a>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('bg-[#0045A4]');
            navbar.classList.remove('bg-transparent');
        } else {
            navbar.classList.add('bg-transparent');
            navbar.classList.remove('bg-[#0045A4]');
        }
    });

    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const navbar = document.getElementById('navbar');

    menuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');

        if (!mobileMenu.classList.contains('hidden')) {
            navbar.classList.add('bg-[#0045A4]');
            navbar.classList.remove('bg-transparent');
        } else {
            if (window.scrollY <= 50) {
                navbar.classList.remove('bg-[#0045A4]');
                navbar.classList.add('bg-transparent');
            }
        }
    });
</script>
