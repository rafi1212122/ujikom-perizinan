@extends('layouts.navigation') 
@section('title','Data User')
@section('content')
<section class="container pt-10 mx-auto">
    <div class="relative p-6 bg-white rounded-lg">
        <div class="absolute -top-4 sm:flex sm:items-center sm:justify-between">
            <div>
                <div class="px-5 py-2 text-sm text-whiteflex items-center bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 justify-center ">
                    <h2 class="text-lg font-medium text-white">Data User</h2>
                </div>
            </div>
        </div>
    
        <div class="mt-6 md:flex md:items-center md:justify-end">
            <div class="flex gap-x-3">
                <a href="{{ route("users.create") }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
    
                    <span>Tambah Data</span>
                </a>
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
                                            <span>Email</span>
                                        </button>
                                    </th>
    
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        <button class="flex items-center gap-x-3 focus:outline-none">
                                            <span>Level</span>
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
                                @foreach (\App\Models\User::all() as $user)  
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                <h2 class="font-medium text-gray-800">{{ $user->name }}</h2>
                                            </div>
                                        </td>
                                        <td class="px-12 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <h4 class="text-gray-700">{{ $user->email }}</h4>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <h4 class="text-gray-700">{{ $user->level }}</h4>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
            order: [[ 2, 'asc' ]]
        });
        $("table").submit(function (e) {
            if(!confirm('Apakah anda yakin untuk menghapus user?')){
                return e.preventDefault()
            }
        });
    })
</script>
@endsection
