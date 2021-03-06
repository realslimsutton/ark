<div
    @class(['fixed inset-x-0 top-0 opacity-1 bg-primary-dark/80 border-b border-[#292734] shadow-md z-50'])
    x-data="{expanded: false}"
>
    <div class="h-20 flex items-center justify-between">
        <x-layout.container class="flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <x-page.logo/>

                <x-page.primary-nav/>
            </div>

            <div>
                @guest
                    <x-page.secondary-nav/>
                @else
                    <x-page.account-nav/>
                @endif

                <x-page.mobile-nav-toggle/>
            </div>
        </x-layout.container>
    </div>

    <x-page.mobile-nav/>
</div>
