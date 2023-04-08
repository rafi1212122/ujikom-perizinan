@extends('layouts.navigation') 
@section('title','Data Santri')
@section('content')
<section x-data="{modalState:false}" class="container pt-10 mx-auto">
    <div x-cloak x-show="modalState" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <form enctype="multipart/form-data" action="{{ route('students.import') }}" method="POST" @click.away="modalState=false" class="relative bg-white rounded-lg max-w-md w-full 2xl:max-w-7xl xl:max-w-5xl md:max-w-2xl shadow">
            @csrf
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-900">
                    Import Data Santri
                </h3>
                <button @click.prevent="modalState=false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="small-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div>
                    <input required id="file" type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" class="block w-full text-base text-gray-600 bg-green-100 rounded-md p-2 focus:ring-2 ring-green-300 focus:outline-none
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0
                    file:text-base file:font-semibold
                    file:bg-green-600 file:text-white
                    file:cursor-pointer hover:file:bg-green-500
                    "/>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-between px-6 py-4 space-x-2 rounded-b border-t border-gray-200">
                <a href="/sample/students.xlsx" class="text-md px-4 py-2 bg-white outline outline-green-600 text-green-500 hover:text-green-600 font-semibold rounded-md focus:outline-2">Sample Excel</a>
                <button class="text-md px-4 py-2 bg-green-600 hover:bg-green-500 text-white font-semibold rounded-md" type="submit">Import</button>
            </div>
        </form>
    </div>

    <div class="relative p-6 bg-white rounded-lg">
        <div class="absolute -top-4 sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="px-5 py-2 text-sm text-whiteflex items-center bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 justify-center ">
                    <h2 class="text-lg font-medium text-white">Data Santri</h2>
                </div>
            </div>
        </div>
    
        <div class="mt-6 md:flex md:items-center md:justify-between">
            <button x-on:click="modalState=true" class="flex items-center mb-2 md:mb-0 justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>                      

                <span>Import Data</span>
            </button>
            <div x-data="{dropdownMenu: false}" class="flex gap-x-3">
                <a href="{{ route("students.create") }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
    
                    <span>Tambah Data</span>
                </a>
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
                        href="{{ route('students.export.excel') }}"
                        class="block px-2 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Excel</a>
                    <a
                        href="{{ route("students.export.pdf") }}"
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
                                            <span>Room</span>
                                        </button>
                                    </th>

                                    <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        <button class="flex items-center gap-x-3 focus:outline-none">
                                            <span>Phone</span>
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
                                @foreach (\App\Models\Student::all() as $student)  
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                <h2 class="font-medium text-gray-800">{{ $student->name }}</h2>
                                            </div>
                                        </td>
                                        <td class="px-12 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <h4 class="text-gray-700">{{ $student->room }}</h4>
                                            </div>
                                        </td>
                                        <td class="px-12 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <h4 class="text-gray-700">{{ $student->phone }}</h4>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <h4 class="text-gray-700">
                                                    @if ($student->permits->where("returned", false)->count())
                                                    <div class="w-20 px-2 py-1 flex justify-center text-sm text-white transition-colors duration-200 bg-red-500 rounded-lg gap-x-2">
                                                        <p class="text-sm">Di Rumah</p>
                                                    </div>
                                                    @else
                                                    <div class="w-20 px-2 py-1 flex justify-center text-sm text-white transition-colors duration-200 bg-green-500 rounded-lg gap-x-2">
                                                        <p class="text-sm">Di IDN</p>
                                                    </div>
                                                    @endif
                                                </h4>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-100">
                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.33301 8.16667V13.1667M9.66634 8.16667V13.1667M1.33301 4.83333H14.6663M13.833 4.83333L13.1105 14.9517C13.0806 15.3722 12.8924 15.7657 12.5839 16.053C12.2755 16.3403 11.8696 16.5 11.448 16.5H4.55134C4.12979 16.5 3.7239 16.3403 3.41541 16.053C3.10693 15.7657 2.91877 15.3722 2.88884 14.9517L2.16634 4.83333H13.833ZM10.4997 4.83333V2.33333C10.4997 2.11232 10.4119 1.90036 10.2556 1.74408C10.0993 1.5878 9.88735 1.5 9.66634 1.5H6.33301C6.11199 1.5 5.90003 1.5878 5.74375 1.74408C5.58747 1.90036 5.49967 2.11232 5.49967 2.33333V4.83333H10.4997Z" stroke="#F65656" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                                    
                                                </button>
                                            </form>
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
            order: [[ 1, 'asc' ]]
        });
        $("table").submit(function (e) {
            if(!confirm('Apakah anda yakin untuk menghapus santri?')){
                return e.preventDefault()
            }
        });
    })
</script>
@endsection
