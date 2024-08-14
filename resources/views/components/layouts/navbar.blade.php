<nav class="bg-[#0045A4] fixed  w-full z-10 top-0 left-0 py-1">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <!-- Logo di kiri -->
      <div class="flex items-center w-[110px] h-[40px]">
        <img class="h-7 w-auto" src="{{ asset('img/logo.png') }}" alt="Your Company">
      </div>
      
      <!-- Menu di tengah -->
      <div class="flex-1 flex justify-center items-center">
        <div class="hidden sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white" aria-current="page">Home</a>
            <a href="#" class="rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">About</a>
            <a href="#" class="rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">Service</a>
            <a href="#" class="rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">FAQ</a>
          </div>
        </div>
      </div>
      
      <!-- Tombol login di kanan -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <a href="{{ route('login') }}" class="relative rounded-md bg-[#66B82D] w-[110px] h-[40px] flex items-center justify-center font-medium text-[18px] text-white hover:bg-green-600">Login</a>
        </div>
    </div>
  </div>
  
  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="block rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white" aria-current="page">Home</a>
      <a href="#" class="block rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">About</a>
      <a href="#" class="block rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">Service</a>
      <a href="#" class="block rounded-md px-3 py-2 text-[18px] font-medium text-white hover:bg-[#66B82D] hover:text-white">FAQ</a>
      <a href="#" class="block rounded-md bg-green-500 px-3 py-2 text-[18px] font-medium text-white hover:bg-green-600">Login</a>
    </div>
  </div>
</nav>