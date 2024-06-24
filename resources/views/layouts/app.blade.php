<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- icon --}}
    <script src="https://kit.fontawesome.com/4f4d2f6b6c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css', 'resources/js/script.js'])
</head>

<body>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-slate-200 font-roboto">
        @include('layouts.navigation')

        <div class="flex flex-col flex-1 overflow-hidden">
            @include('layouts.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-200">
                <div class="container px-6 py-8 mx-auto">
                    @if (isset($header))
                        <h3 class="mb-4 text-3xl font-medium text-gray-700">
                            {{ $header }}
                        </h3>
                    @endif

                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#namanasabah').select2();
    });
    $(document).ready(function() {
        $('#nama_sampah').select2();
    });
    $(document).ready(function() {
        $('#jenis_sampah').select2();
    });
</script>

<script>
    // Menangani perubahan jenis sampah
    $('#jenis_sampah').on('change', function() {
        var jenisSampah = $(this).val();
        var namaSampahSelect = $('#nama_sampah');

        $.ajax({
            url: `/get-nama-sampah/${jenisSampah}`,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data); // Tambahkan logging di sini
                namaSampahSelect.empty(); // Kosongkan pilihan sebelumnya

                // Tambahkan pilihan baru berdasarkan data yang diterima
                $.each(data, function(index, sampah) {
                    var option = $('<option></option>').val(sampah.nama_sampah).text(sampah
                        .nama_sampah);
                    option.data('harga', sampah
                        .harga_sampah); // Gunakan data() untuk menyimpan harga
                    namaSampahSelect.append(option);
                });
            },
            error: function(xhr, status, error) {
                console.error('Request failed with status:', status);
            }
        });
    });

    // Menangani perubahan berat sampah dan nama sampah
    $('#berat_sampah, #nama_sampah').on('input change', function() {
        updateHarga();
    });

    // Fungsi untuk memperbarui harga
    function updateHarga() {
        var berat = parseFloat($('#berat_sampah').val());
        var namaSampahSelect = $('#nama_sampah');
        var selectedOption = namaSampahSelect.find('option:selected');
        var hargaSampah = parseFloat(selectedOption.data('harga'));

        if (!isNaN(berat) && !isNaN(hargaSampah)) {
            var totalHarga = berat * hargaSampah;
            $('#harga_sampah').val(formatRupiah(totalHarga));
        } else {
            $('#harga_sampah').val('');
        }
    }

    // Fungsi untuk memformat angka menjadi format rupiah
    function formatRupiah(angka) {
        var number_string = angka.toString();
        var sisa = number_string.length % 3;
        var rupiah = number_string.substr(0, sisa);
        var ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return rupiah;
    }
</script>

{{-- penjualan --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#addCardButton').on('click', function() {
            let jenisSampah = $('#jenis_sampah').val();
            let namaSampahEl = $('#nama_sampah');
            let namaSampah = namaSampahEl.val();
            let hargaSampah = parseFloat(namaSampahEl.find('option:selected').data('harga'));
            let beratSampah = parseFloat($('#berat_sampah').val());
            let totalHargaSampah = hargaSampah * beratSampah;

            if (beratSampah <= 0) {
                alert('Berat harus lebih dari 0');
                return;
            }

            let row = `
            <tr>
                <td class="px-6 py-4">${jenisSampah}<input type="hidden" name="jenis_sampah[]" value="${jenisSampah}"></td>
                <td class="px-6 py-4">${namaSampah}<input type="hidden" name="nama_sampah[]" value="${namaSampah}"></td>
                <td class="px-6 py-4">${beratSampah} kg<input type="hidden" name="berat_sampah[]" value="${beratSampah}"></td>
                <td class="px-6 py-4">Rp ${totalHargaSampah}<input type="hidden" name="harga_sampah[]" value="${totalHargaSampah}"></td>
                <td class="px-6 py-4"><button type="button" class="text-red-500 deleteButton">Hapus</button></td>
            </tr>
        `;
            $('#tabelSampahBody').append(row);

            updateTotalHarga();

            // Clear inputs
            $('#berat_sampah').val('');
            $('#harga_sampah').val('');
        });

        $('#tabelSampahBody').on('click', '.deleteButton', function() {
            $(this).closest('tr').remove();
            updateTotalHarga();
        });

        $('#nama_sampah').on('change', function() {
            let harga = $(this).find('option:selected').data('harga');
            $('#harga_sampah').val(`Rp ${harga}`);
        });

        function updateTotalHarga() {
            let totalHarga = 0;
            $('#tabelSampahBody tr').each(function() {
                let harga = parseFloat($(this).find('td:eq(3)').text().replace('Rp ', ''));
                totalHarga += harga;
            });
            $('#totalHarga').text(`Rp ${totalHarga}`);
        }
    });
</script>



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

@if (session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif

</html>
