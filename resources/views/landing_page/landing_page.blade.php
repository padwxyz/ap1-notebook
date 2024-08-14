@extends('components.layouts.main')

@include('components.layouts.navbar')

@section('container')
    {{-- home --}}
        <section class="mb-[110px]">
            <div class="relative h-screen bg-fixed bg-center bg-cover" style="background-image: url('{{ asset('img/background.png') }}');">
                <div class="relative flex flex-col items-center justify-center h-full text-center">
                    <img src="{{ asset('img/logo.png') }}" class="h-12 mb-4" alt="">
                    <h1 class="text-white text-[62px] font-bold">ANGKASA PURA I AIRPORTS</h1>
                    <h3 class="text-white text-[32px] font-regular">NOTEBOOK</h3>
                </div>
            </div>
        </section>

        {{-- about --}}
        <section class="container mx-auto mb-[110px]">
            <div class="grid grid-cols-2 gap-8 justify-items-center">
                <div>
                    <h1 class="text-[60px] font-bold" style="background: linear-gradient(90deg, #66B82D 0.07%, #009BE0 96.65%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">ANGKASA PURA</h1>
                    <h1 class="text-[60px] font-bold">NOTEBOOK</h1>
                    <div class="w-[350px] h-1 bg-[#66B82D] mb-5"></div>
                    <p class="text-[18px]">Angkasa Pura Notebook dirancang untuk meningkatkan produktivitas, transparansi, dan akurasi dalam pengelolaan tugas di lingkungan terminal.</p>
                </div>
                <div>
                    <img src="{{ asset('img/about.png') }}" class="shadow-2xl" alt="#about-img">
                </div>
            </div>
        </section>

        {{-- service --}}
        <section class="mb-[110px]">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                <div class="relative">
                    <img src="{{ asset('img/information-1.png') }}" class="object-cover w-full h-full" alt="">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-black bg-opacity-50">
                        <h3 class="text-[24px] font-bold mb-2">CATATAN KEGIATAN</h3>
                        <p class="text-[12px] mb-1 p-10 text-center">Catat setiap tugas dan aktivitas dengan mudah untuk memastikan semua pekerjaan terdokumentasi dengan baik.</p>
                        {{-- <p><a href="" class="underline text-[18px]">View</a></p> --}}
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('img/information-2.png') }}" class="object-cover w-full h-full" alt="">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-black bg-opacity-50">
                        <h3 class="text-[24px] font-bold mb-2">ATUR STATUS TUGAS</h3>
                        <p class="text-[12px] mb-1 p-10 text-center">Tandai pekerjaan sebagai "Sedang Dilakukan", "Pending", atau "Selesai" untuk memudahkan pengelolaan dan prioritas.</p>
                        {{-- <p><a href="" class="underline text-[18px]">View</a></p> --}}
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('img/information-3.png') }}" class="object-cover w-full h-full" alt="">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-black bg-opacity-50">
                        <h3 class="text-[24px] font-bold mb-2">AKSES FLEKSIBEL</h3>
                        <p class="text-[12px] mb-1 p-10 text-center">Kelola catatan Anda kapan saja dan di mana saja melalui platform digital yang bisa diakses dari berbagai perangkat.</p>
                        {{-- <p><a href="" class="underline text-[18px]">View</a></p> --}}
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('img/information-4.png') }}" class="object-cover w-full h-full" alt="">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-black bg-opacity-50">
                        <h3 class="text-[24px] font-bold mb-2">ARSIP OTOMATIS</h3>
                        <p class="text-[12px] mb-1 p-10 text-center">Semua catatan tersimpan otomatis, memudahkan pencarian dan review tugas yang telah dilakukan.</p>
                        {{-- <p><a href="" class="underline text-[18px]">View</a></p> --}}
                    </div>
                </div>
            </div>
        </section>

        {{-- faq --}}
        <section class="container mx-auto mb-[110px]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="relative">
                    <div class="absolute top-[-20px] left-0">
                        {{-- <img src="{{ asset('img/banner-faq.png') }}" class="w-[180px] h-[55px]" alt=""> --}}
                    </div>
                    <h1 class="text-[60px] font-bold">Frequently Asked Question</h1>
                    <p class="mt-4 text-[18px]">Dapatkan jawaban atas pertanyaan yang sering diajukan tentang Angkasa Pura Notebook, fitur-fiturnya, dan cara menggunakannya</p>
                    <div class="w-[350px] h-1 bg-[#66B82D] mt-5"></div>
                </div>
                <div>
                    @include('components.layouts.faq')
                </div>
            </div>
        </section>

        @include('components.layouts.footer')
        
@endsection
    