@if (count($movies))
	<h1 class="">Movies</h1>

	<ul>
		@foreach ($movies as $movie)
			<li>
				<a href="#">{{ $movie->title }}</a>
			</li>
		@endforeach
	</ul>

	<hr>
@endif
