
@extends('layout.mainlayout')
@section('content')
	<!-- Breadcrumb -->
    <div class="breadcrumb-bar">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-12 col-12">
					<nav aria-label="breadcrumb" class="page-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="doctor-inicio">Inicio</a></li>
							<li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('mis-pacientes') }}"> Mis Pacientes</a></li>
							<li class="breadcrumb-item active" aria-current="page">Consulta</li>
						</ol>
					</nav>
					<h2 class="breadcrumb-title">Consulta</h2>
				</div>
			</div>
		</div>
	</div>
	
	<input type="hidden" id="clinic_id" value="{{ auth()->user("doctors")->clinicas->where('activa',1)->first()->id }}" >
	<input type="hidden" id="especialidad_id" value="{{ auth()->user("doctors")->especialidad[0]->id }}" >
			<!-- /Breadcrumb -->
			
<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<input type="hidden" name="paciente_id" id="paciente_id" value="{{ $paciente->pluck('id')[0] }}" >
			<!-- 1er Columna -->
			<div class="col-sm-8">
				<div class="col-sm-12" >
					<div class="profile-sidebar">
						<div class=" pro-widget-content">
							<div class="profile-info-widget">
									<div class="col-sm-4">
										<a href="#" class="booking-doc-img">
											@if ($paciente->pluck('foto')[0] === "")
											<img width="30px" class="avatar-img" src="../storage/{{$paciente->pluck('foto')[0] }}" alt="{{ $paciente->pluck('nombre')[0] }}">
											@else
												@if ($paciente->pluck('sexo')[0] == "Masculino")
												<img width="10px" height="10px" src="/assets/img/icons/male.png" alt="Paciente Masculino">
												@else
												<img src="/assets/img/icons/female.png" alt="Paciente Femenino">
												@endif
											@endif
										</a>
									</div>
									<div class="col-sm-4" >
										<div class="">
											<div class="col-sm-12">
												<h3>{{ $paciente->pluck('nombre')[0] }} {{ $paciente->pluck('apellido_p')[0] }} {{ $paciente->pluck('apellido_m')[0] }} </h3><a href="" class="edit-link"><small><i class="fa fa-edit mr-1" ></i>Editar</small></a>
											</div>
											
											<span class="badge badge-primary" >{{ $consulta_actual->pluck('motivo')[0]->motivo }} </span>
											<span class="badge badge-secondary" >{{ $consulta_actual[0]->created_at}} </span>
											<div class="col-sm-12 mb-2" >
												
											</div>
		
										</div>
									</div>
									<div class="col-sm-4 mb-4">
						
										@if ($consulta_actual != null)
										<input type="hidden" id="id_consulta_actual" value="{{ $consulta_actual[0]->id }}" >
										<div id="panel-termino-consulta">
											<a data-toggle="modal" data-target="#consulta" class="btn btn-danger btn-md float-right text-white"><i class="fas fa-stop"></i> Terminar Consulta</a>
										</div>
										@else
										<div id="panel-inicio-consulta">
											<a data-toggle="modal" data-target="#consulta" class="btn btn-primary btn-md float-right text-white"><i class="fas fa-play"></i> Iniciar Consulta</a>
										</div>
										@endif
									</div>
								
								
								
							</div>
						</div>
					</div>
				</div>
				{{-- TABS CONSULTA --}}
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">

							<!-- Tabs navs -->
							<!-- Tabs de antecedentes -->                
							<ul class="nav nav-tabs mb-5 text-center " id="pills-tab" role="tablist">
								<li class="nav-item mr-3">
								  <a class="nav-link btn-sm" id="btn-hisotorial" data="1" data-toggle="pill" href="#btn-historialpa" role="tab" aria-controls="hisotorial" aria-selected="true">Historial</a>
								</li>
							  <li class="nav-item">
								<a class="nav-link btn-sm" id="btn-pade" data="1" data-toggle="pill" href="#btn-padelo" role="tab" aria-controls="pade" aria-selected="false">Notas de Padecimiento</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link btn-sm" id="btn-nutri" data-toggle="pill" href="#nutri" role="tab" aria-controls="nutri" aria-selected="false">Nutrición</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link btn-sm" id="btn-explo" data-toggle="pill" href="#explo" role="tab" aria-controls="explo" aria-selected="false">Exploración Topográfica</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link btn-sm" id="btn-odonto" data-toggle="pill" href="#odonto" role="tab" aria-controls="odonto" aria-selected="false">Odontograma</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link btn-sm" id="btn-exa" data-toggle="pill" href="#exa" role="tab" aria-controls="exa" aria-selected="false">Examen Físico</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link btn-sm" id="btn-diagno" data-toggle="pill" href="#diagno" role="tab" aria-controls="diagno" aria-selected="false">Diagnóstico y Tratamiento</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link btn-sm" id="btn-cargos" data-toggle="pill" href="#cargos" role="tab" aria-controls="cargos" aria-selected="false">Cargos</a>
							  </li>
							</ul>
			  
							<div class="tab-content" id="pills-tabContent">
							  <div class="tab-pane fade" id="btn-historialpa" data="1" role="tabpanel" aria-labelledby="herdo-tab">
								  <h4>Historial</h4>
								<div style="width:100%; height:500px; overflow: scroll; overflow-x: hidden;" >
									<div class="row">
										<div class="col-sm-6">
											<!--- ALERGIAS -->
											<div class="card col-sm-12 border-left ">
												<div class="card-header " data-toggle="collapse" href="#alergias">
													<div class="card-title ">
														<h5 class="text-info " ><i class="fas fa-file-medical"></i> ALERGIAS</h5>
													</div>
												</div>
												<div class="card-body collapse multi-collapse" id="alergias">
												
													<div  class="text-right mb-2">
														<div  class="custom-checkbox">
															<label  for="paciente_alergias" class="text-secondary text-sm">El paciente no tiene alergias conocidas
															</label> <input @if ($paciente->pluck('historial')[0][0]->alergias_option == 0) {{   'checked'  }} 	@endif type="checkbox" id="paciente_alergias" name="" >
														</div>
													</div>
												<div id="alergias_conocidas">
													@foreach($paciente[0]->alergias()->get() as $alergia)
														<label style="padding: 5px 10px 5px 10px;" for='s-alergia' id='s-alergia{{ $alergia->id }}' class='badge badge-info m-1 s-alergia'> <input disabled type='hidden' checked  value='{{ $alergia->id }}' >{{ $alergia->alergia }} </label><i class='fas fa-trash text-danger ' onclick="eliminar_alergia(this)" data-id="{{ $alergia->id }}" > </i> 
													@endforeach
												</div>
													<div id="panel-alergias" style=" @if ($paciente->pluck('historial')[0][0]->alergias_option == 0) {{   'display:none;' }} @endif" >
														<label for="buscar_alergia" class="text-secondary text-sm">Buscar alergia</label>

														<div class="input-group mb-2" >
																<input type="text" placeholder="Comienza a escribir algo para buscar" class="form-control" name="buscar_alergia" id="buscar_alergia"  >
																<div class="input-group-append ">
																	<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-search"></i></span>
																</div>
														</div>
														
														<div id="panel-store-alergias" >
														<div class="col-sm-12">
															<div id="select_alergia" >
															</div>
														</div>
														<div class="col-sm-12">
															<div id="btn_select_alergia" class="text-center" style="display: none" >
																<button type="button" id="btn-store-alergias" class="btn btn-sm btn-primary mb-2" > <i class="fas fa-save" ></i> Guardar</button>
															</div>
														</div>									</div>	
														
														<label for="otras_alergia" class="text-secondary text-sm">Otras alergias</label>	
														<div class="input-group" >
															
															<input type="text" name="otras_alergias" id="otras_alergias" class="form-control" placeholder="Escribe algo" />
															<div class="input-group-append ">
																<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-plus"></i></span>
															</div>
														</div>
														<div id="btn-guardar-nueva-alergia" class="mt-3 text-center" style="display: none;">
															<button type="button" id="btn-new-alergia" class="btn btn-sm btn-info"> <i class="fas fa-plus" ></i> Añadir Nueva</button>
														</div>
													</div>
												</div>
											</div>
											<!--- TERMINA ALERGIAS -->

											<!--- ANTECEDENTES PATOLOGICOS -->
											<div class="card col-sm-12 border-left ">
													<div class="card-header " data-toggle="collapse" href="#pato">
														<div class="card-title ">
															<h5 class="text-info " ><i class="fas fa-file-medical"></i> PATOLÓGICOS</h5>
														</div>
													</div>
													<div class="card-body collapse multi-collapse" id="pato">
														<form id="formPato">
															<div class="row">
																
																	{{ csrf_field() }}
																<div class="col-sm-12 text-right mb-3">
																	<a role="button" class="text-info" id="no_a_todo" >No a todo</a>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Hospitalización Previa</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->hospi == "Si") {{   'checked' }} @endif type="radio" name="hospi" id="hospi1" value="Si" >
																		<label class="form-check-label" for="hospi1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->hospi == "No") {{   'checked' }} @endif type="radio" name="hospi" id="hospi2" value="No">
																		<label class="form-check-label" for="hospi2">
																		No
																		</label>
																	</div>
																	
																</div>
																<div class="col-sm-12 form-group" id="p-text-hospi"  style="display: none">
																	<textarea class="form-control" name="text_hospi" id="text-hospi" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_hospi }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Cirugías Previas</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cirugia == "Si") {{   'checked' }} @endif type="radio" name="cirugia" id="cirugia1" value="Si" >
																		<label class="form-check-label" for="cirugia1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cirugia == "No") {{   'checked' }} @endif type="radio" name="cirugia" id="cirugia2" value="No">
																		<label class="form-check-label" for="cirugia2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-cirugia"  style="display: none">
																	<textarea class="form-control" name="text_cirugia" id="text-cirugia" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_cirugia }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Diabetes</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->diabetes == "Si") {{   'checked' }} @endif type="radio" name="diabetes" id="diabetes1" value="Si" >
																		<label class="form-check-label" for="diabetes1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->diabetes == "No") {{   'checked' }} @endif type="radio" name="diabetes" id="diabetes2" value="No">
																		<label class="form-check-label" for="diabetes2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-diabetes"  style="display: none">
																	<textarea class="form-control" name="text_diabetes" id="text-diabetes" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_diabetes }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Enfermedades Tiroideas</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->tiroideas == "Si") {{   'checked' }} @endif type="radio" name="tiroideas" id="tiroideas1" value="Si" >
																		<label class="form-check-label" for="tiroideas1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->tiroideas == "No") {{   'checked' }} @endif type="radio" name="tiroideas" id="tiroideas2" value="No">
																		<label class="form-check-label" for="tiroideas2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-tiroideas"  style="display: none">
																	<textarea class="form-control" name="text_tiroideas" id="text-tiroideas" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_tiroideas }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Hipertensión Arterial</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->hipertension == "Si") {{   'checked' }} @endif type="radio" name="hipertension" id="hipertension1" value="Si" >
																		<label class="form-check-label" for="hipertension1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->hipertension == "No") {{   'checked' }} @endif type="radio" name="hipertension" id="hipertension2" value="No">
																		<label class="form-check-label" for="hipertension2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-hipertension"  style="display: none">
																	<textarea class="form-control" name="text_hipertension" id="text-hipertension" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_hipertension }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Cardiopatias</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cardio == "Si") {{   'checked' }} @endif type="radio" name="cardio" id="cardio1" value="Si" >
																		<label class="form-check-label" for="cardio1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cardio == "No") {{   'checked' }} @endif type="radio" name="cardio" id="cardio2" value="No">
																		<label class="form-check-label" for="cardio2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-cardio"  style="display: none">
																	<textarea class="form-control" name="text_cardio" id="text-cardio" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_cardio }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Traumatismos</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->trauma == "Si") {{   'checked' }} @endif type="radio" name="trauma" id="trauma1" value="Si" >
																		<label class="form-check-label" for="trauma1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->trauma == "No") {{   'checked' }} @endif type="radio" name="trauma" id="trauma2" value="No">
																		<label class="form-check-label" for="trauma2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-trauma"  style="display: none">
																	<textarea class="form-control" name="text_trauma" id="text-trauma" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_trauma }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Cáncer</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cancer == "Si") {{   'checked' }} @endif type="radio" name="cancer" id="cancer1" value="Si">
																		<label class="form-check-label" for="cancer1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cancer == "No") {{   'checked' }} @endif type="radio" name="cancer" id="cancer2" value="No">
																		<label class="form-check-label" for="cancer2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-cancer"  style="display: none">
																	<textarea class="form-control" name="text_cancer" id="text-cancer" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_cancer }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Tuberculosis</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->tuberculosis == "Si") {{   'checked' }} @endif type="radio" name="tuberculosis" id="tuberculosis1" value="Si" >
																		<label class="form-check-label" for="tuberculosis1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->tuberculosis == "No") {{   'checked' }} @endif type="radio" name="tuberculosis" id="tuberculosis2" value="No">
																		<label class="form-check-label" for="tuberculosis2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-tuberculosis"  style="display: none">
																	<textarea class="form-control" name="text_tuberculosis" id="text-tuberculosis" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_tuberculosis }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Transfusiones</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->trans == "Si") {{   'checked' }} @endif type="radio" name="trans" id="trans1" value="Si">
																		<label class="form-check-label" for="trans1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->trans == "No") {{   'checked' }} @endif type="radio" name="trans" id="trans2" value="No">
																		<label class="form-check-label" for="trans2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-trans"  style="display: none">
																	<textarea class="form-control" name="text_trans" id="text-trans" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_trans }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Patologías Respiratorias</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->pato_respiratorias == "Si") {{   'checked' }} @endif type="radio" name="pato_respiratorias" id="pato_respiratorias1" value="Si" >
																		<label class="form-check-label" for="pato_respiratorias1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->pato_respiratorias == "No") {{   'checked' }} @endif type="radio" name="pato_respiratorias" id="pato_respiratorias2" value="No">
																		<label class="form-check-label" for="pato_respiratorias2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-pato_respiratorias"  style="display: none">
																	<textarea class="form-control" name="text_pato_respiratorias" id="text-pato_respiratorias" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_pato_respiratorias }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Patologías Gastrointestinales</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->pato_gastro == "Si") {{   'checked' }} @endif type="radio" name="pato_gastro" id="pato_gastro1" value="Si">
																		<label class="form-check-label" for="pato_gastro1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->pato_gastro == "No") {{   'checked' }} @endif type="radio" name="pato_gastro" id="pato_gastro2" value="No">
																		<label class="form-check-label" for="pato_gastro2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-pato_gastro"  style="display: none">
																	<textarea class="form-control" name="text_pato_gastro" id="text-pato_gastro" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_pato_gastro }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Enfermedades de Transmisión Sexual</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->sexual == "Si") {{   'checked' }} @endif type="radio" name="sexual" id="sexual1" value="Si" >
																		<label class="form-check-label" for="sexual1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->sexual == "No") {{   'checked' }} @endif type="radio" name="sexual" id="sexual2" value="No">
																		<label class="form-check-label" for="sexual2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-sexual"  style="display: none">
																	<textarea class="form-control" name="text_sexual" id="text-sexual" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_sexual }}</textarea>
																</div>
																<div class="col-sm-4 ">
																	<label >Otros</label>
																</div>
																<div class="col-sm-8 ">
																	<textarea name="pato_otros" id="pato_otros" class="form-control" placeholder="Escribe aquí" >{{ $paciente->pluck('historial')[0][0]->pato_otros }}</textarea>
																</div>

																<div class="col-sm-8 offset-2 mt-4">
																	<button type="button" class="btn btn-sm btn-primary btn-block" id="btn-save-pato" > <i class="fas fa-save" ></i> Guardar</button>
																</div>
															
															</div>
														</form>
													</div>
											</div>
											<!--- TERMINA ANTECEDENTES PATOLOGICOS -->

											<!--- ANTECEDENTES NO PATOLOGICOS -->
											<div class="row">
												<div class="card col-sm-12 border-left">
													<div class="card-header " data-toggle="collapse" href="#no_pato">
														<div class="card-title">
															<h5 class="text-info" ><i class="fas fa-file-medical"></i> NO PATOLÓGICOS</h5>
														</div>
													</div>
													<div class="card-body collapse multi-collapse" id="no_pato">
														<form id="formNPato">
															<div class="row">
																<div class="col-sm-12 text-right mb-3">
																	<a role="button" class="text-info" id="npato_no_a_todo" >No a todo</a>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Actividad Fisica</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->fisica == "Si") {{   'checked' }} @endif  type="radio" name="fisica" id="fisica1" value="Si" >
																		<label class="form-check-label" for="fisica1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->fisica == "No") {{   'checked' }} @endif  type="radio" name="fisica" id="fisica2" value="No">
																		<label class="form-check-label" for="fisica2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-fisica"  style="display: none">
																	<textarea class="form-control" name="text_fisica" id="text-fisica" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_fisica }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Tabaquismo</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->tabaco == "Si") {{   'checked' }} @endif type="radio" name="tabaco" id="tabaco1" value="Si" >
																		<label class="form-check-label" for="tabaco1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->tabaco == "No") {{   'checked' }} @endif type="radio" name="tabaco" id="tabaco2" value="No">
																		<label class="form-check-label" for="tabaco2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-tabaco"  style="display: none">
																	<textarea class="form-control" name="text_tabaco" id="text-tabaco" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_tabaco }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Alcoholismo</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->alcohol == "Si") {{   'checked' }} @endif type="radio" name="alcohol" id="alcohol1" value="Si" >
																		<label class="form-check-label" for="alcohol1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->alcohol == "No") {{   'checked' }} @endif type="radio" name="alcohol" id="alcohol2" value="No">
																		<label class="form-check-label" for="alcohol2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-alcohol"  style="display: none">
																	<textarea class="form-control" name="text_alcohol" id="text-alcohol" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_alcohol }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Uso de otras sustancias (Drogas)</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->sustancias == "Si") {{   'checked' }} @endif type="radio" name="sustancias" id="sustancias1" value="Si" >
																		<label class="form-check-label" for="sustancias1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->sustancias == "No") {{   'checked' }} @endif type="radio" name="sustancias" id="sustancias2" value="No">
																		<label class="form-check-label" for="sustancias2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-sustancias"  style="display: none">
																	<textarea class="form-control" name="text_sustancias" id="text-sustancias" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_sustancias }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Vacuna o Inmunización reciente</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->vacuna_reciente == "Si") {{   'checked' }} @endif type="radio" name="vacuna_reciente" id="vacuna_reciente1" value="Si" >
																		<label class="form-check-label" for="vacuna_reciente1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->vacuna_reciente == "No") {{   'checked' }} @endif type="radio" name="vacuna_reciente" id="vacuna_reciente2" value="No">
																		<label class="form-check-label" for="vacuna_reciente2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-vacuna_reciente"  style="display: none">
																	<textarea class="form-control" name="text_vacuna_reciente" id="text-vacuna_reciente" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_vacuna_reciente }}</textarea>
																</div>
																<div class="col-sm-4 mb-2">
																	<label >Otros</label>
																</div>
																<div class="col-sm-8">
																	<textarea name="npato_otros" id="npato_otros" class="form-control" placeholder="Escribe aquí" >{{ $paciente->pluck('historial')[0][0]->npato_otros }}</textarea>
																</div>
																<div class="col-sm-8 offset-2 mt-4">
																	<button class="btn btn-sm btn-primary btn-block" type="button" id="btn-save-npato"  > <i class="fas fa-save" ></i> Guardar</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
											<!--- TERMINA ANTECEDENTES NO PATOLOGICOS -->

											<!--- ANTECEDENTES HEREDOFAMILIARES -->
											<div class="row">
												<div class="card col-sm-12 border-left">
													<div class="card-header " data-toggle="collapse" href="#heredo">
														<div class="card-title">
															<h5 class="text-info" ><i class="fas fa-users"></i> HEREDOFAMILIARES</h5>
														</div>
													</div>
													<div class="card-body collapse multi-collapse" id="heredo">
														<form id="formHeredo">
															<div class="row">
																<div class="col-sm-12 text-right mb-3">
																	<a role="button" class="text-info" id="heredo_no_a_todo" >No a todo</a>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Diabetes</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->heredo_diabetes == "Si") {{   'checked' }} @endif type="radio" name="heredo_diabetes" id="heredo_diabetes1" value="Si" >
																		<label class="form-check-label" for="heredo_diabetes1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->heredo_diabetes == "No") {{   'checked' }} @endif type="radio" name="heredo_diabetes" id="heredo_diabetes2" value="No">
																		<label class="form-check-label" for="heredo_diabetes2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-heredo_diabetes"  style="display: none">
																	<textarea class="form-control" name="text_heredo_diabetes" id="text-heredo_diabetes" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_heredo_diabetes }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Cardiopatías</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->h_cardio == "Si") {{   'checked' }} @endif type="radio" name="h_cardio" id="h_cardio1" value="Si" >
																		<label class="form-check-label" for="h_cardio1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->h_cardio == "No") {{   'checked' }} @endif type="radio" name="h_cardio" id="h_cardio2" value="No">
																		<label class="form-check-label" for="h_cardio2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-h_cardio"  style="display: none">
																	<textarea class="form-control" name="text_h_cardio" id="text-h_cardio" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_h_cardio }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Hipertensión Arterial</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->h_hipertension == "Si") {{   'checked' }} @endif type="radio" name="h_hipertension" id="h_hipertension1" value="Si" >
																		<label class="form-check-label" for="h_hipertension1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->h_hipertension == "No") {{   'checked' }} @endif type="radio" name="h_hipertension" id="h_hipertension2" value="No">
																		<label class="form-check-label" for="h_hipertension2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-h_hipertension"  style="display: none">
																	<textarea class="form-control" name="text_h_hipertension" id="text-h_hipertension" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_h_hipertension }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Enfermedades Tiroideas</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->h_tiroideas == "Si") {{   'checked' }} @endif type="radio" name="h_tiroideas" id="h_tiroideas1" value="Si" >
																		<label class="form-check-label" for="h_tiroideas1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->h_tiroideas == "No") {{   'checked' }} @endif type="radio" name="h_tiroideas" id="h_tiroideas2" value="No">
																		<label class="form-check-label" for="h_tiroideas2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-h_tiroideas"  style="display: none">
																	<textarea class="form-control" name="text_h_tiroideas" id="text-h_tiroideas" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_h_tiroideas }}</textarea>
																</div>
																<div class="col-sm-4 mb-2">
																	<label >Otros</label>
																</div>
																<div class="col-sm-8">
																	<textarea name="heredo_otros" id="heredo_otros" class="form-control" placeholder="Escribe aquí" >{{$paciente->pluck('historial')[0][0]->heredo_otros }} </textarea>
																</div>
																<div class="col-sm-8 offset-2 mt-4">
																	<button type="button" id="btn-save-heredo" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
											<!--- TERMINA ANTECEDENTES HEREDOFAMILIARES -->

											<!--- ANTECEDENTES ESQUEMA DE VACUNACIÓN -->
											<div class="row">
												<div class="card col-sm-12 border-left">
													<div class="card-header " data-toggle="collapse" href="#vacunacion">
														<div class="card-title">
															<h5 class="text-info" ><i class="fas fa-syringe"></i> ESQUEMA DE VACUNACIÓN</h5>
														</div>
													</div>
													<div class="card-body collapse multi-collapse" id="vacunacion">
														<form id="formVacunacion">
															<div class="row">
																<div class="col-sm-12 text-right mb-3">
																	<a role="button" class="text-info" id="vacunacion_no_a_todo" >No a todo</a>
																</div>
																<div class="col-sm-6 mb-2">
																	<label >Nacimiento</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->bcg == "Si") {{   'checked' }} @endif type="checkbox" name="bcg" id="bcg1" value="Si" >
																		<label class="form-check-label" for="bcg1">
																		BCG
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->hepatitisb == "Si") {{   'checked' }} @endif type="checkbox" name="hepatitisb" id="hepatitisb1" value="Si" >
																		<label class="form-check-label" for="hepatitisb1">
																		1a Hepatitis B
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>

																<div class="col-sm-6 mb-2">
																	<label >2 Meses</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->pentavalenteAcelular == "Si") {{   'checked' }} @endif type="checkbox" name="pentavalenteAcelular" id="pentavalenteAcelular1" value="Si" >
																		<label class="form-check-label" for="pentavalenteAcelular1">
																		1a Pentavalente Acelular
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->doshepatitisb == "Si") {{   'checked' }} @endif type="checkbox" name="doshepatitisb" id="doshepatitisb1" value="Si" >
																		<label class="form-check-label" for="doshepatitisb1">
																		2a Hepatitis B
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->rotavirus == "Si") {{   'checked' }} @endif type="checkbox" name="rotavirus" id="rotavirus1" value="Si" >
																		<label class="form-check-label" for="rotavirus1">
																		1a Rotavirus
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->neumococo == "Si") {{   'checked' }} @endif type="checkbox" name="neumococo" id="neumococo1" value="Si" >
																		<label class="form-check-label" for="neumococo1">
																		1a Neumococo
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>
																<div class="col-sm-6 mb-2">
																	<label >4 Meses</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->dospentavalenteAcelular == "Si") {{   'checked' }} @endif type="checkbox" name="dospentavalenteAcelular" id="dospentavalenteAcelular1" value="Si" >
																		<label class="form-check-label" for="dospentavalenteAcelular1">
																		2a Pentavalente Acelular
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->dosrotavirus == "Si") {{   'checked' }} @endif type="checkbox" name="dosrotavirus" id="dosrotavirus1" value="Si" >
																		<label class="form-check-label" for="dosrotavirus1">
																		2a Rotavirus
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->dosneumococo == "Si") {{   'checked' }} @endif type="checkbox" name="dosneumococo" id="dosneumococo1" value="Si" >
																		<label class="form-check-label" for="dosneumococo1">
																		2a Neumococo
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>

																<div class="col-sm-6 mb-2">
																	<label >6 Meses</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->trespentavalenteAcelular == "Si") {{   'checked' }} @endif type="checkbox" name="trespentavalenteAcelular" id="trespentavalenteAcelular1" value="Si" >
																		<label class="form-check-label" for="trespentavalenteAcelular1">
																		3a Pentavalente Acelular
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->treshepatitisb == "Si") {{   'checked' }} @endif type="checkbox" name="treshepatitisb" id="treshepatitisb1" value="Si" >
																		<label class="form-check-label" for="treshepatitisb1">
																		3a Hepatitis B
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->tresrotavirus == "Si") {{   'checked' }} @endif type="checkbox" name="tresrotavirus" id="tresrotavirus1" value="Si" >
																		<label class="form-check-label" for="tresrotavirus1">
																		3a Rotavirus
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->antiInfluenza == "Si") {{   'checked' }} @endif type="checkbox" name="antiInfluenza" id="antiInfluenza1" value="Si" >
																		<label class="form-check-label" for="antiInfluenza1">
																		1a Anti Influenza (en temporada de frio)
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>
																
																<div class="col-sm-6 mb-2">
																	<label >7 Meses</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->dosantiInfluenza == "Si") {{   'checked' }} @endif type="checkbox" name="dosantiInfluenza" id="dosantiInfluenza1" value="Si" >
																		<label class="form-check-label" for="dosantiInfluenza1">
																		2a Anti Influenza (en temporada de frio)
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>
																<div class="col-sm-6 mb-2">
																	<label >12 Meses</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->srp == "Si") {{   'checked' }} @endif type="checkbox" name="srp" id="srps1" value="Si" >
																		<label class="form-check-label" for="srp1">
																		1a SRP
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->tresneumococo == "Si") {{   'checked' }} @endif type="checkbox" name="tresneumococo" id="tresneumococo1" value="Si" >
																		<label class="form-check-label" for="tresneumococo1">
																		3a Neumococo
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>
																
																<div class="col-sm-6 mb-2">
																	<label >18 Meses</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cuarpentavalenteAcelular == "Si") {{   'checked' }} @endif type="checkbox" name="cuarpentavalenteAcelular" id="cuarpentavalenteAcelular1" value="Si" >
																		<label class="form-check-label" for="cuarpentavalenteAcelular1">
																		4a Pentavalente Acelular
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>

																<div class="col-sm-6 mb-2">
																	<label >2 Años</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->dosinfluenzaRefuerzo == "Si") {{   'checked' }} @endif type="checkbox" name="dosinfluenzaRefuerzo" id="dosinfluenzaRefuerzo1" value="Si" >
																		<label class="form-check-label" for="dosinfluenzaRefuerzo1">
																		Influenza Refuerzo Anual (oct-ene)
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>

																<div class="col-sm-6 mb-2">
																	<label >3 Años</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->tresinfluenzaRefuerzo == "Si") {{   'checked' }} @endif type="checkbox" name="tresinfluenzaRefuerzo" id="tresinfluenzaRefuerzo1" value="Si" >
																		<label class="form-check-label" for="tresinfluenzaRefuerzo1">
																		Influenza Refuerzo Anual (oct-ene)
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>

																<div class="col-sm-6 mb-2">
																	<label >4 Años</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->dpt == "Si") {{   'checked' }} @endif type="checkbox" name="dpt" id="dpt1" value="Si" >
																		<label class="form-check-label" for="dpt1">
																		DPT
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cuarinfluenzaRefuerzo == "Si") {{   'checked' }} @endif type="checkbox" name="cuarinfluenzaRefuerzo" id="cuarinfluenzaRefuerzo1" value="Si" >
																		<label class="form-check-label" for="cuarinfluenzaRefuerzo1">
																		Influenza Refuerzo Anual (oct-ene)
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>

																<div class="col-sm-6 mb-2">
																	<label >5 Años</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cinifluenzaRefuerzo == "Si") {{   'checked' }} @endif type="checkbox" name="cinifluenzaRefuerzo" id="cinifluenzaRefuerzo1" value="Si" >
																		<label class="form-check-label" for="cinifluenzaRefuerzo1">
																		Influenza Refuerzo Anual (oct-ene)
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->vop_opv == "Si") {{   'checked' }} @endif type="checkbox" name="vop_opv" id="vop_opv1" value="Si" >
																		<label class="form-check-label" for="vop_opv1">
																		VOP/OPV (Sabin, pollo oral) en 1a y 2 Semana Nal de Salud (después de 2 previas de Pentavalente Acelular)
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>

																<div class="col-sm-6 mb-2">
																	<label >6 Años</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->dossrp == "Si") {{   'checked' }} @endif type="checkbox" name="dossrp" id="dossrp1" value="Si" >
																		<label class="form-check-label" for="dossrp1">
																		2a SRP
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>

																<div class="col-sm-6 mb-2">
																	<label >11 Años / 5to primaria</label>
																</div>
																<div class="col-sm-6">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->vph == "Si") {{   'checked' }} @endif type="checkbox" name="vph" id="vph1" value="Si" >
																		<label class="form-check-label" for="vph1">
																		VPH
																		</label>
																	</div>
																</div>
																<div class="col-sm-12">
																	<hr>
																</div>

																<div class="col-sm-8 mb-2">
																	<label >Otras Vacunas</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->esquema_vacunas_otro == "Si") {{   'checked' }} @endif type="radio" name="esquema_vacunas_otro" id="esquema_vacunas_otro1" value="Si" >
																		<label class="form-check-label" for="esquema_vacunas_otro1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->esquema_vacunas_otro == "No") {{   'checked' }} @endif type="radio" name="esquema_vacunas_otro" id="esquema_vacunas_otro2" value="No">
																		<label class="form-check-label" for="esquema_vacunas_otro2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 form-group" id="p-text-esquema_vacunas_otro"  style="display: none">
																	<textarea class="form-control" name="text_esquema_vacunas_otro" id="text-esquema_vacunas_otro" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_esquema_vacunas_otro }}</textarea>
																</div>
																<div class="col-sm-8 offset-2 mt-4">
																	<button type="button" id="btn-save-esquema-vacuna" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
											<!--- TERMINA ANTECEDENTES ESQUEMA DE VACUNACIÓN -->

											<!--- ANTECEDENTES PSIQUIATRICOS -->
											<div class="row">
												<div class="card col-sm-12 border-left">
													<div class="card-header " data-toggle="collapse" href="#psiqui">
														<div class="card-title">
															<h5 class="text-info" ><i class="fas fa-brain"></i> PSIQUIÁTRICOS</h5>
														</div>
													</div>
													<div class="card-body collapse multi-collapse" id="psiqui">
														<form id="formPsiqui" >
															<div class="row">
																<div class="col-sm-12 text-right mb-3">
																	<a role="button" class="text-info" id="psiqui_no_a_todo" >No a todo</a>
																</div>
																<div class="col-sm-4">
																	<label >Historia Familiar</label>
																</div>
																<div class="col-sm-8 mb-2">
																	<textarea name="historia_familiar" id="historia_familiar" class="form-control" placeholder="Escribe aquí" >{{$paciente->pluck('historial')[0][0]->historia_familiar }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Conciencia de enfermedad</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->conciencia == "Si") {{   'checked' }} @endif type="radio" name="conciencia" id="conciencia1" value="Si" >
																		<label class="form-check-label" for="conciencia1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->conciencia == "No") {{   'checked' }} @endif type="radio" name="conciencia" id="conciencia2" value="No">
																		<label class="form-check-label" for="conciencia2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-4 ">
																	<label >Áreas afectadas por la enfermedad</label>
																</div>
																<div class="col-sm-8 mb-2">
																	<textarea name="psiqui_areas" id="psiqui_areas" class="form-control" placeholder="Escribe aquí" >{{$paciente->pluck('historial')[0][0]->psiqui_areas }}</textarea>
																</div>
																<div class="col-sm-4 ">
																	<label >Tratamientos pasados y actuales</label>
																</div>
																<div class="col-sm-8 mb-2">
																	<textarea name="psiqui_tratamientos" id="psiqui_tratamientos" class="form-control" placeholder="Escribe aquí" >{{$paciente->pluck('historial')[0][0]->psiqui_tratamientos }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Apoyo del grupo familiar o social</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->psiqui_apoyo == "Si") {{   'checked' }} @endif type="radio" name="psiqui_apoyo" id="psiqui_apoyo1" value="Si" >
																		<label class="form-check-label" for="psiqui_apoyo1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->psiqui_apoyo == "No") {{   'checked' }} @endif type="radio" name="psiqui_apoyo" id="psiqui_apoyo2" value="No">
																		<label class="form-check-label" for="psiqui_apoyo2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-4 ">
																	<label >Grupo familiar del paciente</label>
																</div>
																<div class="col-sm-8 mb-2">
																	<textarea name="psiqui_grupo_familiar" id="psiqui_grupo_familiar" class="form-control" placeholder="Escribe aquí" >{{$paciente->pluck('historial')[0][0]->psiqui_grupo_familiar }}</textarea>
																</div>
																<div class="col-sm-4 ">
																	<label >Aspectos de la vida social</label>
																</div>
																<div class="col-sm-8 mb-2">
																	<textarea name="psiqui_vida_social" id="psiqui_vida_social" class="form-control" placeholder="Escribe aquí" >{{$paciente->pluck('historial')[0][0]->psiqui_vida_social }}</textarea>
																</div>
																<div class="col-sm-4">
																	<label >Aspectos de la vida laboral</label>
																</div>
																<div class="col-sm-8  mb-2">
																	<textarea name="psiqui_vida_laboral" id="psiqui_vida_laboral" class="form-control" placeholder="Escribe aquí" >{{$paciente->pluck('historial')[0][0]->psiqui_vida_laboral }}</textarea>
																</div>
																<div class="col-sm-4">
																	<label >Relación con la autoridad</label>
																</div>
																<div class="col-sm-8  mb-2">
																	<textarea name="psiqui_autoridad" id="psiqui_autoridad" class="form-control" placeholder="Escribe aquí" >{{$paciente->pluck('historial')[0][0]->psiqui_autoridad }}</textarea>
																</div>
																<div class="col-sm-4 ">
																	<label >Control de los impulsos</label>
																</div>
																<div class="col-sm-8 mb-2">
																	<textarea name="psiqui_impulsos" id="psiqui_impulsos" class="form-control" placeholder="Escribe aquí" >{{$paciente->pluck('historial')[0][0]->psiqui_impulsos }}</textarea>
																</div>
																<div class="col-sm-4 ">
																	<label >Manejo de frustración en su vida</label>
																</div>
																<div class="col-sm-8 mb-2">
																	<textarea name="psiqui_frustracion" id="psiqui_frustracion" class="form-control" placeholder="Escribe aquí" >{{$paciente->pluck('historial')[0][0]->psiqui_frustracion }}</textarea>
																</div>

																<div class="col-sm-8 offset-2 mt-4">
																	<button type="button" id="btn-save-psiqui" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
																</div>
															</div>
														</form>	
													</div>
												</div>
											</div>
											<!--- TERMINA ANTECEDENTES PSIQUIATRICOS -->

											<!--- DIETA NUTRIOLOGICA -->
											<div class="row">
												<div class="card col-sm-12 border-left">
													<div class="card-header " data-toggle="collapse" href="#dieta">
														<div class="card-title">
															<h5 class="text-info" > <i class="fas fa-utensils"></i> DIETA NUTRIOLÓGICA</h5>
														</div>
													</div>
													<div class="card-body collapse multi-collapse" id="dieta">
														<form id="formNutri">
															<div class="row">
																<div class="col-sm-12 text-right mb-3">
																	<a role="button" class="text-info" id="dieta_no_a_todo" >No a todo</a>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Desayuno</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->desayuno == "Si") {{ 'checked' }} @endif type="radio" name="desayuno" id="desayuno1" value="Si" >
																		<label class="form-check-label" for="desayuno1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->desayuno == "No") {{ 'checked' }} @endif type="radio" name="desayuno" id="desayuno2" value="No">
																		<label class="form-check-label" for="desayuno2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Colación en la mañana</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->colacion == "Si") {{ 'checked' }} @endif type="radio" name="colacion" id="colacion1" value="Si" >
																		<label class="form-check-label" for="colacion1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->colacion == "No") {{ 'checked' }} @endif type="radio" name="colacion" id="colacion2" value="No">
																		<label class="form-check-label" for="colacion2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Comida</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->comida == "Si") {{ 'checked' }} @endif type="radio" name="comida" id="comida1" value="Si" >
																		<label class="form-check-label" for="comida1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->comida == "No") {{ 'checked' }} @endif type="radio" name="comida" id="comida2" value="No">
																		<label class="form-check-label" for="comida2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Colación en la tarde</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->colacion_tarde == "Si") {{ 'checked' }} @endif type="radio" name="colacion_tarde" id="colacion_tarde1" value="Si" >
																		<label class="form-check-label" for="colacion_tarde1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->colacion_tarde == "No") {{ 'checked' }} @endif type="radio" name="colacion_tarde" id="colacion_tarde2" value="No">
																		<label class="form-check-label" for="colacion_tarde2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Cena</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->cena == "Si") {{ 'checked' }} @endif type="radio" name="cena" id="cena1" value="Si" >
																		<label class="form-check-label" for="cena1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->cena == "No") {{ 'checked' }} @endif type="radio" name="cena" id="cena2" value="No">
																		<label class="form-check-label" for="cena2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >¿Alimentos preparados en casa?</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->alimentos_casa == "Si") {{ 'checked' }} @endif type="radio" name="alimentos_casa" id="alimentos_casa1" value="Si" >
																		<label class="form-check-label" for="alimentos_casa1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->alimentos_casa == "No") {{ 'checked' }} @endif type="radio" name="alimentos_casa" id="alimentos_casa2" value="No">
																		<label class="form-check-label" for="alimentos_casa2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-12 mb-2">
																	<label >Nivel de Apetito</label>
																</div>
																<div class="col-sm-12 mb-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->apetito == "Excesivo") {{ 'checked' }} @endif type="radio" name="apetito" id="apetito1" value="Excesivo" >
																		<label class="form-check-label" for="apetito1">
																		Excesivo
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->apetito == "Bueno") {{ 'checked' }} @endif type="radio" name="apetito" id="apetito2" value="Bueno">
																		<label class="form-check-label" for="apetito2">
																		Bueno
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->apetito == "Regular") {{ 'checked' }} @endif type="radio" name="apetito" id="apetito3" value="Regular">
																		<label class="form-check-label" for="apetito3">
																		Regular
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->apetito == "Poco") {{ 'checked' }} @endif type="radio" name="apetito" id="apetito4" value="Poco">
																		<label class="form-check-label" for="apetito4">
																		Poco
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->apetito == "Nulo") {{ 'checked' }} @endif type="radio" name="apetito" id="apetito5" value="Nulo">
																		<label class="form-check-label" for="apetito5">
																		Nulo
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Presencia de hambre-ansiedad</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->hambre == "Si") {{ 'checked' }} @endif type="radio" name="hambre" id="hambre1" value="Si" >
																		<label class="form-check-label" for="hambre1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->hambre == "No") {{ 'checked' }} @endif type="radio" name="hambre" id="hambre2" value="No">
																		<label class="form-check-label" for="hambre2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Vasos de agua al día</label>
																</div>
																<div class="col-sm-4 mb-2">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->vasos == "1 ó menos") {{ 'checked' }} @endif type="radio" name="vasos" id="vasos1" value="1 ó menos" >
																		<label class="form-check-label" for="vasos1">
																		1 ó menos
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->vasos == "2 a 3") {{ 'checked' }} @endif type="radio" name="vasos" id="vasos2" value="2 a 3">
																		<label class="form-check-label" for="vasos2">
																		2 a 3
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->vasos == "4 ó más") {{ 'checked' }} @endif type="radio" name="vasos" id="vasos3" value="4 ó más">
																		<label class="form-check-label" for="vasos3">
																		4 ó más
																		</label>
																	</div>
																</div>
																<div class="col-sm-4 ">
																	<label >Preferencias de alimentos</label>
																</div>
																<div class="col-sm-8 mb-4">
																	<textarea name="prefer_alimentos" id="prefer_alimentos" class="form-control" placeholder="Escribe aquí" > {{ $paciente->pluck('historial')[0][0]->prefer_alimentos }}</textarea>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Malestares por alimentos</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->malestares == "Si") {{ 'checked' }} @endif type="radio" name="malestares" id="malestares1" value="Si" >
																		<label class="form-check-label" for="malestares1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->malestares == "No") {{ 'checked' }} @endif type="radio" name="malestares" id="malestares2" value="No">
																		<label class="form-check-label" for="malestares2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Medicamentos, complementos o suplementos</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->complementos == "Si") {{ 'checked' }} @endif type="radio" name="complementos" id="complementos1" value="Si" >
																		<label class="form-check-label" for="complementos1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->complementos == "No") {{ 'checked' }} @endif type="radio" name="complementos" id="complementos2" value="No">
																		<label class="form-check-label" for="complementos2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Otras dietas realizadas</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->otras_dietas == "Si") {{ 'checked' }} @endif type="radio" name="otras_dietas" id="otras_dietas1" value="Si" >
																		<label class="form-check-label" for="otras_dietas1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->otras_dietas == "No") {{ 'checked' }} @endif type="radio" name="otras_dietas" id="otras_dietas2" value="No">
																		<label class="form-check-label" for="otras_dietas2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-3">
																	<label >Peso ideal</label>
																</div>
																<div class="col-sm-4 mb-3">
																	<input type="text" class="form-control" placeholder="kg" name="peso_ideal" id="peso_ideal" value="{{ $paciente->pluck('historial')[0][0]->peso_ideal }}" />
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Padecimiento atual relacionado al peso</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->padecimiento_peso == "Si") {{ 'checked' }} @endif type="radio" name="padecimiento_peso" id="padecimiento_peso1" value="Si" >
																		<label class="form-check-label" for="padecimiento_peso1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->padecimiento_peso == "No") {{ 'checked' }} @endif type="radio" name="padecimiento_peso" id="padecimiento_peso2" value="No">
																		<label class="form-check-label" for="padecimiento_peso2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Antecedentes personales relacionados al peso</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->antecedentes_peso == "Si") {{ 'checked' }} @endif type="radio" name="antecedentes_peso" id="antecedentes_peso1" value="Si" >
																		<label class="form-check-label" for="antecedentes_peso1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->antecedentes_peso == "No") {{ 'checked' }} @endif type="radio" name="antecedentes_peso" id="antecedentes_peso2" value="No">
																		<label class="form-check-label" for="antecedentes_peso2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Consumo de liquidos</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->consumo_liquidos == "Si") {{ 'checked' }} @endif type="radio" name="consumo_liquidos" id="consumo_liquidos1" value="Si" >
																		<label class="form-check-label" for="consumo_liquidos1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->consumo_liquidos == "No") {{ 'checked' }} @endif type="radio" name="consumo_liquidos" id="consumo_liquidos2" value="No">
																		<label class="form-check-label" for="consumo_liquidos2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-8 mb-2">
																	<label >Educación Nutriológica</label>
																</div>
																<div class="col-sm-4">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->educacion_nutri == "Si") {{ 'checked' }} @endif type="radio" name="educacion_nutri" id="educacion_nutri1" value="Si" >
																		<label class="form-check-label" for="educacion_nutri1">
																		Si
																		</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input"  @if ($paciente->pluck('historial')[0][0]->educacion_nutri == "No") {{ 'checked' }} @endif type="radio" name="educacion_nutri" id="educacion_nutri2" value="No">
																		<label class="form-check-label" for="educacion_nutri2">
																		No
																		</label>
																	</div>
																</div>
																<div class="col-sm-4 mb-2">
																	<label >Otros</label>
																</div>
																<div class="col-sm-8">
																	<textarea name="nutri_otros" id="nutri_otros" class="form-control" placeholder="Escribe aquí" > {{$paciente->pluck('historial')[0][0]->nutri_otros }} </textarea>
																</div>
																<div class="col-sm-8 offset-2 mt-4">
																	<button type="button" id="btn-save-nutri" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
											<!--- TERMINA DIETA NUTRIOLOGICA -->
					
										</div>

										<div class="col-sm-6">
											{{-- VACUNAS --}}
											<div class="card col-sm-12">
												<div class="card-header">
													<div class="card-title">
														<h5 class="text-info" > <i class="fas fa-syringe" ></i> VACUNAS</h5>
													</div>
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col-sm-12">
															<div id="vacunas_conocidas">
																@foreach($paciente[0]->vacunas()->get() as $vacuna)
																	<label style="padding: 5px 10px 5px 10px;" for='s-vacuna' id='s-vacuna{{ $vacuna->id }}' class='badge badge-info m-1 s-vacuna'> <input disabled type='hidden' checked  value='{{ $vacuna->id }}' >{{ $vacuna->vacuna }} </label><i class='fas fa-trash text-danger ' onclick="eliminar_vacuna(this)" data-id="{{ $vacuna->id }}" > </i> 
																@endforeach
															</div>
															<div id="panel-vacunas"  >
																<label for="buscar_vacuna" class="text-secondary text-sm">Buscar vacuna</label>

																<div class="input-group mb-2" >
																		<input type="text" placeholder="Comienza a escribir algo para buscar" class="form-control" name="buscar_vacuna" id="buscar_vacuna"  >
																		<div class="input-group-append ">
																			<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-search"></i></span>
																		</div>
																</div>
																
																<div id="panel-store-vacunas" >
																<div class="col-sm-12">
																	<div id="select_vacuna" >
																	</div>
																</div>
																<div class="col-sm-12">
																	<div id="btn_select_vacuna" class="text-center" style="display: none" >
																		<button type="button" id="btn-store-vacunas" class="btn btn-sm btn-primary mb-2" > <i class="fas fa-save" ></i> Guardar</button>
																	</div>
																</div>									</div>	
																
																<label for="otras_vacuna" class="text-secondary text-sm">Otras vacunas</label>	
																<div class="input-group" >
																	
																	<input type="text" name="otras_vacunas" id="otras_vacunas" class="form-control" placeholder="Escribe algo" />
																	<div class="input-group-append ">
																		<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-plus"></i></span>
																	</div>
																</div>
																<div id="btn-guardar-nueva-vacuna" class="mt-3 text-center" style="display: none;">
																	<button type="button" id="btn-new-vacuna" class="btn btn-sm btn-info"> <i class="fas fa-plus" ></i> Añadir Nueva</button>
																</div>
															</div>
														</div>
													
														</div>
												</div>
											</div>

											{{-- MEDICAMENTOS --}}
											<div class="card col-sm-12">
												<div class="card-header">
													<div class="card-title">
														<h5 class="text-info" > <i class="fas fa-tablets" ></i> MEDICAMENTOS ACTIVOS</h5>
													</div>
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col-sm-12">
															<div id="medis_conocidas">
																@foreach($paciente[0]->medis()->get() as $medi)
																	<label style="padding: 5px 10px 5px 10px;" for='s-medi' id='s-medi{{ $medi->id }}' class='badge badge-info m-1 s-medi'> <input disabled type='hidden' checked  value='{{ $medi->id }}' >{{ $medi->medicamento }} </label><i class='fas fa-trash text-danger ' onclick="eliminar_medi(this)" data-id="{{ $medi->id }}" > </i> 
																@endforeach
															</div>
															<div id="panel-medis"  >
																<label for="buscar_medi" class="text-secondary text-sm">Buscar medicamento</label>

																<div class="input-group mb-2" >
																		<input type="text" placeholder="Comienza a escribir algo para buscar" class="form-control" name="buscar_medi" id="buscar_medi"  >
																		<div class="input-group-append ">
																			<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-search"></i></span>
																		</div>
																</div>
																
																<div id="panel-store-medis" >
																<div class="col-sm-12">
																	<div id="select_medi" >
																	</div>
																</div>
																<div class="col-sm-12">
																	<div id="btn_select_medi" class="text-center" style="display: none" >
																		<button type="button" id="btn-store-medis" class="btn btn-sm btn-primary mb-2" > <i class="fas fa-save" ></i> Guardar</button>
																	</div>
																</div>									</div>	
																
																<label for="otros_medi" class="text-secondary text-sm">Otros Medicamentos</label>	
																<div class="input-group" >
																	
																	<input type="text" name="otros_medis" id="otros_medis" class="form-control" placeholder="Escribe algo" />
																	<div class="input-group-append ">
																		<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-plus"></i></span>
																	</div>
																</div>
																<div id="btn-guardar-nueva-medi" class="mt-3 text-center" style="display: none;">
																	<button type="button" id="btn-new-medi" class="btn btn-sm btn-info"> <i class="fas fa-plus" ></i> Añadir Nueva</button>
																</div>
															</div>
														</div>
														
														</div>
												</div>
											</div>

											{{-- ARCHIVOS --}}
											<div class="card col-sm-12">
												<div class="card-header">
													<div class="card-title">
														<h5 class="text-info" > <i class="fas fa-file" ></i> ARCHIVOS</h5>
													</div>
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col-sm-12">
															<input type="file" class="form-control" >
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							  </div>
							  <div class="tab-pane fade" id="btn-padelo" data="1" role="tabpanel" aria-labelledby="pade-tab">
								<h4>Notas de Padecimiento</h4>
								<div style="width:100%; height:500px; overflow: scroll; overflow-x: hidden;" >
									<div class="row">
										{{-- SIGNOS VITALES --}}
										<div class="col-sm-6">
											<div class="card">
												<div class="card-header">
													<div class="card-title">
														<h5 class="text-info" > <i class="fas fa-heartbeat" ></i> SIGNOS VITALES</h5>
													</div>
												</div>
												<div class="card-body">
													<form method="post" action="{{ route('store-signos') }}">
														{{ csrf_field() }}
														<input type="hidden" name="paciente_id" value="{{ $paciente->pluck('id')[0] }}" >
														<div class="col-sm-12">
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"> <i class="fas fa-ruler-vertical text-info" ></i> Estatura</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->estatura }}" class="form-control" id="estatura-signos" name="estatura" placeholder="m" maxlength="3" min="100"  >
																	
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	
																	<label class="col-form-label "> <i class="fas fa-weight text-info" ></i> Peso</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->peso }}" class="form-control" id="peso-signos" name="peso" placeholder="Kg" maxlength="3"  >
																	
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"> <i class="fas fa-male text-info" ></i> Indice  Masa Corporal</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="hidden" id="masa_corporal" name="masa_corporal" value="{{ $paciente->pluck('historial')[0][0]->masa_corporal ?? '' }}" >
																	<label id="masa-corporal-label">{{ $paciente->pluck('historial')[0][0]->masa_corporal ?? '' }} kg/m2</label>
																</div>
																<div class="col-sm-12" hidden >
																	<small class="text-danger">Llena la estatura y la masa corporal</small>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"> <i class="fas fa-thermometer-three-quarters text-info" ></i> Temperatura</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->temperatura ?? '' }}" name="temperatura" class="form-control form-control-sm" placeholder="°C" maxlength="3"   >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"><i class="fas fa-walking text-info"></i> Frecuencia Respiratoria</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->frec_respiratoria ?? '' }}" class="form-control form-control-sm" placeholder="r/m" name="frec_respiratoria" maxlength="3"   >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"> <i class="fas fa-heartbeat text-info" ></i> Sistólica</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->sistolica ?? '' }}" class="form-control form-control-sm" placeholder="mmHg" name="sistolica" maxlength="3"   >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"> <i class="fas fa-heartbeat text-info" ></i> Diastólica</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->diastolica ?? '' }}" class="form-control form-control-sm" placeholder="mmHg" name="diastolica" maxlength="3"  >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"> <i class="fas fa-heart text-info" ></i> Frecuencia Cardiaca</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->frec_cardiaca ?? '' }}" class="form-control form-control-sm" placeholder="bpm" name="frec_cardiaca"  maxlength="3"  >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"> <i class="fas fa-user-alt text-info" ></i> Porcentaje de Grasa Corporal</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->grasa_corporal ?? '' }}" class="form-control form-control-sm" placeholder="%" name="grasa_corporal"  maxlength="3"  >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"> <i class="fas fa-user text-info" ></i>IMC</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->masa_muscular ?? '' }}" class="form-control form-control-sm" placeholder="%" name="masa_muscular"  maxlength="3"  >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"> <i class="fas fa-smile text-info" ></i> Perimetro Cefálico</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->cefalico ?? '' }}" class="form-control form-control-sm" placeholder="cm" name="cefalico" maxlength="3"  >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-9">
																	<label class="col-form-label"> <i class="fas fa-stethoscope text-info" ></i> Saturación de Oxigeno</label>
																</div>
																<div class="col-sm-3 row" >
																	<input type="number" value="{{ $paciente->pluck('historial')[0][0]->sat_oxigeno ?? '' }}" class="form-control form-control-sm" placeholder="mmHg" name="sat_oxigeno"  maxlength="3"  >
																</div>
															</div>
															<div class="col-sm-12 mt-4">
																<button type="submit" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
										{{-- TERMINA SIGNOS VITALES --}}
										<div class="col-sm-6">
											{{-- ARCHIVOS --}}

											<div class="card col-sm-12">
												<div class="card-header">
													<div class="card-title">
														<h5 class="text-info" > <i class="fas fa-file" ></i> RESULTADOS DE LABORATORIO</h5>
													</div>
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col-sm-12">
															<input type="file" class="form-control" >
														</div>
													</div>
												</div>
											</div>
											{{-- TERMINA ARCHIVOS --}}

											{{-- HEMOGRAMA, CONTEO SANGUÍNEO COMPLETO--}}
											<div class="card">
												<div class="card-header">
													<div class="card-title">
														<h5 class="text-info" > <i class="fas fa-heartbeat" ></i> HEMOGRAMA, CONTEO SANGUÍNEO COMPLETO</h5>
													</div>
												</div>
												<div class="card-body">
													<form method="post" action="{{ route('store-signos') }}">
														{{ csrf_field() }}
														<input type="hidden" name="paciente_id" value="{{ $paciente->pluck('id')[0] }}" >
														<div class="col-sm-12">
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label"> Eritrocitos</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" value="" class="form-control" id="eritrocitos" name="eritrocitos" placeholder="x10^6/μL" maxlength="3" min="100"  >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label"> Hematrocito</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" value="" class="form-control" id="eritrocitos" name="eritrocitos" placeholder="%" maxlength="3"   >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label"> Hemoglobina</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" value="" class="form-control" id="hemoglobina" name="hemoglobina" placeholder="d/dL" maxlength="3"   >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label"> Leucocitos</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" value="" class="form-control" id="Leucocitos" name="Leucocitos" placeholder="x10^3/μL" maxlength="3"   >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label"> Plaquetas</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" value="" class="form-control" id="plaquetas" name="plaquetas" placeholder="x10^3/μL" maxlength="3"   >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label"> Reticulocitos</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" value="" class="form-control" id="reticulocitos" name="reticulocitos" placeholder="" maxlength="3"   >
																</div>
															</div>
															
															<div class="col-sm-12 mt-4">
																<button type="submit" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							  </div>
							  <div class="tab-pane fade" id="nutri" role="tabpanel" aria-labelledby="nutri-tab">
								<h4>Nutrición</h4>
								<div style="width:100%; height:500px; overflow: scroll; overflow-x: hidden;" >
									<div class="row">
										<div class="col-sm-12">
											<div class="card">
												<div class="card-header">
													<div class="card-title">
														<h5 class="text-info" > <i class="fas fa-heartbeat" ></i> SEGUIMIENTO</h5>
													</div>
												</div>
												<div class="card-body">
													<form method="post" action="{{ route('store-signos') }}">
														{{ csrf_field() }}
														<input type="hidden" name="paciente_id" value="{{ $paciente->pluck('id')[0] }}" >
														<div class="row">
														<div class="col-sm-6">
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label"> Peso Perdido</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" class="form-control" id="perso_perdido" name="perso_perdido"  maxlength="3"  >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label">  Grasa</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" class="form-control" id="grasa" name="grasa"  maxlength="3"  >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label">  Cintura</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" class="form-control" id="cintura" name="cintura"  maxlength="3"  >
																</div>
															</div>
															
														</div>
														<div class="col-sm-6">
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label">Agua</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" class="form-control" id="agua" name="agua"  maxlength="3"  >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label">Músculo</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" class="form-control" id="musculo" name="musculo"  maxlength="3"  >
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-7">
																	<label class="col-form-label">Abdomen</label>
																</div>
																<div class="col-sm-5 row" >
																	<input type="number" class="form-control" id="abdomen" name="abdomen"  maxlength="3"  >
																</div>
															</div>
															
														</div>
														</div>
														<div class="col-sm-12 mt-4">
															<button type="submit" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="card">
												<div class="card-header">
													<div class="card-title">
														<h5 class="text-info" > <i class="fas fa-heartbeat" ></i> CETOSIS</h5>
													</div>
												</div>
												<div class="card-body">
													<form method="post" action="{{ route('store-signos') }}">
														{{ csrf_field() }}
														<input type="hidden" name="paciente_id" value="{{ $paciente->pluck('id')[0] }}" >
														<div class="row">
														<div class="col-sm-6">
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Saciedad</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="saciedad" id="saciedad0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="saciedad" id="saciedad1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="saciedad" id="saciedad2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="saciedad" id="saciedad3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="saciedad" id="saciedad4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="saciedad" id="saciedad5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Calambres</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="calambres" id="calambres0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="calambres" id="calambres1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="calambres" id="calambres2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="calambres" id="calambres3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="calambres" id="calambres4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="calambres" id="calambres5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Diarrea</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="diarrea" id="diarrea0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="diarrea" id="diarrea1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="diarrea" id="diarrea2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="diarrea" id="diarrea3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="diarrea" id="diarrea4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="diarrea" id="diarrea5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Deprimido</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="deprimido" id="deprimido0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="deprimido" id="deprimido1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="deprimido" id="deprimido2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="deprimido" id="deprimido3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="deprimido" id="deprimido4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="deprimido" id="deprimido5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Tolerancia</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="tolerancia" id="tolerancia0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="tolerancia" id="tolerancia1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="tolerancia" id="tolerancia2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="tolerancia" id="tolerancia3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="tolerancia" id="tolerancia4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="tolerancia" id="tolerancia5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Estreñimiento</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="estrenimiento" id="estrenimiento0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="estrenimiento" id="estrenimiento1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="estrenimiento" id="estrenimiento2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="estrenimiento" id="estrenimiento3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="estrenimiento" id="estrenimiento4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="estrenimiento" id="estrenimiento5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Vertigo</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="vertigo" id="vertigo0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="vertigo" id="vertigo1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="vertigo" id="vertigo2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="vertigo" id="vertigo3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="vertigo" id="vertigo4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="vertigo" id="vertigo5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Ansiedad</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="ansiedad" id="ansiedad0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="ansiedad" id="ansiedad1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="ansiedad" id="ansiedad2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="ansiedad" id="ansiedad3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="ansiedad" id="ansiedad4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="ansiedad" id="ansiedad5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Irritabilidad</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="irrita" id="irrita0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="irrita" id="irrita1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="irrita" id="irrita2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="irrita" id="irrita3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="irrita" id="irrita4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="irrita" id="irrita5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Control de Impulsos</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="control_imp" id="control_imp0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="control_imp" id="control_imp1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="control_imp" id="control_imp2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="control_imp" id="control_imp3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="control_imp" id="control_imp4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="control_imp" id="control_imp5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															
														</div>
														<div class="col-sm-6">
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Halitosis</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="halitosis" id="halitosis0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="halitosis" id="halitosis1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="halitosis" id="halitosis2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="halitosis" id="halitosis3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="halitosis" id="halitosis4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="halitosis" id="halitosis5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Hambre</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="hambre" id="hambre0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="hambre" id="hambre1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="hambre" id="hambre2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="hambre" id="hambre3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="hambre" id="hambre4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="hambre" id="hambre5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Problemas de Sueño</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="sueno" id="sueno0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="sueno" id="sueno1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="sueno" id="sueno2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="sueno" id="sueno3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="sueno" id="sueno4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="sueno" id="sueno5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Impaciente</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="impaciente" id="impaciente0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="impaciente" id="impaciente1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="impaciente" id="impaciente2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="impaciente" id="impaciente3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="impaciente" id="impaciente4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="impaciente" id="impaciente5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Necesidad de Estimulantes</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="estimulantes" id="estimulantes0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="estimulantes" id="estimulantes1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="estimulantes" id="estimulantes2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="estimulantes" id="estimulantes3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="estimulantes" id="estimulantes4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="estimulantes" id="estimulantes5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Migraña o Cefalea</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="migrana" id="migrana0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="migrana" id="migrana1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="migrana" id="migrana2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="migrana" id="migrana3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="migrana" id="migrana4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="migrana" id="migrana5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Cansancio</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="cansancio" id="cansancio0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="cansancio" id="cansancio1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="cansancio" id="cansancio2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="cansancio" id="cansancio3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="cansancio" id="cansancio4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="cansancio" id="cansancio5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Concentración</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="concentracion" id="concentracion0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="concentracion" id="concentracion1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="concentracion" id="concentracion2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="concentracion" id="concentracion3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="concentracion" id="concentracion4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="concentracion" id="concentracion5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-4">
																	<label class="col-form-label">Agresividad</label>
																</div>
																<div class="col-sm-8 row" >
																	<div class="form-check form-check-inline">
																		<input  type="radio" name="agresividad" id="agresividad0" value="0">
																		<label class="form-check-label" >0</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="agresividad" id="agresividad1" value="1">
																		<label class="form-check-label" >1</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="agresividad" id="agresividad2" value="2">
																		<label class="form-check-label" >2</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="agresividad" id="agresividad3" value="3">
																		<label class="form-check-label" >3</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="agresividad" id="agresividad4" value="4">
																		<label class="form-check-label" >4</label>
																	  </div>
																	  <div class="form-check form-check-inline">
																		<input  type="radio" name="agresividad" id="agresividad5" value="5">
																		<label class="form-check-label" >5</label>
																	  </div>
																</div>
															</div>
															
														</div>
														</div>
														<div class="col-sm-12 mt-4">
															<button type="submit" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							  </div>
							  <div class="tab-pane fade" id="explo" role="tabpanel" aria-labelledby="explo-tab">
								<h4>Exploración Topográfica</h4>
								<div style="width:100%; height:500px; overflow: scroll; overflow-x: hidden;" >
									<div class="row">
										<div class="col-sm-12">
											<div class="card">
												<div class="card-header">
													<div class="card-title">
														<h5 class="text-info" > <i class="fas fa-heartbeat" ></i> EXPLORACIÓN TOPOGRÁFICA</h5>
													</div>
												</div>
												<div class="card-body">
													<form method="post" action="{{ route('store-signos') }}">
														{{ csrf_field() }}
														<input type="hidden" name="paciente_id" value="{{ $paciente->pluck('id')[0] }}" >
														<div class="row">
														<div class="col-sm-6">
															<div class="form-group row">
																<select name="exploracion" class="form-control" id="exploracion">
																	<option value="">Seleccione:</option>
																	<option value="Cabeza parte Frontal">Cabeza parte Frontal</option>
																	<option value="Cabeza Parte Posterior">Cabeza Parte Posterior</option>
																	<option value="Cuello Parte Frontal">Cuello Parte Frontal</option>
																	<option value="Cuello Frontal">Cuello Frontal</option>
																	<option value="Cuello Posterior">Cuello Posterior</option>
																	<option value="Extremidad Superior Izquierda Parte Frontal">Extremidad Superior Izquierda Parte Frontal</option>
																	<option value="Extremidad Superior Izquierda Parte Posterior">Extremidad Superior Izquierda Parte Posterior</option>
																	<option value="Extremidad Superior Derecha Parte Frontal">Extremidad Superior Derecha Parte Frontal</option>
																	<option value="Tronco Parte Frontal">Tronco Parte Frontal</option>
																	<option value="Tronco Parte Posterior">Tronco Parte Posterior</option>
																	<option value="Extremidad Inferior Izquierda Parte Frontal">Extremidad Inferior Izquierda Parte Frontal</option>
																	<option value="Extremidad Inferior Izquierda Parte Posterior">Extremidad Inferior Izquierda Parte Posterior</option>
																	<option value="Extremidad Inferior Derecha Parte Frontal">Extremidad Inferior Derecha Parte Frontal</option>
																	<option value="Extremidad Inferior Derecha Parte Posterior">Extremidad Inferior Derecha Parte Posterior</option>
																	<option value="Zona Pélvica Frontal">Zona Pélvica Frontal</option>
																	<option value="Zona Pélvica Posterior">Zona Pélvica Posterior</option>
																	


																</select>
															</div>
															
														</div>
														</div>
														<div class="col-sm-12 mt-4">
															<button type="submit" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							  </div>
							  <div class="tab-pane fade" id="odonto" role="tabpanel" aria-labelledby="odonto-tab">
								<h4>Odontograma</h4>
								<div style="width:100%; height:500px; overflow: scroll; overflow-x: hidden;" >
									<div class="row">
										
									</div>
								</div>
							  </div>
							  <div class="tab-pane fade" id="exa" role="tabpanel" aria-labelledby="exa-tab">
								<h4>Examen Físico</h4>
								<div style="width:100%; height:500px; overflow: scroll; overflow-x: hidden;" >
									<div class="row">
										
									</div>
								</div>
							  </div>
							  <div class="tab-pane fade" id="diagno" role="tabpanel" aria-labelledby="diagno-tab">
								<h4>Diagnóstico y Tratamiento</h4>
								<div style="width:100%; height:500px; overflow: scroll; overflow-x: hidden;" >
									<div class="row">
										
									</div>
								</div>
							  </div>
							  <div class="tab-pane fade" id="cargos" role="tabpanel" aria-labelledby="cargos-tab">
								<h4>Cargos</h4>
								<div style="width:100%; height:500px; overflow: scroll; overflow-x: hidden;" >
									<div class="row">
										
									</div>
								</div>
							  </div>
			  
							</div>
							<!-- Tabs content -->


						</div>
					</div>
				</div>
				{{-- TERMINA TABS CONSULTA --}}
				{{-- NOTAS INTERNAS --}}
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">
								<h5 class="text-info"  > <i class="fas fa-sticky-note" ></i> NOTAS INTERNAS</h5>
							</div>
						</div>
						<div class="card-body">
							<form method="post" class="text-center" action="{{ route('store-notas-internas') }}">
								{{ csrf_field() }}
							<input type="hidden" name="paciente_id" value="{{ $paciente->pluck('id')[0] }}" >
							<textarea name="notas_internas" class="form-control" id="" rows="5" placeholder="Escribe aqui...">{{ $paciente->pluck('historial')[0][0]->notas_internas }}</textarea>

							<button type="submit" class="btn btn-sm text-info text-center" >Guardar</button>
							</form>
						</div>
					</div>
				</div>
				{{-- TERMINA  NOTAS INTERNAS --}}
				

				@if($paciente->pluck('sexo')[0] == "Femenino")
				<!--- ANTECEDENTES GINECO-OBSTETRICOS -->
				<div class="col-sm-12">
					<div class="card col-sm-12 border-left">
						<div class="card-header " data-toggle="collapse" href="#gineco">
							<div class="card-title">
								<h5 class="text-info" ><i class="fas fa-female"></i> GINECO-OBSTETRICOS</h5>
							</div>
						</div>
						<div class="card-body collapse multi-collapse" id="gineco">
							<form id="formGineco">
								<div class="row">
									<div class="col-sm-12 text-right mb-3">
										<a role="button" class="text-info" id="gineco_no_a_todo" >No a todo</a>
									</div>
									<div class="col-sm-12">
										<label >Fecha de primera menstruación</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											
											<input type="date" class="form-control" name="primera_menstruacion" id="primera_menstruacion" value="{{ old('primera_menstruacion') ?? $paciente->pluck('historial')[0][0]->primera_menstruacion  }}" >
										</div>
									</div>

									<div class="col-sm-12">
										<label >Fecha de última menstruación</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											
											<input type="date" class="form-control" name="ultima_menstruacion" id="ultima_menstruacion" value="{{ old('ultima_menstruacion') ?? $paciente->pluck('historial')[0][0]->ultima_menstruacion  }}" >
										</div>
									</div>

									<div class="col-sm-12">
										<label >Características Menstruación</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											
											<input type="text" class="form-control" name="caracteristicas_menstruacion" id="caracteristicas_menstruacion" value="{{ old('caracteristicas_menstruacion') ?? $paciente->pluck('historial')[0][0]->caracteristicas_menstruacion  }}" >
										</div>
									</div>
									<div class="col-sm-12">
										<label >Número de parejas sexuales</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											
											<input type="number" class="form-control" name="parejas_sexuales" id="parejas_sexuales" value="{{ old('parejas_sexuales') ?? $paciente->pluck('historial')[0][0]->parejas_sexuales  }}" >
										</div>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Embarazos</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->embarazos == "Si") {{   'checked' }} @endif type="radio" name="embarazos" id="embarazos1" value="Si" >
											<label class="form-check-label" for="embarazos1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->embarazos == "No") {{   'checked' }} @endif type="radio" name="embarazos" id="embarazos2" value="No">
											<label class="form-check-label" for="embarazos2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-embarazos"  style="display: none">
										<textarea class="form-control" name="text_embarazos" id="text-embarazos" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_embarazos }}</textarea>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Partos</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->partos == "Si") {{   'checked' }} @endif type="radio" name="partos" id="partos1" value="Si" >
											<label class="form-check-label" for="partos1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->partos == "No") {{   'checked' }} @endif type="radio" name="partos" id="partos2" value="No">
											<label class="form-check-label" for="partos2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-partos"  style="display: none">
										<textarea class="form-control" name="text_partos" id="text-partos" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_partos }}</textarea>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Abortos</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->abortos == "Si") {{   'checked' }} @endif type="radio" name="abortos" id="abortos1" value="Si" >
											<label class="form-check-label" for="abortos1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->abortos == "No") {{   'checked' }} @endif type="radio" name="abortos" id="abortos2" value="No">
											<label class="form-check-label" for="abortos2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-abortos"  style="display: none">
										<textarea class="form-control" name="text_abortos" id="text-abortos" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_abortos }}</textarea>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Cesáreas</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cesareas == "Si") {{   'checked' }} @endif type="radio" name="cesareas" id="cesareas1" value="Si" >
											<label class="form-check-label" for="cesareas1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cesareas == "No") {{   'checked' }} @endif type="radio" name="cesareas" id="cesareas2" value="No">
											<label class="form-check-label" for="cesareas2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-cesareas"  style="display: none">
										<textarea class="form-control" name="text_cesareas" id="text-cesareas" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_cesareas }}</textarea>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Cáncer Cérvico</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cancer_cervico == "Si") {{   'checked' }} @endif type="radio" name="cancer_cervico" id="cancer_cervico1" value="Si" >
											<label class="form-check-label" for="cancer_cervico1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cancer_cervico == "No") {{   'checked' }} @endif type="radio" name="cancer_cervico" id="cancer_cervico2" value="No">
											<label class="form-check-label" for="cancer_cervico2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-cancer_cervico"  style="display: none">
										<textarea class="form-control" name="text_cancer_cervico" id="text-cancer_cervico" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_cancer_cervico }}</textarea>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Cáncer Uterino</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cancer_uterino == "Si") {{   'checked' }} @endif type="radio" name="cancer_uterino" id="cancer_uterino1" value="Si" >
											<label class="form-check-label" for="cancer_uterino1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cancer_uterino == "No") {{   'checked' }} @endif type="radio" name="cancer_uterino" id="cancer_uterino2" value="No">
											<label class="form-check-label" for="cancer_uterino2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-cancer_uterino"  style="display: none">
										<textarea class="form-control" name="text_cancer_uterino" id="text-cancer_uterino" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_cancer_uterino }}</textarea>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Cáncer Mama</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cancer_mama == "Si") {{   'checked' }} @endif type="radio" name="cancer_mama" id="cancer_mama1" value="Si" >
											<label class="form-check-label" for="cancer_mama1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->cancer_mama == "No") {{   'checked' }} @endif type="radio" name="cancer_mama" id="cancer_mama2" value="No">
											<label class="form-check-label" for="cancer_mama2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-cancer_mama"  style="display: none">
										<textarea class="form-control" name="text_cancer_mama" id="text-cancer_mama" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_cancer_mama }}</textarea>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Actividad sexual del paciente</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->actividad_sexual == "Si") {{   'checked' }} @endif type="radio" name="actividad_sexual" id="actividad_sexual1" value="Si" >
											<label class="form-check-label" for="actividad_sexual1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->actividad_sexual == "No") {{   'checked' }} @endif type="radio" name="actividad_sexual" id="actividad_sexual2" value="No">
											<label class="form-check-label" for="actividad_sexual2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-actividad_sexual"  style="display: none">
										<textarea class="form-control" name="text_actividad_sexual" id="text-actividad_sexual" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_actividad_sexual }}</textarea>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Método de Planificación Familiar</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->metodo_familiar == "Si") {{   'checked' }} @endif type="radio" name="metodo_familiar" id="metodo_familiar1" value="Si" >
											<label class="form-check-label" for="metodo_familiar1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->metodo_familiar == "No") {{   'checked' }} @endif type="radio" name="metodo_familiar" id="metodo_familiar2" value="No">
											<label class="form-check-label" for="metodo_familiar2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-metodo_familiar"  style="display: none">
										<textarea class="form-control" name="text_metodo_familiar" id="text-metodo_familiar" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_metodo_familiar }}</textarea>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Terapia de reemplazo hormonal</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->terapia_hormonal == "Si") {{   'checked' }} @endif type="radio" name="terapia_hormonal" id="terapia_hormonal1" value="Si" >
											<label class="form-check-label" for="terapia_hormonal1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->terapia_hormonal == "No") {{   'checked' }} @endif type="radio" name="terapia_hormonal" id="terapia_hormonal2" value="No">
											<label class="form-check-label" for="terapia_hormonal2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-terapia_hormonal"  style="display: none">
										<textarea class="form-control" name="text_terapia_hormonal" id="text-terapia_hormonal" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_terapia_hormonal }}</textarea>
									</div>
									<div class="col-sm-12">
										<label >Último Papanicolau</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<input type="date" class="form-control" name="papanicolau" id="papanicolau" value="{{ old('papanicolau') ?? $paciente->pluck('historial')[0][0]->papanicolau  }}" >
										</div>
									</div>
									<div class="col-sm-12">
										<label >Último Mastografía</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<input type="date" class="form-control" name="mastografia" id="mastografia" value="{{ old('mastografia') ?? $paciente->pluck('historial')[0][0]->mastografia  }}" >
										</div>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Otros</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->otros_gineco == "Si") {{   'checked' }} @endif type="radio" name="otros_gineco" id="otros_gineco1" value="Si" >
											<label class="form-check-label" for="otros_gineco1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->otros_gineco == "No") {{   'checked' }} @endif type="radio" name="otros_gineco" id="otros_gineco2" value="No">
											<label class="form-check-label" for="otros_gineco2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-otros_gineco"  style="display: none">
										<textarea class="form-control" name="text_otros_gineco" id="text-otros_gineco" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_otros_gineco }}</textarea>
									</div>



									<div class="col-sm-8 offset-2 mt-4">
										<button type="button" id="btn-save-gineco" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--- TERMINA ANTECEDENTES GINECO-OBSTETRICOS -->
				<!--- ANTECEDENTES PERINATALES -->
				<div class="col-sm-12">
					<div class="card col-sm-12 border-left">
						<div class="card-header " data-toggle="collapse" href="#perinatales">
							<div class="card-title">
								<h5 class="text-info" ><i class="fas fa-female"></i> PERINATALES</h5>
							</div>
						</div>
						<div class="card-body collapse multi-collapse" id="perinatales">
							<form id="formPerinatal">
								<div class="row">
									<div class="col-sm-12 text-right mb-3">
										<a role="button" class="text-info" id="perinatal_no_a_todo" >No a todo</a>
									</div>
									<div class="col-sm-12">
										<label >Último ciclo menstrual</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<input type="date" class="form-control" name="ultimo_ciclo_menstrual" id="ultimo_ciclo_menstrual" value="{{ old('ultimo_ciclo_menstrual') ?? $paciente->pluck('historial')[0][0]->ultimo_ciclo_menstrual  }}" >
										</div>
									</div>

									<div class="col-sm-12">
										<label >Duración ciclo</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<input type="text" class="form-control" name="duracion_ciclo" id="duracion_ciclo" value="{{ old('duracion_ciclo') ?? $paciente->pluck('historial')[0][0]->duracion_ciclo  }}" >
										</div>
									</div>
									<div class="col-sm-12">
										<label >Último método anticonceptivo usado</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<input type="text" class="form-control" name="ultimo_metodo_anti" id="ultimo_metodo_anti" value="{{ old('ultimo_metodo_anti') ?? $paciente->pluck('historial')[0][0]->ultimo_metodo_anti  }}" >
										</div>
									</div>
									<div class="col-sm-7 mb-2">
										<label >Concepción asistida</label>
									</div>
									<div class="col-sm-5">
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->concepcion_asistida == "Si") {{   'checked' }} @endif type="radio" name="concepcion_asistida" id="concepcion_asistida1" value="Si" >
											<label class="form-check-label" for="concepcion_asistida1">
											Si
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->concepcion_asistida == "No") {{   'checked' }} @endif type="radio" name="concepcion_asistida" id="concepcion_asistida2" value="No">
											<label class="form-check-label" for="concepcion_asistida2">
											No
											</label>
										</div>
									</div>
									<div class="col-sm-12 form-group" id="p-text-concepcion_asistida"  style="display: none">
										<textarea class="form-control" name="text_concepcion_asistida" id="text-concepcion_asistida" cols="4" rows="2" placeholder="Escribe aquí..." >{{ $paciente->pluck('historial')[0][0]->text_concepcion_asistida }}</textarea>
									</div>
									<div class="col-sm-12">
										<label >Fecha probable de parto por UCM</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<input type="date" class="form-control" name="fecha_ucm" id="fecha_ucm" value="{{ old('fecha_ucm') ?? $paciente->pluck('historial')[0][0]->fecha_ucm  }}" >
										</div>
									</div>
									<div class="col-sm-12">
										<label >FPP Final</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<input type="text" class="form-control" name="fpp_final" id="fpp_final" value="{{ old('fpp_final') ?? $paciente->pluck('historial')[0][0]->fpp_final  }}" >
										</div>
									</div>
									<div class="col-sm-12">
										<label >Notas sobre el embarazo</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<textarea name="notas_embarazo" id="notas_embarazo"  class="form-control" cols="50" placeholder="Escribe aquí..." >{{ old('notas_embarazo') ?? $paciente->pluck('historial')[0][0]->notas_embarazo  }}</textarea>
										</div>
									</div>
									
									<div class="col-sm-8 offset-2 mt-4">
										<button type="button" id="btn-save-perinatal" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--- TERMINA ANTECEDENTES PERINATALES -->
				<!--- ANTECEDENTES POSTNATALES -->
				<div class="col-sm-12">
					<div class="card col-sm-12 border-left">
						<div class="card-header " data-toggle="collapse" href="#postnatales">
							<div class="card-title">
								<h5 class="text-info" ><i class="fas fa-female"></i> POSTNATALES</h5>
							</div>
						</div>
						<div class="card-body collapse multi-collapse" id="postnatales">
							<form id="formPostnatal">
								<div class="row">
									<div class="col-sm-12 text-right mb-3">
										<a role="button" class="text-info" id="postnatal_no_a_todo" >No a todo</a>
									</div>

									<div class="col-sm-12">
										<label >Detalles del Parto</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<textarea name="detalles_parto" id="detalles_parto"  class="form-control" cols="50" placeholder="Escribe aquí..." >{{ old('detalles_parto') ?? $paciente->pluck('historial')[0][0]->detalles_parto  }}</textarea>
										</div>
									</div>
									<div class="col-sm-12">
										<label >Nombre del bebé</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<input type="text" class="form-control" name="nombre_bb" id="nombre_bb" value="{{ old('nombre_bb') ?? $paciente->pluck('historial')[0][0]->nombre_bb  }}" >
										</div>
									</div>
									<div class="col-sm-12">
										<label >Peso al nacer</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<input type="text" class="form-control" name="peso_nacer" id="peso_nacer" value="{{ old('peso_nacer') ?? $paciente->pluck('historial')[0][0]->peso_nacer  }}" >
										</div>
									</div>
									<div class="col-sm-12">
										<label >Salud del bebé</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<textarea name="salud_bb" id="salud_bb"  class="form-control" cols="50" placeholder="Escribe aquí..." >{{ old('salud_bb') ?? $paciente->pluck('historial')[0][0]->salud_bb  }}</textarea>
										</div>
									</div>
									<div class="col-sm-12">
										<label >Alimentación del bebé</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<textarea name="alimentacion_bb" id="alimentacion_bb"  class="form-control" cols="50" placeholder="Escribe aquí..." >{{ old('alimentacion_bb') ?? $paciente->pluck('historial')[0][0]->alimentacion_bb  }}</textarea>
										</div>
									</div>

									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">

										<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->alimentacion_tipo == "Pecho") {{   'checked' }} @endif type="radio" name="alimentacion_tipo" id="alimentacion_tipo1" value="Pecho">
										<label class="form-check-label" for="alimentacion_tipo">
										Sólo pecho
										</label>
										</div>
										<div class="form-check form-check-inline">

										<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->alimentacion_tipo == "Formula") {{   'checked' }} @endif type="radio" name="alimentacion_tipo" id="alimentacion_tipo2" value="Formula">
										<label class="form-check-label" for="alimentacion_tipo">
										Sólo formula
										</label>
										</div>
										
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">

										<input class="form-check-input" @if ($paciente->pluck('historial')[0][0]->alimentacion_tipo == "PYF") {{   'checked' }} @endif type="radio" name="alimentacion_tipo" id="alimentacion_tipo3" value="PYF">
										<label class="form-check-label" for="alimentacion_tipo">
										Pecho y Formula
										</label>
										</div>
									</div>
									<div class="col-sm-12">
										<label >Estado Emocional</label>
									</div>
									<div class="col-sm-12 mb-2">
										<div class="form-check form-check-inline">
											<input type="text" class="form-control" name="estado_emocional" id="estado_emocional" value="{{ old('estado_emocional') ?? $paciente->pluck('historial')[0][0]->estado_emocional  }}" >
										</div>
									</div>
									
									<div class="col-sm-8 offset-2 mt-4">
										<button type="button" id="btn-save-postnatal" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--- TERMINA ANTECEDENTES POSTNATALES -->
				@endif
			</div>
			<!-- Termina 1er Columna -->

			<!-- 2da Columna  --->
			<div class="col-sm-4">
				<div class="row">
					<div class="col-sm-6">
						<h3 >ANTECEDENTES</h3>
					</div>
					
				</div>
				<div class="row">
				
				

				<div class="row">
					<div class="card col-sm-12">
						<div class="card-header">
							<div class="card-title">
								<h5 class="text-info"> <i class="fas fa-notes-medical" ></i> NOTAS DE HISTORIAL</h5>
							</div>
						</div>
						<div class="card-body">
							<form id="formNotasHis">
								<div class="col-sm-12">
									<textarea name="notas_historial" id="notas_historial"  rows="6" placeholder="Escribe aquí" id="" class="form-control notas" >{{$paciente->pluck('historial')[0][0]->notas_historial ?? '' }}</textarea>
									
								</div>
								<div class="col-sm-8 offset-2 mt-4">
									<button type="button" id="btn-save-notas-his" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			
			</div>
			 <!--- Termina 2da Columna -->

		
		</div>
	</div>
