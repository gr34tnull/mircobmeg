<div class="grid grid-cols-1 bg-gray-200 bg-opacity-25 md:grid-cols-2">
    <div class="p-6">
        <a href="{{route('users.index')}}">
            <div class="flex items-center transform hover:scale-105">
                <div class="ml-4 text-lg font-semibold leading-7 text-blue-900 hover:text-yellow-300">
                    <i class="fas fa-user"></i> Users
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-sm text-gray-500">
                    This section contains information about the users and allows the admin to view user details.
                </div>
            </div>
        </a>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <button type="button" class="text-left focus:outline-none" onclick="toggleElement('endorsersModal')">
            <div class="flex items-center transform hover:scale-105">
                <div class="ml-4 text-lg font-semibold leading-7 text-blue-900 hover:text-yellow-300">
                    <i class="fas fa-users"></i> Endorsers
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-sm text-gray-500">
                    This section contains information about the endorsers and allows the admin to access and manage the achievements, bloodlines and gallery.
                </div>
            </div>
        </button>
    </div>

    <div class="p-6 border-t border-gray-200">
        <a href="">
            <div class="flex items-center transform hover:scale-105">
                <div class="ml-4 text-lg font-semibold leading-7 text-blue-900 hover:text-yellow-300">
                    <i class="fas fa-shopping-bag"></i> Products
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-sm text-gray-500">
                    This section contains information allowing the admin to access and manage the products information.
                </div>
            </div>
        </a>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <a href="{{route('showcases.index')}}">
            <div class="flex items-center transform hover:scale-105">
                <div class="ml-4 text-lg font-semibold leading-7 text-blue-900 hover:text-yellow-300">
                    <i class="fas fa-star"></i> KMP Showcase
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-sm text-gray-500">
                    This section contains information showcasing a personal profile for the featured Kakampi Mo Sa Panalo endorser.
                </div>
            </div>
        </a>
    </div>
</div>

<!-- EndorserModal -->
<div id="endorsersModal" class="fixed inset-0 z-10 hidden overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-900 bg-opacity-75"></div>
    </div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-2xl" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="px-10 pt-5 pb-10 bg-white">
        <button type="button" class="text-gray-600 focus:outline-none" onclick="toggleElement('endorsersModal')">
            <div class="fixed top-0 right-0 z-10 flex items-center justify-center w-6 h-6 mt-2 mr-2 bg-gray-100 border rounded-full shadow-md cursor-pointer focus:outline-none">
                <i class="fas fa-times"></i>
            </div>
        </button>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
            <div class="w-auto h-24 text-white transform bg-blue-900 rounded-xl hover:scale-105 hover:text-yellow-300">
                <div class="flex items-center justify-center h-full p-4">
                    <a href="{{route('nationals.index')}}"><h1 class="text-sm lg:text-lg">National Endorsers</h1></a>
                </div>
            </div>
            <div class="w-auto h-24 text-white transform bg-red-900 rounded-xl hover:scale-105 hover:text-yellow-300">
                <div class="flex items-center justify-center h-full p-4">
                    <h1 class="text-sm lg:text-lg">Regional Endorsers</h1>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

