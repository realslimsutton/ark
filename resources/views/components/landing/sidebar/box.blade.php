<div class="rounded bg-primary-default">
    <div>
        <h2 class="sidebar-title bg-primary-accent text-lg text-white font-bold uppercase rounded-t">
            <span>
                {{$title ?? ''}}
            </span>
        </h2>

        <div class="p-4">
            {{$slot}}
        </div>
    </div>
</div>
