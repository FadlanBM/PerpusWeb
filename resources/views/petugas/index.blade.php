    @extends('layouts.main')
@section('content')

    <body class="text-gray-800 font-inter">
        {{-- Sidenav --}}
        @component('petugas.components.sidenav')
        @endcomponent
        {{-- EndSidenav --}}
        <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
            {{-- Navbar --}}
            @component('petugas.components.navbar')
            @endcomponent
            {{-- EndNavbar --}}
            <!-- Content -->
            @yield('content_petugas')
@endsection
