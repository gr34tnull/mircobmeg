@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium {{request()->routeIs('login') || request()->routeIs('register') ? 'text-white' : 'text-red-600' }}">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 text-sm list-disc list-inside {{request()->routeIs('login') || request()->routeIs('register') ? 'text-white' : 'text-red-600' }}">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
