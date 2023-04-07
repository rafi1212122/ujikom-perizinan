@extends('layouts.navigation') @section('title', 'Dashboard') @section('content')
<section>
    {{-- Hero --}}
    <div class="flex justify-around align-middle gap-x-20 py-8 bg-white rounded-xl my-4">
        <img class="w-80 hidden md:block" src="img/hero-image.svg" alt="hero image">
        <div class="my-auto tracking-wide">
            <h1 class="text-2xl font-semibold">Hai, Admin 👋</h1>
            <p class="mt-2 text-lg font-light">Apa yang ingin anda buat hari ini?</p>
            <p class="mt-4 text-xs font-light text-gray-400">{{ date("D, j F Y") }}</p>
        </div>
    </div>

    {{-- Total Santri --}}
    <div class="grid grid-cols-2 gap-6 py-4">
        <div
            class="h-32 p-4 text-white rounded-2xl bg-cover shadow-md shadow-blue-400/75"
            style="background-image: url('img/box 3.svg')">
            <h1 class="font-semibold">Total Santri di IDN</h1>
            <p class="text-sm">{{ App\Models\Student::all()->count() - App\Models\Permit::where("returned", false)->count() }} Orang</p>
        </div>
        <div
            class="h-32 p-4 text-white rounded-2xl bg-cover shadow-md shadow-blue-900/75"
            style="background-image: url('img/box 4.svg')">
            <h1 class="font-semibold">Total Santri Pulang</h1>
            <p class="text-sm">{{ App\Models\Permit::where("returned", false)->count() }} Orang</p>
        </div>
    </div>

</section>
@endsection
