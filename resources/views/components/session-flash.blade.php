<div x-data="{text: 'test', open: false}" x-show="open" @success.window="open = true; text = $event.detail.text; $nextTick(() => { setTimeout(() => open = false,3000) });" :class="{'flex': true, 'hidden': false}" class="fixed left-5 top-20 shadow rounded-md bg-green-100 border border-green-400 text-green-700 z-50 py-4 px-6 hidden flex-row space-x-2  items-center" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="transform -translate-x-full opacity-0" x-transition:enter-end="transform translate-x-0 opacity-100" x-transition:leave="transition ease-out duration-150" x-transition:leave-start="transform translate-x-0 opacity-100" x-transition:leave-end="transform -translate-x-full opacity-0">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
    <p x-text="text" class="block text-sm"></p>
</div>

<div x-data="{text: 'Success, {{ session()->get('success') }}', open: '{{ session()->has('success') }}' }" x-show="open" x-init="setTimeout(() => open = false, 3000)" :class="{'flex': true, 'hidden': false}" class="fixed left-5 top-20 shadow rounded-md bg-green-100 border border-green-400 text-green-700 z-50 py-4 px-6 hidden flex-row space-x-2  items-center" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="transform -translate-x-full opacity-0" x-transition:enter-end="transform translate-x-0 opacity-100" x-transition:leave="transition ease-out duration-150" x-transition:leave-start="transform translate-x-0 opacity-100" x-transition:leave-end="transform -translate-x-full opacity-0">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
    <p x-text="text" class="block text-sm"></p>
</div>
