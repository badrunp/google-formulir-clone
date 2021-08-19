@props(['form'])


<div x-data="{ open: @entangle($attributes->wire('model')), isForm: @entangle('isForm'), username: @entangle('username'), name: @entangle('name'), email: @entangle('email'), password: @entangle('password'), remember: @entangle('remember') }" 
@openmodal.window="open = true; isForm = $event.detail"
>
    <div x-show="open" :class="{'fixed': true, 'hidden': false}" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="overlay hidden inset-0 w-full h-full bg-black bg-opacity-50 z-50">
        <div class="relative w-full h-full flex justify-center items-center flex-row">
            <div x-show="open" x-transition:enter="transition ease-out duration-159 delay-200" x-transition:enter-start="transform -translate-y-32 opacity-0" x-transition:enter-end="transform translate-y-0 opacity-100" x-transition:leave="transition ease-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="w-11/12 sm:w-3/4 lg:w-1/3" @click.away="open = false; $wire.closeModal()">
                <div class="bg-white shadow rounded-md overflow-hidden">
                    <div class="relative w-full h-auto">
                        {{ $header }}
                    </div>
                    <div class="relative w-full h-auto">
                        {{ $body }}
                    </div>
                    <div class="relative w-full h-auto">
                        {{ $footer }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>