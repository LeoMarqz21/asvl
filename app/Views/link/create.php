
<div class="row mt-4">
    <div class="col-sm-5">
        <div class="card p-4">
            <?php
              session();
              $session = \Config\Services::session();
              echo $session->getFlashdata('save_link');
            ?>
            <form action="<?= base_url() ?>/link/saveLink" method="post">
                <div class="form-group mt-2">
                    <label>Titulo *</label>
                    <input type="text" name="title_link" value="<?= old('title_link') ?>" class="form-control p_input" required >
                    <span class="text-danger" style="font-size:12px;">
                        <?php echo session('errors.title_link'); ?>
                    </span>
                </div>
                <div class="form-group">
                    <label>Url *</label>
                    <input type="url" name="url_link" value="<?= old('url_link') ?>" class="form-control p_input" required>
                    <span class="text-danger" style="font-size:12px;">
                        <?php echo session('errors.url_link'); ?>
                    </span>
                </div>
                <div class="form-group">
                    <label>Categoria a vincular *</label>
                    <select name="id_category_link" class="form-control text-white ">
                        <?php foreach($categories as $category): ?>
                            <option value="<?=$category->id_category?>"><?=$category->title_category?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="text-danger" style="font-size:12px;">
                        <?php echo session('errors.id_category_link'); ?>
                    </span>
                </div>

                <div class="text-center mt-4 pt-2">
                    <button type="submit" class="btn btn-primary  btn-block enter-btn">Guardar Enlace</button>
                </div>

            </form>
        </div>
    </div>
</div>