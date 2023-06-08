<?php $__env->startSection('content'); ?>
<div class="container" style="background-color: white; height: 700px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

            <form action="<?php echo e(route('users.formcambiarpassword',$user->id)); ?>" method="post">
<?php echo csrf_field(); ?>
<?php echo method_field("PUT"); ?>
            <h1><?php echo e($user->name); ?></h1>
          
           
            <div class="form-group" id="cambiarcontraseña">
          

                <br><label for="edad" class="col-form-label" style="font-weight:600;font-size:17px">Nueva contraseña</label><br>
                <label for="edad" class="col-form-label"><?php echo e($user->nuevapassword ?? ''); ?></label>
                <input type="password" class="form-control" name="nuevapassword"/>
                <br> <label for="edad" class="col-form-label" style="font-weight:600;font-size:17px">Repite nueva contraseña</label><br>
                <input type="password" class="form-control" name="repitenuevapassword"/>
            </div>





            
            <input type="submit" class="btn btn-success" value="modificar contraseña" style=" margin-top: 15px">
              

            </form>
            <a class="btn btn-warning" href="<?php echo e(route('users.perfil')); ?>" class="btn btn" >Mi perfil</a>
            <hr>

          <!--  <table class="table table-striped table-hover">
                <tr>
                    <td>id</td>
                    <td>nombre</td>

                    <td>email</td>
                    <td>rol</td>
                </tr>
                
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->nombre); ?></td>

                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->rol); ?></td>
                   

                </tr>
           
            </table>-->

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/cambiarpassword.blade.php ENDPATH**/ ?>