<div class="w-full h-auto relative" x-data="handleFormUser()">
    <div class="max-w-2xl mx-auto ">

        <div class="bg-white shadow rounded-lg mb-6 py-6 px-7 border-l-4 border-transparent">
            <div class="text-gray-700">
                <h4 class="block text-2xl">Jawaban {{ count($answers) }}</h4>
            </div>
            <div class="w-full h-auto relative" x-data>
                <div class="flex flex-row items-start space-x-4">
                    <div class="text-left" wire:click="previous">Previous</div>
                    <div class="text-left" wire:click="next">Next</div>
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
                                <p>{{$value['answer']}}</p>
                            </div>
                        @endif

                        @if($value['type'] == 'paragraf')
                        <div>
                            <p>{{$value['answer']}}</p>
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

                                <span class="block text-gray-600">{{ $value['option']['option'] }}</span>
                            </div>
                        </div>
                        @endif

                        @if($value['type'] == 'dropdown')
                        <div class="text-gray-600 mt-2">
                            <div class="text-gray-500 border rounded py-2 px-5 w-full border-gray-300 w-max">
                                {{ $value['option']['option'] }}
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
