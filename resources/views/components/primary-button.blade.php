<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full inline-flex items-center justify-center px-5 py-3.5 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold rounded-xl text-sm shadow-md shadow-green-500/10 hover:shadow-lg transition duration-200 uppercase tracking-wider focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
