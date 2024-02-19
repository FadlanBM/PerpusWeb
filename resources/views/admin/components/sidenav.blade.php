<!--sidenav -->
<div class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <h2 class="font-bold text-2xl">LOREM <span class="bg-[#f84525] text-white px-2 rounded-md">Perpus</span></h2>
    </a>
    <ul class="mt-4">
        <li class="{{request()->is('admin/dashboard') ? 'active' : '' }} mb-1 group">
            <a href="{{route('dashboardadmin')}}"
                class="active flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        <span class="text-gray-400 font-bold">ADMIN</span>
        <li class="{{request()->is('admin/management/admin') ? 'active' : '' }} mb-1 group">
            <a href="{{route('managementadmin')}}"
                class="active flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-user mr-3 text-lg'></i>
                <span class="text-sm">Management Admin</span>
            </a>
        </li>
        <li class="{{request()->is('admin/management/petugas') ? 'active' : '' }} mb-1 group">
            <a href="{{route('managementpetugas')}}"
                class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-user mr-3 text-lg'></i>
                <span class="text-sm">Petugas</span>
            </a>
        </li>
        <li class="{{request()->is('admin/management/peminjam') ? 'active' : '' }} mb-1 group">
            <a href="{{route('managementpeminjam')}}"
                class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-user mr-3 text-lg'></i>
                <span class="text-sm">Peminjam</span>
            </a>
        </li>
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end sidenav -->
