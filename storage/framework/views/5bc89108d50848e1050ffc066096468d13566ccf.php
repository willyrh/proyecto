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

           
            

            <table class="table table-striped table-hover" id="tablavotaciones">
                <tr>
                    <td>id</td>
                    <td>nombre</td>

                    <td>descipcion</td>
                    <td>nombreopcion1</td>
                    <td>nombreopcion2</td>
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
                    <td>

                    </td>
                    
          <td> <a class="btn btn-warning" href="<?php echo e(route('votaciones.show',$votacion->id)); ?>" class="btn btn"><span class="fa fa-eye"></span>&nbsp;</a></td>
                    
                   
                   
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/votacion/indexGeneral.blade.php ENDPATH**/ ?>