<div class="w-full h-auto relative" x-data="handleFormUser()">
    <div class="max-w-2xl mx-auto ">
        <div class="border-t-10 border-blue-500 rounded-lg h-5 relative z-30">
        </div>
        <div class="bg-white shadow rounded-lg py-6 px-7 -mt-4 border-l-4 border-transparent">
            <div class="mt-2">
                <h4 class="block text-4xl text-gray-800">{{ session()->has('send_success') ? session()->get('send_success') : 'Formulir tanpa judul' }}</h4>
            </div>
            <div class="my-5">
                <p class="block text-gray-600 tracking-tight">
                    @if(session()->get('hasSuccess') == 1)
                        <span class="block">Jawaban Anda telah direkam.</span>
                    @elseif(session()->get('hasSuccess') == 0)
                        <span class="block text-red-500">Anda tidak menjawab satupun pertanyaan.</span>
                    @endif
                </p>
            </div>
            <div>
                <a href="{{ route('formulir.user', ['form' => session()->has('url') ? session()->get('url') : 0]) }}" class="block text-blue-500 underline tracking-tight">
                    @if(session()->get('hasSuccess') == 1)
                        <span class="block">Kirim jawaban lainnya</span>
                    @elseif(session()->get('hasSuccess') == 0)
                        <span class="block">Kembali menjawab pertanyaan</span>
                    @endif
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>

</script>
@endpush
