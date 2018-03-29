@if (count($suppliers))
	<h1 class="">Suppliers</h1>

	<ul>
		@foreach ($suppliers as $supplier)
			<li>
				<a href="#">{{ $supplier->name }}</a>
			</li>
		@endforeach
	</ul>

	<hr>
@endif
