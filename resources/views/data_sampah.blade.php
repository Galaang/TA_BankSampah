<x-app-layout>
    <x-slot name="header">
        {{ __('Data Sampah') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200 ">

            @if (auth()->check() && auth()->user()->role_id == '1')
                <div class="flex items-center justify-end mb-5">
                    <a href="/tambahSampah" class="p-2 text-white bg-blue-700 rounded-lg hover:bg-blue-800">Tambah</a>
                </div>
            @endif
            {{-- card sampah --}}
            <div class="grid lg:grid-cols-3 gap-x-8 gap-y-4 sm:grid-cols-1 md:grid-cols-2">

                @foreach ($sampah as $smph)
                    <div
                        class="w-full max-w-sm mr-3 bg-white border border-gray-200 rounded-lg drop-shadow dark:bg-gray-800 dark:border-gray-700">
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
                                <span class="text-xl font-bold text-gray-900 dark:text-white"><span>Rp
                                    </span>{{ $smph->harga_sampah }}</span>
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
