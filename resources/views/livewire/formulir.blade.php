<div class="w-full h-auto relative">
    <div class="max-w-3xl mx-auto">
        <form class="w-full h-auto" x-data="handleForms()">
            <div class="bg-white shadow rounded-lg border-t-10 border-blue-500 py-6 px-7" @click="addData">
                <div>
                    <x-input-form placeholder="Judul formulir" value="Formulir tanpa judul" class="text-4xl text-gray-800" />
                </div>
                <div>
                    <x-input-form placeholder="Deskripsi formulir"/>
                </div>
            </div> 
            {{-- @foreach($datas as $key => $value)         
            @endforeach --}}
            <template x-for="data in datas">
                <div class="bg-white shadow rounded-lg mt-6 py-6 px-7">
                    <div>
                        <x-input-form placeholder="Judul formulir" placeholder="Pertanyaan" />
                    </div>
                    <div>
                        <x-input-form placeholder="Deskripsi formulir"/>
                    </div>
                </div> 
            </template>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        function handleForms(){
            return {
                open: false,
                datas: @entangle('datas'),
                getData: function(){
                    console.log(this.data)
                },
                addData: function(){
                    this.datas = [...this.datas, {nama: 'badrun', alamat: 'Majalengka'}]
                },
                init: function(){
                    
                },
            }
        }
    </script>
@endpush
