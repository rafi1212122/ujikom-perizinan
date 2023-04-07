@extends('layouts.navigation') @section('title','Tambah Santri')
@section('content')
    <section>
        <div class="relative w-3/6 mx-auto p-14 top-20 bg-white rounded-lg">
            <div class="absolute -top-4 px-3 py-2 bg-blue-500 rounded-lg text-white">
            <span>Tambah Data Santri</span>
        </div>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route("students.store") }}" method="POST">
            @csrf
            <label class="block mb-2 text-gray-600 font-semibold" for="name">Name</label>
            <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="text" name="name" placeholder="Full Name">
            <label class="block mb-2 text-gray-600 font-semibold" for="room">Room</label>
            <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="text" name="room" placeholder="2.1">
            <div class="flex justify-end">
                <button class="py-2 px-3 text-sm rounded-md bg-blue-500 text-white" type="submit">Daftar</button>
            </div>
        </div>
        </form>
        </div>
    </section>
@endsection