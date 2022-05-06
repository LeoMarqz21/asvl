<div class="row mt-4">
    <div class="col-sm-5">
        <form action="<?= base_url() ?>/user/edit-data-base" method="post">
            <h4 class="mb-3 bg-white text-black rounded p-1">Datos Base</h4>
            <div class="form-group">
                <label>Nombre Completo *</label>
                <input type="text" name="fullname" value="<?php echo old('fullname') ? old('fullname') : $active_login['fullname_user']; ?>" class="form-control p_input" title="rell" required />
                <span class="text-danger" style="font-size:12px;">
                    <?php echo session('errors.fullname'); ?>
                </span>
            </div>

            <div class="form-group">
                <label>Nombre de usuario *</label>
                <input type="text" value="<?php echo old('username') ? old('username') : $active_login['username_user']; ?>" name="username" class="form-control p_input" required />
                <span class="text-danger" style="font-size:12px;">
                    <?php echo session('errors.username'); ?>
                </span>
            </div>


            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-block enter-btn">Actualizar datos base</button>
            </div>

        </form>

    </div>

</div>


<div class="row mt-4">
    <div class="col-sm-5">
        <hr class="bg-warning mb-5 " />
        <form action="<?= base_url() ?>/user/edit-pass" method="post">
            <h4 class="mb-3 bg-white text-black rounded p-1">Cambiar Contraseña</h4>
            <div class="form-group">
                <label>Contraseña *</label>
                <input type="password" value="<?= old('password') ?>" name="password" class="form-control p_input" required />
                <span class="text-danger" style="font-size:12px;">
                    <?php echo session('errors.password'); ?>
                </span>
            </div>

            <div class="form-group">
                <label>Confirmar contraseña *</label>
                <input type="password" value="<?= old('pass_confirm') ?>" name="pass_confirm" class="form-control p_input" required />
                <span class="text-danger" style="font-size:12px;">
                    <?php echo session('errors.pass_confirm'); ?>
                </span>


                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Actualizar contraseña</button>
                </div>

        </form>

    </div>

</div>