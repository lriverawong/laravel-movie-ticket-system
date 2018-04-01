@if (count($show_times))
	<h1 class="">Show Times</h1>

	<ul>
		@foreach ($show_times as $show_time)
			<li>
				<a href="#">{{ $show_time->movie_id }}</a>
			</li>
		@endforeach
	</ul>

	<hr>
@endif
