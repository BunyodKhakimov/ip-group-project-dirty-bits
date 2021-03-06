@foreach($hotels as $hotel)
<div class="col-lg-6 col-xl-4 limited mb-2">
	<div class="card">
		<img style="width: 100%; height: 300px; object-fit: cover;" src="@include('partials.images.link_'. rand(1,10))" class="card-img-top" alt="...">
		<div class="card-body">
			<h5 class="card-title">{{ $hotel->name }}</h5>
			<p class="card-text">{{ $hotel->description }}</p>
		</div>
		<div class="collapse" id="collapseReservation{{ $hotel->id }}">
			<div class="card card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Type: {{ $hotel->type }}</li>
					<li class="list-group-item">Stars: {{ $hotel->rating }}</li>
					<li class="list-group-item">Site: {{ $hotel->website }}</li>
					<li class="list-group-item">Adress: {{ $hotel->address }}</li>
					<li class="list-group-item">City: {{ $hotel->city }}</li>
					<li class="list-group-item">Country: {{ $hotel->country }}</li>
					<li class="list-group-item">Zip: {{ $hotel->zip }}</li>
					@foreach($hotel->room as $room)
					@if($hotel->id == $room->hotel_id )
					<li class="list-group-item">{{ $room->type }} | {{ $room->price }}$ </li>
					@endif
					@endforeach
					@foreach($hotel->facility as $facility)
					@if($hotel->id == $facility->hotel_id )
					<li class="list-group-item">{{ $facility->name }}</li>
					@endif
					@endforeach
				</ul>
			</div>
		</div>
		<div class="card-body row">
			@if(Auth::check())
			<div class="col-5">
				<form action="{{ route('reservations.show', $hotel->id)}}" class="w-100" method="get">
					<button class="btn btn-success card-link w-100" type="submit">
					Book now
					</button>
				</form>
			</div>
			@endif
			@if(Auth::check() && (Auth::user()->admin))
			<div class="col-3">
				<form action="{{ route('hotels.edit', $hotel->id)}}" class="w-100" method="get">
					<button class="btn btn-secondary card-link w-100" type="submit">
					Edit
					</button>
				</form>
			</div>
			<div class="col-4">
				<form action="{{ route('hotels.destroy', $hotel->id)}}" class="w-100" method="post">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger card-link w-100" type="submit">
					Delete
					</button>
				</form>
			</div>
			@endif
		</div>
		<div class="container mb-3">
			<a class="card-link btn btn-info dropdown-toggle w-100" href="#collapseReservation{{ $hotel->id }}" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Show more</a>
		</div>
	</div>
</div>
@endforeach