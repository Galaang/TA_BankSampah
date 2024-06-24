<x-app-layout>
    <x-slot name="header">
        {{ __('Penarikan Saldo') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                <div class="mb-3 flex justify-end">
                    <h3 class="font-semibold">Saldo: {{ number_format(Auth::user()->saldo) }}</h3>
                </div>
                <form class="max-w-sm mx-auto" action="{{ route('saldostore') }}" method="post" id="saldoForm">
                    @csrf
                    <div class="mb-5">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" id="name" name="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required readonly value="{{ Auth::user()->name }}" />
                    </div>
                    <div class="mb-5">
                        <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            HP</label>
                        <input type="number" id="no_hp" name="no_hp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required readonly value="{{ Auth::user()->no_hp }}" />
                    </div>
                    <div class="mb-5">
                        <label for="no_hp"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saldo</label>
                        <input type="number" id="saldo" name="jumlah_saldo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required" />
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

@if ($errors->has('jumlah_saldo'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errors->first('jumlah_saldo') }}',
        });
    </script>
@endif

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