@extends('components.layouts.main')

@section('container')
    <section>
        <div class="container flex flex-col mx-auto bg-white rounded-lg pt-20 my-5">
            <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
                <div class="flex items-center justify-center w-full lg:p-12">
                    <div class="flex items-center xl:p-10">
                        <form class="flex flex-col w-full h-full pb-6 text-center bg-white rounded-3xl">
                            <h3 class="mb-3 text-4xl font-extrabold text-[#0045A4]">Admin Login</h3>
                            <p class="mb-4 text-grey-700">Enter your email and password</p>
                            <div class="flex items-center mb-3">
                                <hr class="h-0 border-b border-solid border-grey-500 grow">
                            </div>
                            <label for="email" class="mb-2 text-sm text-start text-grey-900">Email*</label>
                            <input id="email" type="email" placeholder="mail@mail.com" class="flex items-center w-full px-5 py-4 mb-7 text-sm font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border border-slate-300">
                            <label for="password" class="mb-2 text-sm text-start text-grey-900">Password*</label>
                            <input id="password" type="password" placeholder="Enter a password" class="flex items-center w-full px-5 py-4 mb-7 text-sm font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border border-slate-300">
                            <button class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-[#003080] focus:ring-4 focus:ring-[#0045A4]/50 bg-[#0045A4]"><a href="{{ route('admin-dashboard') }}">Login</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection