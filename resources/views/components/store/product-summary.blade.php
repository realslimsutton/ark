@props(['product'])

<div>
    <a href="#">
        <div>
            {{$product->thumbnail}}
        </div>

        <div>
            <h3>
                {{$product->name}}
            </h3>
        </div>

        <div>
            <p>
                {{$product->description}}
            </p>
        </div>
    </a>
</div>
