<a href="{{ request()->routeIs('register') == true ? route('login') : route('register') }}">
    <img class="w-64 h-44" src="{{ asset('logo.png') }}">
</a>