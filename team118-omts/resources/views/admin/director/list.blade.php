@if (count($directors))
	<h1 class="title is-3">Director</h1>

	<ul>
		@foreach ($directors as $director)
			<li>
				<a href="#">{{ $director->last_name }}</a>
			</li>
		@endforeach
	</ul>

	<hr>
@endif
