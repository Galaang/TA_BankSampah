<x-app-layout>
    <x-slot name="header">
            {{ __('Tambah Sampah') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            
            <div class="">
                <form action="{{ route('Storesampah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="jenis" class="block mb-2 text-sm font-bold text-gray-700">Jenis Sampah:</label>
                        <select name="jenis_sampah" id="jenis_sampah" class="w-full rounded">
                            @foreach ($jenis_sampah as $jns)
                            <option value="{{$jns}}">{{$jns}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-bold text-gray-700">Nama:</label>
                        <input type="text" required name="nama_sampah" id="namasampah" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="harga" class="block mb-2 text-sm font-bold text-gray-700">Harga:</label>
                        <input type="number" required name="harga_sampah" id="harga_sampah" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="foto_sampah" type="file" name="foto_sampah">
                    </div>
                    <div class="flex items-center justify-center mt-4">
                        <button type="submit" class="px-3 py-2 text-white bg-blue-700 rounded hover:bg-blue-800">Submit</button>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
</x-app-layout>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
            });
        });
    </script>
@endif