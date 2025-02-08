
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- @livewireStyles --}}
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    @include('layouts.navigation')
    <div class="flex ">
        <div>
            <x-side-menu>
                <x-slot:childToday>
                    {{ $today }}
                </x-slot:childToday>
                <x-slot:childUpcoming>
                    {{ $upcoming }}
                </x-slot:childUpcoming>
                <x-slot:childDone>
                    {{ $done }}
                </x-slot:childDone>
                <x-slot:childPersonal>
                    {{ $Personal }}
                </x-slot:childPersonal>
                <x-slot:childKerjaan>
                    {{ $Kerjaan }}
                </x-slot:childKerjaan>
                <x-slot:childLiburan>
                    {{ $Liburan }}
                </x-slot:childLiburan>
                
            </x-side-menu>
        </div>
        <div class="mx-auto p-3 h-full bg-slate-100 w-full">
            {{ $slot }}
        </div>
        
    </div>
<script src="{{ asset('node_modules/flowbite/dist/flowbite.min.js') }}"></script>
{{-- @livewireScripts --}}

</body>
</html>