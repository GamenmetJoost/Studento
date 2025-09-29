<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route($route)" :active="request()->routeIs($activeRoute ?? $route)">
        {{ __($text) }}
    </x-nav-link>
</div>