<header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
        {{-- <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button> --}}
        <button id="toggleButton" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    <div class="flex items-center">
        <div class="relative inline-block text-left">
            <button id="dropdownButton" class="mr-8 text-sm font-medium text-black capitalize">
                {{ explode(' ', Auth::user()->name)[0] }}
            </button>
            <div id="dropdownMenu" class="absolute right-0 hidden w-56 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdownButton">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{ __('Profile') }}</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{ __('Log Out') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#state').select2();
        });
    </script>
@endpush