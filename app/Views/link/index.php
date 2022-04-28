<div class="bg-secondary rounded">
    <h3 class="p-1 text-black">Mis Enlaces</h3>
</div>
<div class="p-2 row">
    <form action="<?=base_url()?>/link/selectedCategory" method="post" class="col-sm-5">
        <select class="bg-white btn-sm mr-1" name="selected_category">
            <option value="todos">Todos</option>
            <?php foreach($categories as $category): ?>
            <option value="<?=$category->id_category?>" ><?=$category->id_category?> <?=$category->title_category?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-outline-behance ">Cargar</button>
    </form>    
</div>
<div class="mt-3" style="display:grid; gap:10px;" >
    
    <?php foreach($links as $link): ?>
    <article class="bg-dark p-3 d-flex justify-content-around border-bottom border-right rounded" >
        <h5 class="text-white fw-bold" ><?=$link->title_link?></h5>
            <div class="d-flex flex-wrap justify-content-end" style="gap:5px;">
                <a href="#" class="btn btn-outline-primary btn-sm">Abrir <i class="mdi mdi-google-chrome"></i></a>
                <a href="#" class="btn btn-outline-success btn-sm">Copiar <i class="mdi mdi-content-copy"></i></a>
                <a href="<?=base_url()?>/link/delete/<?=$link->id_link?>" class="btn btn-outline-danger btn-sm">Eliminar <i class="mdi mdi-delete-outline"></i></a>
            </div>
    </article>
    
<?php endforeach; ?>

    <!-- <article class="bg-dark p-3 d-flex justify-content-around border-bottom border-right rounded" >
        <h5 class="text-white fw-bold" >Git</h5>
            <div class="d-flex flex-wrap justify-content-end" style="gap:5px;">
                <a href="#" class="btn btn-outline-primary btn-sm">Abrir <i class="mdi mdi-google-chrome"></i></a>
                <a href="#" class="btn btn-outline-success btn-sm">Copiar <i class="mdi mdi-content-copy"></i></a>
                <a href="#" class="btn btn-outline-danger btn-sm">Eliminar <i class="mdi mdi-delete-outline"></i></a>
            </div>
    </article>
    <article class="bg-dark p-3 d-flex justify-content-around border-bottom border-right rounded" >
        <h5 class="text-white fw-bold" >Azure</h5>
            <div class="d-flex flex-wrap justify-content-end" style="gap:5px;">
                <a href="#" class="btn btn-outline-primary btn-sm">Abrir <i class="mdi mdi-google-chrome"></i></a>
                <a href="#" class="btn btn-outline-success btn-sm">Copiar <i class="mdi mdi-content-copy"></i></a>
                <a href="#" class="btn btn-outline-danger btn-sm">Eliminar <i class="mdi mdi-delete-outline"></i></a>
            </div>
    </article> -->
    
   

</div>


