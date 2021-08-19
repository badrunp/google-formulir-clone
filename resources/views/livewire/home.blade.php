<x-layout-app>
    <div class="w-full h-auto relative">
        @auth
        <div class="max-w-xs sm:max-w-sm md:max-w-md lg:max-w-4xl mx-auto px-4 lg:px-6">
            <div class="text-gray-600 font-medium">
                <h2 class="block text-lg">Formulir Terbaru</h2>
            </div>
            <div class="w-full h-auto my-4">
                <div class="bg-white overflow-hidden shadow rounded-md py-2 px-4 h-32">
                    <div class="w-full h-full flex flex-col space-y-1 items-center justify-center">
                        <div class="text-gray-600 font-medium">
                            <h2 class="block text-lg">Belum Ada Formulir</h2>
                        </div>
                        <div class="text-gray-500">
                            <p class="block text-base tracking-wide">Klik + untuk membuat formulir baru</p>
                        </div>
                    </div>
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
                            <p class="block text-base tracking-wide">Login terlebih dahulu untuk membuat formulir baru</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endauth
    </div>
</x-layout-app>
