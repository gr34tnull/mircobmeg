<x-app-layout>
<div class="fixed flex items-center w-screen h-screen overflow-y-auto bg-transparent no-scrollbar">
    <div class="w-screen max-w-6xl p-10 mx-auto my-20 overflow-y-auto text-gray-800 bg-white rounded shadow-xl lg:p-20 md:text-left no-scrollbar">
        
        <div class="flex flex-col items-center overflow-y-auto min-w-screen no-scrollbar h-96">
            <div class="flex flex-col w-full lg:flex-row">
                <div class="w-full px-10 mb-10 md:w-1/2 md:mb-0">
                    <div class="relative">
                        <img src="{{is_null($product->image) ? asset('product.png') : asset('/products/'.$product->image)}}" class="relative z-10 w-full transform hover:scale-105">
                    </div>
                </div>
                <div class="w-full px-10 md:w-1/2">
                    <div class="mb-10">
                        <h1 class="mb-2 text-4xl font-extrabold text-blue-900 uppercase lg:text-6xl font-futura">{{$product->name}}</h1>
                        <p class="text-sm">{{$product->description}}</p>
                        <p class="pt-2 text-sm">{{$product->usage}}</p>
                    </div>
                    <div class="flex flex-col items-center justify-center space-x-1 space-y-2">
                        <a href="{{$product->shopee}}" target="_blank" class="w-full px-6 py-2 text-xs font-semibold text-gray-900 bg-yellow-500 opacity-75 rounded-xl hover:opacity-100 hover:text-gray-900 {{is_null($product->shopee) ? 'hidden' : ''}}"><i class="fas fa-shopping-bag"></i> SHOPEE</a>
                        <a href="{{$product->lazada}}" target="_blank" class="w-full px-6 py-2 text-xs font-semibold text-white bg-blue-900 opacity-75 rounded-xl hover:opacity-100 hover:text-white {{is_null($product->lazada) ? 'hidden' : ''}}"><i class="fas fa-briefcase"></i> LAZADA</a>
                        <a href="{{$product->link}}" target="_blank" class="w-full px-6 py-2 text-xs font-semibold text-white bg-red-900 opacity-75 rounded-xl hover:opacity-100 hover:text-white {{is_null($product->link) ? 'hidden' : ''}}"><i class="fas fa-user"></i> LOCAL DISTRIBUTOR</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full lg:flex-row">
                <div class="w-full px-10 mb-10 md:w-1/2 md:mb-0">
                    <div class="inline-block w-full pt-6">
                        <h1 class="text-4xl font-bold text-left text-blue-900 uppercase font-futura">VIDEOS</h1>
                    </div>
                    <div class="grid grid-cols-1 gap-2 p-2">
                        @foreach($videos as $video)
                        <div class="w-full h-64">
                            <div class="relative flex flex-col items-center justify-center">
                                <video class="border-gray-900 border-1" controls>
                                    <source src="{{asset('videos/'.$video->video)}}" type="video/mp4">
                                </video>
                                <small class="py-2 font-extrabold text-center text-blue-900 uppercase text-md">{{$video->title}}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full px-10 md:w-1/2">
                    <div class="inline-block w-full pt-6">
                        <h1 class="text-4xl font-bold text-left text-blue-900 uppercase font-futura">REVIEWS</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</x-app-layout>