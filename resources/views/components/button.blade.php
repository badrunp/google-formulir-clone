@props(['type' => 'button'])

<button {{ $attributes->merge(['class' => 'block px-6 py-2 text-center text-white bg-blue-600 rounded text-base focus:outline-none hover:bg-blue-700 font-medium focus:ring-2 focus:border-blue-700 transition ease-out duration-150']) }}>{{ $slot }}</button>