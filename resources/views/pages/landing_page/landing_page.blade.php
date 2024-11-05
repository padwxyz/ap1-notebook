@extends('components.layouts.main')

@include('components.partials.navbar')

@section('container')
    {{-- home --}}
    <section id="Home" class="mb-[110px]">
        <div class="relative h-screen bg-fixed bg-center bg-cover" style="background-image: url('{{ asset('img/background.png') }}');">
            <div class="relative flex flex-col items-center justify-center h-full text-center px-4 md:px-0">
                <img src="{{ asset('img/logo.png') }}" class="h-10 md:h-12 mb-4" alt="">
                <h1 class="text-white text-[36px] sm:text-[48px] md:text-[62px] font-bold leading-tight">ANGKASA PURA I AIRPORTS</h1>
                <h3 class="text-white text-[24px] sm:text-[28px] md:text-[32px] font-regular">NOTEBOOK</h3>
            </div>
        </div>
    </section>

    {{-- about --}}
    <section id="About" class="container mx-auto mb-[110px] px-4 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-items-center">
            <div>
                <h1 class="text-[36px] sm:text-[48px] md:text-[60px] font-bold leading-tight" style="background: linear-gradient(90deg, #66B82D 0.07%, #009BE0 96.65%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    ANGKASA PURA
                </h1>
                <h1 class="text-[36px] sm:text-[48px] md:text-[60px] font-bold leading-tight">NOTEBOOK</h1>
                <div class="w-[180px] sm:w-[250px] md:w-[350px] h-1 bg-[#66B82D] mb-5"></div>
                <p class="text-[16px] sm:text-[18px]">Angkasa Pura Notebook dirancang untuk meningkatkan produktivitas, transparansi, dan akurasi dalam pengelolaan tugas di lingkungan terminal.</p>
            </div>
            <div>
                <img src="{{ asset('img/about.png') }}" class="shadow-2xl w-full h-auto" alt="#about-img">
            </div>
        </div>
    </section>

    {{-- service --}}
    <section id="Service" class="mb-[110px]">
        <div class="container mx-auto px-4 md:px-8">
            <div class="text-center mb-10">
                <h1 class="text-[36px] sm:text-[48px] md:text-[60px] font-bold leading-tight">Our Services</h1>
                <p class="text-[16px] sm:text-[18px] md:text-[20px] leading-relaxed text-gray-600 mt-4 mb-6">
                    Kami menawarkan berbagai layanan untuk memudahkan Anda dalam mengelola tugas sehari-hari secara efisien. Dengan layanan yang terintegrasi, setiap pekerjaan dapat terdokumentasi dengan baik.
                </p>
                <div class="w-[200px] sm:w-[300px] md:w-[350px] lg:w-[450px] h-1 bg-[#66B82D] mx-auto mb-8"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex flex-col items-center justify-center p-6 border border-gray-300 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="text-green-500 text-3xl mb-4">
                        📋
                    </div>
                    <h3 class="text-lg font-bold mb-2">Catatan Kegiatan</h3>
                    <p class="text-gray-600 text-sm text-center">Catat setiap tugas dan aktivitas dengan mudah untuk memastikan semua pekerjaan terdokumentasi dengan baik.</p>
                </div>
                <div class="flex flex-col items-center justify-center p-6 border border-gray-300 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="text-blue-500 text-3xl mb-4">
                        ✅
                    </div>
                    <h3 class="text-lg font-bold mb-2">Atur Status Tugas</h3>
                    <p class="text-gray-600 text-sm text-center">Tandai pekerjaan sebagai "Sedang Dilakukan", "Pending", atau "Selesai" untuk memudahkan pengelolaan dan prioritas.</p>
                </div>
                <div class="flex flex-col items-center justify-center p-6 border border-gray-300 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="text-purple-500 text-3xl mb-4">
                        🌍
                    </div>
                    <h3 class="text-lg font-bold mb-2">Akses Fleksibel</h3>
                    <p class="text-gray-600 text-sm text-center">Kelola catatan Anda kapan saja dan di mana saja melalui platform digital yang bisa diakses dari berbagai perangkat.</p>
                </div>
                <div class="flex flex-col items-center justify-center p-6 border border-gray-300 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="text-red-500 text-3xl mb-4">
                        🗂️
                    </div>
                    <h3 class="text-lg font-bold mb-2">Arsip Otomatis</h3>
                    <p class="text-gray-600 text-sm text-center">Semua catatan tersimpan otomatis, memudahkan pencarian dan review tugas yang telah dilakukan.</p>
                </div>
            </div>
        </div>
    </section>       

    {{-- faq --}}
    <section id="FAQ" class="container mx-auto mb-[110px] px-4 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="relative">
                <h1 class="text-[36px] sm:text-[48px] md:text-[60px] font-bold leading-tight">Frequently Asked Question</h1>
                <p class="mt-4 text-[16px] sm:text-[18px]">Dapatkan jawaban atas pertanyaan yang sering diajukan tentang Angkasa Pura Notebook, fitur-fiturnya, dan cara menggunakannya</p>
                <div class="w-[180px] sm:w-[250px] md:w-[350px] h-1 bg-[#66B82D] mt-5"></div>
            </div>
            <div>
                @include('components.partials.faq')
            </div>
        </div>
    </section>

    @include('components.partials.footer')
@endsection