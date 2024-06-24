<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Sampah') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">

            <div class="">
                <form action="{{ route('UpdateSampah', $sampah->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-bold text-gray-700">Jenis Sampah:</label>
                        <select class="w-full rounded form-control" name="jenis_sampah" id="jenis_sampah">
                            @foreach ($jenis_sampah as $jenis)
                                <option value="{{ $jenis }}"
                                    {{ $sampah->jenis_sampah == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-bold text-gray-700">Nama:</label>
                        <input type="text" name="nama_sampah" id="nama_sampah" value="{{ $sampah->nama_sampah }}"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-bold text-gray-700">Harga:</label>
                        <input type="text" name="harga_sampah" id="harga_sampah" value="{{ $sampah->harga_sampah }}"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Upload file</label>
                        <input name="foto_sampah" id="foto_sampah"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file">
                    </div>
                    <div class="flex items-center justify-center mt-4">
                        <button type="submit"
                            class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
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