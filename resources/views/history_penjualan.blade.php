<x-app-layout>
    <x-slot name="header">
        {{ __('Riwayat Penjualan') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            {{-- tabel --}}
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
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

            

        </div>
    </div>
</x-app-layout>
