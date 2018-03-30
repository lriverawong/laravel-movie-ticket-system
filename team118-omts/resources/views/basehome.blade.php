<div class="container">
    <p>{{ auth()->user()->role }}</p>
    @if (auth()->user()->isAdmin())
        <div>
            HERE
        </div>
    @endif
    <div>
        not here
    </div>

</div>
