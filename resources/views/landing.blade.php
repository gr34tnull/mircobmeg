<div class="hidden lg:block prohide-p proshow-l">

    <div class="flex justify-center min-h-screen items-top sm:items-center md:h-screen sm:pt-0">
        <div class="w-screen h-screen overflow-hidden bg-gradient-to-r from-blue-700 to-indigo-900" usemap="#image-map">
            <img src="{{asset('home.png')}}" class="w-screen h-screen bg-cover" usemap="#image-map">
            <map name="image-map" class="block xl:hidden">
                <area class="cursor-pointer focus:outline-none" href="{{route('liveshow')}}" coords="642,249,810,333" shape="rect">
                <area class="cursor-pointer focus:outline-none" href="{{route('products.guests')}}" coords="360,350,1065,601" shape="rect">
                <area class="cursor-pointer focus:outline-none" href="{{route('regionals.guests')}}" coords="1,372,74,365,322,384,318,668,168,711,3,712" shape="poly">
                <area class="cursor-pointer focus:outline-none" href="{{route('nationals.guests')}}" coords="1438,360,1087,397,1085,630,1277,707,1437,708" shape="poly">
            </map> 
        </div>
    </div>
    
</div>
<div class="block lg:hidden proshow-p prohide-l">

    <div class="flex items-center justify-center min-h-screen md:h-screen sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-center pt-8 sm:pt-0">
                <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
                    <img src="{{asset('logo.png')}}" class="w-auto h-20 transform hover:scale-105">
                </a>
                <h1 class="text-4xl text-red-900 font-futura stroke-white">MAIN HALL</h1>
            </div>

            <div class="grid grid-cols-1 my-10 bg-gray-200 md:grid-cols-2 md:rounded-xl">
                <div class="p-6">
                    <a href="{{route('liveshow')}}">
                        <div class="flex items-center transform hover:scale-105">
                            <div class="ml-4 text-lg font-semibold leading-7 text-blue-900 hover:text-yellow-300">
                                <i class="fas fa-tv"></i> Liveshow
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Watch our live feed of the latest events featuring contents related to this website.
                            </div>
                        </div>
                    </a>
                </div>

                <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                    <button type="button" class="text-left focus:outline-none" onclick="toggleElement('endorsersModal')">
                        <div class="flex items-center transform hover:scale-105">
                            <div class="ml-4 text-lg font-semibold leading-7 text-blue-900 hover:text-yellow-300">
                                <i class="fas fa-users"></i> Endorsers
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Check out for the latest news and information about our national and regional endorsers.
                            </div>
                        </div>
                    </button>
                </div>

                <div class="p-6 border-t border-gray-200">
                    <a href="{{route('products.index')}}">
                        <div class="flex items-center transform hover:scale-105">
                            <div class="ml-4 text-lg font-semibold leading-7 text-blue-900 hover:text-yellow-300">
                                <i class="fas fa-shopping-bag"></i> Products
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Know more about the products available for your bloodlines, where to buy them and more information and reviews about the products.
                            </div>
                        </div>
                    </a>
                </div>

                <div class="p-6 border-t border-gray-200 md:border-l">
                    <a href="{{route('showcases.index')}}">
                        <div class="flex items-center transform hover:scale-105">
                            <div class="ml-4 text-lg font-semibold leading-7 text-blue-900 hover:text-yellow-300">
                                <i class="fas fa-star"></i> KMP Showcase
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Monthly, we feature the KAKAMPI MO SA PANALO of the Month, check out who might be the next KMP Featured Endorser.
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- EndorserModal -->
            <div id="endorsersModal" class="fixed inset-0 z-10 hidden overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-75"></div>
                    </div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-2xl" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="px-10 pt-5 pb-10 bg-white">
                        <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('endorsersModal')">
                            <div class="fixed top-0 right-0 z-10 flex items-center justify-center w-6 h-6 mt-2 mr-2 bg-gray-100 border rounded-full shadow-md cursor-pointer focus:outline-none">
                                <i class="fas fa-times"></i>
                            </div>
                        </button>
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="w-auto h-24 text-white transform bg-blue-900 rounded-xl hover:scale-105 hover:text-yellow-300">
                                <div class="flex items-center justify-center h-full p-4">
                                    <a href="{{route('nationals.guests')}}"><h1 class="text-sm lg:text-lg">National Endorsers</h1></a>
                                </div>
                            </div>
                            <div class="w-auto h-24 text-white transform bg-red-900 rounded-xl hover:scale-105 hover:text-yellow-300">
                                <div class="flex items-center justify-center h-full p-4">
                                    <a href="{{route('regionals.guests')}}"><h1 class="text-sm lg:text-lg">Regional Endorsers</h1></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>