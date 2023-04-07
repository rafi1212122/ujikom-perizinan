<form action="{{ route('permits.store') }}" method="POST" @click.away="modalState=false" class="relative bg-white rounded-lg max-w-md w-full 2xl:max-w-7xl xl:max-w-5xl md:max-w-2xl shadow">
    @csrf
    <!-- Modal header -->
    <div class="flex justify-between items-center p-5 rounded-t border-b">
        <h3 class="text-xl font-semibold text-gray-900">
            Tambah Data Perpulangan
        </h3>
        <button @click.prevent="modalState=false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="small-modal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close modal</span>
        </button>
    </div>
    <!-- Modal body -->
    <div class="p-6 space-y-6">
        <div>
            <x-label for="room" :value="__('Room')" />
            <select required wire:model='room_query' class="w-full rounded-md shadow-sm cursor-pointer border-gray-300 focus:border-green-500 focus:ring focus:ring-green-400 focus:ring-opacity-50" name="room" id="room">
                <option value="" selected>-- Pilih Room --</option>
                @foreach ($distinct_room as $item)
                    <option value="{{ $item->room }}">{{ $item->room }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-label for="student" :value="__('Santri')" />
            <select required class="w-full rounded-md shadow-sm cursor-pointer border-gray-300 focus:border-green-500 focus:ring focus:ring-green-400 focus:ring-opacity-50" name="student" id="student">
                @foreach ($students as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-label for="start_date" :value="__('Tanggal Pulang')" />
            <x-input id="start_date" class="block mt-1 w-full" type="datetime-local" name="start_date" required />
        </div>
        <div>
            <x-label for="end_date" :value="__('Tanggal Kembali')" />
            <x-input id="end_date" class="block mt-1 w-full" type="datetime-local" name="end_date" required />
        </div>
        <div>
            <x-label for="reason" :value="__('Alasan')" />
            <textarea id="reason" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" name="reason" required></textarea>
        </div>
    </div>
    <!-- Modal footer -->
    <div class="flex items-center justify-end px-6 py-4 space-x-2 rounded-b border-t border-gray-200">
        <button class="text-md px-4 py-2 bg-green-600 hover:bg-green-500 text-white font-semibold rounded-md" type="submit">Save</button>
    </div>
</form>