<div>
    <select
        wire:model="sort"
        class="bg-primary-dark border border-primary-accent rounded text-white font-semibold"
    >
        <option value="default">
            Default sorting
        </option>

        <option value="popularity">
            Sort by popularity
        </option>

        <option value="latest" selected>
            Sort by latest
        </option>

        <option value="price-low-to-high">
            Sort by price: low to high
        </option>

        <option value="price-high-to-low">
            Sort by price: high to low
        </option>
    </select>
</div>
