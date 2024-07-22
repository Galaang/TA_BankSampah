<div id="overlay" class="fixed inset-0 z-20 hidden transition-opacity bg-black opacity-50 lg:hidden"></div>

<div id="sidebar"
    class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition-transform -translate-x-full bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex mt-6 ml-5">
        <div class="flex ">
            <a href="{{route('dashboard')}}">
                <img class="w-32" src="{{ Vite::asset('../../public/build/assets/sibama-8626e08f.png') }}"
                    alt="">
            </a>
        </div>
    </div>

    <nav class="mt-8">
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent menu-link hover:text-black hover:bg-gray-50">
            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
            </svg>
            Dasboard
        </a>

        @if (auth()->check() && auth()->user()->role_id == '1')
            <a href="{{ route('penjualan') }}"
                class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent menu-link hover:text-black hover:bg-gray-50">
                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
                Penjualan
            </a>
        @endif


        <a href="{{ route('DataSampah') }}"
            class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent menu-link hover:text-black hover:bg-gray-50">
            <i class="w-6 mr-2 fa-solid fa-list"></i> Data Sampah
        </a>


        @if (auth()->check() && auth()->user()->role_id == '1')
            <a href="{{ route('Transaksi') }}"
                class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent menu-link hover:text-black hover:bg-gray-50">
                <i class="w-6 mr-2 fa-solid fa-money-bill-transfer"></i>Penarikan Saldo</a>
        @endif

        @if (auth()->check() && auth()->user()->role_id == '2')
            <a href="{{ route('History') }}"
                class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent menu-link hover:text-black hover:bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="mr-3 size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
                Riwayat Penjualan</a>

            <a href="{{ route('tariksaldo') }}"
                class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent menu-link hover:text-black hover:bg-gray-50">
                <i class="w-6 mr-2 fa-solid fa-money-bill-transfer"></i>Penarikan Saldo</a>
        @endif

        <a href="{{ route('riwayat_penarikan') }}"
            class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent menu-link hover:text-black hover:bg-gray-50">
            <i class="w-6 mr-2 fa-solid fa-money-bill-transfer"></i>Riwayat Penarikan</a>

        @if (auth()->check() && auth()->user()->role_id == '1')
            <a href="{{ route('cetaklaporan') }}"
                class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent menu-link hover:text-black hover:bg-gray-50">
                <i class="w-6 mr-2 fa-regular fa-clipboard"></i>Cetak Laporan</a>
        @endif
    </nav>
</div>