</div>		
<!-- /Page Content -->
		</div>
		<!-- /Main Wrapper -->

<!-- Consulta Modal -->
<div class="modal fade" id="consulta" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				
				<h5 class="modal-title text-info">
					Nueva Consulta
				</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 mb-4">
						<div class="row">
							<div class="col-sm-12">
								@if ($consulta_actual != null)
								@else
								<div class="col-sm-12">
									<div class="input-group mb-4" id="input_buscar_motivo_consulta">
										<input type="text" class="form-control" id="buscar_motivo_consulta" 
										placeholder="Escribe para buscar motivo de consulta..." />
									</div>
								</div>

								@endif
								
								<div class="col-sm-12 text-center" >
								@if ($consulta_actual != null)
								<h3 class='text-info' >{{ $consulta_actual[0]->motivo->motivo }}<small></small></h3><input type='hidden' name='motivo_consulta' id='motivo_consulta' value='{{ $consulta_actual[0]->motivo_consulta_id }}' />
								@else
								
								<div id="panel-motivo-select-consulta" ></div>
								@endif
								<small  >Al dar en el botón de "nuevo" se agregara tal cual lo estás escribiendo a la lista de motivos de consulta</small>
								</div>
							</div>
							<div class="col-sm-12">
								<div id="panel-motivos-consulta" ></div>
							</div>
						</div>
						
					</div>
					

					
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="col-sm-12" >
					@if ($consulta_actual != null)
					<button class="btn btn-sm btn-danger btn-block" id="btn-terminar-consulta"><i class="fas fa-stop"></i> Terminar Ahora</button>
					@else
					<button class="btn btn-sm btn-primary btn-block" id="btn-add-consulta"><i class="fas fa-play"></i> Iniciar Ahora</button>
					@endif
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- /Consulta Modal -->


