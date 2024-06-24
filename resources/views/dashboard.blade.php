<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            @if (auth()->check() && auth()->user()->role_id == '2')
                <div class="flex items-center justify-end">
                    <h3 class="font-semibold">Saldo: Rp {{ number_format($saldo) }}</span></h3>

                </div>
            @endif

            @if (auth()->check() && auth()->user()->role_id == '1')
                <div class="container w-1/2">
                    <canvas id="jenis_sampah"></canvas>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

<script>
    var ctx = document.getElementById('jenis_sampah').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($penjualan->pluck('jenis_sampah')) !!}, // Ganti 'label' dengan 'jenis_sampah'
            datasets: [{
                label: 'Penjualan berdasarkan Jenis Sampah /kg', // Ubah label sesuai kebutuhan
                data: {!! json_encode($penjualan->pluck('total_penjualan')) !!}, // Ganti 'value' dengan 'total_penjualan'
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
