<div
    style="display: none;"
    class="bg-primary-dark"
    x-show="expanded"
    x-collapse
>
    <ul class="w-full block lg:hidden">
        <x-page.mobile-nav-item
            to="{{route('landing')}}"
            label="HOME"
            :active="request()->route()->getName() === 'landing'"
        />

        <x-page.mobile-nav-item
            to="#"
            label="DONATE"
            :active="str_starts_with(request()->route()->getName(), 'donate')"
        />

        <x-page.mobile-nav-item
            to="{{route('store.index')}}"
            label="STORE"
            :active="str_starts_with(request()->route()->getName(), 'store')"
        />

        <x-page.mobile-nav-item
            to="#"
            label="NEWS"
            :active="str_starts_with(request()->route()->getName(), 'news')"
        />

        <x-page.mobile-nav-item
            to="#"
            label="TRADING"
            :active="str_starts_with(request()->route()->getName(), 'trading')"
        />

        <x-page.mobile-nav-item
            to="#"
            label="SUPPORT"
            :active="str_starts_with(request()->route()->getName(), 'support')"
        />

        <x-page.mobile-nav-item
            to="#"
            label="SUPPORT"
            :active="str_starts_with(request()->route()->getName(), 'support')"
        />

        @guest()
            <x-page.mobile-nav-item
                to="{{route('login')}}"
                label="LOGIN"
                :active="false"
            />

            <x-page.mobile-nav-item
                to="{{route('register')}}"
                label="CREATE ACCOUNT"
                :active="false"
            />
        @else
            @if(auth()->user()->hasPermissionTo('view admin'))
                <x-page.mobile-nav-item
                    to="{{route('filament.pages.dashboard')}}"
                    label="Administration"
                    :active="false"
                />
            @endif

            <li>
                <x-page.account-nav :mobile="true"/>
            </li>
        @endguest
    </ul>
</div>
