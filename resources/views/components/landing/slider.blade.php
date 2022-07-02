<div class="h-96 w-full bg-primary-dark/90 rounded glide">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
            <x-landing.slider.slide :image="asset('images/Slider1.jpg')"/>

            <x-landing.slider.slide :image="asset('images/Slider2.png')"/>

            <x-landing.slider.slide :image="asset('images/Slider3.jpg')"/>
        </ul>
    </div>

    <div class="glide__bullets" data-glide-el="controls[nav]">
        <button class="glide__bullet" data-glide-dir="=0"></button>
        <button class="glide__bullet" data-glide-dir="=1"></button>
        <button class="glide__bullet" data-glide-dir="=2"></button>
    </div>
</div>
