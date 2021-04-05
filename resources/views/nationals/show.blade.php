<x-app-layout>
<div class="flex flex-col items-center w-screen h-screen lg:flex-row no-scrollbar">
    <div class="w-screen max-w-6xl p-2 mx-auto lg:p-10">
        <div class="flex items-center justify-center w-full h-full">
            <div class="flex flex-col w-full space-x-0 space-y-0 lg:space-y-2 lg:space-x-10 lg:flex-row">
                <div class="w-full pt-0 lg:pt-10 md:pt-0 lg:w-1/4">
                    <div class="grid grid-cols-1 gap-2">
                        <div class="flex flex-col items-center justify-center p-4 bg-gray-100 lg:flex-col md:flex-row rounded-xl">
                            <div class="grid grid-cols-1 gap-0 md:gap-10 lg:gap-0 lg:grid-cols-1 md:grid-cols-2">
                                <div class="inline-flex w-full h-full -mt-0 lg:-mt-32 xl:-mt-32">
                                    <img src="{{is_null($national->image) ? asset('endorser.png') : asset('/national/'.$national->image)}}" class="w-48 h-48 transform hover:scale-105">
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <h2 class="text-lg font-extrabold text-center text-blue-900 uppercase font-futura">{{$national->fname.' '.$national->lname}}</h2>
                                    <h6 class="text-xs font-bold uppercase">{{$national->farm}}</h6>
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
                        </div>
                        <div class="flex flex-col items-center justify-center p-4 bg-gray-100 rounded-xl">
                            <h2 class="text-lg font-bold text-center text-blue-900 uppercase font-futura">ACHIEVEMENTS</h2>
                            <ul class="px-4 text-xs list-disc list-outside">
                                @foreach($national->achievements as $achievement)
                                <li>{{$achievement->title}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-3/4">
                    <div class="flex flex-col items-start justify-center h-full p-2 mt-2 bg-gray-100 rounded-xl lg:mt-0">
                        <div class="flex flex-row p-2 space-x-10">
                            <button id="bbtn" class="text-4xl text-red-900 focus:outline-none font-futura hover:text-yellow-300" onclick="openTab('bloodlines')">BLOODLINES</button>
                            <button id="vbtn" class="text-4xl text-gray-900 focus:outline-none font-futura hover:text-yellow-300" onclick="openTab('videos')">VIDEOS</button>
                        </div>
                        <div class="w-full bg-blue-900">
                        
                            <div id="bloodlines" class="block p-2 bg-blue-900 shadow">
                                <div class="flex flex-row p-2 space-x-2 overflow-x-auto no-scrollbar">
                                @foreach($national->bloodlines as $bloodline)
                                    <button id="btn{{$bloodline->id}}" class="p-2 text-xs text-white bg-red-900 focus:outline-none hover:text-yellow-300 font-futura" onclick="showTab('{{$bloodline->id}}')">{{$bloodline->title}}</button>
                                @endforeach
                                </div>
                                <div class="p-2 overflow-y-auto border-t border-b border-white border-dashed no-scrollbar h-96">

                                @foreach($national->bloodlines as $bloodline)
                                <div id="bloodline{{$bloodline->id}}" class="grid grid-cols-1 gap-2 p-6 md:grid-cols-3 lg:grid-cols-4 {{$bloodline->id == $national->bloodlines->first()->id ? 'block' : 'hidden' }}">
                                    @foreach(App\Models\NationalImage::where('bloodline_id',$bloodline->id)->get() as $image)
                                    <div class="w-full text-center">
                                        <button type="button" onclick="toggleElement('imageZoom{{$image->id}}')">
                                            <img class="block object-center w-40 h-40 transform rounded focus:outline-none hover:scale-105" src="{{asset('/bloodlines/'.$image->image)}}">
                                        </button>
                                    </div>
                                    <div id="imageZoom{{$image->id}}" class="fixed inset-0 z-10 hidden overflow-y-auto">
                                        <div class="flex items-end justify-center min-h-screen pt-4 pb-20 text-center sm:block sm:p-0">

                                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
                                            </div>

                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            <div class="bg-white">
                                                <div class="flex items-center justify-center">
                                                    <div class="p-4 mt-3 text-center">
                                                        <p class="py-2 text-xl font-extrabold text-center text-gray-900 uppercase">{{$image->bloodline->title}}</p>
                                                        <img class="my-2 border border-gray-900 rounded w-96 h-96" src="{{asset('/bloodlines/'.$image->image)}}">
                                                        <small class="py-4 text-sm text-center uppercase">{{$image->bloodline->description}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"  onclick="toggleElement('imageZoom{{$image->id}}')">
                                                Close
                                                </button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div> 
                                @endforeach 

                                </div>

                            </div>

                            <div id="videos" class="hidden p-2 overflow-y-auto bg-blue-900 h-96 no-scrollbar">
                                <div class="flex flex-row p-2 space-x-2 overflow-x-auto no-scrollbar">
                                    <button id="vtn1" class="p-2 text-xs text-white bg-red-900 focus:outline-none hover:text-yellow-300 font-futura" onclick="showVid('vidtype1')">GAMEFARM</button>
                                    <button id="vtn2" class="p-2 text-xs text-white bg-red-900 focus:outline-none hover:text-yellow-300 font-futura" onclick="showVid('vidtype2')">SABONGMATCH</button>
                                </div>
                                <div class="p-2 overflow-y-auto border-t border-b border-white border-dashed no-scrollbar h-96">
                                <div id="vidtype1" class="block">
                                    <div class="grid grid-cols-1 gap-6 p-2 md:grid-cols-3 lg:grid-cols-3">
                                        @foreach($national->videos->where('category',1) as $video)
                                        <div class="w-full text-center">
                                            <video class="border-gray-900 border-1" controls>
                                                <source src="{{asset('videos/'.$video->video)}}" type="video/mp4">
                                            </video>
                                            <small class="py-2 font-extrabold text-white uppercase text-md">{{$video->title}}</small>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="vidtype2" class="hidden">
                                    <div class="grid grid-cols-1 gap-6 p-2 md:grid-cols-3 lg:grid-cols-3">
                                        @foreach($national->videos->where('category',2) as $video)
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixed bottom-0 right-0 z-10 flex items-center justify-center mb-10 mr-4 lg:mr-10">
    <a href="{{url()->previous()}}" class="hidden p-2 text-gray-600 bg-white border shadow-md cursor-pointer md:block rounded-xl focus:outline-none">
        <i class="text-xs fas fa-arrow-left"> GO BACK</i>
    </a>
</div>

<script>
function showVid(collapseID) {
    if(collapseID == 'vidtype1')
    {
        document.getElementById('vidtype1').classList.remove('hidden');
        document.getElementById('vidtype1').classList.add('block');
        document.getElementById('vidtype2').classList.remove('block');
        document.getElementById('vidtype2').classList.add('hidden');
        document.getElementById('vtn1').classList.remove('text-white');
        document.getElementById('vtn1').classList.add('text-yellow-300','border-b-2','border-yellow-300');
        document.getElementById('vtn2').classList.remove('text-yellow-300','border-b-2','border-yellow-300');
        document.getElementById('vtn2').classList.add('text-white');
    } else {
        document.getElementById('vidtype2').classList.remove('hidden');
        document.getElementById('vidtype2').classList.add('block');
        document.getElementById('vidtype1').classList.remove('block');
        document.getElementById('vidtype1').classList.add('hidden');
        document.getElementById('vtn2').classList.remove('text-white');
        document.getElementById('vtn2').classList.add('text-yellow-300','border-b-2','border-yellow-300');
        document.getElementById('vtn1').classList.remove('text-yellow-300','border-b-2','border-yellow-300');
        document.getElementById('vtn1').classList.add('text-white');
    }
}

function showTab(collapseID) {
    var bloodlines = <?php echo json_encode($national->bloodlines); ?>;    
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