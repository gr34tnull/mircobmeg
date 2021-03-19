<x-app-layout>
<div class="flex items-center justify-center h-screen lg:mx-20">
    <div class="w-full p-10 space-y-4 bg-white rounded-xl">
        <header class="flex items-center justify-between">
            <h2 class="text-lg font-medium leading-6 text-black">Videos of {{$national->fname.' '.$national->lname}}</h2>
        </header>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
            <li class="flex rounded-lg hover:shadow-lg">
            <button class="flex items-center justify-center w-full py-4 text-sm font-medium uppercase border-2 border-gray-200 border-dashed rounded-lg hover:border-transparent hover:shadow-xs hover:bg-blue-900 hover:text-white" onclick="toggleElement('createVideo')">
                New Video
            </button>
            </li>
            @foreach($videos as $video)
            <li>
            <button class="flex items-center justify-center w-full p-4 border border-gray-200 rounded-lg hover:bg-blue-900 hover:text-white hover:border-transparent hover:shadow-lg group" onclick="toggleElement('videodelete{{$video->id}}')">
                <div class="font-extrabold leading-6 text-black group-hover:text-white">
                    {{$video->title}}
                </div>
            </button>
            </li>

            <!-- Delete -->
            <div id="videodelete{{$video->id}}" class="fixed inset-0 z-10 hidden overflow-y-auto">
                <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  
                    <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-headline">
                            Delete Video?
                            </h3>
                            <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to delete this video? All of your data will be permanently removed. This action cannot be undone.
                            </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                        <form method="POST" action="{{route('nationals_videos.destroy',$video->id)}}">
                        @csrf
                        @method('delete')
                            <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Delete
                            </button>
                        </form>
                            <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('videodelete{{$video->id}}')">
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

<div id="createVideo" class="fixed inset-0 z-30 hidden overflow-y-auto">
    <form method="POST" action="{{route('nationals_videos.store')}}" enctype="multipart/form-data">
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
                Create Video
                </h3>
                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                Input information about the video.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="mt-3 text-sm font-medium text-gray-500">
                    Title
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input type="hidden" name="national_id" value="{{$national->id}}">
                        <x-jet-input id="title" class="block w-full" type="text" name="title" required autofocus />
                    </dd>
                </div>
                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="mt-3 text-sm font-medium text-gray-500">
                    Video
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="flex w-full text-sm text-gray-600">
                            <label for="video" class="w-full px-3 py-2 text-sm font-medium leading-4 text-center text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span>Upload File</span>
                            <input id="video" name="video" type="file" class="sr-only" accept="video/*" required>
                            </label>
                        <div>
                    </dd>
                </div>
                </dl>
            </div>
        </div>

        <div class="px-4 py-4 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
            Create
            </button>
            <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('createVideo')">
            Close
            </button>
        </div>
        </div>
    </div>
    </form>
</div>
</x-app-layout>