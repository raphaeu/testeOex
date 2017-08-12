<?php include(ROOT_VIEW . '/layout/header.php'); ?>

<h1>Editar usuário</h1>

<form method="post" action="/user/<?=$id?>/edit">
    <input type="hidden" name="_method" value="put">
    <?php include(ROOT_VIEW . '/user/form.php'); ?>
    <button type="submit" class="btn btn-primary"><span class=" glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Gravar</button>
    <a href='/users' type="button" class="btn btn-default" >Cancelar</a>
</form>

<?php include(ROOT_VIEW . '/layout/footer.php'); ?>

