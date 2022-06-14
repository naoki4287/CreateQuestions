<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mt-16 bg-blue-500 hover:bg-blue-300 hover:text-black text-white w-6/12 py-4 rounded-md']) }}>
  {{ $slot }}
</button>