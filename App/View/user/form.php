<div class="form-group <?=isset($erros['id'])?'has-error':''?>">
    <label for="id">ID</label>
    <input type="text" name="id" value="<?=isset($user)?$user->getId():''?>" class="form-control" placeholder="ID">
    <?php if (isset($erros['id'])) { ?>
        <p class="help-block"><?=$erros['id']?></p>
    <?php } ?>
</div>
<div class="form-group <?=isset($erros['password'])?'has-error':''?>">
    <label for="id">Password</label>
    <input type="text" name="password" value="<?=isset($user)?$user->getPassword():''?>" class="form-control" placeholder="Password">
    <?php if (isset($erros['password'])) { ?>
        <p class="help-block"><?=$erros['password']?></p>
    <?php } ?>
</div>

<div class="form-group <?=isset($erros['descricao'])?'has-error':''?>">
    <label for="descricao">Descricao</label>
    <input type="text" name="descricao" value="<?=isset($user)?$user->getDescricao():''?>" class="form-control" placeholder="Descricao">
    <?php if (isset($erros['descricao'])) { ?>
        <p class="help-block"><?=$erros['descricao']?></p>
    <?php } ?>
</div>
    
<div class="form-group <?=isset($erros['desvio'])?'has-error':''?>">
    <label for="desvio">Desvio</label>
    <input type="text" name="desvio" value="<?=isset($user)?$user->getDesvio():''?>" class="form-control" placeholder="Desvio">
    <?php if (isset($erros['desvio'])) { ?>
        <p class="help-block"><?=$erros['desvio']?></p>
    <?php } ?>
</div>

<div class="form-group <?=isset($erros['falha'])?'has-error':''?>">
    <label for="falha">Falha</label>
    <input type="text" name="falha" value="<?=isset($user)?$user->getFalha():''?>" class="form-control" placeholder="Falha">
    <?php if (isset($erros['falha'])) { ?>
        <p class="help-block"><?=$erros['falha']?></p>
    <?php } ?>
</div>