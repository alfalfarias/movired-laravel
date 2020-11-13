<div class="card">
	<div class="card-body">
		<h5 class="card-title">{{$transaction->name}}</h5>
		<h6 class="card-subtitle mb-2 text-muted">{{$transaction->transaction_date}}</h6>
		<p class="card-text">
			<strong>Tipo de servicio:</strong> 
			<br>
			{{$transaction->service_type}}
			<br>
			<strong>Detalle:</strong> 
			<br>
			{{$transaction->name_detail}}
			<br>
			<strong>Número de referencia:</strong> 
			<br>
			{{$transaction->reference_number}}
			<br>
			<strong>Monto de transferencia:</strong> 
			<br>
			${{number_format($transaction->transfer_value, 3, ',', '.')}}
		</p>
		@if ($transaction->transfer_status == 'EXITOSA')
		<a href="#" class="btn btn-success">EXITOSA</a>
		@elseif ($transaction->transfer_status == 'RECHAZADA')
		<a href="#" class="btn btn-danger">RECHAZADA</a>
		@else
		<a href="#" class="btn btn-info">ESTATUS DESCONOCIDO</a>
		@endif
	</div>
</div>