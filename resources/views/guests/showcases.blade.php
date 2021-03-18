<x-app-layout>
<div class="hidden lg:block xl:block">
    <div class="flex flex-col items-center justify-center w-screen h-screen pt-2 pb-16 lg:px-40">
        <div class="grid grid-cols-1 gap-2">
            <div class="flex flex-row items-center justify-center min-h-full">
                <img class="w-full min-h-full" src="{{ asset('showcases/'.$showcases->first()->image) }}">
            </div>
            <div class="w-full">
                <div class="flex flex-row items-center justify-between space-x-4">
                    <a href="{{$showcases->previousPageUrl()}}" class="p-1 px-2 text-center text-red-900 bg-white rounded-full hover:text-indigo-400 focus:text-indigo-400 focus:outline-none focus:shadow-outline {{$showcases->onFirstPage() ? 'disabled' : ''}}">
                        <i class="fas fa-arrow-left"></i>
                    </a>

                    @foreach($showcases as $showcase)
                        <a href="{{route('showcases.show',$showcase->id)}}"><img class="w-full h-32 opacity-75 hover:opacity-100" src="{{ asset('showcases/'.$showcase->image) }}"></a>
                    @endforeach

                    <a href="{{$showcases->nextPageUrl()}}" class="p-1 px-2 text-center text-red-900 bg-white rounded-full hover:text-indigo-400 focus:text-indigo-400 focus:outline-none focus:shadow-outline {{$showcases->hasMorePages() ? '' : 'disabled'}}">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block lg:hidden xl:hidden py-auto">
    <div class="flex flex-col items-center justify-center w-screen h-screen">
        <div class="grid grid-cols-1 gap-6 px-10 md:px-20">

            @foreach($showcases as $showcase)
            <div class="w-full">
                <a href="{{route('showcases.show',$showcase->id)}}">
                    <img class="w-full h-32 border border-white opacity-75 md:h-48 hover:opacity-100 roundex-xl" src="{{ asset('showcases/'.$showcase->image) }}">
                </a>
                <p class="text-center text-white uppercase">{{ $showcase->created_at->format('M Y') }}</p>
            </div>
            @endforeach

        </div>
        <div class="flex flex-row items-center justify-center w-full px-10 pt-4 space-x-10 md:px-20">{{$showcases->links()}}</div>
    </div>
</div>
</x-app-layout>