<!-- / Agregar Artículo Modal -->
<div class="modal fade" id="agregar_articulo" aria-hidden="true" role="dialog" >
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content sombra" >
			<div class="modal-header back-sec" >
				<h5 class="modal-title text-white"> <i clas="fas fa-search" ></i>
					Busqueda de Artículos<br>
					<small  >Capture la descripción del artículo</small>
				</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-white" >&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 mb-2 text-center">
						<table class=" table table-hover table-center mb-0" id="table_articulos">
							<thead>
								<tr>
									<th>Identificador</th>
									<th>Nombre del Medicamento</th>
									<th>Descripción</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>
						
					</div>
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="row ">
					<div clas="col-sm-4" >
						<input type="text"  class="form-control form-control-sm" name="new_articulo_rapida" id="new_articulo_rapida" placeholder="Ingrese el nombre del nuevo artículo" >
					</div>
					
					<div clas="col-sm-4" >
						<input type="text" class="form-control form-control-sm" name="new_descripcion_rapida" id="new_descripcion_rapida" placeholder="Ingrese la descripción del nuevo artículo" >
					</div>
					<div class="col-sm-4" >
						<button id="btn-add-new-articulo" class="btn btn-sm btn-warning text-white" > <small> <i class="fas fa-plus" ></i> Añadir nuevo artículo inexistente</small> </button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- / Cierra Agregar Artículo Modal -->

