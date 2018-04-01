@if (count($theatre))
	<h1 class="title is-3">My Theatre</h1>

	<ul>
		@foreach ($theatre as $theatre)
			<li>
				<a href="#">{{ $theatre->theatre_num }}</a>
			</li>
		@endforeach
	</ul>

	<hr>
@endif
