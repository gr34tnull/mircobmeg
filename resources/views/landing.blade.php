<div class="flex justify-center min-h-screen items-top sm:items-center sm:pt-0">
    
    <div class="block max-w-6xl mx-auto sm:px-6 lg:px-8 lg:hidden xl:hidden proshow-p">
        <div class="relative hidden mx-auto overflow-hidden max-w-7xl prohide-p prohide-l lg:block" style="padding-top: 56.25%">
            <x-jet-welcome />
        </div>
        
        <div class="relative block w-screen h-screen overflow-hidden sm:rounded-lg lg:hidden proshow-p proshow-l" style="padding-top: 56.25%">
            <iframe class="absolute inset-0 w-screen h-screen border-4 border-white rounded-lg" src="https://iframe.dacast.com/live/452ec86a-cc62-5959-b1a6-47cfdd923db3/8ce97315-d4af-a942-9b15-127e6ef72afc" frameborder="0" scrolling="no" allow="autoplay" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
        </div>
    </div>

    <div class="hidden w-screen h-screen overflow-hidden lg:block xl:block prohide-p proshow-l bg-gradient-to-r from-blue-700 to-indigo-900" usemap="#image-map">
        <img src="{{asset('home.png')}}" class="w-screen h-screen bg-cover" usemap="#image-map">
        <map name="image-map" class="block xl:hidden">
            <!-- <area class="cursor-pointer focus:outline-none" href="" coords="642,249,810,333" shape="rect"> -->
            <area class="cursor-pointer focus:outline-none" href="{{route('dashboard')}}" coords="360,350,1065,601" shape="rect">
            <area class="cursor-pointer focus:outline-none" coords="1,372,74,365,322,384,318,668,168,711,3,712" shape="poly" onclick="toggleElement('modal-register')">
            <area class="cursor-pointer focus:outline-none" href="" coords="1438,360,1087,397,1085,630,1277,707,1437,708" shape="poly">
        </map>
    </div>
    
</div>