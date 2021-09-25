<html lang="es" >
<head>

	{{-- <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css")}}">
	<link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome/css/all.min.css")}}">
	<link rel="stylesheet" href="{{ asset("assets/css/style.css")}}">
 --}}
<style>

	@import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900');
	@font-face {
		font-family: 'Material Icons';
		font-style: normal;
		font-weight: 400;
		src: url(../fonts/MaterialIcons-Regular.eot); /* For IE6-8 */
		src: local('Material Icons'),
		local('MaterialIcons-Regular'),
		url(../fonts/MaterialIcons-Regular.woff2) format('woff2'),
		url(../fonts/MaterialIcons-Regular.woff) format('woff'),
		url(../fonts/MaterialIcons-Regular.ttf) format('truetype');
	}

	html {
		margin: 0px;
	}

	body {
		background-color: #f8f9fa;
		color: #272b41;
		font-family: "Poppins",sans-serif;
		font-size: 0.9375rem;
		height: 100%;
		overflow-x: hidden;
	}
	h1,h2 {
		font-size: 20px;
	}
	p,span {
		font-size: 12px;
	}

	table td.v  {
		border: 1px solid #000;
		/* Alto de las celdas */
		height: 8px;
		font-size: 8px;
		}

	.invoice-content {
		background-color: #fff;
		border: 1px solid #f0f0f0;
		border-radius: 4px;
		padding-bottom: 10px;
		padding-right: 20px;
		padding-left: 20px;
	}
	.invoice-item .invoice-logo {
		margin-bottom: 30px;
	}
	.invoice-item .invoice-logo img {
		width: auto;
		max-height: 52px;
	}
	.invoice-item .invoice-text h2 {
		color:#272b41;
		font-size:36px;
		font-weight:600;
	}
	.invoice-item .invoice-details {
		text-align:right;
		color:#757575;
		font-weight:500
	}
	.invoice-item .invoice-details strong {
		color:#272b41
	}
	.invoice-item .invoice-details-two {
		text-align:left
	}
	.invoice-item .invoice-text {
		padding-top:42px;
		padding-bottom:36px
	}
	.invoice-item .invoice-text h2 {
		font-weight:400
	}
	.invoice-info {
		margin-bottom: 30px;
	}
	.invoice-info p {
		margin-bottom: 0;
	}
	.invoice-info.invoice-info2 {
		text-align: right;
	}
	.invoice-item .customer-text {
		font-size: 18px;
		color: #272b41;
		font-weight: 600;
		margin-bottom: 8px;
		display: block
	}
	.invoice-table tr th,
	.invoice-table tr td,
	.invoice-table-two tr th,
	.invoice-table-two tr td {
		color: #272b41;
		font-weight: 600;
		padding: 10px 20px;
		line-height: inherit
	}
	.invoice-table tr td,
	.invoice-table-two tr td {
		color: #757575;
		font-weight: 500;
	}
	.invoice-table-two {
		margin-bottom:0
	}
	.invoice-table-two tr th,
	.invoice-table-two tr td {
		border-top: 0;
	}
	.invoice-table-two tr td {
		text-align: right
	}
	.invoice-info h5 {
		font-size: 16px;
		font-weight: 500;
	}
	.other-info {
		margin-top: 10px;
	}
</style>
</head>

			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-lg-8 offset-lg-2">
							<div class="invoice-content">
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-logo">
												<img src="assets/img/logo.png" alt="logo">
											</div>
										</div>
										<div class="col-md-6">
											<p class="invoice-details">
												<strong>Folio:</strong> #{{ $id_consulta }} <br>
												<strong>Fecha de Realización:</strong> {{ date("d/m/Y h:i A") }}
											</p>
										</div>
									</div>
								</div>
								
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-info">
												<strong class="customer-text">Ticket de Pago</strong>
												<p class="invoice-details invoice-details-two">
													<strong>Dr. {{ $doctor->nombre }} {{ $doctor->apellido_p }} {{ $doctor->apellido_m }}</strong><br>
													{{ $doctor->clinicas[0]->calle_consultorio }}, {{ $doctor->clinicas[0]->colonia_consultorio }}, {{ $doctor->clinicas[0]->ciudad_consultorio }}<br>
														{{ $doctor->clinicas[0]->estado_consultorio }}, {{ $doctor->clinicas[0]->pais_consultorio }}, {{ $doctor->clinicas[0]->cp_consultorio }}	
												</p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="invoice-info invoice-info2">
												<strong class="customer-text">Para:</strong>
												<p class="invoice-details">
													{{ $paciente->nombre }} {{ $paciente->apellido_p }} {{ $paciente->apellido_m }}
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								<!-- Invoice Item -->
								<div class="invoice-item invoice-table-wrap">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="invoice-table table table-bordered">
													<thead>
														<tr>
															<th>Descripción</th>
															<th class="text-center">Tipo</th>
															<th class="text-right">Total</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Consulta Rápida</td>
															<td class="text-center">Consulta</td>
															<td class="text-right">{{ $costo_consulta }}</td>
														</tr>
														@if(!empty($extra))
														<tr>
															<td>Monto Extra</td>
															<td class="text-center">{{ $motivo_extra }}</td>
															<td class="text-right">{{ $extra }}</td>
														</tr>
															
														@endif
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-md-6 col-xl-4 ml-auto">
											<div class="table-responsive">
												<table class="invoice-table-two table">
													<tbody>
												
													<tr>
														<th>Total:</th>
														<td><span>{{ $cobro }}</span></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Information -->
								<div class="other-info">
									<h4>Otra Información</h4>
									<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
								</div>
								<!-- /Invoice Information -->
								
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
            </div>
			
		</body>	

</html>