@if (count($purchases))
	<h1 class="title is-3">Purchases</h1>

	<ul>
		@foreach ($purchases as $purchase)
			<li>
				<a href="#">{{ $purchase->id }}</a>
			</li>
		@endforeach
	</ul>

	<hr>
@endif
