@props(['type' => 'text'])

<input type="{{ $type }}" {{ $attributes->merge(['class' => 'w-full border border-gray-300 rounded focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition ease-out duration-150']) }}/>
