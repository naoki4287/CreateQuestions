<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mt-16 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full']) }}>
    {{ $slot }}
</button>

<!-- inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 -->