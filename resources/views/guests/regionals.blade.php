<x-app-layout>
<div class="py-10">
    <div class="w-screen max-w-6xl mx-auto">
        <div class="flex items-center justify-center w-full h-full">
            <div class="flex flex-col w-full lg:flex-row">
                <div class="w-full px-4 pt-0 lg:pt-10 md:pt-0 lg:w-1/4">
                    <div class="flex flex-col items-center justify-center text-center">
                        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
                            <img src="{{asset('logo.png')}}" class="w-auto h-20 transform hover:scale-105">
                        </a>
                        <h1 class="text-2xl text-red-900 font-futura stroke-white">REGIONAL ENDORSERS</h1>
                    </div>
                    <div class="hidden overflow-y-auto lg::block xl:block no-scrollbar">
                        <div class="grid grid-cols-1 gap-2 pt-2 text-center">
                            <div class="p-2 text-xs text-white bg-red-900 focus:outline-none hover:text-yellow-300 font-futura">
                                <a href="{{route('regionals.guests')}}">ALL</a>
                            </div>
                            @foreach($rlocations as $rl)
                            <div class="p-2 text-xs text-white bg-red-900 focus:outline-none hover:text-yellow-300 font-futura">
                                <a href="{{route('regionals.show',$rl->id)}}">{{$rl->name}}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="block lg:hidden xl:hidden">
                        <div class="grid grid-cols-1 gap-2 pt-2 text-center">
                            <select id="rl_id" name="rl_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" onchange="location.replace('{{url('regionals').'/'}}'+this.value)" >
                                @foreach($rlocations as $rl)
                                <option id="rl_id" name="rl_id" value="{{$rl->id}}">{{$rl->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 pt-10 lg:w-3/4 lg:pt-0">
                    <div class="flex items-center justify-center">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            @foreach($regionals as $regional)
                            <div class="flex flex-row items-center justify-start p-6 space-x-10 bg-gray-100 shadow rounded-xl">
                                <div class="inline-flex w-40 h-40 overflow-hidden">
                                        <img src="{{is_null($regional->image) ? asset('endorser.png') : asset('/regional/'.$regional->image)}}" class="z-20 w-full h-full shadow-xl">
                                </div>
                                <div class="flex flex-col">
                                    <h2 class="text-lg font-extrabold text-center text-blue-900 uppercase font-futura">{{$regional->name}}</h2>
                                    <h6 class="text-sm font-bold uppercase">{{$regional->farm}}</h6>
                                    <ul class="pt-2 text-xs">
                                        <li><i class="fas fa-map-marker-alt"></i> {{$regional->location}}</li>
                                        <li class="{{is_null($regional->email) ? 'hidden' : ''}}"><i class="fas fa-at"></i> {{$regional->email}}</li>
                                        <li class="{{is_null($regional->contact) ? 'hidden' : ''}}"><i class="fas fa-phone"></i> {{$regional->contact}}</li>
                                        <li class="{{is_null($regional->fb) ? 'hidden' : ''}}"><a href="{{$regional->fb}}" target="_blank"><i class="fab fa-facebook-square"></i> Facebook Profile</a></li>
                                        <li class="{{is_null($regional->ig) ? 'hidden' : ''}}"><a href="{{$regional->ig}}" target="_blank"><i class="fab fa-instagram-square"></i> Instagram Profile</a></li>
                                        <li class="{{is_null($regional->website) ? 'hidden' : ''}}"><a href="{{$regional->website}}" target="_blank"><i class="fas fa-globe"></i> Personal Website</a></li>
                                    </ul>  
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>