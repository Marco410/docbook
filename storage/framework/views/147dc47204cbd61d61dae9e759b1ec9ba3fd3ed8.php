
<?php $__env->startSection('content'); ?>	
	<!-- Page Wrapper -->
    <div class="page-wrapper">
			
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Añadir Diagnósticos</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Inicio</a></li>
                                <li class="breadcrumb-item active">Diagnósticos</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Añadir Nuevo Diagnóstico</h4>
                            </div>
                            <div class="card-body">
                                <?php if(Session::has('registro')): ?>
                                <div role="alert" class="alert alert-success alert-dismissible fade show"  ><strong>Éxito: </strong>Diagnóstico añadido <?php echo e($d->descripcion_4 ?? ''); ?></div>
                                <?php else: ?>

                                <?php endif; ?>
                                <form method="POST" action="<?php echo e(route('save-diagnostic')); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>COD_3</label>
                                                <select required name="letra_3" class="form-control select">
                                                    <option value="" >Selecciona</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                    <option value="H">H</option>
                                                    <option value="I">I</option>
                                                    <option value="J">J</option>
                                                    <option value="K">K</option>
                                                    <option value="L">L</option>
                                                    <option value="M">M</option>
                                                    <option value="N">N</option>
                                                    <option value="O">O</option>
                                                    <option value="P">P</option>
                                                    <option value="Q">Q</option>
                                                    <option value="R">R</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                    <option value="U">U</option>
                                                    <option value="V">V</option>
                                                    <option value="W">W</option>
                                                    <option value="X">X</option>
                                                    <option value="Y">Y</option>
                                                    <option value="Z">Z</option>
                                                </select>
                                                <input type="text" name="number_3" class="form-control" placeholder="Número '00' " >
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Descripción categorías de 3 caracteres</label>
                                                <input type="text" name="descripcion_3" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>COD_4</label>
                                                <select name="letra_4" required class="form-control select">
                                                    <option value="" >Selecciona</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                    <option value="H">H</option>
                                                    <option value="I">I</option>
                                                    <option value="J">J</option>
                                                    <option value="K">K</option>
                                                    <option value="L">L</option>
                                                    <option value="M">M</option>
                                                    <option value="N">N</option>
                                                    <option value="O">O</option>
                                                    <option value="P">P</option>
                                                    <option value="Q">Q</option>
                                                    <option value="R">R</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                    <option value="U">U</option>
                                                    <option value="V">V</option>
                                                    <option value="W">W</option>
                                                    <option value="X">X</option>
                                                    <option value="Y">Y</option>
                                                    <option value="Z">Z</option>
                                                </select>
                                                <input type="text" name="number_4" class="form-control" placeholder="Número '000' " >
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Descripción categorías de 4 caracteres</label>
                                                <input type="text" name="descripcion_4" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-file" ></i> Guardar Nuevo Diagnóstico</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /Page Wrapper -->
    
    </div>
    <!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/admin/diagnostics.blade.php ENDPATH**/ ?>