@extends('layouts.navigation')

@section('title', 'Data Perpulangan')
@section('content')
<section id="main-section" x-data="{
        modalState: false, 
        selectedId: 1,
    }" class="container pt-10 mx-auto">
    <div x-cloak x-show="modalState" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        @livewire('create-permit')
    </div>

    <div class="relative p-6 bg-white rounded-lg">
        <div class="absolute -top-4 sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="px-5 py-2 text-sm text-whiteflex items-center bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 justify-center ">
                    <h2 class="text-lg font-medium text-white">Data Perpulangan</h2>
                </div>
            </div>
        </div>
    
        <div class="mt-6 md:flex md:items-center md:justify-end">
            <div x-data="{dropdownMenu: false}" class="flex gap-x-3">
                <button x-on:click="modalState=true" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
    
                    <span>Tambah Data</span>
                </button>
                @if (auth()->user()->level==="ADMIN")
                <button x-on:click.outside="dropdownMenu=false" x-on:click="dropdownMenu=!dropdownMenu"" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" viewBox="0 0 24 24" fill="none" >
                        <g id="Interface / Book_Open">
                        <path id="Vector" d="M12 9.7998V19.9998M12 9.7998C12 8.11965 12 7.27992 12.327 6.63818C12.6146 6.0737 13.0732 5.6146 13.6377 5.32698C14.2794 5 15.1196 5 16.7998 5H19.3998C19.9599 5 20.2401 5 20.454 5.10899C20.6422 5.20487 20.7948 5.35774 20.8906 5.5459C20.9996 5.75981 21 6.04004 21 6.6001V15.4001C21 15.9601 20.9996 16.2398 20.8906 16.4537C20.7948 16.6419 20.6425 16.7952 20.4543 16.8911C20.2406 17 19.961 17 19.402 17H16.5693C15.6301 17 15.1597 17 14.7334 17.1295C14.356 17.2441 14.0057 17.4317 13.701 17.6821C13.3568 17.965 13.096 18.3557 12.575 19.1372L12 19.9998M12 9.7998C12 8.11965 11.9998 7.27992 11.6729 6.63818C11.3852 6.0737 10.9263 5.6146 10.3618 5.32698C9.72004 5 8.87977 5 7.19961 5H4.59961C4.03956 5 3.75981 5 3.5459 5.10899C3.35774 5.20487 3.20487 5.35774 3.10899 5.5459C3 5.75981 3 6.04004 3 6.6001V15.4001C3 15.9601 3 16.2398 3.10899 16.4537C3.20487 16.6419 3.35774 16.7952 3.5459 16.8911C3.7596 17 4.03901 17 4.59797 17H7.43073C8.36994 17 8.83942 17 9.26569 17.1295C9.64306 17.2441 9.99512 17.4317 10.2998 17.6821C10.6426 17.9638 10.9017 18.3526 11.4185 19.1277L12 19.9998" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                    </svg>
                    <span>Report</span>
                </button>
                @endif
                <div x-show="dropdownMenu" class="absolute py-2 w-48 rounded-md bg-white shadow-md z-40 right-0 top-24">
                    <a
                        href="{{ route('permits.export.excel') }}"
                        class="block px-2 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Excel</a>
                    <a
                        href="{{ route("permits.export.pdf") }}"
                        class="block px-2 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">PDF</a>
                </div>
            </div>
        </div>
    
        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        <button class="flex items-center gap-x-3 focus:outline-none">
                                            <span>Name</span>
                                        </button>
                                    </th>
    
                                    <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        <button class="flex items-center gap-x-3 focus:outline-none">
                                            <span>Tanggal Pulang</span>
                                        </button>
                                    </th>
    
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        <button class="flex items-center gap-x-3 focus:outline-none">
                                            <span>Tanggal Kembali</span>
                                        </button>
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        <button class="flex items-center gap-x-3 focus:outline-none">
                                            <span>Alasan</span>
                                        </button>
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        <button class="flex items-center gap-x-3 focus:outline-none">
                                            <span>Pengizin</span>
                                        </button>
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        <button class="flex items-center gap-x-3 focus:outline-none">
                                            <span>Status</span>
                                        </button>
                                    </th>
    
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        <button class="flex items-center gap-x-3 focus:outline-none">
                                            <span>Action</span>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach (\App\Models\Permit::all() as $permit)  
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                <h2 class="font-medium text-gray-800">{{ $permit->student->name }} - {{ $permit->student->room }}</h2>
                                            </div>
                                        </td>
                                        <td class="px-12 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <h4 class="text-gray-700">{{ $permit->start_date }}</h4>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <h4 class="text-gray-700">{{ $permit->end_date }}</h4>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <h4 class="text-gray-700">{{ $permit->reason }}</h4>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <h4 class="text-gray-700">{{ $permit->user->name }} - {{ $permit->user->level }}</h4>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            @php
                                                date_default_timezone_set('Asia/Jakarta')
                                            @endphp
                                            @if (!$permit->returned)
                                                @if (strtotime($permit->end_date)>=time())
                                                <div class="inline-block px-2 py-1 justify-center text-sm text-white transition-colors duration-200 bg-yellow-500 rounded-lg gap-x-2">
                                                    <p class="text-sm">Belum Kembali</p>
                                                </div>
                                                @else
                                                <div class="inline-block px-2 py-1 justify-center text-sm text-white transition-colors duration-200 bg-red-500 rounded-lg gap-x-2">
                                                    <p class="text-sm">Belum Kembali</p>
                                                </div>
                                                @endif
                                            @else
                                            <div class="inline-block px-2 py-1 justify-center text-sm text-white transition-colors duration-200 bg-green-500 rounded-lg gap-x-2">
                                                <p class="text-sm">Sudah Kembali</p>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <button onclick="window.location.href = '{{ route('permits.edit', ['permit' => $permit]) }}'" class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>                                                                                                    
                                            </button>
                                            {{-- <form action="{{ route('permits.destroy', $permit->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-100">
                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.33301 8.16667V13.1667M9.66634 8.16667V13.1667M1.33301 4.83333H14.6663M13.833 4.83333L13.1105 14.9517C13.0806 15.3722 12.8924 15.7657 12.5839 16.053C12.2755 16.3403 11.8696 16.5 11.448 16.5H4.55134C4.12979 16.5 3.7239 16.3403 3.41541 16.053C3.10693 15.7657 2.91877 15.3722 2.88884 14.9517L2.16634 4.83333H13.833ZM10.4997 4.83333V2.33333C10.4997 2.11232 10.4119 1.90036 10.2556 1.74408C10.0993 1.5878 9.88735 1.5 9.66634 1.5H6.33301C6.11199 1.5 5.90003 1.5878 5.74375 1.74408C5.58747 1.90036 5.49967 2.11232 5.49967 2.33333V4.83333H10.4997Z" stroke="#F65656" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                                    
                                                </button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<link rel="stylesheet" href="/css/jquery.dataTables.css"/>
<script src="/js/jquery-3.6.4.min.js"></script>
<script defer src="/js/jquery.dataTables.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $("table").dataTable({
            responsive: true,
        });
        $("table").submit(function (e) {
            if(!confirm('Apakah anda yakin untuk menghapus user?')){
                return e.preventDefault()
            }
        });
    })
</script>
@endsection