<div class="fixed bottom-9 right-10 z-10">
    <div class="relative w-16 h-16 rounded-full bg-white shadow-md overflow-hidden cursor-pointer" x-data="{open: false}" @mouseenter="open = true" @mouseleave="open = false">
        <div class="w-full h-full flex flex-row items-center justify-center relative" x-data @click="$dispatch('openmodal', 'Login')">
            <div x-show="!open" class="absolute" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="transform rotate-90 opacity-0" x-transition:enter-end="transform rotate-0 opacity-100" x-transition:leave="transition ease-out duration-150" x-transition:leave-start="transform rotate-0 opacity-100" x-transition:leave-end="transform rotate-90 opacity-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <div x-show="open" class="absolute" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="transform -rotate-45 opacity-0" x-transition:enter-end="transform rotate-0 opacity-100" x-transition:leave="transition ease-out duration-150" x-transition:leave-start="transform rotate-0 opacity-100" x-transition:leave-end="transform -rotate-45 opacity-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </div>
        </div>
    </div>
</div>
