<div class="h-96 w-full bg-primary-dark/90 rounded glide">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
            <x-landing.slider.slide :image="asset('images/Slider1.jpg')">
                <x-slot name="title">
                    Lorem ipsum dolor sit amet
                </x-slot>

                <x-slot name="content">
                    Pellentesque nulla massa, luctus vitae nibh non, congue fringilla lacus. Vestibulum vitae odio
                    sit amet massa efficitur ultrices quis id tortor
                </x-slot>
            </x-landing.slider.slide>

            <x-landing.slider.slide :image="asset('images/Slider2.png')" align="left">
                <x-slot name="title">
                    Lorem ipsum dolor sit amet
                </x-slot>

                <x-slot name="content">
                    Pellentesque nulla massa, luctus vitae nibh non, congue fringilla lacus. Vestibulum vitae odio
                    sit amet massa efficitur ultrices quis id tortor
                </x-slot>
            </x-landing.slider.slide>

            <x-landing.slider.slide :image="asset('images/Slider3.jpg')">
                <x-slot name="title">
                    Lorem ipsum dolor sit amet
                </x-slot>

                <x-slot name="content">
                    Pellentesque nulla massa, luctus vitae nibh non, congue fringilla lacus. Vestibulum vitae odio
                    sit amet massa efficitur ultrices quis id tortor
                </x-slot>
            </x-landing.slider.slide>
        </ul>
    </div>

    <div class="glide__bullets" data-glide-el="controls[nav]">
        <button class="glide__bullet" data-glide-dir="=0"></button>
        <button class="glide__bullet" data-glide-dir="=1"></button>
        <button class="glide__bullet" data-glide-dir="=2"></button>
    </div>
</div>
