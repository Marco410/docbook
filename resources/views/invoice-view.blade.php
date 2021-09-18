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

body {
	background-color: #f8f9fa;
	color: #272b41;
    font-family: "Poppins",sans-serif;
	font-size: 0.9375rem;
    height: 100%;
	overflow-x: hidden;
}

.invoice-content {
    background-color: #fff;
	border: 1px solid #f0f0f0;
    border-radius: 4px;
    margin-bottom: 30px;
	padding: 30px;
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
<body>
	<div class="main-wrapper" >
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
											<img src="../storage/{{ $doctor->clinicas[0]->logotipo }}" width="100%" alt="logo">
										</div>
									</div>
									<div class="col-md-6">
										<p class="invoice-details">
											<strong>Paciente No:</strong> P- {{ $paciente->id }} <br>
											<strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
											<strong>Cédula Profesional:</strong> {{ $doctor->cedula }}
										</p>
									</div>
								</div>
							</div>
							
							<!-- Invoice Item -->
							<div class="invoice-item">
								<div class="row">
									<div class="col-md-6">
										<div class="invoice-info">
											<strong class="customer-text text-info">{{ $doctor->clinicas[0]->nombre_consultorio }}</strong>
											<p class="invoice-details invoice-details-two">
												Dr. {{ $doctor->nombre }} {{ $doctor->apellido_p }} {{ $doctor->apellido_m }}<br>
												{{ $doctor->clinicas[0]->calle_consultorio }}, {{ $doctor->clinicas[0]->colonia_consultorio }}, {{ $doctor->clinicas[0]->ciudad_consultorio }}, {{ $doctor->clinicas[0]->cp_consultorio }}<br>
												{{ $doctor->clinicas[0]->estado_consultorio }}, {{ $doctor->clinicas[0]->pais_consultorio }} <i class="fas fa-phone-alt" ></i> {{ $doctor->clinicas[0]->tel_consultorio }}<br>
											</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="invoice-info invoice-info2">
											<strong class="customer-text">Paciente</strong>
											<p class="invoice-details">
												{{ $paciente->nombre }} {{ $paciente->apellido_p }} {{ $paciente->apellido_m }}<br>
												{{ $paciente->calle }}, {{ $paciente->colonia }} {{ $paciente->ciudad }}, {{ $paciente->cp }}<br>
												{{ $paciente->estado }}, {{ $paciente->pais }} <br>
											</p>
										</div>
									</div>
								</div>
							</div>
							<!-- /Invoice Item -->
							
							<!-- Invoice Item -->
							<div class="invoice-item">
								<div class="row">
									<div class="col-md-12">
										<div class="invoice-info">
											<strong class="customer-text"></strong>
										</div>
									</div>
								</div>
							</div>
							<!-- /Invoice Item -->
							
							<!-- Invoice Item -->
							<div class="invoice-item invoice-table-wrap">
								<div class="row">
									<div class="col-md-12">
										{{-- {{ var_dump($indicaciones) }} --}}
										{{-- @for ($i = 0; $i < count($indicaciones); $i++)													@foreach ($indicaciones[$i] as $indi)
											<p>{{ $indi }}</p>	
											@endforeach
										@endfor --}}
										<table class="invoice-table table table-bordered">
											<thead>
												<tr>
													<th>Medicamento</th>
													<th class="text-center">Indicaciones</th>
												</tr>
											</thead>
											<tbody>
										@foreach ($indicaciones as $indi)
										<tr>
											<td>{{ $indi['articulo'] }}</td>
											<td>{{ $indi['indicaciones'] }}</td>
										</tr>
										@endforeach
											</tbody>
										</table>
										{{-- <div class="table-responsive">
											<table class="invoice-table table table-bordered">
												<thead>
													<tr>
														<th>Description</th>
														<th class="text-center">Quantity</th>
														<th class="text-center">VAT</th>
														<th class="text-right">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>General Consultation</td>
														<td class="text-center">1</td>
														<td class="text-center">$0</td>
														<td class="text-right">$100</td>
													</tr>
													<tr>
														<td>Video Call Booking</td>
														<td class="text-center">1</td>
														<td class="text-center">$0</td>
														<td class="text-right">$250</td>
													</tr>
												</tbody>
											</table>
										</div> --}}
									</div>
									{{-- <div class="col-md-6 col-xl-4 ml-auto">
										<div class="table-responsive">
											<table class="invoice-table-two table">
												<tbody>
												<tr>
													<th>Subtotal:</th>
													<td><span>$350</span></td>
												</tr>
												<tr>
													<th>Discount:</th>
													<td><span>-10%</span></td>
												</tr>
												<tr>
													<th>Total Amount:</th>
													<td><span>$315</span></td>
												</tr>
												</tbody>
											</table>
										</div>
									</div> --}}
								</div>
							</div>
							<!-- /Invoice Item -->
							
							<!-- Invoice Information -->
							<div class="other-info text-center">
								<h4>ATENTAMENTE</h4><br><br><br>
								<p class="text-muted mb-0">Dr. {{ $doctor->nombre }} {{ $doctor->apellido_p }} {{ $doctor->apellido_m }}</p>
							</div>
							<!-- /Invoice Information -->
							
						</div>
					</div>
				</div>

			</div>

		</div>	

	</div>
	
</body>	

</html>