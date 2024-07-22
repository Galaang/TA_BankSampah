<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            {{-- dashboard nasabah --}}
            @if (auth()->check() && auth()->user()->role_id == '2')
                <div class="flex items-center justify-end mb-3">
                    <a href="{{ route('tariksaldo') }}" class="font-semibold">Saldo: Rp
                        {{ number_format($saldo) }}</a>
                </div>
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 gap-2 mb-3 md:grid-cols-2">
                        <div>
                            <canvas id="sampahnasabah1bulan"></canvas>
                        </div>
                    </div>
                    <div class="max-w-sm overflow-hidden bg-white rounded shadow-lg">
                        <div class="px-4 py-2">
                            <div class="mb-2 text-xl font-bold">Jumlah Pendapatan Bulan {{ $currentMonthName }}</div>
                            <span class="text-lg font-bold text-blue-500">Rp. {{ number_format($jmlsaldonasabah) }}</span>
                        </div>
                    </div>
                </div>
                
            @endif
            {{-- dashboard nasabah --}}

            {{-- dashboard petugas --}}
            @if (auth()->check() && auth()->user()->role_id == '1')
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 gap-3 mb-3 md:grid-cols-2">
                        <div class="p-2 border rounded">
                            <canvas id="jenis_sampah"></canvas>
                        </div>
                        <div class="p-2 border rounded">
                            <canvas id="penjualan_tahunan"></canvas>
                        </div>
                        <div class="p-2 border rounded">
                            <canvas id="jumlah_penjualan_per_bulan"></canvas>
                        </div>
                    </div>
                </div>
                <div class="container grid grid-cols-2 gap-4 mx-auto mb-3">
                    <div class="max-w-sm overflow-hidden bg-white rounded shadow-lg">
                        <div class="px-4 py-2">
                            <div class="mb-2 text-xl font-bold">Jumlah Nasabah</div>
                            <span class="text-lg font-bold text-blue-500">{{ number_format($jmlnasabah) }}</span>
                        </div>
                    </div>

                    <div class="max-w-sm overflow-hidden bg-white rounded shadow-lg">
                        <div class="px-4 py-2">
                            <div class="mb-2 text-xl font-bold">Jumlah Pendapatan Bulan {{ $currentMonthName }}</div>
                            <span class="text-lg font-bold text-blue-500">Rp. {{ number_format($jmlsaldo) }}</span>
                        </div>
                    </div>
                </div>
            @endif
            {{-- dashboard petugas --}}
        </div>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('sampahnasabah1bulan').getContext('2d');

        // Fungsi untuk menghasilkan warna acak
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Membuat array warna
        var backgroundColors = [];
        var borderColors = [];
        var labels = @json($label_nasabah);
        var data = @json($data_penjualan_nasabah);

        for (var i = 0; i < labels.length; i++) {
            var color = getRandomColor();
            backgroundColors.push(color + '33'); // Tambahkan opacity untuk backgroundColor
            borderColors.push(color);
        }

        var sampahChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Penjualan Sampah (kg)',
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<script>
    var ctx = document.getElementById('jenis_sampah').getContext('2d');

    // Fungsi untuk menghasilkan warna acak
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Data jenis sampah dan total penjualan
    var labels = {!! json_encode($penjualan->pluck('jenis_sampah')) !!};
    var data = {!! json_encode($penjualan->pluck('total_penjualan')) !!};

    // Membuat array warna
    var backgroundColors = [];
    var borderColors = [];
    for (var i = 0; i < labels.length; i++) {
        var color = getRandomColor();
        backgroundColors.push(color + '33'); // Tambahkan opacity untuk backgroundColor
        borderColors.push(color);
    }

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Penjualan berdasarkan Jenis Sampah /kg dalam 1 bulan',
                data: data,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('penjualan_tahunan').getContext('2d');

    // Label bulan
    var labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
        'November', 'Desember'
    ];

    // Data jumlah orang yang menjual per bulan
    var data = {!! json_encode(array_values($jumlahOrangPerBulan)) !!};

    // Membuat array warna
    var backgroundColors = [];
    var borderColors = [];
    for (var i = 0; i < labels.length; i++) {
        var color = getRandomColor();
        backgroundColors.push(color + '33'); // Tambahkan opacity untuk backgroundColor
        borderColors.push(color);
    }

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Orang yang Menjual dalam Tahun Terakhir',
                data: data,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Fungsi untuk menghasilkan warna acak
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>

<script>
    var ctx = document.getElementById('jumlah_penjualan_per_bulan').getContext('2d');

    // Label bulan
    var labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
        'November', 'Desember'
    ];

    // Data jumlah field per bulan
    var data = {!! json_encode(array_values($jumlahFieldPerBulanArray)) !!};

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Penjualan per Bulan',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        precision: 0 // Mengatur agar sumbu Y menampilkan bilangan bulat
                    }
                }]
            }
        }
    });
</script>
