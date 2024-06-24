<x-app-layout>
    <x-slot name="header">
        {{ __('Transaksi') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Saldo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saldo as $s)
                            <tr
                                class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $s->nama }}
                                </th>
                                <td class="px-6 py-4">
                                    Rp.{{ number_format($s->jumlah_saldo) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $s->status }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{route('accsaldo', $s->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" 
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Kirim</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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