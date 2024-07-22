<x-app-layout>
    <x-slot name="header">
        {{ __('Cetak Laporan') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            {{-- <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Cetak</button> --}}
            <form action="{{ route('cetakPdf') }}" method="GET" target="_blank" class="mb-4">
                <div class="flex">
                    <div class="flex items-center mb-4">
                        <label for="start_date" class="mr-2">Dari Tanggal:</label>
                        <input type="date" id="start_date" name="start_date" class="p-2 border rounded">
                    </div>
                    <div class="flex items-center mb-4">
                        <label for="end_date" class="ml-2 mr-2"> - </label>
                        <input type="date" id="end_date" name="end_date" class="p-2 border rounded">
                    </div>
                </div>
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Cetak PDF</button>
            </form>
            {{-- tabel --}}
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Sampah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Sampah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Berat sampah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pendapatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                tanggal
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $p)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4">
                                    {{ ($penjualan->currentPage() - 1) * $penjualan->perPage() + $loop->index + 1 }}
                                </td>
                                <td scope="row" class="px-6 py-4">
                                    {{ $p->name }}
                                </td>
                                <td scope="row" class="px-6 py-4">
                                    {{ $p->jenis_sampah }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $p->nama_sampah }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $p->berat_sampah }} Kg
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ number_format($p->harga_total) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $p->created_at->format('d-m-Y') }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- end tabel --}}
            <div class="mt-4">
                {{ $penjualan->links('pagination::tailwind') }}
            </div>

        </div>
    </div>
</x-app-layout>
