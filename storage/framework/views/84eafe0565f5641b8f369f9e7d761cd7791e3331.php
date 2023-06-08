<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Crear votacion</h1>
            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-primary">Index</a>

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



            <form action="<?php echo e(route('votaciones.store')); ?>" method="post">
                <?php echo csrf_field(); ?>


<div class="text-center">

                <div class="row align-self-center">
                        <div class="col col-md-4 mb-8 ">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1">Titulo</label>
                                <input type="text" id="form3Example1" class="form-control  bordesredondeados " name="nombre" />
                            </div>
                        </div>
                    </div>
                    <div class=" mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="form3Example2">Descripcion</label>
                            <input type="text" id="form3Example2" class="form-control bordesredondeados" name="descripcion" />

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label" for="valor1">Valor A</label>
                            <input type="text" id="valor2" class="form-control bordesredondeados" name="valor1" />

                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label" for="valor2">Valor B</label>
                            <input type="text" id="valor2" class="form-control  bordesredondeados" name="valor2" />

                        </div>
                    </div>




</div>
              



                <input type="submit" value="Crear" class="btn btn-success">
            </form>





        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/votacion/create.blade.php ENDPATH**/ ?>