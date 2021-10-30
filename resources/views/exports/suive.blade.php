<h1>Reporte para SUIVE fechas: {{ $fecha_ini }} a {{ $fecha_fin }} </h1>
<table>
    <thead>
    <tr style="background-color: gray" >
        <th>Paciente</th>
        <th>COD_3</th>
        <th>Descripcion COD_3</th>
        <th>COD_4</th>
        <th>Descripcion COD_4</th>
        <th>Edad</th>
        <th>Sexo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($consultaRs as $consultaR)
    {{-- Consulta si tiene diagnostico registrado --}}
    @if ($consultaR->diagnostico_id)    
    <tr>
        <td>{{ $consultaR->paciente->nombre }} {{ $consultaR->paciente->apellido_p }} {{ $consultaR->paciente->apellido_m }}</td>
        <td>{{ $consultaR->diagnostico['cod_3'] }}</td>
        <td>{{ $consultaR->diagnostico['descripcion_3'] }}</td>
        <td>{{ $consultaR->diagnostico['cod_4'] }}</td>
        <td>{{ ($consultaR->diagnostico_id) ? $consultaR->diagnostico['descripcion_4'] : $consultaR->diagnostico_str . " ( Sin registro en CIE )" }}</td>
        <td>{{ $consultaR->paciente->get_edad() }}</td>
        <td>{{ $consultaR->paciente->sexo }}</td>
        
    </tr>
    @endif
    @endforeach
    </tbody>
</table>