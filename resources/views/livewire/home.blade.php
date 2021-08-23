    <div class="w-full h-auto relative">
        @auth
        <div class="max-w-xs sm:max-w-sm md:max-w-md lg:max-w-4xl mx-auto px-4 lg:px-6">
            <div class="text-gray-600 font-medium">
                <h2 class="block text-lg">Formulir Terbaru</h2>
            </div>
            <div class="w-full h-auto my-4">
                <div class="grid grid-cols-3 gap-6">
                    <a href="{{ route('formulir.store') }}" class="bg-gray-200 shadow px-4 py-3 rounded-md hover:bg-gray-300 hover:bg-opacity-60 transition ease-out duration-150">
                        <div class="flex items-center flex-row w-full h-full justify-center">
                            <div class="text-gray-500 p-4 rounded-full bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    @foreach($forms as $key => $value)
                    <div class="bg-white shadow rounded-md px-4 py-3">
                        <div class="text-gray-600">
                            <h4 class="block font-medium">{{ $value->title }}</h4>
                        </div>
                        <div class="flex flex-row items-center justify-between py-2 space-x-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="flex-grow">
                                <p class="text-gray-600 text-sm truncate">Diperbarui {{ $value->updated_at->diffForHumans() }}</p>
                            </div>
                            <div class="relative p-2 hover:bg-gray-100 rounded-full cursor-pointer" x-data="{open: false}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-5x00" viewBox="0 0 20 20" fill="currentColor" @click="open = true">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>

                                <div x-show="open" :class="{'absolute': true, 'hidden': false}" class="hidden top-0 mt-10 right-0" @click.away="open = false" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="transform translate-y-3 opacity-0" x-transition:enter-end="transform translate-y-0 opacity-100" x-transition:leave="transition ease-out duration-150" x-transition:leave-start="transform translate-y-0 opacity-100" x-transition:leave-end="transform translate-y-3 opacity-0">
                                    <div class="bg-white rounded-md shadow border-t">
                                        <ul class="flex flex-col py-2">
                                            <li>
                                                <a href="" class="block w-40 py-2 px-5 text-gray-700 hover:bg-gray-100 transition ease-out duration-150 text-sm">Buka</a>
                                            </li>
                                            <li>
                                                <a href="{{route('formulir.store', ['forms' => $value->has])}}" class="block w-40 py-2 px-5 text-gray-700 hover:bg-gray-100 transition ease-out duration-150 text-sm">Edit</a>
                                            </li>
                                            <li>
                                                <a href="" class="block w-40 py-2 px-5 text-gray-700 hover:bg-gray-100 transition ease-out duration-150 text-sm">Salin Url</a>
                                            </li>
                                            <li>
                                                <a href="" class="block w-40 py-2 px-5 text-gray-700 hover:bg-gray-100 transition ease-out duration-150 text-sm">Lihat Jawaban</a>
                                            </li>
                                            <li>
                                                <a href="" class="block w-40 py-2 px-5 text-gray-700 hover:bg-gray-100 transition ease-out duration-150 text-sm">Hapus</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="max-w-xs sm:max-w-sm md:max-w-md lg:max-w-4xl mx-auto px-4 lg:px-6">
            <div class="w-full h-auto my-4">
                <div class="bg-white overflow-hidden shadow rounded-md py-2 px-4 h-32">
                    <div class="w-full h-full flex flex-col space-y-1 items-center justify-center">
                        <div class="text-gray-600 font-medium">
                            <h2 class="block text-lg">Note!</h2>
                        </div>
                        <div class="text-gray-500">
                            <p class="block text-base">Login terlebih dahulu untuk membuat formulir baru</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endauth
    </div>
