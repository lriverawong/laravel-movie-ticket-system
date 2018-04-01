@if (count($run_dates))
	<h1 class="title is-3">Run Times</h1>

	<ul>
		@foreach ($run_dates as $run_date)
			<li>
				<a href="#">{{ $run_date->movie_id }}</a>
			</li>
		@endforeach
	</ul>

	<hr>
@endif
