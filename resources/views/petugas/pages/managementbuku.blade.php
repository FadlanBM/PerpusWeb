@extends('petugas.index')
@section('content_petugas')
    <div class=" w-full p-6">
        <div class="h-[89vh] bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <button class="btn btn-primary mb-10" onclick="my_modal_1.showModal()">open modal</button>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Buku</th>
                            <th>Kategory</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($book as $book)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle w-12 h-12">
                                                <img src="{{ asset('storage/sampul/' . $book->img) }}"
                                                    alt="Avatar Tailwind CSS Component" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $book->judul }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $book->penulis }}
                                </td>
                                <td>
                                    {{ $book->penulis }}
                                </td>
                                <td> {{ $book->penerbit }}
                                </td>
                                <td> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $book->created_at)->format('d-m-Y') }}
                                </td>
                                <td>
                                    <div class="flex justify-end gap-4">

                                        <a x-data="{ tooltip: 'Delete' }" href="#"
                                            x-on:click.prevent="
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak akan dapat mengembalikan tindakan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Delete data!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                     axios.delete(`/petugas/management/delete/katogory/`)
                         .then((response) => {
                        Swal.fire(
                            'Berhasil!',
                            'Berhasil delete data.',
                            'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        })
                        .catch((error) => {
                            Swal.fire(
                                'Gagal!',
                            'Terjadi kesalahan saat memberikan akses ke akun.',
                            'error'
                        );
                    });
                }
            });
        ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                                x-tooltip="tooltip">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0)" id="show-user" data-url="">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                                x-tooltip="tooltip">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <dialog id="my_modal_1" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Input Data Buku!</h3>
            <form method="post" action="{{ route('managementbuku') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Judul Buku</span>
                    </div>
                    <input type="text" name="judul" id="judul" class="input input-bordered w-full" required />
                    @error('judul')
                        <small class="mt-2 text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Penulis</span>
                    </div>
                    <input type="text" name="penulis" id="penulis" class="input input-bordered w-full" required />
                    @error('penulis')
                        <small class="mt-2 text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Penerbit</span>
                    </div>
                    <input type="text" name="penerbit" id="penerbit" class="input input-bordered w-full" required />
                    @error('penerbit')
                        <small class="mt-2 text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Description</span>
                    </div>
                    <input type="text" name="desc" id="desc" class="input input-bordered w-full" required />
                    @error('desc')
                        <small class="mt-2 text-danger">{{ $message }}</small>
                    @enderror
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Tahun Terbit</span>
                    </div>
                    <input type="date" name="tahun_terbit" id="tahun_terbit" class="input input-bordered w-full"
                        required />
                    @error('tahun_terbit')
                        <small class="mt-2 text-danger">{{ $message }}</small>
                    @enderror
                </label>

                <label class="w-full">
                    <div class="label">
                        <span class="label-text">Kategory Buku</span>
                    </div>
                    <div class="mx-auto text-xs" x-data="{
                        search: '',
                        showSelector: false,
                        selected: {},
                        options: [],
                        clearOpts() {
                            this.search = '';
                            this.showSelector = false;
                            this.options = [];
                        },
                        select(id, name) {
                            this.selected[id] = name;
                            this.clearOpts();
                            this.$emit('selected', Object.values(this.selected));
                        },
                        remove(id) {
                            delete this.selected[id];
                            this.$emit('selected', Object.values(this.selected));
                        },
                        goSearch() {
                            if (this.search) {
                                // Mengambil data kategori berdasarkan pencarian dari server
                                fetch('/search/category?search=' + this.search)
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data); // Log the response data to the console
                                        this.options.push(...data.map(category => category.nama_kategori)); // Menambahkan kategori baru tanpa mengganti yang lama
                                        this.showSelector = true;
                                    })
                                    .catch(error => {
                                        console.error('Error fetching category:', error);
                                    });
                            } else {
                                this.showSelector = false;
                            }
                        },
                    }">
                        <div class="bg-white rounded-md p-2 flex gap-1 flex-wrap" @click="$refs.search_input.focus()"
                            @click.outside="showSelector=false">
                            <template x-for="(name, id) in selected">
                                <div class="bg-blue-200 rounded-md flex items-center">
                                    <div class="p-2" x-text="name"></div>
                                    <div @click="remove(id)"
                                        class="p-2 select-none rounded-r-md cursor-pointer hover:bg-magma-orange-clear">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5745 1L1 12.5745" stroke="#FEAD69" stroke-width="2"
                                                stroke-linecap="round" />
                                            <path d="M1.00024 1L12.5747 12.5745" stroke="#FEAD69" stroke-width="2"
                                                stroke-linecap="round" />
                                        </svg>
                                    </div>
                                </div>
                            </template>
                            <div class="flex-1">
                                <input type="text" x-model="search" x-ref="search_input"
                                    @input.debounce.400ms="goSearch();" placeholder="Search"
                                    class="w-full border-0 focus:border-0 focus:outline-none focus:ring-0 py-1 px-0">
                                <div x-show="showSelector"
                                    class="absolute left-0 bg-white z-30 w-full rounded-b-md font-medium">
                                    <div class="p-2 space-y-1">
                                        <template x-for="(name, id) in options">
                                            <div>
                                                <template x-if="!selected[id]">
                                                    <div @click="select(id, name)"
                                                        class="bg-blue-200 border-2 border-blue-200 cursor-pointer rounded-md p-2 hover:border-light-blue-1"
                                                        x-text="name"></div>
                                                </template>
                                            </div>
                                        </template>
                                        <template x-if="options.length === 0">
                                            <div class="text-gray-500">
                                                No result
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </label>


                <label for="city">
                </label>
                <div class="bg-white shadow p-4 py-8 mt-2" x-data="{ images: [] }">
                    <!-- icons -->
                    <div class="icons flex text-gray-500 m-2">
                        <label id="select-image">
                            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            @error('image')
                                <small class="mt-2 text-danger">{{ $message }}</small>
                            @enderror
                            <input hidden type="file" id="image" name="image" accept="image/jpeg, image/png"
                                @change="images = Array.from($event.target.files).map(file => ({url: URL.createObjectURL(file), name: file.name, preview: ['jpg', 'jpeg', 'png', 'gif'].includes(file.name.split('.').pop().toLowerCase()), size: file.size > 1024 ? file.size > 1048576 ? Math.round(file.size / 1048576) + 'mb' : Math.round(file.size / 1024) + 'kb' : file.size + 'b'}))"
                                x-ref="fileInput" required>
                        </label>
                    </div>

                    <!-- Preview image here -->
                    <div id="preview" class="my-4 flex">
                        <template x-for="(image, index) in images" :key="index">
                            <div class="relative w-32 h-32 object-cover rounded ">
                                <div x-show="image.preview" class="relative w-32 h-32 object-cover rounded">
                                    <img :src="image.url" class="w-32 h-32 object-cover rounded">
                                    <button type="button" @click="images.splice(index, 1)"
                                        class="w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-black text-lg bg-red-500 hover:text-red-700 hover:bg-gray-100 rounded-full p-1"><span
                                            class="mx-auto">×</span></button>
                                    <div x-text="image.size" class="text-xs text-center p-2"></div>
                                </div>
                                <div x-show="!image.preview" class="relative w-32 h-32 object-cover rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-indigo-500"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <svg class="fill-current  w-32 h-32 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                    </svg>
                                    <div x-text="image.size" class="text-xs text-center p-2"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="modal-action">
                    <button class="btn btn-accent" type="submit">Submit</button>
            </form>
            <form method="dialog">
                <button class="btn" id="closeButton">Close</button>
            </form>
        </div>
        </div>
    </dialog>
    <script>
        const modal3 = document.getElementById('my_modal_1');
        var judul = document.getElementById("judul");
        var penulis = document.getElementById("penulis");
        var penerbit = document.getElementById("penerbit");
        var desc = document.getElementById("desc");
        var tahun_terbit = document.getElementById("tahun_terbit");
        var image = document.getElementById("image");

        document.getElementById('closeButton').addEventListener('click', function() {
            judul.value = "";
            penulis.value = "";
            penerbit.value = "";
            desc.value = "";
            tahun_terbit.value = "";
        });
        $(document).ready(function() {
            @if ($errors->has('judul'))
                modal3.showModal();
            @endif
            @if ($errors->has('penulis'))
                modal3.showModal();
            @endif
            @if ($errors->has('penerbit'))
                modal3.showModal();
            @endif
            @if ($errors->has('desc'))
                modal3.showModal();
            @endif
            @if ($errors->has('tahun_terbit'))
                modal3.showModal();
            @endif
            @if ($errors->has('image'))
                modal3.showModal();
            @endif
        });
    </script>
@endsection
