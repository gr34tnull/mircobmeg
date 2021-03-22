<x-app-layout>
<div class="flex items-center justify-center h-screen lg:mx-20">
    <div class="w-full p-10 space-y-4 bg-white rounded-xl">
        <header class="flex items-center justify-between">
            <h2 class="text-lg font-medium leading-6 text-black">Bloodlines of {{$national->fname.' '.$national->lname}}</h2>
        </header>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
            <li class="flex rounded-lg hover:shadow-lg">
            <button class="flex items-center justify-center w-full py-4 text-sm font-medium uppercase border-2 border-gray-200 border-dashed rounded-lg hover:border-transparent hover:shadow-xs hover:bg-blue-900 hover:text-white" onclick="toggleElement('createBloodline')">
                New Bloodline
            </button>
            </li>
            @foreach($bloodlines as $bloodline)
            <li>
            <div class="flex flex-col items-start justify-center w-full p-4 text-gray-900 border border-gray-200 rounded-lg hover:bg-blue-900 hover:text-white hover:border-transparent hover:shadow-lg group group-hover:text-white" onclick="toggleElement('bloodline{{$bloodline->id}}')">
                <div>
                    <p class="font-extrabold leading-6 uppercase">{{$bloodline->title}}</p>
                </div>
                <div class="col-start-2 row-start-1 row-end-3">
                    <div class="flex justify-end -space-x-2 sm:justify-start lg:justify-end xl:justify-start">
                    @foreach(App\Models\NationalImage::where('bloodline_id',$bloodline->id)->get() as $image)
                        <img src="{{asset('bloodlines/'.$image->image)}}" width="48" height="48" class="bg-gray-100 border-2 border-white rounded-full w-7 h-7" />
                    @endforeach
                    </div>
                </div>
            </div>
            </li>

            <!-- Edit -->
            <div id="bloodline{{$bloodline->id}}" class="fixed inset-0 z-10 hidden overflow-y-auto">
                <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  
                    <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                            <div class="px-4 py-2 sm:px-6">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                Bloodline's Information
                                </h3>
                                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                                Personal details of the bloodline.
                                </p>
                            </div>
                            <div class="border-t border-gray-200 bg-gray-50">
                                <div class="h-64 px-4 py-2 m-2 overflow-y-auto bg-white border border-gray-200 sm:px-6 no-scrollbar">
                                <dl class="grid grid-cols-4 gap-2">
                                    @foreach(App\Models\NationalImage::where('bloodline_id',$bloodline->id)->get() as $image)
                                    <div class="flex flex-col items-center justify-center">
                                        <dt class="text-xs font-medium text-gray-500 uppercase">
                                            <img src="{{asset('bloodlines/'.$image->image)}}" class="w-24 h-24" />
                                        </dt>
                                        <dt class="mt-1 text-xs font-medium text-gray-500">
                                            <form method="POST" action="{{route('nationals_images.destroy',$image->id)}}">
                                            @csrf
                                            @method('delete')
                                                <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"><i class="fas fa-trash"></i> Delete</button>
                                            </form>
                                        </dt>
                                    </div>
                                    @endforeach
                                </dl>
                                </div>
                            </div>
                            <form method="POST" action="{{route('nationals_bloodlines.update',$bloodline->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="border-t border-gray-200">
                                <dl>
                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Title
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <x-jet-input id="title" class="block w-full" type="text" name="title" value="{{$bloodline->title}}" required autofocus />
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Description
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <textarea id="description" name="description" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{$bloodline->description}}</textarea>
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                    Images
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <input id="image" name="file[]" type="file" class="items-center block w-full px-4 py-2 mt-2 mr-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" accept="image/*" multiple="multiple">
                                    </dd>
                                </div>
                                <div class="px-4 py-2 bg-white sm:px-6">
                                    <div class="flex items-center justify-end">
                                        <x-jet-button class="ml-4">
                                            {{ __('UPDATE') }}
                                        </x-jet-button>
                                    </div>
                                </div>
                                </dl>
                            </div>
                            </form>
                        </div>
                        <div class="px-4 py-3 border-t border-gray-200 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                            <form method="POST" action="{{route('nationals_bloodlines.destroy',$bloodline->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Delete
                                </button>
                            </form>
                            <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('bloodline{{$bloodline->id}}')">
                            Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </ul>
    </div>
</div>

<div id="createBloodline" class="fixed inset-0 z-30 hidden overflow-y-auto">
    <form method="POST" action="{{route('nationals_bloodlines.store')}}" enctype="multipart/form-data">
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
                Create Bloodline
                </h3>
                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                Input information about the bloodline.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="mt-3 text-sm font-medium text-gray-500">
                    Name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input type="hidden" name="national_id" value="{{$national->id}}">
                        <x-jet-input id="title" class="block w-full" type="text" name="title" required autofocus />
                    </dd>
                </div>
                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="mt-3 text-sm font-medium text-gray-500">
                    Description
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <textarea id="description" name="description" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </dd>
                </div>
                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="mt-3 text-sm font-medium text-gray-500">
                    Images
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input id="image" name="file[]" type="file" class="items-center block w-full px-4 py-2 mt-2 mr-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" accept="image/*" multiple="multiple">
                    </dd>
                </div>
                </dl>
            </div>
        </div>

        <div class="px-4 py-4 bg-white sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
            Create
            </button>
            <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('createBloodline')">
            Close
            </button>
        </div>
        </div>
    </div>
    </form>
</div>
</x-app-layout>