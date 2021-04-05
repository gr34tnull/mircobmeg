<x-app-layout>
<div class="flex flex-col items-center justify-center w-full h-full m-auto">

    <div class="flex flex-col items-center justify-center pt-4 pb-2">
        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
            <img src="{{asset('logo.png')}}" class="w-auto h-20 transform hover:scale-105">
        </a>
        <h1 class="text-4xl text-red-900 font-futura stroke-white">CATEGORIES</h1>
    </div>

    <div class="grid justify-center grid-cols-1 gap-2 mx-20 md:grid-cols-3 lg:grid-cols-4">
    
        <a href="{{route('products.list',1)}}">
            <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform rounded-xl hover:scale-105">
                <div class="inline-flex w-48 h-48 overflow-hidden md:h-40 md:w-40 xl:w-56 xl:h-56">
                    <img src="{{asset('categories/category1.png')}}" class="w-full h-full">
                </div>
                <h2 class="text-lg font-extrabold text-center text-white uppercase font-futura">Disinfectant</h2>
            </div>
        </a>

        <a href="{{route('products.list',2)}}">
            <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform rounded-xl hover:scale-105">
                <div class="inline-flex w-48 h-48 overflow-hidden md:h-40 md:w-40 xl:w-56 xl:h-56">
                    <img src="{{asset('categories/category2.png')}}" class="w-full h-full">
                </div>
                <h2 class="text-lg font-extrabold text-center text-white uppercase font-futura">Pointing Supplement</h2>
            </div>
        </a>

        <a href="{{route('products.list',3)}}">
            <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform rounded-xl hover:scale-105">
                <div class="inline-flex w-48 h-48 overflow-hidden md:h-40 md:w-40 xl:w-56 xl:h-56">
                    <img src="{{asset('categories/category3.png')}}" class="w-full h-full">
                </div>
                <h2 class="text-lg font-extrabold text-center text-white uppercase font-futura">Shampoo</h2>
            </div>
        </a>

        <a href="{{route('products.list',4)}}">
            <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform rounded-xl hover:scale-105">
                <div class="inline-flex w-48 h-48 overflow-hidden md:h-40 md:w-40 xl:w-56 xl:h-56">
                    <img src="{{asset('categories/category4.png')}}" class="w-full h-full">
                </div>
                <h2 class="text-lg font-extrabold text-center text-white uppercase font-futura">Specialty Feeds</h2>
            </div>
        </a>

        <a href="{{route('products.list',5)}}">
            <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform rounded-xl hover:scale-105">
                <div class="inline-flex w-48 h-48 overflow-hidden md:h-40 md:w-40 xl:w-56 xl:h-56">
                    <img src="{{asset('categories/category5.png')}}" class="w-full h-full">
                </div>
                <h2 class="text-lg font-extrabold text-center text-white uppercase font-futura">Supplement</h2>
            </div>
        </a>

        <a href="{{route('products.list',6)}}">
            <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform rounded-xl hover:scale-105">
                <div class="inline-flex w-48 h-48 overflow-hidden md:h-40 md:w-40 xl:w-56 xl:h-56">
                    <img src="{{asset('categories/category6.png')}}" class="w-full h-full">
                </div>
                <h2 class="text-lg font-extrabold text-center text-white uppercase font-futura">Antibiotics</h2>
            </div>
        </a>

        <a href="{{route('products.list',7)}}">
            <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform rounded-xl hover:scale-105">
                <div class="inline-flex w-48 h-48 overflow-hidden md:h-40 md:w-40 xl:w-56 xl:h-56">
                    <img src="{{asset('categories/category7.png')}}" class="w-full h-full">
                </div>
                <h2 class="text-lg font-extrabold text-center text-white uppercase font-futura">Bundles</h2>
            </div>
        </a>

    </div>
    
</div>
</x-app-layout>