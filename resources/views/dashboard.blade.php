<x-app-layout>
    @if(auth()->check() && auth()->user()->admin == true)
    <div class="flex items-center justify-center min-h-screen py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    @else
        @include('landing')
    @endif
</x-app-layout>
