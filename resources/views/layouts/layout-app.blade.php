<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "Google Formulir" }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body class="overflow-hidden bg-gray-100 antialiased">

    <livewire:navbar />
    <x-button-added-formulir />

    <div class="py-4">
        {{ $slot }}
    </div>

    @livewireScripts
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
</body>
</html>
