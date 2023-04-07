@extends('layouts.navigation')

@section('title', 'Tambah Data Pulang')

@section('content')
<section class="container px-4 py-10 mx-auto">
    <div class="relative px-6 pt-16 pb-10 bg-white rounded-lg">
        <div class="absolute -top-4 sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="w-1/2 px-5 py-2 text-sm text-whiteflex items-center bg-blue-200 rounded-lg shrink-0 sm:w-auto gap-x-2 justify-center ">
                    <h2 class="text-lg font-medium text-blue-500">Data Pulang</h2>
                </div>
            </div>
        </div>
        <div class="absolute -top-4 left-56 sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="w-1/2 px-5 py-2 text-sm text-whiteflex items-center bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 justify-center ">
                    <h2 class="text-lg font-medium text-white">Tambah Data</h2>
                </div>
            </div>
        </div>

        <div class="font-semibold mb-6">
            <h1 class="text-2xl mb-4">Data Profle</h1>
            <p>Foto Profile</p>
        </div>

        {{-- content --}}
        <div class="grid grid-cols-2 gap-8">
            {{-- image input --}}
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" />
                </label>
            </div>

            {{-- form --}}
            <div>
                <form action="">
                    <label class="block mb-2 text-gray-600 font-semibold" for="nama">Username</label>
                    <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="text" name="nama" placeholder="Username">
                    <div class="grid grid-cols-2 gap-x-6">
                        <div>
                            <label class="block mb-2 text-gray-600 font-semibold" for="date">Date</label>
                            <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="date" name="date">
                        </div>
                        <div>
                            <label class="block mb-2 text-gray-600 font-semibold" for="loginData">Login Data</label>
                            <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="date" name="loginData">
                        </div>
                        <div>
                            <label class="block mb-2 text-gray-600 font-semibold" for="kelas">Class</label>
                            <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="text" name="kelas" placeholder="Masukan Kelas">
                        </div>
                        <div>
                            <label class="block mb-2 text-gray-600 font-semibold" for="izin">Permission With</label>
                            <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="date" name="izin" placeholder="Mr.Fulan">
                        </div>
                        <div>
                            <label class="block mb-2 text-gray-600 font-semibold" for="kamar">Room</label>
                            <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="text" name="kamar" placeholder="2.1">
                        </div>
                        <div>
                            <label class="block mb-2 text-gray-600 font-semibold" for="alasan">Reason</label>
                            <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="text" name="alasan" placeholder="Sakit">
                        </div>
                    </div>
                    <button class="absolute py-2 px-8 -bottom-4 right-6 text-sm rounded-md bg-blue-500 text-white" type="submit">Daftar</button>
                </form>
            </div>
        </div>



    </div>
</section>
@endsection
