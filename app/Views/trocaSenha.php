<?php echo $this->include('headerLogado.php', array('titulo' => $titulo)); ?>

    <h1 class="h1 text-center">Suas informações</h1>
    <br>
<?php if (isset($msgAltFalha)): ?>
    <div class="alert alert-danger" role="alert" >
        <?php echo $msgAltFalha; ?>
    </div>
<?php endif; ?>
    <br>
    <div class="row align-items-center">
        <div class="col">
            <label for="Nome">Nome de usuário</label>
            <div class="alert alert-primary" role="alert">
                <?php echo $infoUsuario[0]->nome; ?>
            </div>
        </div>

        <div class="col">
            <label for="email">E-mail</label>
            <div class="alert alert-primary" role="alert">
                <?php echo $infoUsuario[0]->email; ?>
            </div>
        </div>
    </div>
    <br>

<br>
<form id="formAlteracao" method="POST" action="<?php echo base_url('/usuario/confirmatroca') ?>">

    <div class="row align-items-center">
        <div class="col">
            <label for="Senha">Nova senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="XXXXXXXX">
        </div>
        <div class="col">
            <label for="ConfirmaSenha">Confirme sua senha</label>
            <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" placeholder="XXXXXXXX">
        </div>
    </div>
    <br>
    <div class="alert alert-primary" role="alert">
        Responda a pergunta de segurança: <?php echo $infoUsuario[0]->pergunta; ?>
    </div>

    <input type="text" class="form-control" id="resposta" name="resposta" placeholder="Resposta">
    <br>
    <button type="submit" class="btn btn-primary">Alterar senha</button>

</form>



<br>
<?php echo $this->include('footer.php'); ?>