<!-- / Agregar Estudios Modal -->
<div class="modal fade" id="agregar_estudio" aria-hidden="true" role="dialog" >
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content sombra" >
			<div class="modal-header back-sec" >
				<h5 class="modal-title text-white"> <i clas="fas fa-search" ></i>
					Busqueda de Estudios<br>
					<small  >Capture el nombre del estudio en la barra de busqueda</small>
				</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-white" >&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					
					<div class="col-sm-12 mb-2 text-center">
						<table id="table_estudios" class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Identificador</th>
									<th>Estudio</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						
					</div>
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="row ">
					<div clas="col-sm-4" >
						<input type="text"  class="form-control form-control-sm" name="new_estudio_rapida" id="new_estudio_rapida" placeholder="Ingrese el nombre del nuevo estudio" >
					</div>
					<div class="col-sm-6" >
						<button id="btn-add-new-estudio" class="btn btn-sm btn-warning text-white" > <small> <i class="fas fa-plus" ></i> Añadir nuevo estudio inexistente</small> </button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- / Cierra Agregar Estudios Modal -->

<!-- / Agregar Diagnóstico Modal -->
<div class="modal fade" id="agregar_diagnostico" aria-hidden="true" role="dialog" >
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content sombra" >
			<div class="modal-header back-prim" >
				<h5 class="modal-title text-white"> <i clas="fas fa-search" ></i>
					Busqueda de Diagnosticos<br>
					<small  >Catálogo de Diagnósticos CIE-10</small>
				</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-white" >&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					
					<div class="col-sm-12 mb-2 text-center">
						<table id="table_diagnosticos" class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>#</th>
									<th>COD_3</th>
									<th>Descripción 3</th>
									<th>COD_4</th>
									<th>Descripcion 4</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						
					</div>
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h5 class="text-secondary" >Agregar diagnóstico no encontrado</h5>
					</div>
					<div class="col-sm-6" >
						<input type="text" value="" class="form-control" id="diagnostico_no_encontrado" minlength="4" >
					</div>
					<div class="col-sm-6">
						<button class="btn btn-sm bg-info-light" id="btn_diagnostico_no_encontrado"  >Agregar</button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- / Cierra agregar diagnóstico Modal -->
{{-- <button id="btn-pagar" > Pagar</button> --}}

