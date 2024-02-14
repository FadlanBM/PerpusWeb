@extends('layouts.main')
@section('content')
<!-- This is an example component -->
<div class='flex items-center justify-center min-h-screen from-green-100 via-green-300 to-green-500 bg-gradient-to-br'>

    <div class='w-full max-w-lg px-10 py-8 mx-auto'>

        <div class='max-w-md mx-auto space-y-6'>

            <div class="dropdown-menu">

                <div class="bg-white rounded-lg shadow-xl flex items-center px-4 py-6 cursor-pointer">
                    <input type="text" placeholder="Juma Musa" readonly class="pointer-events-none text-base placeholder-gray-400 outline-none w-full h-full flex-1" />
                    <svg width="20" height="10" viewBox="0 0 20 10" xmlns="http://www.w3.org/2000/svg">
                        <line x1="0" y1="0" x2="10" y2="10" stroke="#9CA3AF" />
                        <line x1="20" y1="0" x2="10" y2="10" stroke="#9CA3AF" />
                    </svg>
                </div>

                <div class="bg-white rounded-lg shadow-xl px-4 relative mt-8">

                    <svg class="absolute bottom-full right-4" width="30" height="20" viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="15, 0 30, 20 0, 20" fill="#FFFFFF"/>
                    </svg>

                    <div class="py-6 flex items-center w-full hover:bg-gray-50">
                        <a href="#" class="flex-1">
                            <div class="text-gray-400 text-base">Profile</div>
                        </a>
                        <div>
                            <svg width="40" height="20" viewBox="0 0 40 20" xmlns="http://www.w3.org/2000/svg">
                                <line x1="30" y1="2" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="30" y1="18" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="20" y1="10" x2="40" y2="10" stroke="#9CA3AF" />
                            </svg>
                        </div>
                    </div>

                    <div class="py-6 flex items-center w-full border-t border-gray-200 hover:bg-gray-50">
                        <a href="#" class="flex-1">
                            <div class="text-gray-400 text-base">Status (Online)</div>
                        </a>
                        <div>
                            <svg width="40" height="20" viewBox="0 0 40 20" xmlns="http://www.w3.org/2000/svg">
                                <line x1="30" y1="2" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="30" y1="18" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="20" y1="10" x2="40" y2="10" stroke="#9CA3AF" />
                            </svg>
                        </div>
                    </div>

                    <div class="py-6 flex items-center w-full border-t border-gray-200 hover:bg-gray-50">
                        <a href="#" class="flex-1">
                            <div class="text-gray-400 text-base">Notifications</div>
                        </a>
                        <div>
                            <svg width="40" height="20" viewBox="0 0 40 20" xmlns="http://www.w3.org/2000/svg">
                                <line x1="30" y1="2" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="30" y1="18" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="20" y1="10" x2="40" y2="10" stroke="#9CA3AF" />
                            </svg>
                        </div>
                    </div>

                    <div class="py-6 flex items-center w-full hover:bg-gray-50 border-t border-gray-200 hover:bg-gray-50">
                        <a href="#" class="flex-1">
                            <div class="text-gray-400 text-base">Sign out</div>
                        </a>
                        <div>
                            <svg width="40" height="20" viewBox="0 0 40 20" xmlns="http://www.w3.org/2000/svg">
                                <line x1="30" y1="2" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="30" y1="18" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="20" y1="10" x2="40" y2="10" stroke="#9CA3AF" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
