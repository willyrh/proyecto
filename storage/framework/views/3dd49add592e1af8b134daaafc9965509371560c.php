<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <?php if($message = Session::get('votacioncreada')): ?>
            <div class="alert alert-success">
                <h4><?php echo e($message); ?></h4>
            </div>
            <?php endif; ?>
            <?php if($message = Session::get('votacioneliminada')): ?>
            <div class="alert alert-success">
                <h4><?php echo e($message); ?></h4>
            </div>
            <?php endif; ?>


            <h1>Lista votaciones</h1>

        <?php if(auth()->user()->can('permisosAdmin',['App\Models\User',auth()->user()])): ?>
            <a class="btn btn-success" href="<?php echo e(route('votaciones.create')); ?>" class="btn btn">Nueva votacion</a>
            <?php endif; ?>
           
            <table class="table table-striped table-hover" id="tablavotaciones">
                <tr>
                    <td>id</td>
                    <td>nombre</td>

                    <td>descipcion</td>
                    <td>Opción 1</td>
                    <td>Opción 2</td>
                    <td>participantes</td>
                </tr>
                <?php $__currentLoopData = $votacionesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $votacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($votacion->id); ?></td>
                    <td><?php echo e($votacion->nombre); ?></td>

                    <td><?php echo e($votacion->descripcion); ?></td>
                    <td><?php echo e($votacion->nombreopcion1); ?></td>
                    <td><?php echo e($votacion->nombreopcion2); ?></td>
                    <td><?php echo e($votacion->participantes); ?></td>
        
                   
                    <?php if($votacion->activo==1): ?>
                    <td>
                        <form action="<?php echo e(route('votaciones.cerrarvotacion',$votacion->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" value="Cerrar votacion" class="btn btn-transparent"><span class="fa fa-toggle-on fa-2x"></span>&nbsp;</button>
                        </form>
                    </td>
                    <?php else: ?>

                    <td>
                        <form action="<?php echo e(route('votaciones.activarvotacion',$votacion->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" value="activar votacion" class="btn btn-transparent"><span class="fa fa-toggle-off fa-2x"></span>&nbsp;</button>
                        </form>
                    </td>
                    <?php endif; ?>
                    <td>
                        <form action="<?php echo e(route('votaciones.destroy',$votacion->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span>&nbsp;</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/votacion/index.blade.php ENDPATH**/ ?>