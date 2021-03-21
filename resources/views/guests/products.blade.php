<x-app-layout>
<div class="flex flex-col items-center content-center justify-center w-full h-full py-10 m-auto lg:py-20 xl:py-32">

    <div class="flex flex-col items-center justify-center py-6">
        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
            <img src="{{asset('logo.png')}}" class="w-auto h-20 transform hover:scale-105">
        </a>
        <h1 class="text-4xl text-red-900 font-futura stroke-white">CATEGORIES</h1>
    </div>

    <div class="prohide-p">
        <div class="grid grid-cols-1 gap-6 mx-20 md:grid-cols-3 lg:grid-cols-6">
        
            <a href="{{route('products.list',1)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category1.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">FEEDS</h2>
                </div>
            </a>

            <a href="{{route('products.list',2)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category2.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">DISINFECTANT</h2>
                </div>
            </a>

            <a href="{{route('products.list',3)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category3.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">SUPPLEMENTS</h2>
                </div>
            </a>

            <a href="{{route('products.list',4)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category4.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">SHAMPOO</h2>
                </div>
            </a>

            <a href="{{route('products.list',5)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category5.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">ANTIBIOTICS</h2>
                </div>
            </a>

            <a href="{{route('products.list',6)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category6.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">BUNDLES</h2>
                </div>
            </a>
            
        </div>
    </div>

    <div class="hidden proshow-p">
        <div class="grid grid-cols-1 gap-6 mx-20 md:grid-cols-3">
        
            <a href="{{route('products.list',1)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category1.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">FEEDS</h2>
                </div>
            </a>

            <a href="{{route('products.list',2)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category2.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">DISINFECTANT</h2>
                </div>
            </a>

            <a href="{{route('products.list',3)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category3.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">SUPPLEMENTS</h2>
                </div>
            </a>

            <a href="{{route('products.list',4)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category4.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">SHAMPOO</h2>
                </div>
            </a>

            <a href="{{route('products.list',5)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category5.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">ANTIBIOTIC</h2>
                </div>
            </a>

            <a href="{{route('products.list',6)}}">
                <div class="container flex flex-col items-center justify-center p-4 mx-auto space-y-0 transform bg-red-900 border-4 border-yellow-300 shadow rounded-xl hover:scale-105">
                    <div class="inline-flex w-40 h-40 overflow-hidden md:w-64 md:h-64">
                        <img src="{{asset('categories/category6.png')}}" class="w-full h-full">
                    </div>
                    <h2 class="font-extrabold text-center text-white uppercase text-md font-futura">BUNDLES</h2>
                </div>
            </a>
            
        </div>
    </div>
    
</div>
</x-app-layout>