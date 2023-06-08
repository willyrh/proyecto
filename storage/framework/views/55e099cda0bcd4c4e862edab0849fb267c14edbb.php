<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if($message = Session::get('productocreado')): ?>
            <div class="alert alert-success">
                <h4><?php echo e($message); ?></h4>
            </div>
            <?php endif; ?>

            




            <h1 class="tituloprincipal">Coleccion de videojuegos</h1>

      
          
            <table class="table table-striped table-hover" style="display: flex;align-items:center;" id="contenedorGamesColeccion">
        <tr>
          <td>NOMBRE</td>
         
          <td>AÑO DE LANZAMIENTO</td>
          <td>GENEROS</td>
          
          <td>PRECIO</td>
          <td>IMAGEN</td>
        </tr>
        <?php $__currentLoopData = $gameList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($game!=null): ?>
        <tr>

          <td><?php echo e($game->nombre); ?></td>
         
          <td><?php echo e($game->anyoLanzamiento); ?></td>
          <td>
            <?php $__currentLoopData = $game->generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($gen); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </td>
          
          <td><?php echo e($game->precio); ?> euros</td>
          <td>
            <?php if($game->imagen==null): ?>
            <img src="../imagenes/filenotfound.png" width="200px" height="250px">

            <?php else: ?>
            <img src="../<?php echo e($game->imagen); ?>" />

            <?php endif; ?>
          </td>

          <td> <a class="btn btn-warning" href="<?php echo e(route('games.show',$game->id)); ?>" class="btn btn"><span class="fa fa-eye"></span>&nbsp;</a></td>
          <td> <a class="btn btn-danger" href="<?php echo e(route('users.eliminarDeMiBiblioteca',['user'=>$user,'game'=>$game])); ?>" class="btn btn"><span class="fa fa-trash"></span>&nbsp;</a></td>
       
        </tr>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </table>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/user/coleccion.blade.php ENDPATH**/ ?>