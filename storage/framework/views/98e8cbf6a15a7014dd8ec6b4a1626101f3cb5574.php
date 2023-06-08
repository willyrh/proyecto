<?php $__env->startSection('content'); ?>
<div class="container contenedorcomentarios" style="" >
    <div class="row justify-content-center">
       
           


            <?php if($message = Session::get('respuesta')): ?>
            <div class="alert alert-success">
                <h4><?php echo e($message); ?></h4>
            </div>
            <?php endif; ?>

            

            <hr>
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



            <h2>Comentarios</h2>

            <?php if(Auth::check()): ?>
            <form action="<?php echo e(route('comentariosresenyas.store',['resenya_id'=>$resenya->id,'user_id'=>$user->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card card-white post">
                    <div class="post-heading">
                       
                        <?php if(auth()->user()->can('escribirComentariosResenya', $resenya)): ?> 
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





            <?php if($comentariosresenya!=null && Auth::check()): ?>
            <?php $__currentLoopData = $comentariosresenya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($comentario->padre_id==null): ?>
            <form action="<?php echo e(route('comentariosresenyas.responder',['resenya_id'=>$resenya->id,'user_id'=>$user->id,'comentario'=>$comentario])); ?>" method="post">
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
                        <p class="card-text textoajustado"><?php echo e($comentario->contenido); ?></p>
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


            <button class="btn btn-danger esconder" id="esconder<?php echo e($comentario->id); ?>" onclick="escondercomentarios('padre<?php echo e($comentario->id); ?>',this.id)">Mostrar respuestas <span class="fa fa-sort-desc"></span>&nbsp;</button>
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
                        <p class="card-text textoajustado"><?php echo e($hijo->contenido); ?></p>
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




                <?php if($comentariosresenya!=null && !Auth::check()): ?>
                <?php $__currentLoopData = $comentariosresenya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($comentario->padre_id==null): ?>
                <div class="card w-75">
                    <div class="card-body contenedorcomentarios" >
                        <h5 class="card-title"><?php echo e($comentario->usuario->name); ?></h5>
                        <h6><?php echo e($comentario->updated_at); ?></h6>
                        <p class="card-text textoajustado"><?php echo e($comentario->contenido); ?></p>
                    </div>
                </div>




                <?php if($comentario->hijos->isEmpty()==false): ?>
                <h4>Respuestas</h4>


                <button class="btn btn-danger esconder" onclick="escondercomentarios('padre<?php echo e($comentario->id); ?>')">Esconder comentarios</button>

                <?php $__currentLoopData = $comentario->hijos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hijo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="card w-75 subcomentarios<?php echo e($hijo->padre_id); ?>" style="display:none">
                    <div class="card-body">
                        
                        <h5 class="card-title"><?php echo e(\App\Models\User::find($hijo->user_id)->name); ?></h5>
                        <h6><?php echo e($hijo->updated_at); ?></h6>
                        <p class="card-text textoajustado"><?php echo e($hijo->contenido); ?></p>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/resenya/show.blade.php ENDPATH**/ ?>