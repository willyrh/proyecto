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

            <div id="contprincipalperfil">


                <form action="<?php echo e(route('users.update',$user->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("PUT"); ?>
                    <div id="imagenperfil">
                        <?php if($user->imagen==null): ?>
                        <img src="<?php echo e(asset('imagenesperfil/userdefault.png')); ?>" style="border-radius: 5% 5% 5% 5%;width: 200px; height: 200px"/>

                        <?php else: ?>

                        <img src="../<?php echo e($user->imagen); ?>" style="width: 200px;height:200px; border-radius: 30% 30% 30% 30%;" />

                        <?php endif; ?>
                    </div>






                    <div id="datosperfil">
                        <br>
                        <h2 style="color: blue"><?php echo e($user->name); ?></h2>



                        <div class="form-group">
                            <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                            <input type="text" class="form-control" name="name" value="<?php echo e($user->name ?? ''); ?>" />
                        </div>
         
                        <div class="form-group">
                            <label for="" class="col-form-label" style="font-weight:600;font-size:17px">Email</label><br>
                            <label for="" class="col-form-label"><?php echo e($user->email ?? ''); ?></label>
                        </div>
                        <div class="mb-3">
  <label for="formFile" class="form-label">Imagen de perfil</label>
  <input class="form-control" type="file"  name="imagenperfil">
</div>
                        <div class="form-group">
                           
                        </div>
                      
                      






<br>
                        <input type="submit" class="btn btn-success" value="modificar perfil">
                        <a class="btn btn-warning" href="<?php echo e(route('users.cambiarpassword')); ?>" class="btn btn">Cambiar contraseña</a>


                </form>
            </div>
        </div>
        

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/perfil.blade.php ENDPATH**/ ?>