<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if($message = Session::get('usercreado')): ?>
            <div class="alert alert-success">
                <h4><?php echo e($message); ?></h4>
            </div>
            <?php endif; ?>



            <h1>Lista usuarios</h1>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', 'App\Models\User')): ?>
            <a class="btn btn-success" href="<?php echo e(route('users.create')); ?>" class="btn btn">Nuevo cliente</a>
            <?php endif; ?>
            <table class="table table-striped table-hover" id="tablaeditusuarios">
                <tr>
                
                    <td><strong>nombre</strong></td>

                    <td><strong>email</strong></td>
                    <td><strong>rol</strong></td>
                </tr>
                <?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <tr>
                  
                    <td><?php echo e($user->name); ?></td>

                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->rol); ?></td>
                    <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                        <a class="btn btn-warning" href="<?php echo e(route('users.edit',$user->id)); ?>">Editar</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $user)): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('users.show',$user->id)); ?>">Ver</a>
                        <?php endif; ?>
                    </td>
                    <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', $user)): ?>
                        <form action="<?php echo e(route('users.destroy',$user->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    <?php endif; ?>
                    </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/index.blade.php ENDPATH**/ ?>