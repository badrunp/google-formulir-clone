<div class="w-full h-auto relative" x-data="handleFormUser()">
    <div class="max-w-2xl mx-auto ">

        <div class="bg-white shadow rounded-lg mb-6 py-6 px-7 border-l-4 border-transparent">
            <div class="flex flex-row justify-between items-center">
                <div class="text-gray-700">
                    <h4 class="block text-2xl">Jawaban {{ count($answers) }}</h4>
                </div>
                <div class="h-auto relative" x-data>
                    <div class="flex flex-row items-center space-x-4 justify-start">
                        <div class="text-left grid place-items-center" wire:click="previous">
                            <button @class(['text-gray-300'=> $number == 1, 'cursor-text' => $number == 1, 'text-gray-600' => $number != 1])>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                        </div>
                        <div class="text-gray-600">
                            <span class="inline-block text-base">{{ count($numbers) == 0 ? count($numbers) : $number  }}</span>
                            <span class="inline-block text-base">dari</span>
                            <span class="inline-block text-base">{{ count($numbers) }}</span>
                        </div>
                        <div class="text-left grid place-items-center" @if($number !=count($numbers)) wire:click="next" @endif>
                            <button @class(['text-gray-300'=> $number == count($numbers) || count($numbers) == 0, 'cursor-text' => $number == count($numbers), 'text-gray-600' => $number != count($numbers) && count($numbers) != 0])>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t-10 border-blue-500 rounded-lg h-5 relative z-30">
        </div>
        <div class="bg-white shadow rounded-lg py-6 px-7 -mt-4 border-l-4 border-transparent">
            <div class="text-gray-500">
                <span class="block text-sm">Jawaban tidak dapat diedit</span>
            </div>
            <div class="text-gray-800 mt-3">
                <h4 class="block text-4xl">{{ $form->title }}</h4>
            </div>
        </div>

        @foreach($answers as $index => $items)
        <div class="w-full h-auto ">
            @php
            $number = 0;
            @endphp
            @foreach($items as $key => $datas)
            @php
            $number++;
            @endphp
            @if($paginate == $index)
            <div class="bg-white shadow rounded-lg mt-6 py-6 px-7 border-l-4 border-transparent">
                <div class="text-gray-600 flex flex-row space-x-2">
                    @foreach($datas as $i => $value)
                    @if($loop->first)
                    <span class="block font-medium">{{ $number }}.</span>
                    <h5 class="block text-base font-medium">{{ $value['question']['question'] }}</h5>
                    @endif
                    @endforeach
                </div>
                <div class="text-gray-600 mt-2">
                    @foreach($datas as $i => $value)
                    @if($value['type'] == 'singkat')
                    <div class="w-1/2">
                        @if($value['answer'] != null)
                        <p>{{$value['answer']}}</p>
                        @else
                        <span class="block text-red-500 italic">Pertanyaan ini tidak dijawab</span>
                        @endif
                    </div>
                    @endif

                    @if($value['type'] == 'paragraf')
                    <div>
                        @if($value['answer'] != null)
                        <p>{{$value['answer']}}</p>
                        @else
                        <span class="block text-red-500 italic">Pertanyaan ini tidak dijawab</span>
                        @endif
                    </div>
                    @endif

                    @if($value['type'] == 'ganda' || $value['type'] == 'centang')
                    <div class="flex flex-col space-y-2 mt-3">
                        <div class="flex flex-row space-x-4 items-center">
                            @if($value['type'] == 'ganda')
                            <div>
                                <input type="radio" disabled readOnly />
                            </div>
                            @endif

                            @if($value['type'] == 'centang')
                            <div>
                                <input type="checkbox" class="border-gray-400 rounded" disabled readOnly />
                            </div>
                            @endif

                            @if($value['option_id'] != null)
                            <span class="block text-gray-600">{{ $value['option']['option'] }}</span>
                            @else
                            <span class="block text-red-500 italic">
                                @if($value['type'] == 'centang')
                                    Opsi ini tidak dipilih
                                @else
                                    Pertanyaan ini tidak dijawab
                                @endif
                            </span>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if($value['type'] == 'dropdown')
                    <div class="text-gray-600 mt-2">
                        <div class="text-gray-500 border rounded py-2 px-5 border-gray-300 w-max">
                            @if($value['option_id'] != null)
                            {{ $value['option']['option'] }}
                            @else
                            <span class="block text-red-500 italic">Pertanyaan ini tidak dijawab</span>
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endforeach
    </div>


</div>

@push('scripts')
<script>

</script>
@endpush
