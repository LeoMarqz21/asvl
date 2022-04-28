
<div class="row mt-4">
    <div class="col-sm-4">
        <div class="card p-4">
            <form action="<?= base_url() ?>/link/saveLink" method="POST">
                <div class="form-group mt-2">
                    <label>Titulo *</label>
                    <input type="text" name="username" value="<?= old('title') ?>" class="form-control p_input" required >
                    <span class="text-danger" style="font-size:12px;">
                        <?php echo session('errors.title'); ?>
                    </span>
                </div>
                <div class="form-group">
                    <label>Url *</label>
                    <input type="url" name="url" value="<?= old('password') ?>" class="form-control p_input" required>
                    <span class="text-danger" style="font-size:12px;">
                        <?php echo session('errors.url'); ?>
                    </span>
                </div>
                <div class="form-group">
                    <label>Categoria a vincular *</label>
                    <select name="id_category" class="form-control text-white ">
                        <?php foreach($categories as $category): ?>
                            <option value="<?=$category->id_category?>"><?=$category->title_category?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="text-danger" style="font-size:12px;">
                        <?php echo session('errors.url'); ?>
                    </span>
                </div>

                <div class="text-center mt-4 pt-2">
                    <button type="submit" class="btn btn-primary  btn-block enter-btn">Guardar Enlace</button>
                </div>

            </form>
        </div>
    </div>
</div>