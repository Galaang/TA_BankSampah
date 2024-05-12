<div x-data="{ dropdownOpen: false }" class="relative">
    {{ $trigger }}

    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

    <div x-show="dropdownOpen" class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
        {{ $content }}
    </div>
</div>

