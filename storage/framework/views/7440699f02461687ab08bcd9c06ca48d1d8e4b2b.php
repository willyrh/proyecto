<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if($message = Session::get('juegocreado')): ?>
            <div class="alert alert-success">
                <h4><?php echo e($message); ?></h4>
            </div>
            <?php endif; ?>

            <?php if($message = Session::get('resenyaeliminada')): ?>
            <div class="alert alert-success">
                <h4><?php echo e($message); ?></h4>
            </div>
            <?php endif; ?>
            <?php if($message = Session::get('resenyamodificada')): ?>
            <div class="alert alert-info">
                <h4><?php echo e($message); ?></h4>
            </div>
            <?php endif; ?>








            <?php if(auth()->user()!=null): ?>
            <a class="btn btn-success" href="<?php echo e(route('resenyas.create')); ?>" class="btn btn">crear reseñas</a>
            <?php endif; ?>

            <?php $__currentLoopData = $resenyasList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resenya): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="contenedorIndividual">



                <div class="text-center">
                    <h3 class="tituloresenyas"><?php echo e($resenya->titulo); ?></h3>
                </div>
                <hr class="hr" />
                <div>





                </div>
                <div class="autor">Escrito por <?php echo e($resenya->nombreyapellido); ?>

                    <p>Fecha publicacion: <?php echo e($resenya->created_at); ?>


                        <?php if($resenya->created_at!=$resenya->updated_at): ?>
                    <p style="color:orange">EDITADO: <?php echo e($resenya->updated_at); ?></p>
                    <?php endif; ?>
                    </p>

                </div>

                <div class="contenidoeimagen">


                    <?php if($resenya->imagen==null): ?>
                    <div class="contenidoResenya">
                        <p style="overflow-wrap:break-word; width: 100%"><?php echo e($resenya->contenido); ?></p>

                        Calificación: <?php if($resenya->puntuacion==1): ?>
                        <i class="fa fa-star fa-xxl"></i>
                        <?php endif; ?>
                        <?php if($resenya->puntuacion==2): ?>
                        <i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i>
                        <?php endif; ?>
                        <?php if($resenya->puntuacion==3): ?>
                        <i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i>
                        <?php endif; ?>
                        <?php if($resenya->puntuacion==4): ?>
                        <i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i>
                        <?php endif; ?>
                        <?php if($resenya->puntuacion==5): ?>
                        <i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i>
                        <?php endif; ?>
                    </div>
                    <?php else: ?>
                    <div class="contenidoResenya" style="width: 60%;">
                        <p style="overflow-wrap:break-word"><?php echo e($resenya->contenido); ?> </p>
                        Calificación: <?php if($resenya->puntuacion==1): ?>
                        <i class="fa fa-star fa-xxl"></i>
                        <?php endif; ?>
                        <?php if($resenya->puntuacion==2): ?>
                        <i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i>
                        <?php endif; ?>
                        <?php if($resenya->puntuacion==3): ?>
                        <i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i>
                        <?php endif; ?>
                        <?php if($resenya->puntuacion==4): ?>
                        <i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i>
                        <?php endif; ?>
                        <?php if($resenya->puntuacion==5): ?>
                        <i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i><i class="fa fa-star fa-xxl"></i>
                        <?php endif; ?>
                    </div>
                    <div class="imagenResenya" style="width: 40%;">
                        <img src="<?php echo e(asset($resenya->imagen)); ?>" width="100%" height="100%" />

                    </div>
                    <?php endif; ?>
                </div>
                <?php if(auth()->user()!=null): ?>
                <?php if(auth()->user()->can('modificarResenya', $resenya)): ?>

                <a class="btn btn-warning" href="<?php echo e(route('resenyas.edit',$resenya->id)); ?>" class="btn btn">Modificar reseña</a>


                <form action="<?php echo e(route('resenyas.destroy',$resenya->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" value="X" class="btn btn-danger"><span class="fa fa-trash"></span>&nbsp;</button>
                </form>

                <?php endif; ?>
                <?php endif; ?>
                <a class="btn btn-warning" href="<?php echo e(route('resenyas.show',$resenya->id)); ?>" class="btn btn"><span class="fa fa-eye"></span>&nbsp;</a>
            </div>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        </div>
    </div>
</div>









<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/resenya/index.blade.php ENDPATH**/ ?>