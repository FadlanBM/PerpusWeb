@extends('layouts.main')
@section('content')

    <body class="text-gray-800 font-inter">
        {{-- Sidenav --}}
        @component('admin.components.sidenav')
        @endcomponent
        {{-- EndSidenav --}}
        <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
            {{-- Navbar --}}
            @component('admin.components.navbar')
            @endcomponent
            {{-- EndNavbar --}}
            @yield('content_admin')
@endsection
