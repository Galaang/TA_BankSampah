<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-2 px-4 text-center bg-[#f34723]  rounded-md text-white text-sm outline hover:outline-gray-400 ']) }}>
    {{ $slot }}
</button>
