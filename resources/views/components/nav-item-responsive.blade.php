<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link :href="route($route)" :active="request()->routeIs($activeRoute ?? $route)">
        {{ __($text) }}
    </x-responsive-nav-link>
</div>