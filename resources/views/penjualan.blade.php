<x-app-layout>
    <x-slot name="header">
            {{ __('Penjualan') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg ">
        <div class="p-6 border-b border-gray-200">
            <form method="POST" action=""></form>
                @csrf
                <div id="cardContainer" class="p-5 border rounded-lg">
                    <div class="mb-4">
                        <label for="jenis_sampah" class="block mb-2 text-sm font-bold text-gray-700">Jenis Sampah:</label>
                        <select class="w-full rounded form-control" name="select" id="select">
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="nama_sampah" class="block mb-2 text-sm font-bold text-gray-700">Nama Sampah:</label>
                        <select class="w-full rounded form-control" name="select" id="select">
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="weight" class="block mb-2 text-sm font-bold text-gray-700">Berat:</label>
                        <input type="text" name="weight" id="weight" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="weight" class="block mb-2 text-sm font-bold text-gray-700">Harga:</label>
                        <input type="text" disabled name="weight" id="weight" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>
                </div>

                {{-- button tambah --}}
                <div class="flex items-center justify-end ">
                    <button id="addCardButton" class="px-4 py-2 mt-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Tambah</button>
                </div>

                <div class="relative mb-4">
                    <label for="total" class="block mb-2 text-sm font-bold text-gray-700">Total:</label>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-700 top-6">Rp</span>
                    <input type="text" name="weight" id="weight" disabled class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none  focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex items-center justify-center mt-4">
                    <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>    
</x-app-layout>
