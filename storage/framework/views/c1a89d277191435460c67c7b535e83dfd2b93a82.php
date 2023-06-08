<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center" id="fondo2index">
    <div class="col-md-8" >
      <?php if($message = Session::get('juegocreado')): ?>
      <div class="alert alert-success">
        <h4><?php echo e($message); ?></h4>
      </div>
      <?php endif; ?>
      <?php if($message = Session::get('juegomodificado')): ?>
      <div class="alert alert-success">
        <h4><?php echo e($message); ?></h4>
      </div>
      <?php endif; ?>
      <?php if($message = Session::get('juegoeliminado')): ?>
      <div class="alert alert-success">
        <h4><?php echo e($message); ?></h4>
      </div>
      <?php endif; ?>

      <?php if($message = Session::get('bibliotecavacia')): ?>
      <div class="alert alert-info">
        <h4><?php echo e($message); ?></h4>
      </div>
      <?php endif; ?>

      <?php if($message = Session::get('usuarioeditado')): ?>
      <div class="alert alert-info">
        <h4><?php echo e($message); ?></h4>
      </div>
      <?php endif; ?>

      <?php if($message = Session::get('contraseñaactualizada')): ?>
      <div class="alert alert-info">
        <h4><?php echo e($message); ?></h4>
      </div>
      <?php endif; ?>


      <?php if($message = Session::get('coleccionvacia')): ?>
      <div class="alert alert-info">
        <h4><?php echo e($message); ?></h4>
      </div>
      <?php endif; ?>
      <?php if($message = Session::get('agregadoacoleccion')): ?>
      <div class="alert alert-success">
        <h4><?php echo e($message); ?></h4>
      </div>
      <?php endif; ?>







      <h1 id="listavideojuegosh1">Lista videojuegos</h1>
      <?php if($user!=null): ?>
      <?php if(auth()->user()->can('permisosAdmin',['App\Models\User',$user])): ?>
      <a class="btn btn-success" href="<?php echo e(route('games.create')); ?>" class="btn btn">Añadir juego</a>
      <?php endif; ?>
      <?php endif; ?>

      <a class="btn btn-success" href="<?php echo e(route('resenyas.index')); ?>" class="btn btn">Ver reseñas</a>
      <?php if($user!=null): ?>
      <?php if(auth()->user()->can('agregarABiblioteca',$user)): ?>
      <a class="btn btn-warning" href="<?php echo e(route('users.verMiBiblioteca')); ?>" class="btn btn">Mi biblioteca</a>


      <?php endif; ?>
      <a class="btn btn-warning" href="<?php echo e(route('votacion.votacionesGeneral')); ?>" class="btn btn">Ver votaciones</a>
      <?php endif; ?>
      <a class="btn btn-primary" href="<?php echo e(route('users.perfil')); ?>" class="btn btn"><span class="fa fa-user"></span>&nbsp;</a>




      <div id="contenedorGamesIndex">
        <?php $__currentLoopData = $gameList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="contenedorGameIndividual">
          <p class="contenedorGameIndividualNombre elipsis"><strong><?php echo e($game->nombre); ?></strong></p>
          <p class="contenedorGameIndividualAnyoLanzamiento elipsis"><?php echo e($game->anyoLanzamiento); ?></p>
          <p class="contenedorGameIndividualGeneros "><?php $__currentLoopData = $game->generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($gen); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </p>
          <div class="contenedorGameIndividualImagen"> <?php if($game->imagen==null): ?>
            <img src="imagenes/filenotfound.png" width="85px" height="85px" style="border-radius: 50% 50% 50% 50%;">
            
            <?php else: ?>
            <img src="<?php echo e($game->imagen); ?>" width="90px" height="90px" />

            <?php endif; ?>
            <a class="btn btn-warning" href="<?php echo e(route('games.show',$game->id)); ?>" class="btn btn"><span class="fa fa-eye"></span>&nbsp;</a>
            <?php if($user!=null): ?>
            <?php if(auth()->user()->can('agregarABiblioteca',$user)): ?>
         
            <form action="<?php echo e(route('games.agregarAColeccion',['user'=>$user,'game'=>$game])); ?>" method="post">
              <?php echo csrf_field(); ?>
              <button type="submit" class="btn btn-success" ><span class="fa fa-plus-circle"></span>&nbsp;</button>
            </form>
          

          <?php if(auth()->user()->can('permisosAdmin',['App\Models\User',$user])): ?>
          
            <a class="btn btn-warning" href="<?php echo e(route('games.edit',$game->id)); ?>"><span class="fa fa-pencil"></span>&nbsp;</a>
          

          
            <form action="<?php echo e(route('games.destroy',$game->id)); ?>" method="post">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit" value="Eliminar" class="btn btn-danger"><span class="fa fa-trash"></span>&nbsp;</button>
            </form>
          
          <?php endif; ?>
          <?php endif; ?>
          <?php endif; ?>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>



      <table class="table table-sm table-hover table-bordered" style="display: flex;align-items:center; background-color: white !important;" id="contenedorGames">
        <tr style="background-color: #b3c4dc !important;">

          <td><strong>NOMBRE</strong></td>

          <td><strong>AÑO DE LANZAMIENTO</strong></td>
          <td><strong>GENEROS</strong></td>
          <td><strong>PLATAFORMAS</strong></td>

          <td><strong>IMAGEN</strong></td>
          <td></td>
          <td></td>
          </strong>
        </tr>
        <?php $__currentLoopData = $gameList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

          <td><?php echo e($game->nombre); ?></td>

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

          <td>
            <?php if($game->imagen==null): ?>
            <img src="imagenes/filenotfound.png" width="200px" height="250px">

            <?php else: ?>
            <img src="<?php echo e($game->imagen); ?>" />

            <?php endif; ?>
          </td>

          <td> <a class="btn btn-warning" href="<?php echo e(route('games.show',$game->id)); ?>" class="btn btn">Ver juego</a></td>
          <?php if($user!=null): ?>
          <?php if(auth()->user()->can('agregarABiblioteca',$user)): ?>
          <td>
            <form action="<?php echo e(route('games.agregarAColeccion',['user'=>$user,'game'=>$game])); ?>" method="post">
              <?php echo csrf_field(); ?>
              <input type="submit" class="btn btn-success" value="+">
            </form>
          </td>

          <?php if(auth()->user()->can('permisosAdmin',['App\Models\User',$user])): ?>
          <td>
            <a class="btn btn-warning" href="<?php echo e(route('games.edit',$game->id)); ?>">Editar</a>
          </td>

          <td>
            <form action="<?php echo e(route('games.destroy',$game->id)); ?>" method="post">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <input type="submit" value="Eliminar" class="btn btn-danger">
            </form>
          </td>
          <?php endif; ?>
          <?php endif; ?>
          <?php endif; ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </table>






    </div>
  </div>
