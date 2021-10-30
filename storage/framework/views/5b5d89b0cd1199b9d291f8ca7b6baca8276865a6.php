<h1>Reporte para SUIVE fechas: <?php echo e($fecha_ini); ?> a <?php echo e($fecha_fin); ?> </h1>
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
    <?php $__currentLoopData = $consultaRs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultaR): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($consultaR->diagnostico_id): ?>    
    <tr>
        <td><?php echo e($consultaR->paciente->nombre); ?> <?php echo e($consultaR->paciente->apellido_p); ?> <?php echo e($consultaR->paciente->apellido_m); ?></td>
        <td><?php echo e($consultaR->diagnostico['cod_3']); ?></td>
        <td><?php echo e($consultaR->diagnostico['descripcion_3']); ?></td>
        <td><?php echo e($consultaR->diagnostico['cod_4']); ?></td>
        <td><?php echo e(($consultaR->diagnostico_id) ? $consultaR->diagnostico['descripcion_4'] : $consultaR->diagnostico_str . " ( Sin registro en CIE )"); ?></td>
        <td><?php echo e($consultaR->paciente->get_edad()); ?></td>
        <td><?php echo e($consultaR->paciente->sexo); ?></td>
        
    </tr>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/exports/suive.blade.php ENDPATH**/ ?>