<!-- / Agregar pago Modal -->
<div class="modal fade" id="pagar_consulta" aria-hidden="true" role="dialog" >
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content sombra" >
			<div class="modal-header back-prim" >
				<h5 class="modal-title text-white">
					Recibir Pago Consulta Rápida<br>
					<small  ></small>
				</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 text-center" >
						<h4><i class="fas fa-money-check"></i> Cobrar:</h4>
					</div>
				</div>
				<div class="select-gender-col text-center">
					<div class="row">
						<div class="col-sm-5 pr-2">
							<input type="hidden" id="id_consulta" name="id_consulta" >
							<input type="hidden" id="tipo_consulta" name="tipo_consulta" >
							<input type="radio" id="cobro1" name="cobro" checked="" value="{{ auth()->user("doctors")->seguimiento }}">
							<label for="cobro1">{{-- 
								<span class="gender-icon"><img src="assets/img/icons/male.png" alt=""></span> --}}
								<span>${{ auth()->user("doctors")->seguimiento }}</span>
							</label>
						</div>
						<div class="col-sm-2">
							<label for="no_cobro"> 
							<input type="checkbox" id="no_cobro" name="no_cobro" value="">
								No Cobrar consulta
							</label>
						</div>
						<div class="col-sm-5 pl-2">
							<input type="radio" id="cobro2" name="cobro" value="{{ auth()->user("doctors")->primera }}">
							<label for="cobro2">{{-- 
								<span class="gender-icon"><img src="assets/img/icons/female.png" alt=""></span> --}}
								<span>${{ auth()->user("doctors")->primera }}</span>
							</label>
						</div>
						
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center"><h4><i class="fas fa-info-circle"></i> Detalles:</h4></div>
					<div class="col-sm-6 p-3 offset-3">
						<p>
							<strong>Diagnóstico: </strong><span id="diagnostico-consulta-cobro" ></span><br>
							<strong>Motivo: </strong><span id="motivo-consulta-cobro" ></span>
						</p>
					</div>
					<div class="col-sm-6 text-center offset-3" >
						<h4>Cobro extra:</h4>
						<input type="number" min="0"  id="cobro_extra" class="form-control" placeholder="$" >
						<input type="text" id="motivo_extra" name="motivo_extra"  class="form-control" placeholder="Motivo cobro extra"   >
						<p> <strong>Total: $</strong><span id="total_consulta_rapida" >{{ auth()->user("doctors")->seguimiento }}</span> </p>
					</div>
					<div class="col-sm-6 text-center offset-3" >
						
						<input type="number" id="descuento" name="descuento"  class="form-control" placeholder="Escribre aqui si deseas agregar un descuento en %"   >
						<small for="">Escribre aqui si deseas agregar un descuento en <i class="fas fa-percentage"></i></small>

					</div>
					<div class="col-sm-6 offset-3 text-center" >
						<h4>Metodo de Pago:</h4>
						<select class="form-control" required name="metodo_pago" id="metodo_pago">
							<option value="">Seleccione:</option>
							<option value="Efectivo">Efectivo</option>
							<option value="Tarjeta">Tarjeta</option>
							<option value="Transferencia">Transferencia</option>
						</select>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="col-sm-12" >
					<button class="btn btn-sm btn-block btn-primary" id="btn-hacer-pago" >Realizar cobro</button>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- / Cierra agregar pago Modal -->
@endsection