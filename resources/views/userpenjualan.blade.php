<x-app-layout>
    <x-slot name="header">
        {{ __('Penjualan') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <form action="{{route('penjualan')}}" method="get">
                @csrf
                <div class="mb-4">
                    <label for="weight" class="block mb-2 text-sm font-bold text-gray-700">Nama</label>
                    <select class="w-full rounded form-control " name="name" id="namanasabah">
                        @foreach ($user as $u)
                            <option value="{{ $u->name }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-center mb">
                    <button type="submit" class="px-3 py-2 text-white bg-blue-700 rounded">kirim</button>
                </div>
            </form>
        </div>
    </div>



</x-app-layout>
