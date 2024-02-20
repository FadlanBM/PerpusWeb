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
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Register </h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Lengkapi data diri anda terlebih dahulu </p>
        </div>
        <form method="POST" action="{{ route('data.update', $users->id) }}" class="mx-auto mt-16 max-w-xl sm:mt-20"
            onsubmit="return validateForm()">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="alamat" class="block text-sm font-semibold leading-6 text-red-600">Phone</label>
                    <div class="mt-2.5">
                        <input type="text" name="phone" id="phone" autocomplete="text" value="{{ $users->phone }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6"
                            required>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block text-sm font-semibold leading-6 text-green-600">Alamat</label>
                    <div class="mt-2.5">
                        <textarea name="alamat" id="alamat" rows="4"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            required>{{ $users->alamat }}</textarea>
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class=" mt-10">
                <button type="submit"
                    class="flex items-center justify-center w-full py-4 mb-6 text-sm font-bold  text-white transition duration-300 rounded-2xl  hover:bg-blue-600 focus:ring-4 focus:ring-blue-100 bg-blue-500">Submit</button>
            </div>
        </form>
    </div>
@endsection
