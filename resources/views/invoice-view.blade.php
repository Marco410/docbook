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
<body  >
	<div class="main-wrapper" >
		<!-- Page Content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					
					<div class="col-lg-8 offset-lg-2">
						<div class="invoice-content">
							<div class="invoice-item">
								<div class="row">
									<div style="width: 100%;">
										<table style="border-bottom:3px solid #3399ff!important;width: 100%;">
											<tbody  >
												<td style="width: 25%; text-align: left;" ><img src="assets/img/logo.png" height="70px" width="150px"  alt="logo" /></td>
												<td style="width: 50%; text-align: center;"  >
													<h2>CONSULTORIO EDUARDO</h2>
													<p>
														<strong>Dr. {{ $doctor->nombre }} {{ $doctor->apellido_p }} {{ $doctor->apellido_m }}</strong>
														<br>
														{{ $doctor->especialidad[0]->nombre }}<br>
														<strong>Cédula Profesional:</strong> {{ $doctor->cedula }}<br>
													</p>
												</td>
												<td style="width: 25%; text-align: right; "  ><img src="assets/img/medicina.png" height="70px" width="70px" alt="logo" /></td>
											</tbody>
										</table>
									</div>
									<div style="width: 100%;">
										<table style="width: 100%;" >
											<tbody>
												<td style="width: 50%; text-align: left;"">
													<p style="margin-top: 10px;" >
														<strong>Paciente: </strong>{{ $paciente->nombre }} {{ $paciente->apellido_p }} {{ $paciente->apellido_m }}<br>
														<strong>Diagnóstico: </strong> {{ $diagnostico }}<br>
													</p>
												</td>
												<td style="width: 50%; text-align: right;"">
													<p style="margin-top: 10px;" >
														<strong>Fecha: </strong>{{ Date("d/m/Y") }}<strong> Hora: </strong>{{ Date("h:i A") }} <strong>Edad: </strong> {{ $paciente->get_edad() }} <strong>Temp:</strong> {{ $temp }} C°<br>
														<strong>T/A: </strong> - <strong>FC: </strong> - <strong>S02: </strong> -
													</p>
												</td>
											</tbody>

										</table>

									</div>
									<div style="height: 128pt">
									@if(!empty($indicaciones))

									<div style="width: 100%;" >
										<table style="width: 100%" >
											<thead>
												<tr>
													<th style="text-align: left;" > <span> Medicamento</span></th>
													<th style="text-align: left;" > <span> Indicaciones</span></th>
												</tr>
											</thead>
											<tbody>
												@foreach ($indicaciones as $indi)
												<tr>
													<td style="Word-break:break-all; Word-wrap:break-Word;" >{{ $indi['articulo'] }}</td>
													<td style="Word-break:break-all; Word-wrap:break-Word;">{{ $indi['indicaciones'] }}</td>
												</tr>
												@endforeach
													
											</tbody>
										</table>
									</div>
									@endif

									@if(!empty($estudios))

									<div style="margin-top: 10px;width: 100%; border-top: 1px solid #A4A4A4; border-radius: 0px 15px 0px 0px;" >
										<table style="width: 100%" >
											<thead>
												<tr>
													<th style="text-align: left;" > <span> Estudios</span></th>
													<th style="text-align: left;" > <span> Observaciones</span></th>
												</tr>
											</thead>
											<tbody>
												@foreach ($estudios as $estu)
												<tr>
													<td style="Word-break:break-all; Word-wrap:break-Word;" >{{ $estu['estudio'] }}</td>
													<td style="Word-break:break-all; Word-wrap:break-Word;">{{ $estu['observaciones'] }}</td>
												</tr>
												@endforeach
													
											</tbody>
										</table>
									</div>
									@endif
								</div>

									<div style="width: 100%; margin-top:20px;">
										<table style="width: 100%;" >
											<tbody>
												<td style="width: 100%; text-align: center;"">
													<p>___________________________<br>
													 <strong>Dr. {{ $doctor->nombre }} {{ $doctor->apellido_p }} {{ $doctor->apellido_m }}</strong>
													</p>
												</td>
											</tbody>

										</table>

									</div>

									<div style="width: 100%;">
										<table style="width: 100%;" >
											<tbody>
												<td style="width: 50%; text-align: left;"">
													<p>
														<br>
														{{ $doctor->clinicas[0]->calle_consultorio }}, {{ $doctor->clinicas[0]->colonia_consultorio }}, {{ $doctor->clinicas[0]->ciudad_consultorio }}<br>
														{{ $doctor->clinicas[0]->estado_consultorio }}, {{ $doctor->clinicas[0]->pais_consultorio }}, {{ $doctor->clinicas[0]->cp_consultorio }}				
													</p>
													<p><strong>Tel:  {{ $doctor->clinicas[0]->tel_consultorio }} | Correo: {{ $doctor->email }}</strong> </p>
												</td>
												<td style="width: 50%; text-align: right;"">
													<p>
														Receta de medicamentos <br>
														IMPRESO POR:  {{ $doctor->nombre }}	{{ $doctor->apellido_p }} <br>
														Fecha de Impreso: {{ Date("d/m/Y h:i A") }}	<br>
														No Expediente: P-{{ $paciente->id }}
													</p>
												</td>
											</tbody>

										</table>

									</div>
						</div>
					</div>
				</div>

			</div>

		</div>	

	</div>
	
</body>	

</html>