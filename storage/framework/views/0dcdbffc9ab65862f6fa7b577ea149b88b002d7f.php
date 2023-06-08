<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if($message = Session::get('productocreado')): ?>
            <div class="alert alert-success">
                <h4><?php echo e($message); ?></h4>
            </div>
            <?php endif; ?>






            <h1>Proyecto index</h1>

            <a class="btn btn-success" href="<?php echo e(route('games.create')); ?>" class="btn btn">Nuevo juego</a>

            <a class="btn btn-warning" href="<?php echo e(route('games.indexPc')); ?>" class="btn btn">JUEGOS DE PC</a>


            <table class="table table-striped table-hover" style="display: flex;align-items:center;">
                <tr>
                    <td>NOMBRE</td>
                    <td>DESCRIPCION</td>
                    <td>AÑO DE LANZAMIENTO</td>
                    <td>GENEROS</td>
                    <td>PLATAFORMAS</td>
                    <td>PRECIO</td>
                    <td>IMAGEN</td>
                </tr>
                <?php $__currentLoopData = $juegospc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td><?php echo e($game->nombre); ?></td>
                    <td><?php echo e($game->descripcion); ?></td>
                    <td><?php echo e($game->anyoLanzamiento); ?></td>
                    <td>
                        <?php $__currentLoopData = $game->generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($gen); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td>
                        <?php $__currentLoopData = $game->plataformas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gen1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($gen1); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e($game->precio); ?> euros</td>
                    <td>
                        <?php if($game->imagen==null): ?>
                        <img src="../../imagenes/filenotfound.png" width="200px" height="250px">

                        <?php else: ?>

                        <img src="<?php echo e('../../'. $game->imagen); ?>" />

                        <?php endif; ?>
                    </td>
                    <td> <a class="btn btn-warning" href="<?php echo e(route('games.show',$game->id)); ?>" class="btn btn">Ver juego</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/game/indexpc.blade.php ENDPATH**/ ?>