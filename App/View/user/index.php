<?php include(ROOT_VIEW . '/layout/header.php'); ?>


<h1  class="pull-left ">Lista de Usuarios</h1>
<a href="/user" class="btn btn-primary pull-right h1"><span class="glyphicon glyphicon-plus " aria-hidden="true"></span> Adicionar</a>

<div class="table table-responsive">
    <table class="table  table-striped" id="contatos-table"> 
        <thead> 
            <tr> 
                <th>ID</th> 
                <th>Password</th> 
                <th></th> 
            </tr> 
        </thead> 
        <tbody>
        <?php if (isset($users)) { ?>
        <?php foreach($users as $user) { ?>
            <tr>
                <td><?=$user->getId()?></td>
                <td><?=$user->getPassword()?></td>
                <td>
                    <div class="pull-right">
                        <form method="POST" action="/user/<?=$user->getId()?>"><input type="hidden" name="_method" value="DELETE">
                            <a href="/user/<?=$user->getId()?>/edit" class="btn btn-success btn-xs editar-btn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                            <button class="btn btn-danger btn-xs excluir-btn"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        <?php }else{ ?>
            <tr colspan="2">
                <td>Nenhum registro encontrado.</td>
            </tr>
        <?php } ?>

    </table>
</div>

<?php include(ROOT_VIEW . '/layout/footer.php'); ?>



