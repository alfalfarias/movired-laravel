@extends('layouts.app')

@section('title', 'Moviired | Laravel')

@section('content')
@include('layouts.navbar')

<div style="padding: 20px;">
	<h1 class="text-center">Evaluación Laravel</h1>

	<h2>Filtros de búsqueda</h2>
	<form style="margin: 5px; padding: 5px;">
		<div class="form-row">
			<div class="col-md-4">
				<label for="type">Seleccione el tipo de servicio</label>
				<select class="form-control" id ="type">
					<option>Código de servicio</option>
					<option>Código de servicio</option>
					<option>Código de servicio</option>
				</select>
			</div>
			<div class="col-md-3">
				<label for="startDate">Fecha inicial</label>
				<input type="date" class="form-control" id="startDate" placeholder="Fecha">
			</div>
			<div class="col-md-3">
				<label for="endDate">Fecha Final</label>
				<input type="date" class="form-control" id="endDate" placeholder="Fecha">
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-success btn-block" style="margin-top: 30px;">Buscar</button>
			</div>
		</div>
	</form>
	<br>

	<h2>Resultados</h2>
	<div class="flex-container">	
		@for ($i = 0; $i < 4; $i++)
		<div class="flex-item">
			@include('components.transaction', ['transaction' => 'data'])
		</div>
		@endfor
	</div>
	<br>

	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			<li class="page-item disabled">
				<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
			</li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item">
				<a class="page-link" href="#">Next</a>
			</li>
		</ul>
	</nav>
</div>
@endsection