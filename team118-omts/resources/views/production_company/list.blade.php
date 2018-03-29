@if (count($production_companies))
	<h1 class="title is-3">Production Companies</h1>

	<ul>
		@foreach ($production_companies as $production_company)
			<li>
				<a href="#">{{ $production_company->name }}</a>
			</li>
		@endforeach
	</ul>

	<hr>
@endif
