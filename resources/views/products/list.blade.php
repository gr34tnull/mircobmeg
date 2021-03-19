<x-app-layout>
<div class="flex flex-col items-center justify-center px-32 py-12">

    <div class="flex flex-col items-center justify-center">
        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
            <img src="{{asset('logo.png')}}" class="w-auto h-24 transform hover:scale-105">
        </a>
        <h1 class="text-4xl text-red-900 uppercase font-futura stroke-white">{{$category == 1 ? 'FEEDS' : ($category == 2 ? 'DISINFECTANTS' : ($category == 3 ? 'SUPPLEMENTS' : ($category == 4 ? 'SHAMPOO' : ($category == 5 ? 'ANTIBIOTICS' : 'BUNDLES') ) ) )}}</h1>
    </div>

    <div class="grid grid-cols-1 gap-4 pt-2 mx-20 md:grid-cols-3 lg:xl:grid-cols-4 xl:grid-cols-5">
    
        @foreach($products as $product)
            <div class="w-full">
                <a href="{{route('products.show',$product->id)}}" class="focus:outline-none">
                    <div class="flex flex-col items-center justify-center p-4 transition duration-300 ease-in-out delay-150 transform bg-red-900 border-4 border-yellow-200 rounded-lg shadow hover:scale-105" onmouseover="toggleElement('desc{{$product->id}}')" onmouseout="toggleElement('desc{{$product->id}}')">
                        <div class="inline-flex w-48 h-48 overflow-hidden">
                            <img src="{{is_null($product->image) ? asset('product.png') : asset('/products/'.$product->image)}}" class="w-full h-full">
                        </div>
                    </div>
                </a>
                <div id="desc{{$product->id}}" class="absolute z-50 hidden w-full max-w-xs mb-3 text-sm font-normal leading-normal text-left text-gray-900 no-underline break-words bg-white border border-gray-900 rounded-lg">
                    <div>
                        <div class="p-3 mb-0 font-extrabold text-red-900 uppercase bg-yellow-300 border-b border-gray-900 border-solid rounded-t-lg opacity-75 font-futura">
                            {{$product->name}}
                        </div>
                        <div class="p-3 text-xs">
                            {{$product->description}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

</x-app-layout>