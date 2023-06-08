<?php $__env->startSection('content'); ?>
<div class="container" style="background-color: white; border-radius: 20px 20px 20px 20px !important; border:2px solid grey">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 id="titulogameshow"><?php echo e($game->nombre ?? ''); ?></h1>


            <?php if($game->imagen==null): ?>
            <div id="contenedorimagenshow">
                <img src="../imagenes/filenotfound.png" id="imagenjuegoshow" class="imagenjuego">

                <?php else: ?>
                <img src="../<?php echo e($game->imagen); ?>" id="imagenjuegoshow" class="imagenjuego"/>
            </div>
            <?php endif; ?>


            <?php if($message = Session::get('tratamientoeliminado')): ?>
            <div class="alert alert-success">
                <h4><?php echo e($message); ?></h4>
            </div>
            <?php endif; ?>

            <hr>

            <div class="form-group">
                <label for="nombre" class="col-form-label" style="font-weight:600;font-size:17px">Nombre</label><br>
                <label for="nombre" class="col-form-label"><?php echo e($game->nombre ?? ''); ?></label>
            </div>
            <hr>
            <div class="form-group">
                <label for="descripcion" class="col-form-label" style="font-weight:600;font-size:17px">Apellidos</label><br>
                <label for="descripcion" class="col-form-label"><?php echo e($game->descripcion ?? ''); ?></label>
            </div>
            <hr>
            <div class="form-group">
                <label for="anyoLanzamiento" class="col-form-label" style="font-weight:600;font-size:17px">Año de lanzamiento</label><br>
                <label for="anyoLanzamiento" class="col-form-label"><?php echo e($game->anyoLanzamiento ?? ''); ?></label>
            </div>
            <hr>
            <div class="form-group">
                <label for="generos" class="col-form-label" style="font-weight:600;font-size:17px">Generos</label><br>
                <?php $__currentLoopData = $game->generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label for="generos" class="col-form-label"><?php echo e($g ?? ''); ?></label><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div class="form-group">
                <label for="plataformas" class="col-form-label" style="font-weight:600;font-size:17px">Plataformas</label><br>
                <?php $__currentLoopData = $game->plataformas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label for="plataformas" class="col-form-label"><?php echo e($p ?? ''); ?></label><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>


            <hr>




            </table>



            <!-- COMENTARIOS-->
            <h2>Comentarios</h2>

            <?php if(Auth::check()): ?>
            <form action="<?php echo e(route('comentarios.store',['game_id'=>$game->id,'user_id'=>$user->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card card-white post">
                    <div class="post-heading">
                        <?php if(auth()->user()->can('escribirComentarios',['App\Models\Comentario',$game])): ?>

                        <div class="form-group">
                            <label for="">Escribir un comentario</label>
                            <textarea class="form-control" rows="3" name="contenidocomentario"></textarea>
                        </div>


                     
<button type="submit" class="btn btn-success">Crear comentario <span class="fa fa-comments"></span>&nbsp;</button>
                        <?php else: ?>

                        <div class="alert alert-danger">
                            <h4>Para evitar el spam, solo puedes crear 6 comentarios por juego <br>(incluidas respuestas)</h4>
                        </div>
                        <?php endif; ?>
                    </div>

                </div>
            </form>
            <a href="<?php echo e(route('proyects.index')); ?>" class="btn btn-warning" style="width: 100px !important; top:0 !important" >Home</a>
            <?php endif; ?>





            <?php if($comentarios!=null && Auth::check()): ?>
            <?php $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($comentario->padre_id==null): ?>
            <form action="<?php echo e(route('comentarios.responder',['game_id'=>$game->id,'user_id'=>$user->id,'comentario'=>$comentario])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card w-75">
                    <div class="card-body contenedorcomentarios" style="border-radius: 1em 1em 1em 1em">
                        <h5 class="card-title">
                        <?php if($comentario->usuario->imagen!=null): ?>
                       
                           <img src="../<?php echo e($comentario->usuario->imagen); ?>" class="imagencomentario" />
                           <?php else: ?>
                           <img src="../imagenesperfil/userdefault.png" class="imagencomentario" />
                           <?php endif; ?>
                          <?php echo e($comentario->usuario->name); ?> </h5>
                   
                        
                        <h6><?php echo e($comentario->updated_at); ?></h6>
                        <p class="card-text"><?php echo e($comentario->contenido); ?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Responder al comentario</label>
                    <textarea class="form-control" rows="2" name="contenidocomentario"></textarea>
                </div>

                <input type="submit" value="Responder" class="btn btn-warning">
            </form>
            <?php if($comentario->hijos->isEmpty()==false): ?>
            <h4>Respuestas</h4>


            <button class="btn btn-outline-danger esconder" id="esconder<?php echo e($comentario->id); ?>" onclick="escondercomentarios('padre<?php echo e($comentario->id); ?>',this.id)">Mostrar respuestas <span class="fa fa-sort-desc"></span>&nbsp;</button>
            <span class="glyphicon glyphicon-chevron-down"></span>
            <span class="glyphicon glyphicon-pencil">
                <?php $__currentLoopData = $comentario->hijos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hijo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="card w-75 subcomentarios<?php echo e($hijo->padre_id); ?>" style="width: 300px !important; display:none">
                    <div class="card-body">
                        <h5 class="card-title">
                        
                            <?php if($comentario->usuario->imagen!=null): ?>
                            <h3><?php echo e($hijo->user_id); ?></h3>
                         
                            <img src="../<?php echo e($comentario->usuario->imagen); ?>" class="imagencomentario" />
                           <?php else: ?>
                           <img src="../imagenesperfil/userdefault.png" class="imagencomentario" />
                           <?php endif; ?>
                            <?php echo e(\App\Models\User::find($hijo->user_id)->name); ?></h5>
                        <h6><?php echo e($hijo->updated_at); ?></h6>
                        <p class="card-text"><?php echo e($hijo->contenido); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>



                <!--Fin subcomentario-->
                <hr>
                <?php endif; ?>



                <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


                <!--NO logeados -->




                <?php if($comentarios!=null && !Auth::check()): ?>
                <?php $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($comentario->padre_id==null): ?>
                <div class="card w-75">
                    <div class="card-body contenedorcomentarios" style="background-color: grey; border-radius: 1em 1em 1em 1em">
                        <h5 class="card-title"><?php echo e($comentario->usuario->name); ?></h5>
                        <h6><?php echo e($comentario->updated_at); ?></h6>
                        <p class="card-text"><?php echo e($comentario->contenido); ?></p>
                    </div>
                </div>




                <?php if($comentario->hijos->isEmpty()==false): ?>
                <h4>Respuestas</h4>


                <button class="btn btn-outline-danger esconder" onclick="escondercomentarios('padre<?php echo e($comentario->id); ?>')">Esconder comentarios</button>

                <?php $__currentLoopData = $comentario->hijos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hijo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="card w-75 subcomentarios<?php echo e($hijo->padre_id); ?>" style="width: 300px !important; display:none">
                    <div class="card-body">
                        
                        <h5 class="card-title"><?php echo e(\App\Models\User::find($hijo->user_id)->name); ?></h5>
                        <h6><?php echo e($hijo->updated_at); ?></h6>
                        <p class="card-text"><?php echo e($hijo->contenido); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>



                <!--Fin subcomentario-->
                <hr>
                <?php endif; ?>



                <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
</div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/game/show.blade.php ENDPATH**/ ?>