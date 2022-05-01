<div class="row mt-4">
    <div class="col-sm-5">
        <div class="card p-4">
            <?php
            session();
            $session = \Config\Services::session();
            echo $session->getFlashdata('save_category');
            ?>
            <form action="<?= base_url() ?>/category/saveCategory" method="post">
                <div class="form-group mt-2">
                    <label>Titulo *</label>
                    <input type="text" name="title_category" value="<?= old('title_category') ?>" class="form-control p_input" required>
                    <span class="text-danger" style="font-size:12px;">
                        <?php echo session('errors.title_category'); ?>
                    </span>
                </div>
                <div class="form-group">
                    <label>Descripcion *</label>
                    <textarea name="description_category" value="<?= old('description_category') ?>" class="form-control p_input" required></textarea>
                    <span class="text-danger" style="font-size:12px;">
                        <?php echo session('errors.description_category'); ?>
                    </span>
                </div>


                <div class="text-center mt-4 pt-2">
                    <button type="submit" class="btn btn-primary  btn-block enter-btn">Guardar Categoria</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div>
<div class="bg-secondary rounded mt-4 mb-3">
    <h3 class="p-1 text-black">Mis Categorias</h3>
</div>
    <div>
        <div class="mt-3" style="display:grid; gap:10px;">

            <?php foreach ($categories as $category) : ?>
                <article class="bg-dark d-flex flex-wrap p-3 border-bottom border-right rounded">
                    <h4 class="text-white fw-bold mr-5">
                        <?= $category->title_category ?>
                    </h4>
                    <p class="mr-4"><?= $category->description_category ?></p>
                    <div>
                        <a title="Al hacer clic se eliminaran sus enlaces asociados"
                         href="<?= base_url() ?>/category/delete/<?= $category->id_category ?>" class="btn btn-outline-danger btn-sm">Eliminar <i class="mdi mdi-delete-outline"></i></a>
                    </div>
                </article>

            <?php endforeach; ?>

        </div>
    </div>
</div>