</div>






<?php
$contador = 1;

?>
<div class="col-md-4">
  <?php if(auth()->user()!=null): ?>
  <table class="table table-striped table-dark " style="display: flex;align-items:center" id="contenedorVotaciones">
    <tr>
      <td>NOMBRE</td>
      <td>DESCRIPCION</td>
     
      <td></td>
    </tr>

    <?php $__currentLoopData = $votacionesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $votacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>




      <?php if($votacion->participantes==null && $votacion->activo==1): ?>

      <td><?php echo e($votacion->nombre); ?></td>
      <td><?php echo e($votacion->descripcion); ?></td>
    
      <td><button class="btn btn-info votaciones" onclick="votar(this.id)" href="<?php echo e(route('votaciones.edit',$votacion->id)); ?>" id="votar<?php echo e($votacion->id); ?>">Votar</button></td>

      <?php endif; ?>



      <?php if($votacion->participantes!=null && $votacion->activo==1): ?>
      <?php if(!in_array($user->id,json_decode($votacion->participantes))): ?>{

      <td><?php echo e($votacion->nombre); ?></td>
      <td><?php echo e($votacion->descripcion); ?></td>
      
      <td><button class="btn btn-info votaciones" onclick="votar(this.id)" href="<?php echo e(route('votaciones.edit',$votacion->id)); ?>" id="votar<?php echo e($votacion->id); ?>">Votar</button></td>
      <?php endif; ?>
      <?php endif; ?>

      <!--http://proyecto.local/votaciones/1/edit-->
    </tr>
    <?php echo e($contador++); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



  </table>
  <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>






<?php $__env->startSection('adminnavbar'); ?>

<?php if($user!=null): ?>
<?php if(auth()->user()->can('permisosAdmin',['App\Models\User',$user])): ?>
<nav class="navbar navbar-light bg-dark fixed-top" id="navbaradmin">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Herramientas de administrador</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#paneladministrador" aria-controls="paneladministrador">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="paneladministrador" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Administrador</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('users.index')); ?>">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('votaciones.index')); ?>">Votaciones</a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </div>
</nav>

<?php endif; ?>
<?php endif; ?>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/proyect/index.blade.php ENDPATH**/ ?>