<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1><?php echo e($votacion->nombre ?? ''); ?></h1>
            <h4><?php echo e($votacion->descripcion ?? ''); ?></h4>


            <hr>

            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <h4>Por favor, corrige los siguientes errores:</h4>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?><br></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>


            <form action="<?php echo e(route('votaciones.update',$votacion->id)); ?>" method="post" id="votacionedit">
                <?php echo csrf_field(); ?>

                <?php echo method_field("PUT"); ?>




        


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="valorvotacion" id="flexRadioDefault1" value="nombreopcion1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    <?php echo e($votacion->nombreopcion1 ?? ''); ?>

                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="valorvotacion" id="flexRadioDefault2"  value="nombreopcion2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                    <?php echo e($votacion->nombreopcion2 ?? ''); ?>

                    </label>
                </div>


        </div>



        <input type="submit" value="Votar" class="btn btn-warning">
        </form>





    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/votacion/edit.blade.php ENDPATH**/ ?>