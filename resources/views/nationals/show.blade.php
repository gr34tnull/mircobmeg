<x-app-layout>
<div class="flex flex-col items-center justify-center h-screen pt-10 space-x-10 lg:flex-row lg:px-20 px-auto">
    <div class="w-full py-10 lg:w-1/5 md:px-32 lg:px-0">
        <div class="flex flex-col items-center justify-center p-4 bg-gray-100 shadow rounded-xl">
            <div class="inline-flex w-auto h-48 -mt-32 overflow-hidden">
                <img src="{{is_null($national->image) ? asset('endorser.png') : asset('/national/'.$national->image)}}" class="w-full h-full shadow-xl">
            </div>

            <h2 class="text-lg font-extrabold text-center text-blue-900 uppercase font-futura">{{$national->fname.' '.$national->lname}}</h2>
            <h6 class="text-sm font-medium uppercase">{{$national->farm}}</h6>

            <div class="mx-6 mt-2">
                <ul class="text-xs">
                    <li><i class="fas fa-map-marker-alt"></i> {{$national->location}}</li>
                    <li class="{{is_null($national->email) ? 'hidden' : ''}}"><i class="fas fa-at"></i> {{$national->email}}</li>
                    <li class="{{is_null($national->contact) ? 'hidden' : ''}}"><i class="fas fa-phone"></i> {{$national->contact}}</li>
                    <li class="{{is_null($national->fb) ? 'hidden' : ''}}"><a href="{{$national->fb}}" target="_blank"><i class="fab fa-facebook-square"></i> Facebook Profile</a></li>
                    <li class="{{is_null($national->ig) ? 'hidden' : ''}}"><a href="{{$national->ig}}" target="_blank"><i class="fab fa-instagram-square"></i> Instagram Profile</a></li>
                    <li class="{{is_null($national->website) ? 'hidden' : ''}}"><a href="{{$national->website}}" target="_blank"><i class="fas fa-globe"></i> Personal Website</a></li>
                </ul>    
            </div>

        </div>
        <div class="flex flex-col p-4 mt-2 transform bg-gray-100 shadow rounded-xl">

            <h2 class="text-lg font-bold text-center text-blue-900 uppercase font-futura">ACHIEVEMENTS</h2>

            <ul class="p-2 px-4 text-xs list-disc list-outside">
                @foreach($national->achievements as $achievement)
                <li>{{$achievement->title}}</li>
                @endforeach
            </ul>

        </div>
    </div>
    <div class="w-full h-auto overflow-y-auto bg-white lg:mb-20 lg:w-4/5 no-scrollbar rounded-xl">
        <div class="p-10">
            <div class="flex flex-row pb-6 space-x-10">
                <button id="bbtn" class="text-4xl text-red-900 focus:outline-none font-futura hover:text-yellow-300" onclick="openTab('bloodlines')">BLOODLINES</button>
                <button id="vbtn" class="text-4xl text-gray-900 focus:outline-none font-futura hover:text-yellow-300" onclick="openTab('videos')">VIDEOS</button>
            </div>

            <div id="bloodlines" class="block p-4 bg-blue-900 shadow">
                <div class="flex flex-row py-4 space-x-4 overflow-x-auto no-scrollbar">
                @foreach($national->bloodlines as $bloodline)
                    <button id="btn{{$bloodline->id}}" class="p-2 text-xs text-white bg-red-900 focus:outline-none hover:text-yellow-300" onclick="showTab('{{$bloodline->id}}')">{{$bloodline->title}}</button>
                @endforeach
                </div>

                <div class="py-4 overflow-y-auto no-scrollbar h-96">

                    <div id="bloodlineDefault" class="grid grid-cols-1 gap-4 p-2 md:grid-cols-3 lg:grid-cols-3">
                        @foreach($national->bloodlines as $bloodline)
                            @if($national->bloodlines->first()->id == $bloodline->id)
                                @foreach(App\Models\NationalImage::where('bloodline_id',$bloodline->id)->get() as $image)
                                <div class="w-full text-center">
                                    <button type="button">
                                        <img class="block object-center w-full h-40 transform rounded-xl hover:scale-105" src="{{asset('/bloodlines/'.$image->image)}}">
                                    </button>
                                </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>

                    @foreach($national->bloodlines as $bloodline)
                    <div id="bloodline{{$bloodline->id}}" class="grid hidden grid-cols-1 gap-4 p-2 md:grid-cols-3 lg:grid-cols-3">
                        @foreach(App\Models\NationalImage::where('bloodline_id',$bloodline->id)->get() as $image)
                        <div class="w-full text-center">
                            <button type="button">
                                <img class="block object-center w-full h-40 transform rounded-xl hover:scale-105" src="{{asset('/bloodlines/'.$image->image)}}">
                            </button>
                        </div>
                        @endforeach
                    </div> 
                    @endforeach 

                </div>
                
            </div>

            <div id="videos" class="hidden p-6 overflow-y-auto bg-blue-900 h-96 no-scrollbar">
                <div class="grid grid-cols-1 gap-6 p-2 md:grid-cols-3 lg:grid-cols-3">
                    @foreach($national->videos as $video)
                    <div class="w-full text-center">
                        <video class="border-gray-900 border-1" controls>
                            <source src="{{asset('videos/'.$video->video)}}" type="video/mp4">
                        </video>
                        <small class="py-2 font-extrabold text-white uppercase text-md">{{$video->title}}</small>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
function showTab(collapseID) {
    var bloodlines = <?php echo json_encode($national->bloodlines); ?>;
    document.getElementById('bloodlineDefault').classList.add('hidden');
    
    bloodlines.forEach(hideBloodlines);

    function hideBloodlines(item) {
        if(item['id'] != collapseID) {
            document.getElementById('bloodline'.concat(item['id'])).classList.add('hidden');
            document.getElementById('btn'.concat(item['id'])).classList.remove('text-yellow-300','border-b-2','border-yellow-300');
            document.getElementById('btn'.concat(item['id'])).classList.add('text-white');
        } else {
            document.getElementById('btn'.concat(item['id'])).classList.remove('text-white');
            document.getElementById('btn'.concat(item['id'])).classList.add('text-yellow-300','border-b-2','border-yellow-300');
        }
    }

    document.getElementById('bloodline'.concat(collapseID)).classList.remove('hidden');
}
function openTab(collapseID) {
    if(collapseID == 'bloodlines')
    {
        document.getElementById('bloodlines').classList.add('block');
        document.getElementById('bloodlines').classList.remove('hidden');
        document.getElementById('videos').classList.remove('block');
        document.getElementById('videos').classList.add('hidden');

        document.getElementById('bbtn').classList.add('text-red-900','underline');
        document.getElementById('bbtn').classList.remove('text-gray-900');
        document.getElementById('vbtn').classList.remove('text-red-900','underline');
        document.getElementById('vbtn').classList.add('text-gray-900');
    }
    else {
        document.getElementById('videos').classList.add('block');
        document.getElementById('videos').classList.remove('hidden');
        document.getElementById('bloodlines').classList.remove('block');
        document.getElementById('bloodlines').classList.add('hidden');

        document.getElementById('vbtn').classList.add('text-red-900','underline');
        document.getElementById('vbtn').classList.remove('text-gray-900');
        document.getElementById('bbtn').classList.remove('text-red-900','underline');
        document.getElementById('bbtn').classList.add('text-gray-900');
    }
    
}
</script>
</x-app-layout>