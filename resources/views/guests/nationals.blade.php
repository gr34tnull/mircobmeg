<x-app-layout>
<div class="flex flex-col items-center content-center justify-center w-full h-full py-auto">

    <div class="flex flex-col items-center justify-center py-6">
        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
            <img src="{{asset('logo.png')}}" class="w-auto h-20 transform hover:scale-105">
        </a>
        <h1 class="text-4xl text-red-900 font-futura stroke-white">NATIONAL ENDORSERS</h1>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:mx-20 md:grid-cols-3 lg:xl:grid-cols-4 xl:grid-cols-5">
    
        @foreach($nationals as $national)
        <a href="{{route('nationals.show',$national->id)}}">
        <div class="flex flex-col items-center justify-center p-4 space-y-0 transform bg-gray-100 shadow rounded-xl hover:scale-105">
            <div class="inline-flex w-40 h-40 overflow-hidden">
                <img src="{{is_null($national->image) ? asset('endorser.png') : asset('/national/'.$national->image)}}" class="z-20 w-full h-full shadow-xl">
            </div>
            <h2 class="font-extrabold text-center text-blue-900 uppercase text-md font-futura">{{$national->fname.' '.$national->lname}}</h2>
            <h6 class="text-xs font-medium uppercase">{{$national->farm}}</h6>

        </div>
        </a>
        @endforeach
        
    </div>
</div>
</x-app-layout>