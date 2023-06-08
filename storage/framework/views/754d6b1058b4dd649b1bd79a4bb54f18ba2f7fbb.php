<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Editar videojuego</h1>
            <a href="<?php echo e(route('games.index')); ?>" class="btn btn-primary">Index</a>

            <hr>

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


            <form action="<?php echo e(route('games.update',$game->id)); ?>" method="post">
                <?php echo csrf_field(); ?>

                <?php echo method_field("PUT"); ?>


                <div class="form-group">
                    <label for="dni">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo e($game->nombre ?? ''); ?>">
                    </label>
                </div>

                <div class="form-group">
                    <label for="nombre">descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo e($game->descripcion ?? ''); ?>">
                    </label>
                </div>

                <div class="form-group">
                    <label for="apellidos">anyoLanzamiento</label>
                    <input type="text" name="anyoLanzamiento" id="anyoLanzamiento" class="form-control" value="<?php echo e($game->anyoLanzamiento ?? ''); ?>">
                    </label>
                </div>


                <div class="form-group">
                    <label for="precio">Generos</label><br>
                    <select name="generos[]" multiple>
                        <?php $__currentLoopData = $game->generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="accion" <?php echo e($genero=='accion' ? 'selected': ''); ?>>accion</option>
                        <option value="aventura" <?php echo e($genero=="aventura" ? "selected": ''); ?>>aventura</option>
                        <option value="rpg" <?php echo e($genero=="rpg" ? "selected": ''); ?>>rpg</option>
                        <option value="misterio" <?php echo e($genero=="misterio" ? "selected": ''); ?>>misterio</option>
                        <option value="peleas" <?php echo e($genero=="peleas" ? "selected": ''); ?>>peleas</option>
                        <option value="puzles" <?php echo e($genero=="puzles" ? "selected": ''); ?>>puzles</option>
                        <option value="metroivania" <?php echo e($genero=="metroivania" ? "selected": ''); ?>>metroivania</option>
                        <option value="arcade" <?php echo e($genero=="arcade" ? "selected": ''); ?>>arcade</option>
                        <option value="simulacion" <?php echo e($genero=="simulacion" ? "selected": ''); ?>>simulacion</option>
                        <option value="musica" <?php echo e($genero=="musica" ? "selected": ''); ?>>musica</option>
                        <option value="estrategia" <?php echo e($genero=="estrategia" ? "selected": ''); ?>>estrategia</option>
                        <option value="historia" <?php echo e($genero=="historia" ? "selected": ''); ?>>historia</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>


                <div class="form-group">
                    <label for="precio">Plataformas</label><br>
                    <select name="plataformas[]" multiple>
                    <?php $__currentLoopData = $game->plataformas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plataformas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="PC" <?php echo e($plataformas=='PC' ? 'selected': ''); ?>>pc</option>
                        <option value="ps1" <?php echo e($plataformas=='ps1' ? 'selected': ''); ?>>ps1</option>
                        <option value="ps2" <?php echo e($plataformas=='ps2' ? 'selected': ''); ?>>ps2</option>
                        <option value="PS3" <?php echo e($plataformas=='PS3' ? 'selected': ''); ?>>ps3</option>
                        <option value="PS4" <?php echo e($plataformas=='ps4' ? 'selected': ''); ?>>ps4</option>
                        <option value="PS5" <?php echo e($plataformas=='ps5' ? 'selected': ''); ?>>ps5</option>
                        <option value="Xbox" <?php echo e($plataformas=='Xbox' ? 'selected': ''); ?>>xbox</option>
                        <option value="Xbox360" <?php echo e($plataformas=='Xbox360' ? 'selected': ''); ?>>xbox360</option>
                        <option value="XboxOne" <?php echo e($plataformas=='XboxOne' ? 'selected': ''); ?>>XboxOne</option>
                        <option value="XboxSeriesX" <?php echo e($plataformas=='XboxSeriesX' ? 'selected': ''); ?>>XboxSeriesX</option>
                        <option value="nintendo64" <?php echo e($plataformas=='nintendo64' ? 'selected': ''); ?>>nintendo64</option>
                        <option value="gameboy" <?php echo e($plataformas=='gameboy' ? 'selected': ''); ?>>gameboy</option>
                        <option value="nintendods" <?php echo e($plataformas=='nintendods' ? 'selected': ''); ?>>nintendo ds</option>
                        <option value="nintendo3ds" <?php echo e($plataformas=='nintendo3ds' ? 'selected': ''); ?>>nintendo 3ds</option>
                        <option value="wii" <?php echo e($plataformas=='wii' ? 'selected': ''); ?>>wii</option>
                        <option value="wiiu" <?php echo e($plataformas=='wiiu' ? 'selected': ''); ?>>wiiu</option>
                        <option value="Switch" <?php echo e($plataformas=='Switch' ? 'selected': ''); ?>>nintendo switch</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>





                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" id="precio" class="form-control" value="<?php echo e($game->precio ?? ''); ?>">
                    </label>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagen del videojuego</label>
                    <input class="form-control" type="file" id="imagenjuego" name="imagenjuego">
                </div>


               



                <input type="submit" value="Actualizar" class="btn btn-warning">
            </form>





        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/game/edit.blade.php ENDPATH**/ ?>