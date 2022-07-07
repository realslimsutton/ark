<div class="hidden lg:block">
    <ul class="flex items-center space-x-4">
        <x-page.primary-nav-item
            to="{{route('landing')}}"
            label="HOME"
            :active="request()->route()->getName() === 'landing'"
        />

        <x-page.primary-nav-item
            to="#"
            label="DONATE"
            :active="str_starts_with(request()->route()->getName(), 'donate')"
        />

        <x-page.primary-nav-item
            to="{{route('store.index')}}"
            label="STORE"
            :active="str_starts_with(request()->route()->getName(), 'store')"
        />

        <x-page.primary-nav-item
            to="#"
            label="NEWS"
            :active="str_starts_with(request()->route()->getName(), 'news')"
        />

        <x-page.primary-nav-item
            to="#"
            label="TRADING"
            :active="str_starts_with(request()->route()->getName(), 'trading')"
        />

        <x-page.primary-nav-item
            to="#"
            label="SUPPORT"
            :active="str_starts_with(request()->route()->getName(), 'support')"
        />

        @if(auth()->check() && auth()->user()->hasPermissionTo('view admin'))
            <x-page.primary-nav-item
                to="{{route('filament.pages.dashboard')}}"
                label="Administration"
                :active="false"
            />
        @endif
    </ul>
</div>
