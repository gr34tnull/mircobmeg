<x-app-layout>

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
    
        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <x-jet-application-logo class="block w-auto h-12" />
                </div>
            </div>
    
            <nav class="mt-10">
                <a class="flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25" href="{{route('nationals.index')}}">
                    <i class="fas fa-users"></i>
                    <span class="mx-3">National Endorsers</span>
                </a>
                <button class="flex items-center px-6 py-2 mt-4 text-gray-100 focus:outline-none" onclick="toggleElement('createEndorser')">
                    <i class="fas fa-plus"></i>
                    <span class="mx-3">Create Endorser</span>
                </button>
            </nav>
        </div>
        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-red-900">
                <form method="post" action="{{route('nationals.search')}}">
                    @csrf
                    <div class="flex items-center">
                        <button type="submit" @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
        
                        <div class="relative mx-4 lg:mx-0">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </span>
        
                            <input name="search" class="w-32 pl-10 pr-4 rounded-md form-input sm:w-64 focus:border-indigo-600" type="text" placeholder="Search">
                        </div>
                    </div>
                </form>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container px-6 py-8 mx-auto">
                    <h3 class="text-3xl font-medium text-gray-700">National Endorsers</h3>
    
                    <div class="mt-4">
                        <div class="flex flex-wrap -mx-6">
                            <div class="w-full px-6 xl:w-1/3">
                                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">    
                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700"><i class="text-blue-900 fas fa-users"></i> {{App\Models\National::count()}}</h4>
                                        <div class="text-gray-500">National Endorsers</div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="w-full px-6 mt-6 xl:w-1/3 xl:mt-0">
                                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700"><i class="text-red-900 fas fa-egg"></i>   {{App\Models\NationalBloodline::count()}}</h4>
                                        <div class="text-gray-500">Bloodlines</div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full px-6 mt-6 xl:w-1/3 xl:mt-0">
                                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700"><i class="text-green-900 fas fa-photo-video"></i>   {{App\Models\NationalVideo::count()}}</h4>
                                        <div class="text-gray-500">Videos</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="flex flex-col mt-8">
                        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div
                                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Name
                                            </th>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Farm
                                            </th>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Option
                                            </th>
                                        </tr>
                                    </thead>
    
                                    <tbody class="bg-white">
                                    @foreach($nationals as $national)
                                        <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-10 h-10 rounded-full" src="{{is_null($national->image) ? asset('endorser.png') : asset('/national/'.$national->image)}}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                {{$national->fname .' '. $national->lname}}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                {{$national->email}}
                                                </div>
                                            </div>
                                            </div>
                                        </td>

                                            <td class="px-6 py-4 whitespace-no-wrap">
                                                <div class="flex items-center">    
                                                    <div>
                                                        <div class="text-sm font-medium leading-5 text-gray-900">
                                                            {{$national->farm}}
                                                        </div>
                                                        <div class="text-sm leading-5 text-gray-500">
                                                            {{$national->location}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
    
                                            <td class="inline-flex px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                                <div class="flex flex-col items-center justify-center mx-2">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <button class="pr-2 text-gray-600 hover:text-gray-900 focus:outline-none" onclick="toggleElement('endorser{{$national->id}}')" ><i class="fas fa-edit"></i></button>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        Edit
                                                    </div>
                                                </div>
                                                <div class="flex flex-col items-center justify-center mx-2">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <button type="button" class="pr-2 text-gray-600 hover:text-gray-900 focus:outline-none" onclick="toggleElement('achievement{{$national->id}}')"><i class="fas fa-star"></i></button>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        Achievements
                                                    </div>
                                                </div>
                                                <div class="flex flex-col items-center justify-center mx-2">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="{{route('nationals_bloodlines.show',$national->id)}}" class="pr-2 text-gray-600 hover:text-gray-900 focus:outline-none" target="_blank"><i class="fas fa-egg"></i></a>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        Bloodlines
                                                    </div>
                                                </div>
                                                <div class="flex flex-col items-center justify-center mx-2">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="{{route('nationals_videos.show',$national->id)}}" class="pr-2 text-gray-600 hover:text-gray-900 focus:outline-none" target="_blank"><i class="fas fa-photo-video"></i></a>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        Videos
                                                    </div>
                                                </div>
                                                <div class="flex flex-col items-center justify-center mx-2">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <form method="POST" action="{{route('nationals.destroy',$national->id)}}">
                                                        @csrf
                                                        @method('delete')
                                                            <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                    Delete
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!--Modal -->
                                        <div id="endorser{{$national->id}}" class="fixed inset-0 z-30 hidden overflow-y-auto">
                                            <form method="POST" action="{{route('nationals.update',$national->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                                </div>
                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                                <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                                
                                                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                                                    <div class="px-4 py-2 sm:px-6">
                                                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                        Endorser's Information
                                                        </h3>
                                                        <p class="max-w-2xl mt-1 text-sm text-gray-500">
                                                        Personal details of the endorser.
                                                        </p>
                                                    </div>
                                                    <div class="border-t border-gray-200">
                                                        <dl>
                                                        <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                                            First Name
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                <x-jet-input id="fname" class="block w-full" type="text" name="fname" value="{{$national->fname}}" required autofocus />
                                                            </dd>
                                                        </div>
                                                        <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                                            Last Name
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                <x-jet-input id="lname" class="block w-full" type="text" name="lname" value="{{$national->lname}}" required autofocus />
                                                            </dd>
                                                        </div>
                                                        <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                                            Farm Name
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                <x-jet-input id="farm" class="block w-full" type="text" name="farm" value="{{$national->farm}}" required autofocus />
                                                            </dd>
                                                        </div>
                                                        <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                                            Location
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                <x-jet-input id="location" class="block w-full" type="text" name="location" value="{{$national->location}}" required autofocus />
                                                            </dd>
                                                        </div>
                                                        <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                                            Email Address
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                <x-jet-input id="email" class="block w-full" type="email" name="email" value="{{$national->email}}" autofocus />
                                                            </dd>
                                                        </div>
                                                        <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                                            Contact Number
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                <x-jet-input id="contact" class="block w-full" type="text" name="contact" value="{{$national->contact}}" autofocus />
                                                            </dd>
                                                        </div>
                                                        <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                                            Facebook
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                <x-jet-input id="fb" class="block w-full" type="text" name="fb" value="{{$national->fb}}" autofocus />
                                                            </dd>
                                                        </div>
                                                        <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                                            Instragram
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                <x-jet-input id="ig" class="block w-full" type="text" name="ig" value="{{$national->ig}}" autofocus />
                                                            </dd>
                                                        </div>
                                                        <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                                            Website
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                <x-jet-input id="website" class="block w-full" type="text" name="website" value="{{$national->website}}" autofocus />
                                                            </dd>
                                                        </div>
                                                        <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                            <dt class="mt-3 text-sm font-medium text-gray-500">
                                                            Profile Image
                                                            </dt>
                                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <input id="image" name="image" type="file" class="items-center block w-full px-4 py-2 mt-2 mr-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" accept="image/*">
                                                            </dd>
                                                        </div>
                                                        </dl>
                                                    </div>
                                                </div>

                                                <div class="px-4 py-2 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                    Update
                                                    </button>
                                                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('endorser{{$national->id}}')">
                                                    Close
                                                    </button>
                                                </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>

                                        <!-- Achievement -->
                                        <div id="achievement{{$national->id}}" class="fixed inset-0 z-30 hidden overflow-y-auto">
                                            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                                </div>

                                                <!-- This element is to trick the browser into centering the modal contents. -->
                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                                <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                                    <div class="px-4 py-2">
                                                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                        Endorser's Achievements
                                                        </h3>
                                                        <p class="max-w-2xl mt-1 text-sm text-gray-500">
                                                        Achievements of the endorser.
                                                        </p>
                                                    </div>
                                                    <div class="border-t border-gray-200">
                                                        <dl class="flex flex-col">
                                                            @foreach($national->achievements as $achievement)
                                                            <div class="flex flex-row justify-between px-10 py-2 bg-gray-50">
                                                                <dt class="justify-start mt-1 text-xs font-medium text-gray-500 uppercase">
                                                                {{$achievement->title}}
                                                                </dt>
                                                                <dt class="justify-end mt-1 text-xs font-medium text-gray-500">
                                                                    <form method="POST" action="{{route('nationals_achievements.destroy',$achievement->id)}}">
                                                                    @csrf
                                                                    @method('delete')
                                                                        <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"><i class="fas fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </dt>
                                                            </div>
                                                            @endforeach
                                                        </dl>
                                                    </div>
                                                    <div class="border-t border-gray-200">
                                                        <form method="POST" action="{{route('nationals_achievements.store')}}">
                                                            @csrf
                                                            <input type="hidden" name="national_id" value="{{$national->id}}">
                                                            <dl class="flex flex-col">
                                                                <div class="flex flex-row justify-between w-full px-4 py-2 bg-white">
                                                                    <dt class="flex flex-row justify-start w-full mt-1 text-xs font-medium text-gray-500 uppercase">
                                                                    <x-jet-input id="title" class="block w-full" type="text" name="title" placeholder="Enter Achievement" autofocus />
                                                                    <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                        Create
                                                                    </button>
                                                                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('achievement{{$national->id}}')">
                                                                        Close
                                                                    </button>
                                                                    </dt>
                                                                </div>
                                                            </dl>
                                                        </form>
                                                    </div>
                                                    <div class="px-4 py-3 bg-gray-50 sm:justify-end sm:px-8 sm:flex">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div id="createEndorser" class="fixed inset-0 z-30 hidden overflow-y-auto">
        <form method="POST" action="{{route('nationals.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-2 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Create Endorser
                    </h3>
                    <p class="max-w-2xl mt-1 text-sm text-gray-500">
                    Provide personal details of the endorser.
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        First Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="fname" class="block w-full" type="text" name="fname" required autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Last Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="lname" class="block w-full" type="text" name="lname" required autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Farm Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="farm" class="block w-full" type="text" name="farm" required autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Location
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="location" class="block w-full" type="text" name="location" required autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Email Address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="email" class="block w-full" type="email" name="email" autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Contact Number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="contact" class="block w-full" type="text" name="contact" autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Facebook
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="fb" class="block w-full" type="text" name="fb" autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Instragram
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="ig" class="block w-full" type="text" name="ig" autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Website
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="website" class="block w-full" type="text" name="website" autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Profile Image
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input id="image" name="image" type="file" class="items-center block w-full px-4 py-2 mt-2 mr-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" accept="image/*">
                        </dd>
                    </div>
                    </dl>
                </div>
            </div>

            <div class="px-4 py-2 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                Create
                </button>
                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('createEndorser')">
                Close
                </button>
            </div>
            </div>
        </div>
        </form>
    </div>

</x-app-layout>