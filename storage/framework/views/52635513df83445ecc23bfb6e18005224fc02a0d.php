<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Modificar usuario</h1>
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


            <form action="<?php echo e(route('users.updateGeneral',$user->id)); ?>" method="post">
                <?php echo csrf_field(); ?>

                <?php echo method_field("PUT"); ?>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo e($user->name ?? ''); ?>">
                    </label>
                </div>

                <div class="form-group">
                    <label for="descripcion">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo e($user->email ?? ''); ?>">
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" value="usuario"  <?php 
                                                                                                  if($user->rol=="usuario"){
                                                                                                    echo 'checked';
                                                                                                  }      ?>>
                    <label class="form-check-label" for="gerente">usuario</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol"  value="administrador" <?php 
                                                                                                  if($user->rol=="administrador"){
                                                                                                    echo 'checked';
                                                                                                  }      ?>>
                    <label class="form-check-label" for="recepcionista">administrador</label>
                </div>


                <input type="submit" value="Actualizar" class="btn btn-warning">
            </form>





        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/edit.blade.php ENDPATH**/ ?>