<div class="w-full h-auto relative" x-data="handleFormUser()">
    <div class="max-w-3xl mx-auto ">
        <form class="w-full h-auto">
            <div class="border-t-10 border-blue-500 rounded-lg h-5 relative z-30">
            </div>
            <div class="bg-white shadow rounded-lg py-6 px-7 -mt-4 border-l-4 border-transparent">
                <div>
                    <h4 class="block text-4xl text-gray-800">{{$form->title}}</h4>
                </div>
                <div class="mt-2">
                    <p class="block text-gray-600">Deskripsi</p>
                </div>
            </div>

            @foreach($questions as $key => $value)
            <div class="bg-white shadow rounded-lg mt-6 py-6 px-7 border-l-4 border-transparent">
                <div class="text-gray-600 flex flex-row space-x-2">
                    <span class="block font-medium">{{ $key+1 }}.</span>
                    <h5 class="block text-base font-medium">{{ $value->question }}</h5>
                </div>
                <div class="text-gray-600 mt-2">
                    @if($value->type == 'singkat')
                    <div class="w-1/2">
                        <x-input-form placeholder="Text jawaban singkat" class="border-gray-200" wire:model="datas.singkat.{{strval($value->id)}}" />
                    </div>
                    @endif
                    @if($value->type == 'paragraf')
                    <div>
                        <x-input-form placeholder="Text jawaban panjang" class="border-gray-200" wire:model="datas.paragraf.{{strval($value->id)}}" />
                    </div>
                    @endif

                    <div class="flex flex-col space-y-2 mt-3">
                        @foreach($value->options as $index => $option)
                        <div class="flex flex-row space-x-4 items-center">
                            @if($value->type == 'ganda')
                            <div>
                                <input type="radio" value="{{ $option->id }}" wire:model="datas.ganda.{{strval($value->id)}}" name="ganda{{strval($value->id)}}" />
                            </div>
                            @endif
                            @if($value->type == 'centang')
                            <div>
                                <input type="checkbox" class="border-gray-400 rounded" value="{{ $option->id }}" wire:model="datas.centang.{{strval($value->id)}}.{{$index}}"  />
                            </div>
                            @endif

                            @if($value->type == 'ganda' || $value->type == 'centang')
                                <span class="block text-gray-600">{{ $option->option }}</span>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    @if($value->type == 'dropdown')
                    <div class="text-gray-600">
                        <select wire:model="datas.dropdown.{{strval($value->id)}}" class="border-gray-400 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-300 transition ease-out duration-150">
                            <option>Pilih Jawaban</option>
                            @foreach($value->options as $index => $option)
                            <option value="{{ $option->id }}">{{ $option->option }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
 
                </div>
            </div>
            @endforeach

            <div class="relative w-full h-auto mt-6">
                <div class="bg-white shadow rounded">
                    <div class="py-5 px-6 flex flex-row justify-between items-center space-x-4">
                        <div class="flex flex-row space-x-2 items-center">
                            <p class="sr-only">Loading</p>
                            <svg xmlns="http://www.w3.org/2000/svg" wire:loading wire:target="store" class="h-5 w-5 animate-spin text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                            </svg>
                            <p wire:loading wire:target="store" class="block text-gray-600">Sedang menyimpan harap tunggu.....</p>
                        </div>
                        <div class="flex flex-row space-x-4 items-center">
                            <x-button wire:click.prevent="store">Kirim </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function handleFormUser(){
     
    }
</script>
@endpush
