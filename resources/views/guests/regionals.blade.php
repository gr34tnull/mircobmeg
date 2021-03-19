<x-app-layout>
<div class="flex items-center justify-center w-screen h-screen mx-20">
    <div class="w-full lg:w-1/3">
        <div class="flex flex-col items-center justify-start space-y-2">
            <button class="w-40 p-4 bg-yellow-300 rounded">MANILA</button>
        </div>
    </div>
    <div class="flex items-center w-full lg:w-2/3">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">

            <div class="flex flex-row items-center justify-center p-4 transform bg-gray-100 shadow w-96 rounded-xl hover:scale-105">
                <div class="inline-flex w-40 h-40 overflow-hidden">
                    <img src="{{asset('endorser.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <div class="flex flex-col items-center justify-center">
                    <h2 class="mt-2 font-bold text-blue-900 uppercase text-md">NAME</h2>
                    <h6 class="text-sm font-medium">FARM</h6>
                </div>

            </div>

            <div class="flex flex-row items-center justify-center p-4 transform bg-gray-100 shadow w-96 rounded-xl hover:scale-105">
                <div class="inline-flex w-40 h-40 overflow-hidden">
                    <img src="{{asset('endorser.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <div class="flex flex-col items-center justify-center">
                    <h2 class="mt-2 font-bold text-blue-900 uppercase text-md">NAME</h2>
                    <h6 class="text-sm font-medium">FARM</h6>
                </div>

            </div>

            <div class="flex flex-row items-center justify-center p-4 transform bg-gray-100 shadow w-96 rounded-xl hover:scale-105">
                <div class="inline-flex w-40 h-40 overflow-hidden">
                    <img src="{{asset('endorser.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <div class="flex flex-col items-center justify-center">
                    <h2 class="mt-2 font-bold text-blue-900 uppercase text-md">NAME</h2>
                    <h6 class="text-sm font-medium">FARM</h6>
                </div>

            </div>

            <div class="flex flex-row items-center justify-center p-4 transform bg-gray-100 shadow w-96 rounded-xl hover:scale-105">
                <div class="inline-flex w-40 h-40 overflow-hidden">
                    <img src="{{asset('endorser.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <div class="flex flex-col items-center justify-center">
                    <h2 class="mt-2 font-bold text-blue-900 uppercase text-md">NAME</h2>
                    <h6 class="text-sm font-medium">FARM</h6>
                </div>

            </div>
                
        </div>
    </div>
</div>
</x-app-layout>