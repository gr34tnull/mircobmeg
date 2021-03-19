<x-app-layout>
<div class="flex flex-col items-center justify-center px-32 py-12 prohide-p">

    <div class="flex flex-col items-center justify-center">
        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
            <img src="{{asset('logo.png')}}" class="w-auto h-24 transform hover:scale-105">
        </a>
        <h1 class="text-4xl text-red-900 font-futura stroke-white">CATEGORIES</h1>
    </div>

    <div class="grid gap-2 py-10 lg:grid-cols-6">
    
        <a href="{{route('products.list',1)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category1.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">FEEDS</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.list',2)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category2.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">DISINFECTANT</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.list',3)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category3.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">SUPPLEMENT</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.list',4)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category4.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">SHAMPOO</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.list',5)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category5.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">ANTIBIOTICS</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.list',6)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category6.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">BUNDLES</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

    </div>
</div>

<div class="flex flex-col items-center justify-center hidden px-32 py-12 proshow-p">

    <div class="flex flex-col items-center justify-center">
        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
            <img src="{{asset('logo.png')}}" class="w-auto h-24 transform hover:scale-105">
        </a>
        <h1 class="text-4xl text-red-900 font-futura stroke-white">CATEGORIES</h1>
    </div>

    <div class="grid gap-2 py-10 lg:grid-cols-3">
    
        <a href="{{route('products.list',1)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category1.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">FEEDS</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.list',2)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category2.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">DISINFECTANT</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.list',3)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category3.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">SUPPLEMENT</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.list',4)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category4.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">SHAMPOO</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.list',5)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category5.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">ANTIBIOTICS</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.list',6)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('categories/category6.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">BUNDLES</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

    </div>
</div>

</x-app-layout>