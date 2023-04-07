@extends('layouts.navigation') @section('title','Tambah User')
@section('content')
    <section>
        <div class="relative w-3/6 mx-auto p-14 top-20 bg-white rounded-lg">
            <div class="absolute -top-4 px-3 py-2 bg-blue-500 rounded-lg text-white">
            <span>Register Musyrif Account</span>
        </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form action="{{ route("users.store") }}" method="POST">
                @csrf
                <label class="block mb-2 text-gray-600 font-semibold" for="name">Name</label>
                <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="text" name="name" placeholder="Full Name">
                <label class="block mb-2 text-gray-600 font-semibold" for="email">Email</label>
                <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="email" name="email" placeholder="hr@gmail.com">
                {{-- <label class="block mb-2 text-gray-600 font-semibold" for="room">Room</label>
                <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="text" name="room" placeholder="2.1"> --}}
                <label class="block mb-2 text-gray-600 font-semibold" for="pass">Password</label>
                <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="password" name="password" placeholder="Insert Password">
                <label class="block mb-2 text-gray-600 font-semibold" for="pass">Confirm Password</label>
                <input class="block w-full rounded-lg border-gray-300 mb-4 focus:outline-none focus:border-blue-400 focus:ring-blue-400 focus:shadow-lg focus:shadow-blue-300/75" type="password" name="password_confirmation" placeholder="Insert Password Confirmation">
                <div class="relative ">
                <button class="absolute py-2 px-3 right-0 text-sm rounded-md bg-blue-500 text-white" type="submit">Daftar</button>
            </div>
            </form>

        </div>
    </section>
@endsection