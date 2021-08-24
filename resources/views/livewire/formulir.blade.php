<div class="w-full h-auto relative">
    <div class="max-w-3xl mx-auto ">
        @if($errors->any())
            <div class="fixed left-5 z-50 mx-auto h-auto shadow rounded-lg py-5 px-7 mb-6 bg-red-100 border border-red-400 text-red-700 pr-14">
                <div class="flex flex-col items-start space-y-2 relative">
                    @foreach($errors->all() as $key => $error)
                        <div class="flex flex-row items-center space-x-2 h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <p class="block text-sm text-red-500">{{ $error }}</p>
                        </div>
                    @endforeach

                </div> 
                <button class="absolute right-1  top-1" @click.prevent="$el.parentNode.remove()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        @endif
        <form class="w-full h-auto" x-data="handleForms()">
            {{-- <p wire:click="getDatas">cek</p> --}}
            <div class="border-t-10 border-blue-500 rounded-lg h-5 relative z-30">
            </div>
            <div class="bg-white shadow rounded-lg py-6 px-7 -mt-4 border-l-4 border-transparent" :class="{'border-blue-500': itemActive == 0}" @click="itemActive = 0; isOptionOpen = false;">
                <div>
                    <x-input-form placeholder="Judul formulir" wire:model.lazy="title" ::class="{'border-gray-200': itemActive == 0}" class="text-4xl text-gray-800 border-dotted focus:border-solid" />
                </div>
                <div>
                    <x-input-form placeholder="Deskripsi formulir" wire:model.lazy="description" class="border-dotted focus:border-solid" ::class="{'border-gray-200': itemActive == 0}" />
                </div>
            </div>
            {{-- @foreach($datas as $key => $value)         
            @endforeach --}}
            <template x-for="(data ,i) in datas" :key="'data-forms' + i">
                <div class="bg-white shadow rounded-lg mt-6 py-6 px-7 border-l-4 border-transparent" @click="itemActive = i+1; isOptionOpen = false" :class="{'border-blue-500': itemActive == i+1   }">
                    <div class="flex items-center flex-row space-x-8 justify-between">
                        <div class="w-full" style="flex: 2;">
                            <x-input-form placeholder="Judul formulir" placeholder="Pertanyaan" x-model.lazy="data.question" class="font-medium" ::class="{'border-gray-200': itemActive == i+1, 'bg-gray-100': itemActive == i+1}" />
                        </div>
                        <div class="w-full flex justify-center items-center relative" style="flex: 1;" x-show="itemActive == i+1">
                            <button class="text-gray-500 border rounded py-3 px-5 w-full border-gray-300 flex items-center justify-between" @click.prevent.stop="isOptionOpen = true">
                                <div class="flex flex-row items-center justify-start">
                                    <div>
                                        <template x-if="data.type == 'singkat'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                            </svg>
                                        </template>
                                        <template x-if="data.type == 'paragraf'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3 7a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 13a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </template>
                                        <template x-if="data.type == 'ganda'">
                                            <div class="p-1 border-2 rounded-full border-gray-500">
                                                <div class="w-2 h-2 rounded-full bg-gray-500"></div>
                                            </div>
                                        </template>
                                        <template x-if="data.type == 'centang'">
                                            <div class=" bg-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </template>
                                        <template x-if="data.type == 'dropdown'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                                                </svg>
                                        </template>
                                    </div>
                                    <p class="flex-grow text-left px-2">
                                        <template x-if="data.type == 'singkat'">
                                            <span>Jawaban Singkat</span>
                                        </template>
                                        <template x-if="data.type == 'paragraf'">
                                            <span>Paragraf</span>
                                        </template>
                                        <template x-if="data.type == 'ganda'">
                                            <span>Pilihan Ganda</span>
                                        </template>
                                        <template x-if="data.type == 'centang'">
                                            <span>Kotak Centang</span>
                                        </template>
                                        <template x-if="data.type == 'dropdown'">
                                            <span>Dropdown</span>
                                        </template>
                                    </p>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                            <div :class="{'hidden': !isOptionOpen, 'block': isOptionOpen}" class="absolute ml-3 z-40">
                                <ul class="bg-white rounded shadow-md w-56 border py-1 text-gray-500">
                                    <li>
                                        <button @click.prevent="handleChangeType(i,'singkat')" class="hover:bg-gray-100 transition ease-out duration-150 w-full">
                                            <div class="flex flex-row items-center justify-start py-3 px-4 space-x-5">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                                    </svg>
                                                </div>
                                                <span>Jawaban Singkat<span>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button @click.prevent="handleChangeType(i,'paragraf')" class="hover:bg-gray-100 transition ease-out duration-150 w-full">
                                            <div class="flex flex-row items-center justify-start py-3 px-4 space-x-5">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M3 7a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 13a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <span>Paragraf</span>
                                                
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button @click.prevent="handleChangeType(i,'ganda')" class="hover:bg-gray-100 transition ease-out duration-150 w-full">
                                            <div class="flex flex-row items-center justify-start py-3 px-4 space-x-5">
                                            <div class="p-1 border-2 rounded-full border-gray-500">
                                                <div class="w-2 h-2 rounded-full bg-gray-500"></div>
                                            </div>
                                            <span class="block">Pilihan Ganda</span>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button @click.prevent="handleChangeType(i,'centang')" class="hover:bg-gray-100 transition ease-out duration-150 w-full">
                                            <div class="flex flex-row items-center justify-start py-3 px-4 space-x-5">
                                            <div class=" bg-gray-500 mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <span class="block">Kotak Centang</span>
                                            
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button @click.prevent="handleChangeType(i,'dropdown')" class="hover:bg-gray-100 transition ease-out duration-150 w-full">
                                            <div class="flex flex-row items-center justify-start py-3 px-4 space-x-5">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <span>Dropdown</span>
                                          
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="relative w-full h-auto">
                        <template x-if="data.type == 'singkat'">
                            <div class="w-1/2">
                                <x-input-form placeholder="Text jawaban singkat" x-model.lazy="data.singkat" readOnly disabled ::class="{'border-gray-200': true, 'focus:border-blue-500': false, 'focus:border-gray-200': true ,'border-dotted': true}" />
                            </div>
                        </template>
                        <template x-if="data.type == 'paragraf'">
                            <div>
                                <x-input-form placeholder="Text jawaban panjang" x-model.lazy="data.paragraf" readOnly disabled ::class="{'border-gray-200': true, 'focus:border-blue-500': false, 'focus:border-gray-200': true ,'border-dotted': true}" />
                            </div>
                        </template>
                        <template x-if="data.type == 'ganda' || data.type == 'centang' || data.type == 'dropdown' ">
                            <div wire:ignore>
                                <template x-for="(item, index) in data.options" :key="'form-opttion' + index">   
                                    <div class="flex items-center flex-row space-x-3 h-full">
                                        <template x-if="data.type == 'ganda'">  
                                            <div class="w-4 h-4 rounded-full border-2 border-gray-400 flex-shrink-0"></div>
                                        </template>
                                        <template x-if="data.type == 'centang'">  
                                            <div class="w-4 h-4 rounded border-2 border-gray-400 flex-shrink-0"></div>
                                        </template>
                                        <template x-if="data.type == 'dropdown'">  
                                            <div class="text-gray-600 text-base" x-text="index+1"></div>
                                        </template>
                                        <x-input-form placeholder="Opsi 1" x-model.lazy="item.option"  class="px-0" ::class="{'border-gray-200': itemActive == i+1}" />
                                        <template x-if="index > 0">
                                            <button x-show="itemActive == i+1" class="block focus:outline-none text-gray-600" @click.prevent="$wire.handleDeleteOption(i, index)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </template>
                                    </div>
                                </template>

                                <div class="mt-6" x-show="itemActive == i+1">
                                    <button class="text-sm text-white bg-blue-500 py-2 px-5 rounded flex items-center hover:bg-blue-600 transition duration-150 ease-out focus:ring focus:ring-blue-300" @click.prevent="$wire.addOption(i)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="block">Tambahkan opsi</span>
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div x-show="itemActive == i+1" class="border-t-2 border-gray-200 mt-10 pt-4 text-gray-500">
                        <div class="w-full h-auto flex items-center justify-end space-x-2">
                            <template x-if="i > 0">
                                <div class="border-r pr-2 border-gray-300">
                                    <button type="button" class="block p-2 rounded-full hover:bg-gray-100 transition ease-out duration-150"  @click="$wire.handleDeleteQuestion(i, data.id);">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                            <div class="pl-2">
                                <label for="toogleA" class="flex items-center cursor-pointer">
                                    <div class="mr-3 text-gray-500">
                                        Wajib Diisi
                                    </div>
                                    <div class="relative" @click="handleChangeIsFill(i)">
                                        <input id="requiredfill" type="checkbox"  x-model="data.requiredfill" class="sr-only" />
                                        <div class="w-10 h-4 bg-gray-300 rounded-full shadow-inner"></div>
                                        <div class="dot absolute w-6 h-6 bg-white rounded-full shadow border-l -left-1 -top-1 transition"></div>
                                    </div>
                                </label>
                            </div>
                            <template x-if="i == datas.length -1">
                                <div class="pl-4">
                                    <button type="button" class="block p-2 rounded-full bg-gray-100 hover:bg-gray-200 transition ease-out duration-150" @click="handleAddQuestion()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </template>


            <div class="relative w-full h-auto mt-6" >
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
                            <x-button-link href="{{route('formulir.home')}}" >Kembali </x-button-link>
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
    function handleForms() {
        return {
            open: false,
            datas: @entangle('datas'),
            itemActive: 0, 
            isOptionOpen: true,
            handleChangeType: function(index,type, el = null){
                this.datas = this.datas.map((item, i) => {
                    if(index == i){
                        return {
                            ...item,
                            type,
                            options: [
                                {id: '', option: `Opsi`}
                            ],
                        }
                    }
                    return item;
                })
            },
            handleChangeIsFill: function(index){
                  this.datas = this.datas.map((item, i) => {
                    if(index == i){
                        return {
                            ...item,
                            requiredfill: !item.requiredfill,
                        }
                    }
                    return item;
                })
            },
            handleAddQuestion: function(){
                this.datas = [...this.datas, {
                    id: '',
                    type: 'singkat',
                    requiredfill: false,
                    question: '',

                }]
            },
            init: function() {

            }
         }
    }

</script>
@endpush
