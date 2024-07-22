<x-app-layout>
    <x-slot name="header">
        {{ __('Penjualan') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="w-full p-6 border-b border-gray-200">
            <form id="sampahForm" method="POST" action="{{ route('storepenjualan') }}">
                @csrf
                <div id="cardContainer" class="p-5 border rounded-lg">
                    <div class="mb-4">
                        <label for="weight" class="block mb-2 text-sm font-bold text-gray-700">Nama:</label>
                        <select class="w-full rounded form-control" name="name" id="namanasabah">
                            @foreach ($user as $s)
                                <option value="{{ $s->name }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="jenis_sampah" class="block mb-2 text-sm font-bold text-gray-700">Jenis
                            Sampah:</label>
                        <select class="w-full rounded form-control" name="jenis_sampah" id="jenis_sampah">
                            <option value="" selected>Jenis Sampah</option>
                            @foreach ($jenis_sampah as $jns)
                                <option value="{{ $jns }}">{{ $jns }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="nama_sampah" class="block mb-2 text-sm font-bold text-gray-700">Nama Sampah:</label>
                        <select class="w-full rounded form-control" name="nama_sampah" id="nama_sampah">
                            <option value="" selected></option>
                            @foreach ($sampah as $s)
                                <option value="{{ $s->nama_sampah }}" data-harga="{{ $s->harga_sampah }}">
                                    {{ $s->nama_sampah }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="berat_sampah" class="block mb-2 text-sm font-bold text-gray-700">Berat/(Kg):</label>
                        <input type="number" name="berat_sampah" id="berat_sampah"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="harga_sampah" class="block mb-2 text-sm font-bold text-gray-700">Harga:</label>
                        <div class="flex items-center">
                            <input type="text" disabled name="harga_sampah" id="harga_sampah"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded-r shadow appearance-none focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="button" id="addCardButton"
                            class="px-4 py-2 mt-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Tambah</button>
                    </div>
                </div>

                <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Jenis Sampah</th>
                                <th scope="col" class="px-6 py-3">Nama Sampah</th>
                                <th scope="col" class="px-6 py-3">Berat</th>
                                <th scope="col" class="px-6 py-3">Harga</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelSampahBody">
                            <!-- Rows will be added here dynamically -->
                        </tbody>
                        <tfoot>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    Total</th>
                                <td></td>
                                <td id="totalHarga" class="px-6 py-4 font-bold">Rp 0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <button type="submit" id="submitSampah"
                        class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
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

