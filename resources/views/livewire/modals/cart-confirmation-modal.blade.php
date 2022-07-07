<div class="flex flex-col items-center justify-center space-y-4">
    <h2 class="text-2xl text-white font-semibold">
        Cart updated
    </h2>

    <p class="text-neutral-400 font-medium">
        Your cart has been successfully updated
    </p>

    <div class="grid md:grid-cols-2 gap-6">
        <button
            type="button"
            class="flex items-center justify-center w-full p-2 rounded bg-secondary-light text-white font-semibold transition duration-150 hover:bg-secondary-dark focus:bg-secondary-dark"
            wire:click="$emit('closeModal')"
        >
            Continue
        </button>

        <a
            href="{{route('store.cart.show')}}"
            class="flex items-center justify-center w-full p-2 rounded bg-primary-dark text-neutral-500 font-semibold transition duration-150 hover:bg-secondary-light hover:text-white focus:text-white focus:bg-secondary-dark"
        >
            Checkout
        </a>
    </div>
</div>
