<x-app-layout>

<div class="hidden lg:block xl:block prohide-p">
    <div class="flex flex-col py-16 lg:px-40">

        <div class="flex flex-row items-center justify-center w-full h-full">
            @if(!is_null($feature))
                <img id="featured" name="featured"class="w-full h-full" src="{{  asset('showcases/'.$feature->image) }}">
            @endif
        </div>

        <div class="w-full py-2">

            <ul class="lazy">
                @foreach($showcases as $showcase)
                <li>
                    <button type="button" class="opacity-75 hover:opacity-100 focus:outline-none" onclick="changeFeatured('showcase{{$showcase->id}}')">
                        <img id="showcase{{$showcase->id}}" class="h-20 w-44" src="{{ asset('showcases/'.$showcase->image) }}">
                    </button>
                </li>
                @endforeach
            </ul>

        </div>

    </div>
    
</div>
<div class="block lg:hidden xl:hidden proshow-p">
    <div class="flex flex-col items-center justify-center h-full p-2 overflow-y-auto no-scrollbar">
        <div class="flex flex-col items-center justify-center py-6">
            <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
                <img src="{{asset('logo.png')}}" class="w-auto h-20 transform hover:scale-105">
            </a>
            <h1 class="text-4xl text-red-900 font-futura stroke-white">KAKAMPI MO SA PANALO</h1>
        </div>
        <div class="w-full px-10 py-2">

            <ul class="mini">
                @foreach($showcases as $showcase)
                <li>
                    <button type="button" class="opacity-75 hover:opacity-100 focus:outline-none" onclick="changeFeatured('showcase{{$showcase->id}}')">
                        <img id="showcase{{$showcase->id}}" class="w-full h-32 md:h-64" src="{{ asset('showcases/'.$showcase->image) }}">
                    </button>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script type="text/javascript">
function changeFeatured(elemID) {
    var feature = document.getElementById('featured');
    feature.src = document.getElementById(elemID).src;
}            
$('.lazy').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 6,
    slidesToScroll: 1,
    infinite: true,
});
$('.mini').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
});
</script>
</x-app-layout>