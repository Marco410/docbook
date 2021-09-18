<html lang="es" >
<head>

	

	<style>

@import  url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900');
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
											<img src="../storage/<?php echo e($doctor->clinicas[0]->logotipo); ?>" width="100%" alt="logo">
										</div>
									</div>
									<div class="col-md-6">
										<p class="invoice-details">
											<strong>Paciente No:</strong> P- <?php echo e($paciente->id); ?> <br>
											<strong>Fecha:</strong> <?php echo e(date('d/m/Y')); ?><br>
											<strong>Cédula Profesional:</strong> <?php echo e($doctor->cedula); ?>

										</p>
									</div>
								</div>
							</div>
							
							<!-- Invoice Item -->
							<div class="invoice-item">
								<div class="row">
									<div class="col-md-6">
										<div class="invoice-info">
											<strong class="customer-text text-info"><?php echo e($doctor->clinicas[0]->nombre_consultorio); ?></strong>
											<p class="invoice-details invoice-details-two">
												Dr. <?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?> <?php echo e($doctor->apellido_m); ?><br>
												<?php echo e($doctor->clinicas[0]->calle_consultorio); ?>, <?php echo e($doctor->clinicas[0]->colonia_consultorio); ?>, <?php echo e($doctor->clinicas[0]->ciudad_consultorio); ?>, <?php echo e($doctor->clinicas[0]->cp_consultorio); ?><br>
												<?php echo e($doctor->clinicas[0]->estado_consultorio); ?>, <?php echo e($doctor->clinicas[0]->pais_consultorio); ?> <i class="fas fa-phone-alt" ></i> <?php echo e($doctor->clinicas[0]->tel_consultorio); ?><br>
											</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="invoice-info invoice-info2">
											<strong class="customer-text">Paciente</strong>
											<p class="invoice-details">
												<?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido_p); ?> <?php echo e($paciente->apellido_m); ?><br>
												<?php echo e($paciente->calle); ?>, <?php echo e($paciente->colonia); ?> <?php echo e($paciente->ciudad); ?>, <?php echo e($paciente->cp); ?><br>
												<?php echo e($paciente->estado); ?>, <?php echo e($paciente->pais); ?> <br>
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
										
										
										<table class="invoice-table table table-bordered">
											<thead>
												<tr>
													<th>Medicamento</th>
													<th class="text-center">Indicaciones</th>
												</tr>
											</thead>
											<tbody>
										<?php $__currentLoopData = $indicaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($indi['articulo']); ?></td>
											<td><?php echo e($indi['indicaciones']); ?></td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
										</table>
										
									</div>
									
								</div>
							</div>
							<!-- /Invoice Item -->
							
							<!-- Invoice Information -->
							<div class="other-info text-center">
								<h4>ATENTAMENTE</h4><br><br><br>
								<p class="text-muted mb-0">Dr. <?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?> <?php echo e($doctor->apellido_m); ?></p>
							</div>
							<!-- /Invoice Information -->
							
						</div>
					</div>
				</div>

			</div>

		</div>	

	</div>
	
</body>	

</html><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/invoice-view.blade.php ENDPATH**/ ?>