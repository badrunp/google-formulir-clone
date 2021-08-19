<nav>
    <div class="relative w-full h-auto">
        <div class="bg-white shadow-sm py-3">
            <div class="container mx-auto">
                <div class="w-full flex flex-row items-center justify-between">
                    <a href="#" class="flex flex-row items-center text-gray-600 space-x-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-11 w-11" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="block text-2xl">Google Formulir</h1>
                        </div>
                    </a>
                    <div class="flex flex-row items-center space-x-3">
                        @auth
                        <div class="relative">
                            <div class="h-10 w-10 rounded-full bg-blue-600">
                                <div class="w-3 h-3 bg-green-500 rounded-full absolute right-0 bottom-0 border border-white"></div>
                            </div>
                        </div>
                        <div class="text-gray-600 relative z-50" x-data="{open: false}">
                            <div class="flex items-center space-x-1 cursor-pointer" @click="open = ! open">
                                <h5 class="block text-base tracking-wide">{{ auth()->user()->name }}</h5>
                                <div :class="{'transform': true, '-rotate-180': open}" class="transition ease-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <ul x-show="open" :class="{'absolute': true, 'hidden':false}" @click.away="open=false" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="transform translate-y-3 opacity-0" x-transition:enter-end="transform translate-y-0 opacity-100" x-transition:leave="transition ease-out duration-150" x-transition:leave-start="transform translate-y-0 opacity-100" x-transition:leave-end="transform translate-y-3 opacity-0" class="hidden top-0 right-0 w-44 bg-white mt-12 py-1 rounded-md shadow">
                                <li>
                                    <a href="" class="flex flex-row items-center w-full px-4 py-2 text-gray-600 text-left hover:bg-gray-100 transition ease-out duration-150">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        Profil
                                    </a>
                                </li>
                                <li>
                                    <button wire:click="logout" class="flex flex-row items-center w-full px-4 py-2 text-gray-600 text-left hover:bg-gray-100 transition ease-out duration-150">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        Logout
                                    </button>
                                </li>
                            </ul>
                        </div>
                        @else
                        <ul class="flex flex-row items-center">
                            <li>
                                <button class="flex flex-row items-center text-gray-600 text-base px-3 py-1 border-r border-gray-200 group" x-data @click="$dispatch('openmodal', 'Login')">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <span class="block group-hover:text-blue-500 transition ease-out duration-150">Login</span>
                                </button>
                            </li>
                            <li>
                                <button class="flex flex-row items-center text-gray-600 text-base px-3 py-1 group" x-data @click="$dispatch('openmodal', 'Register')">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="block group-hover:text-blue-500 transition ease-out duration-150">Register</span>
                                </button>
                            </li>
                        </ul>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal-auth wire:model="isModal">
        <x-slot name="header">
            <div class="bg-gray-100 pt-3 px-6 text-gray-500">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex items-end flex-row space-x-6">
                        <button :class="{'border-blue-500': isForm == 'Login', 'border-transparent': isForm == 'Register'}" class="flex items-center flex-row space-x-1 pt-3 pb-3 border-b-2 border-transparent" @click="$wire.resetAll('Login');">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="text-base font-medium">Login</span>
                        </button>
                        <button :class="{'border-blue-500': isForm == 'Register', 'border-transparent': isForm == 'Login'}" class="flex items-center flex-row space-x-1 pt-3 pb-3 border-b-2 border-transparent" @click="$wire.resetAll('Register')">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="text-base font-medium">Regsiter</span>
                        </button>
                    </div>
                    <button class="block transform -translate-y-1" @click="open = false; $wire.closeModal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </x-slot>
        <x-slot name="body">
            <div class="py-6 px-6 w-full" wire:loading wire:target="resetAll">
                <div class="flex flex-col items-start  justify-start w-full">
                    <div class="w-full">
                        <div :class="{'h-10': isForm == 'Register', 'h-8': isForm == 'Login'}" class="w-32 bg-gray-200 rounded mb-2 animate-pulse"></div>
                        <div :class="{'h-10': isForm == 'Register', 'h-8': isForm == 'Login'}" class="w-full bg-gray-200 rounded animate-pulse"></div>
                    </div>
                    <div class="w-full mt-3">
                        <div :class="{'h-10': isForm == 'Register', 'h-8': isForm == 'Login'}" class="w-32 bg-gray-200 rounded mb-2 animate-pulse"></div>
                        <div :class="{'h-10': isForm == 'Register', 'h-8': isForm == 'Login'}" class="w-full bg-gray-200 rounded animate-pulse"></div>
                    </div>
                    <div :class="{'hidden': isForm == 'Register', 'block': isForm == 'Login'}" class="w-full">
                        <div class="w-full mt-3">
                            <div class="w-32 h-8 bg-gray-200 rounded mb-2 animate-pulse"></div>
                            <div class="w-full h-8 bg-gray-200 rounded animate-pulse"></div>
                        </div>
                        <div class="w-full mt-3">
                            <div class="w-32 h-8 bg-gray-200 rounded mb-2 animate-pulse"></div>
                            <div class="w-full h-8 bg-gray-200 rounded animate-pulse"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-6 px-6" wire:loading.remove wire:target="resetAll">
                <form x-show="isForm == 'Login'" x-ref="form1">
                    @error('login-error')
                    <div class="w-full mb-3 bg-red-500 text-white text-center rounded py-3 px-4 text-sm flex items-center flex-row justify-center">
                        <div class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        {{ $message }}
                    </div>
                    @enderror
                    @if(session()->has('register-success'))
                    <div class="w-full mb-3 bg-green-500 text-white text-center rounded py-3 px-4 text-sm flex items-center flex-row justify-center">
                        <div class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        {{ session()->get('register-success') }}
                    </div>
                    @endif
                    <div class="w-full">
                        <label class="block text-gray-600 mb-1">Alamat Email</label>
                        <x-input type="email" x-model.lazy="email" />
                        @error('email')
                        <div class="mt-1">
                            <p class="block text-red-500 text-sm">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="w-full mt-3">
                        <label class="block text-gray-600 mb-1">Password</label>
                        <x-input type="password" x-model.lazy="password" />
                        @error('password')
                        <div class="mt-1">
                            <p class="block text-red-500 text-sm">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="w-full mt-4 flex flex-row items-center justify-between">
                        <div class="flex flex-row space-x-2 items-center">
                            <input type="checkbox" x-model.lazy="remember" class="rounded cursor-pointer" />
                            <label class="block text-gray-600 mb-1">Ingat Saya</label>
                        </div>
                        <div>
                            <a href="#" class="block text-gray-600">Lupa Password?</a>
                        </div>
                    </div>
                </form>
                <form x-show="isForm == 'Register'">
                    <div class="w-full">
                        <label class="block text-gray-600 mb-1">Username</label>
                        <x-input type="text" x-model.lazy="username" />
                        @error('username')
                        <div class="mt-1">
                            <p class="block text-red-500 text-sm">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="w-full mt-3">
                        <label class="block text-gray-600 mb-1">Nama Lengkap</label>
                        <x-input type="text" x-model.lazy="name" />
                        @error('name')
                        <div class="mt-1">
                            <p class="block text-red-500 text-sm">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="w-full mt-3">
                        <label class="block text-gray-600 mb-1">Alamat Email</label>
                        <x-input type="email" x-model.lazy="email" />
                        @error('email')
                        <div class="mt-1">
                            <p class="block text-red-500 text-sm">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="w-full mt-3">
                        <label class="block text-gray-600 mb-1">Password</label>
                        <x-input type="password" x-model.lazy="password" />
                        @error('password')
                        <div class="mt-1">
                            <p class="block text-red-500 text-sm">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="pt-4 pb-6 px-6 border-t w-full" wire:loading wire:target="resetAll">
                <div class="w-full h-10 bg-gray-200 rounded animate-pulse"></div>
            </div>
            <div class="pt-4 pb-6 px-6 border-t" wire:loading.remove wire:target="resetAll">
                <x-button class="w-full" wire:click="handleForm" x-text="isForm"></x-button>
                <x-button class="w-full" wire:click="handleForm" wire:loading wire:target="handleForm">...</x-button>
            </div>
        </x-slot>
    </x-modal-auth>
</nav>
