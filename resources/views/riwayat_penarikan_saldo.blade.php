<x-app-layout>
    <x-slot name="header">
            {{ __('Riwayat Penarikan Saldo') }}
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Saldo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            tanggal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saldo as $s)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row" class="px-6 py-4">
                                Rp. {{ number_format($s->jumlah_saldo) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $s->status }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $s->created_at->format('d-m-Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
