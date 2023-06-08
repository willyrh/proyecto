<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" id="tablashowvotacion">
            <h1>Detalle de la votacion</h1>
                    <div class="form-group">
                    <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                    <label for="nombre" class="col-form-label"><?php echo e($votacion->nombre ?? ''); ?></label>
                    </div>

                    <div class="form-group">
                    <label for="email" class="col-form-label" style="font-weight:600;font-size:17px">descripcion</label><br>
                    <label for="email" class="col-form-label"><?php echo e($votacion->descripcion ?? ''); ?></label>
                    </div>
                    <div class="form-group">
                    <label for="email" class="col-form-label" style="font-weight:600;font-size:17px">
                    <?php echo e($votacion->nombreopcion1); ?></label><br>
                    <label for="email" class="col-form-label">votos: <?php echo e($votacion->valoropcion1  ?? ''); ?></label>
                    </div>
                    <div class="form-group">
                    <label for="email" class="col-form-label" style="font-weight:600;font-size:17px"><?php echo e($votacion->nombreopcion2); ?></label><br>
                    <label for="email" class="col-form-label">votos: <?php echo e($votacion->valoropcion2  ?? ''); ?></label>
                    </div>

                    <div class="form-group">
                    <label for="rol" class="col-form-label" style="font-weight:600;font-size:17px">Numero de participantes</label><br>
                    <label for="rol" class="col-form-label"><?php echo e($numparticipantes); ?></label>
                    </div>
                   
                        
                    
                    <a href="<?php echo e(route('proyects.index')); ?>" class="btn btn-primary">Index</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/votacion/show.blade.php ENDPATH**/ ?>