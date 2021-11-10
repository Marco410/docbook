@extends('layout.mainlayout_admin')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-7 col-auto">
					<h3 class="page-title">Editando Doctor -{{ $doctor->nombre }} {{ $doctor->apellido_p }}-</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="lista-doctors">Inicio</a></li>
						<li class="breadcrumb-item active">Editar Doctor</li>
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
                        <form method="post" enctype="multipart/form-data" action="{{ route('update-doctor')}}">
                            {{ csrf_field() }}
                            <div class="row form-row">
                                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" value="{{ $doctor->nombre }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input type="text" name="apellido_p" value="{{ $doctor->apellido_p }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input type="text" name="apellido_m" value="{{ $doctor->apellido_m }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" name="telefono" value="{{ $doctor->telefono }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" name="estado" value="{{ $doctor->estado }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Pais</label>
                                        <input type="text" name="pais" value="{{ $doctor->pais }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Costo Primera Consulta</label>
                                        <input type="number" name="primera" value="{{ $doctor->primera }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Costo Seguimiento</label>
                                        <input type="number" name="seguimiento" value="{{ $doctor->seguimiento }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Cédula Profesional</label>
                                        <input type="number" name="cedula" value="{{ $doctor->cedula }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Institución que la aprueba</label>
                                        <input type="text" name="institucion_cedula" value="{{ $doctor->institucion_cedula }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <div class="form-group">
                                        <label>Logotipo: </label>
                                        @if ($doctor->institucion_tipo_logo == "Imagotipo")
                                        <img height="20px" width="80px" src="data:image/png;base64,{{$doctor->institucion_logo }}" />
                                        @else
                                        <img height="30px" width="30px" src="data:image/png;base64,{{$doctor->institucion_logo }}" />
                                        @endif
                                        <small>Si deaseas actualizarlo selecciona otro.</small>
                                        <input type="file" name="institucion_logo"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-2">
                                    <div class="form-group">
                                        <label for="">Tipo de Logo</label>
                                        <label for="">Imagotipo
                                            <input type="radio" name="institucion_tipo_logo" {{ ($doctor->institucion_tipo_logo == "Imagotipo") ? "checked" : "" }}  value="Imagotipo"  >
                                        </label>
                                        <label for="">
                                            Isotipo
                                            <input type="radio" name="institucion_tipo_logo" {{ ($doctor->institucion_tipo_logo == "Isotipo") ? "checked" : "" }}  value="Isotipo" >
                                        </label>
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