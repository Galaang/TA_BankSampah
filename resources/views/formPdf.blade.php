<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

    <h1 style="text-align: center">Laporan Penjualan Bank Sampah Delima</h1>
    <span>Tanggal : {{ $startDate }} - {{ $endDate }}</span>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
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
                        @foreach ($penjualans as $p)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4">
                                    {{ $loop->iteration }}
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
                    <tfoot>
                        <tr>
                            <td colspan="5" class="px-6 py-4 font-bold text-right">Total Pendapatan:</td>
                            <td colspan="2" class="px-6 py-4 font-bold">Rp {{ number_format($totalPendapatan) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            {{-- end tabel --}}
        </div>
    </div>

</body>

</html>
