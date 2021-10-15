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
			<div class="invoice-content">
				<div class="invoice-item">
					<div style="width: 100%;">
						<table style="border-bottom:3px solid #3399ff!important;width: 100%;">
							<tbody>
								<td style="width: 100%; text-align: center;"  >
									<h2>{{ auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion }}</h2>
									<p>
										<strong>Dr. {{ $doctor->nombre }} {{ $doctor->apellido_p }} {{ $doctor->apellido_m }}</strong>
										<br>
										{{ $doctor->especialidad[0]->nombre }}
									</p>
								</td>
							</tbody>
						</table>
					</div>
					<div style="width: 100%;">
						<table style="width: 100%;">
							<tbody>
								<td style="width: 100%; text-align: left;" >
									<p class="invoice-details" style="text-align: left;" >
										<strong>Identificador de Caja:</strong> {{ $caja_id}}<br>
										<strong>Monto de Apertura:</strong> ${{ $apertura}} <br>
										<strong>Entradas</strong> ${{ $entradas }} <br>
										<strong>Salidas</strong> ${{ $salidas }} <br>
									</p>
									<p class="invoice-details" style="text-align: left;" >
										<strong>Efectivo:</strong> ${{ $efectivo}}<br>
										<strong>Tarjeta:</strong> ${{ $tarjeta}} <br>
										<strong>Transferencia: </strong> ${{ $transferencia }} <br>
										
									</p>
									<p>
										<strong>Total en Caja: </strong> ${{ $total }} 
									</p>
								</td>
							
							</tbody>
						</table>
					</div>
				</div>
				<div style="width: 100%;">
					<table style="width: 100%;" >
						<tbody>
							<td style="width: 100%; text-align: center;"">
								<p>
									<br>
									{{ auth()->user("doctors")->clinicas->where('activa',1)->first()->calle_consultorio }}, {{ auth()->user("doctors")->clinicas->where('activa',1)->first()->colonia_consultorio }}, {{ auth()->user("doctors")->clinicas->where('activa',1)->first()->ciudad_consultorio }}<br>
									{{ auth()->user("doctors")->clinicas->where('activa',1)->first()->estado_consultorio }}, {{ auth()->user("doctors")->clinicas->where('activa',1)->first()->pais_consultorio  }}, {{ auth()->user("doctors")->clinicas->where('activa',1)->first()->cp_consultorio  }}				
								</p>
								<p><strong>Tel:  {{ $doctor->clinicas[0]->tel_consultorio }} | Correo: {{ $doctor->email }}</strong> </p>
								<p>
									Reporte de caja <br>
									IMPRESO POR:  {{ $doctor->nombre }}	{{ $doctor->apellido_p }} <br>
									Fecha de Impreso: {{ Date("d/m/Y h:i A") }}	<br>
									Este documento no es un comprobante fiscal
								</p>
							</td>
						</tbody>

					</table>

				</div>
				<!-- /Invoice Information -->
			</div>
		</div>
	</div>
</div>		
			<!-- /Page Content -->
	</div>
</body>
</html>