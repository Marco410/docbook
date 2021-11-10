@extends('layout.mainlayout_admin')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-7 col-auto">
					<h3 class="page-title">Editando Clinica -{{ $clinica->nombre_consultorio }}-</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="lista-clinicas">Inicio</a></li>
						<li class="breadcrumb-item active">Editar Clinica</li>
					</ul>
				</div>
				<div class="col-sm-5 col">
					
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('update-clinic')}}">
                            {{ csrf_field() }}
                            <div class="row form-row">
                                <input type="hidden" name="clinica_id" value="{{ $clinica->id }}">
                                <input type="hidden" name="antigua_imagen" value="{{ $clinica->logotipo }}">
                                <div class="col-12 col-sm-5">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre_consultorio" value="{{ $clinica->nombre_consultorio }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <div class="form-group">
                                        <label>Logotipo: </label>
                                        @if ($clinica->tipo_logo == "Imagotipo")
                                        <img height="20px" width="80px" src="data:image/png;base64,{{$clinica->logotipo_base64 }}" />
                                        @else
                                        <img height="30px" width="30px" src="data:image/png;base64,{{$clinica->logotipo_base64 }}" />
                                        @endif
                                        <small>Si deaseas actualizarlo selecciona otro.</small>
                                        <input type="file" name="logotipo"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-2">
                                    <div class="form-group">
                                        <label for="">Tipo de Logo</label>
                                        <label for="">Imagotipo
                                            <input type="radio" name="tipo_logo" {{ ($clinica->tipo_logo == "Imagotipo") ? "checked" : "" }}  value="Imagotipo"  >
                                        </label>
                                        <label for="">
                                            Isotipo
                                            <input type="radio" name="tipo_logo" {{ ($clinica->tipo_logo == "Isotipo") ? "checked" : "" }}  value="Isotipo" >
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" name="tel_consultorio" value="{{ $clinica->tel_consultorio }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>No. Médicos</label>
                                        <input type="number" name="no_medicos" value="{{ $clinica->no_medicos }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Calle</label>
                                        <input type="text" name="calle_consultorio" value="{{ $clinica->calle_consultorio }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Colonia</label>
                                        <input type="text" name="colonia_consultorio" value="{{ $clinica->colonia_consultorio }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Ciudad</label>
                                        <input type="text" name="ciudad_consultorio" value="{{ $clinica->ciudad_consultorio }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" name="estado_consultorio" value="{{ $clinica->estado_consultorio }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Pais</label>
                                        <input type="text" name="pais_consultorio" value="{{ $clinica->pais_consultorio }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>