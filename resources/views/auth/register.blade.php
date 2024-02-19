@extends('layouts.main')
@section('content')
    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
            aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
            <a href="#">
                <h2 class="font-bold text-2xl">LOREM <span class="bg-[#f84525] text-white px-2 rounded-md">Perpus</span></h2>
            </a>
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mt-10">Register</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Text who ever you want where ever you want any time you want
                enjoy contacting freinds and families.</p>
        </div>
        <form action="{{ route('register') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20"
            onsubmit="return validateForm()">
            @csrf
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                    <label for="nama_depan" class="block text-sm font-semibold leading-6 text-black">Nama Depan</label>
                    <div class="mt-2.5">
                        <input type="text" name="nama_depan" id="nama_depan" autocomplete="given-name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-blue-500 ring-1 ring-inset ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                            required>
                        @error('nama_depan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="nama_belakang" class="block text-sm font-semibold leading-6 text-black">Nama
                        Belakang</label>
                    <div class="mt-2.5">
                        <input type="text" name="nama_belakang" id="nama_belakang" autocomplete="family-name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                            required>
                        @error('nama_belakang')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-red-600">Email</label>
                    <div class="mt-2.5">
                        <input type="email" name="email" id="email" autocomplete="email"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                            required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="phone" class="block text-sm font-semibold leading-6 text-red-600">Phone</label>
                    <div class="mt-2.5">
                        <input type="text" name="phone" id="phone" autocomplete="text"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                            required>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="password" class="block text-sm font-semibold leading-6 text-red-600">Password</label>
                    <div class="mt-2.5">
                        <input type="password" name="password" id="password" autocomplete="text"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                            required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="con_pass" class="block text-sm font-semibold leading-6 text-red-600">Confirm
                        Password</label>
                    <div class="mt-2.5">
                        <input type="password" name="con_pass" id="con_pass" autocomplete="text"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                            required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="alamat" class="block text-sm font-semibold leading-6 text-red-600">Alamat</label>
                    <div class="mt-2.5">
                        <textarea name="alamat" id="alamat" rows="4"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                            required></textarea>
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class=" mt-10">
                <button type="submit"
                    class="flex items-center justify-center w-full py-4 mb-6 text-sm font-bold  text-white transition duration-300 rounded-2xl  hover:bg-blue-600 focus:ring-4 focus:ring-blue-100 bg-blue-500">Regsiter</button>
            </div>
        </form>
        <div class="mx-auto max-w-xl text-center">
            <div class="flex items-center mb-3">
                <hr class="h-0 border-b border-solid border-grey-500 grow">
                <p class="mx-4 text-grey-600">or</p>
                <hr class="h-0 border-b border-solid border-grey-500 grow">
            </div>
            <a class="flex items-center justify-center w-full py-4 mb-6 text-sm font-medium transition duration-300 rounded-2xl text-grey-900 bg-grey-300 hover:bg-grey-400 focus:ring-4 focus:ring-grey-300"
                href="{{ url('auth/redirect') }}">
                <img id="sign" class="h-5 mr-2"
                    src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/logos/logo-google.png"
                    alt="">
                Sign in with Google
            </a>
            <p class="text-sm leading-relaxed text-grey-900">Sudah Punya Akun? <a href="{{ route('login') }}"
                    class="font-bold text-grey-700">Login</a></p>
        </div>
    </div>
@endsection
