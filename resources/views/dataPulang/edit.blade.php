@extends('layouts.navigation')

@section('title', 'Tambah Data Pulang')

@section('content')
<section class="container px-4 py-10 mx-auto">
    <form action="{{ route('permits.update', ['permit' => $permit]) }}" method="POST" class="relative p-6 bg-white rounded-lg">
        @method('PUT')
        <div class="absolute -top-4 sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="px-5 py-2 text-sm text-whiteflex items-center bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 justify-center ">
                    <h2 class="text-lg font-medium text-white">Edit Data Perpulangan</h2>
                </div>
            </div>
        </div>
        <div class="mt-6 space-y-3 pb-2">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @csrf
            <div>
                <x-label for="student" :value="__('Santri')" />
                <x-input value="{{ $permit->student->name }}" disabled id="student" class="block mt-1 w-full" type="text" name="student" required />
            </div>
            <div>
                <x-label for="start_date" :value="__('Tanggal Pulang')" />
                <x-input value="{{ $permit->start_date }}" disabled id="start_date" class="block mt-1 w-full" type="datetime-local" name="start_date" required />
            </div>
            <div>
                <x-label for="end_date" :value="__('Tanggal Kembali')" />
                <x-input value="{{ $permit->end_date }}" id="end_date" class="block mt-1 w-full" type="datetime-local" name="end_date" required />
            </div>
            <div>
                <x-label for="reason" :value="__('Alasan')" />
                <textarea disabled id="reason" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="reason" required>{{ $permit->reason }}</textarea>
            </div>
            <div>
                <x-label for="returned" :value="__('Status')" />
                <select required class="w-full rounded-md shadow-sm cursor-pointer border-gray-300 focus:border-green-500 focus:ring focus:ring-green-400 focus:ring-opacity-50" name="returned" id="returned">
                    <option value="false">Belum Kembali</option>
                    <option value="true">Sudah Kembali</option>
                </select>
            </div>
        </div>
        <div class="flex items-center justify-end pt-2 space-x-2">
            <button class="text-md px-4 py-2 bg-green-600 hover:bg-green-500 text-white font-semibold rounded-md" type="submit">Save</button>
        </div>
    </form>
</section>
@endsection
