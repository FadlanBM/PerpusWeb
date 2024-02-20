@extends('layouts.main')
@section('content')
    <div class="container flex flex-col mx-auto rounded-lg pt-12 my-5">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
            aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
            <div class="flex items-center justify-center w-full lg:p-12">
                <div class="flex items-center xl:p-10">
                    <form method="POST" action="{{ route('login') }}" class="flex flex-col w-full h-full pb-6 text-center">
                        @csrf
                        <a href="#" class="mb-10">
                            <h2 class="font-bold text-2xl">LOREM <span
                                    class="bg-[#f84525] text-white px-2 rounded-md">Perpus</span></h2>
                        </a>
                        <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Sign In</h3>
                        <p class="mb-4 text-grey-700">Enter your email and password</p>
                        <a class="flex items-center justify-center w-full py-4 mb-6 text-sm font-medium transition duration-300 rounded-2xl text-grey-900 bg-grey-300 hover:bg-grey-400 focus:ring-4 focus:ring-grey-300"
                            href="{{ url('auth/redirect') }}">
                            <img id="sign" class="h-5 mr-2"
                                src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/logos/logo-google.png"
                                alt="">
                            Sign in with Google
                        </a>
                        <div class="flex items-center mb-3">
                            <hr class="h-0 border-b border-solid border-grey-500 grow">
                            <p class="mx-4 text-grey-600">or</p>
                            <hr class="h-0 border-b border-solid border-grey-500 grow">
                        </div>
                        <label for="email" class="mb-2 text-sm text-start text-grey-900">Email*</label>
                        <div class="mb-7">
                            <input id="email" name="email" type="email" placeholder="example@google.com"
                                class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"
                                required />
                            @error('email')
                                <span class=" mt-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label for="password" class="mb-2 text-sm text-start text-grey-900">Password*</label>
                        <div class="mb-5">
                            <input id="password" name="password" type="password" placeholder="Enter a password"
                                class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"
                                required />
                            @error('password')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-blue-600 focus:ring-4 focus:ring-blue-100 bg-blue-500">SignIn</button>
                        <p class="text-sm leading-relaxed text-grey-900">Belum Punya Akum? <a href="{{ route('register') }}"
                                class="font-bold text-grey-700">Register</a></p>
                    </form>
                </div>
            </div>
        @endsection
