@props(['type' => 'text'])

<input type="{{ $type }}" {{ $attributes->merge(['class' => "w-full text-gray-600 border-t-0 border-l-0 border-r-0 border-b-2 border-transparent focus:outline-none focus:ring-0 focus:border-blue-500 transition ease-out"]) }} />
