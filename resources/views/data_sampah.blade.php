<x-app-layout>
    <x-slot name="header">
        {{ __('Data Sampah') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

        <div class="container px-6 py-6 mx-auto">

            {{-- <form action="{{ route('filter.nama_sampah') }}" method="GET"
                class="flex items-center max-w-sm mx-auto mb-4">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-2.5 py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari Nama Sampah" required />
                </div>
                <button type="submit"
                    class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form> --}}

            @if (auth()->check() && auth()->user()->role_id == '1')
                <div class="flex items-center justify-end mb-5">
                    <a href="/tambahSampah" class="p-2 text-white bg-blue-700 rounded-lg hover:bg-blue-800">Tambah</a>
                </div>
            @endif

            {{-- card sampah --}}
            <div class="grid lg:grid-cols-3 gap-x-8 gap-y-4 sm:grid-cols-1 md:grid-cols-2">

                @foreach ($sampah as $smph)
                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg drop-shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="p-8 rounded-t-lg" src="{{ asset('storage/' . $smph->foto_sampah) }}"
                                alt="product image" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $smph->nama_sampah }}</h5>
                            </a>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-gray-900 dark:text-white"><span>Rp.
                                    </span>{{  number_format($smph->harga_sampah) }}/Kg</span>
                                @if (auth()->check() && auth()->user()->role_id == '1')
                                    <a href="/data_sampah/{{ $smph->id }}/edit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                                @endif
                            </div>
                            @if (auth()->check() && auth()->user()->role_id == '1')
                                <div class="flex items-start justify-end mt-4">
                                    <form action="/data_sampah/delete/{{ $smph->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="p-2 font-bold text-white bg-red-600 rounded hover:bg-red-800">Hapus</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>
