<x-app-layout>
<div class="hidden lg:block xl:block prohide-p">
    <div class="flex flex-col items-center justify-center w-screen h-screen pt-2 pb-16 lg:px-40">
        <div class="grid grid-cols-1 gap-2">
            <div class="flex flex-row items-center justify-center min-h-full">
                @if(!is_null($feature))
                    <img class="w-full min-h-full" src="{{  asset('showcases/'.$feature->image) }}">
                @endif
            </div>
            <div class="w-full">
            @if($showcases->hasPages())
                <div class="flex flex-row items-center justify-between space-x-2">
                    <a href="{{$showcases->previousPageUrl()}}" class="p-1 px-2 text-center bg-white rounded-full hover:text-yellow-300 focus:text-yellow-300 focus:outline-none focus:shadow-outline {{$showcases->onFirstPage() ? 'disabled text-red-900' : 'text-blue-900'}}">
                        <i class="fas fa-arrow-left"></i>
                    </a>

                    @foreach($showcases as $showcase)
                        <a href="{{route('showcases.show',$showcase->id)}}"><img class="h-20 opacity-75 w-44 hover:opacity-100" src="{{ asset('showcases/'.$showcase->image) }}"></a>
                    @endforeach

                    <a href="{{$showcases->nextPageUrl()}}" class="p-1 px-2 text-center bg-white rounded-full hover:text-yellow-300 focus:text-yellow-300 focus:outline-none focus:shadow-outline {{$showcases->hasMorePages() ? 'text-blue-900' : 'disabled text-red-900'}}">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
<div class="block lg:hidden xl:hidden proshow-p">
    <div class="flex flex-col items-center justify-center p-2 overflow-y-auto no-scrollbar">
        <div class="grid grid-cols-1 gap-6">
            <div class="w-full">
            @foreach($showcases as $showcase)
                <a href="{{route('showcases.show',$showcase->id)}}">
                    <img class="w-full h-32 opacity-75 md:h-64 hover:opacity-100" src="{{ asset('showcases/'.$showcase->image) }}">
                </a>
            @endforeach
            </div>
            @if($showcases->hasPages())
            <div class="flex flex-row items-center justify-between w-full px-6 pb-6">
                <a href="{{$showcases->previousPageUrl()}}" class="py-2 px-6 text-center bg-white rounded-full hover:text-yellow-300 focus:text-yellow-300 focus:outline-none focus:shadow-outline {{$showcases->onFirstPage() ? 'disabled text-red-900' : 'text-blue-900'}}">
                    <i class="fas fa-arrow-left"></i> Previous
                </a>
                <a href="{{$showcases->nextPageUrl()}}" class="py-2 px-6 text-center bg-white rounded-full hover:text-yellow-300 focus:text-yellow-300 focus:outline-none focus:shadow-outline {{$showcases->hasMorePages() ? 'text-blue-900' : 'disabled text-red-900'}}">
                    <i class="fas fa-arrow-right"></i> Next
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
</x-app-layout>