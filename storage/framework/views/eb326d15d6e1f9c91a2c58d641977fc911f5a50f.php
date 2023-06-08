<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Detalle del usuario</h1>
            
            
               
                    

                    <div class="form-group">
                    <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                    <label for="nombre" class="col-form-label"><?php echo e($user->name ?? ''); ?></label>
                    </div>

                    <div class="form-group">
                    <label for="email" class="col-form-label" style="font-weight:600;font-size:17px">email</label><br>
                    <label for="email" class="col-form-label"><?php echo e($user->email ?? ''); ?></label>
                    </div>

                    <div class="form-group">
                    <label for="rol" class="col-form-label" style="font-weight:600;font-size:17px">rol</label><br>
                    <label for="rol" class="col-form-label"><?php echo e($user->rol ?? ''); ?></label>
                    </div>
                   
                        
                    
                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-primary">Index</a>
                    <a href="<?php echo e(route('users.edit',$user->id)); ?>" class="btn btn-warning">Edit</a>
          

              
                
            

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/show.blade.php ENDPATH**/ ?>