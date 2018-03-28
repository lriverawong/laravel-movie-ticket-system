@if (count($theatre_complexes))
	<h1 class="title is-3">My Theatre Complexes</h1>

	<ul>
		@foreach ($theatre_complexes as $theatre_complex)
			<li>
				<a href="#">{{ $theatre_complex->name }}</a>
			</li>
		@endforeach
	</ul>

	<hr>
@endif
