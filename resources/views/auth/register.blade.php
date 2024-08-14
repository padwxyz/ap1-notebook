@extends('components.layouts.main')

@section('container')
    <section>
        <div class="container flex flex-col mx-auto bg-white rounded-lg">
            <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
                <div class="flex items-center justify-center w-full lg:p-12">
                    <div class="flex items-center xl:p-10">
                        
                        <form action="{{ route('register') }}" method="POST"
                            class="flex flex-col w-full h-full pb-6 text-center bg-white rounded-3xl">
                            @csrf

                            <h3 class="mb-3 text-4xl font-extrabold text-[#0045A4]">Register</h3>
                            <p class="mb-4 text-grey-700">Create your account</p>
                            <div class="flex items-center mb-3">
                                <hr class="h-0 border-b border-solid border-grey-500 grow">
                            </div>

                            <label for="email" class="mb-2 text-sm text-start text-grey-900">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                placeholder="mail@mail.com"
                                class="flex items-center w-[500px] px-5 py-4 mb-3 text-sm font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('email') border-red-500 @else border-slate-300 @enderror">
                            @error('email')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror

                            <label for="name" class="mb-2 text-sm text-start text-grey-900">Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}"
                                placeholder="Input your name"
                                class="flex items-center w-[500px] px-5 py-4 mb-3 text-sm font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('name') border-red-500 @else border-slate-300 @enderror">
                            @error('name')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror

                            <label for="username" class="mb-2 text-sm text-start text-grey-900">Username</label>
                            <input id="username" name="username" type="text" value="{{ old('username') }}"
                                placeholder="Input your username"
                                class="flex items-center w-[500px] px-5 py-4 mb-3 text-sm font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('username') border-red-500 @else border-slate-300 @enderror">
                            @error('username')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror

                            <label for="password" class="mb-2 text-sm text-start text-grey-900">Password</label>
                            <input id="password" name="password" type="password" placeholder="Enter a password"
                                class="flex items-center w-[500px] px-5 py-4 mb-3 text-sm font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('password') border-red-500 @else border-slate-300 @enderror">
                            @error('password')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror

                            {{-- <label for="password_confirmation" class="mb-2 text-sm text-start text-grey-900">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm your password"
                                class="flex items-center w-[500px] px-5 py-4 mb-5 text-sm font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('password_confirmation') border-red-500 @else border-slate-300 @enderror">
                            @error('password_confirmation')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror --}}

                            <div class="flex flex-row justify-between mb-5 mt-5">
                                <label class="relative inline-flex items-center cursor-pointer select-none">
                                    <input type="checkbox" value="" class="sr-only peer">
                                    <div
                                        class="w-5 h-5 bg-white border-2 rounded-sm border-grey-500 peer peer-checked:border-0 peer-checked:bg-[#66B82D]">
                                        <img src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/icons/check.png"
                                            alt="tick">
                                    </div>
                                    <span class="ml-3 text-sm font-normal text-grey-900">I agree to the terms and
                                        conditions</span>
                                </label>
                            </div>

                            <button
                                class="w-[500px] px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-[500px] rounded-2xl hover:bg-[#003080] focus:ring-4 focus:ring-[#0045A4]/50 bg-[#0045A4]">
                                Register
                            </button>
                            <p class="text-sm leading-relaxed text-grey-900">Already have an account? <a
                                    href="{{ route('login') }}" class="font-bold text-grey-700">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap mx-3 my-5">
            <div class="w-full max-w-full sm:w-3/4 mx-auto text-center">
                <a href="{{ route('landing_page') }}">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('img/logo.png') }}" class="h-4 mb-1" alt="">
                    </div>
                    <p class="text-sm text-slate-500 py-1">Angkasa Pura I Notebook</p>
                </a>
            </div>
        </div>
    </section>
@endsection
