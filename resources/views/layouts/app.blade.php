<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List APP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- blade--formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-2 ring-slate-700/10 hover:bg-slate-50 text-slate-700;
        }
        .link{
            @apply font-medium text-gray-700 underline decoration-pink-500;
        }
        label{
            @apply block uppercase text-slate-700 mb-2
        }
        input, textarea{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
        
        .error-message{
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade--formatter-enable --}}
    @yield('styles')
</head>
<body class="container mx-auto mt-10 max-w-lg">
    <h1 class="text-2xl mb-4">@yield('title')</h1>
    {{-- <div>{{ session('success') }}</div> --}}
    <div x-data='{ flash: true }'>
        @if(session()->has('success'))
        <div x-show="flash" 
        class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700" role="alert">
            <strong class="font-bold">Success!</strong>
            <div>
                <div>{{ session('success') }}</div>
            </div>
            <span class="absolute top-0 bottom-0 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                stroke="currentColor" stroke-width='1.5' class="h-6 w-6 cursor-pointer" @click="flash = false">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
        @endif    
    </div>
    @yield('content')
</body>
</html>