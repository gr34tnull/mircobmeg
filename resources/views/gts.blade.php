<x-app-layout>
<div class="flex flex-col items-center justify-center w-full h-full m-auto">

    <div class="flex flex-col items-center justify-center pt-6 pb-2 md:space-x-10 md:flex-row">
        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
            <img src="{{asset('logo.png')}}" class="w-auto h-20 transform hover:scale-105">
        </a>
        <h1 class="text-2xl text-red-900 md:text-4xl font-futura stroke-white">GAMEFOWL TECHNICAL SPECIALIST</h1>
    </div>

    <div class="px-4 md:px-20">
        <img src="{{asset('gts.png')}}" class="w-full h-full border-4 border-white rounded">
    </div>
    
</div>
</x-app-layout>