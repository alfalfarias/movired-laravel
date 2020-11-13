@extends('layouts.app')

@section('title', 'Movilred | Laravel')

@section('content')
@include('layouts.navbar')

<div style="padding: 20px;">
	<h1 class="text-center">Evaluación Laravel</h1>

	<h2>Filtros de búsqueda</h2>
	<form style="margin: 5px; padding: 5px;" action="/" method="GET">
		<div class="form-row">
			<div class="col-md-4">
				<label for="serviceType">Seleccione el tipo de servicio</label>
				<select class="form-control" id ="serviceType" name="service_type">
					@forelse ($types as $type)
						@if ($form['service_type'] === $type['code'])
							<option value="{{$type['code']}}" selected>{{$type['name']}}</option>
						@else
							<option value="{{$type['code']}}">{{$type['name']}}</option>
						@endif
						@empty
							<option selected disabled>-NO HAY TIPOS REGISTRADOS-</option>
					@endforelse
				</select>
				@error('service_type')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div class="col-md-3">
				<label for="startDate">Fecha inicial</label>
				<input type="date" class="form-control" id="startDate" name="start_date" value="{{$form['start_date']}}" required>
				@error('start_date')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div class="col-md-3">
				<label for="endDate">Fecha Final</label>
				<input type="date" class="form-control" id="endDate" name="end_date" value="{{$form['end_date']}}" required>
				@error('end_date')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div class="col-md-2">
				<button class="btn btn-primary btn-block" style="margin-top: 30px;" type="submit" value="Submit">Buscar</button>
			</div>
		</div>
	</form>
	<br>

	<h2>Resultados</h2>
	<div class="flex-container">

		@forelse ($transactions as $transaction)
			<div class="flex-item">
				@include('components.transaction', ['transaction' => $transaction])
			</div>
		@empty
			<h5 class="text-center">NO HAY COINCIDENCIAS ENCONTRADAS.</h5>
		@endforelse
	</div>
	<br>

	<nav aria-label="Page navigation example">
	<!-- 	<ul class="pagination justify-content-center">
			<li class="page-item disabled">
				<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
			</li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item">
				<a class="page-link" href="#">Next</a>
			</li>
		</ul> -->
		@error('page_number')
			<div class="alert alert-danger">{{ $message }}</div>
		@enderror
		@error('page_size')
			<div class="alert alert-danger">{{ $message }}</div>
		@enderror
	</nav>
</div>
@endsection