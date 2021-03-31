<?php echo $this->include('header.php', array('titulo' => $titulo)); ?>
<div class="container">
    <br>
    <form id="formRecuperacao1" method="" action="">

        <div class="row align-items-center">
            <div class="col">
                <label for="NomeUsuario">Informe seu nome de usuário</label>
                <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" placeholder="nome_usuario1234">
            </div>

            <div class="col">
                <label for="Email">Informe seu email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="exemploemail@mail.com">
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" id="continuar">Continuar</button>
    </form>
    <br>

    <form action="" method="" hidden id="formRecuperacao2">
        <div class="alert alert-primary" role="alert">
            Responda a pergunta de segurança: <div id="perguntaUsuario"> </div>
        </div>

        <input type="text" class="form-control" id="resposta" placeholder="Resposta">
        <br>
        <button type="submit" class="btn btn-primary">Enviar nova senha</button>

    </form>
    <br>
    <div class="row justify-content-center" style="margin-top:4vh">
        <div class="col-md-4 align-self-center">
            <div class="alert alert-success" role="alert" id="sucesso" hidden>

            </div>
        </div>
    </div>

    <div class="row justify-content-center" style="margin-top:4vh">
        <div class="col-md-4 align-self-center">
            <div class="alert alert-danger" role="alert" id="falha" hidden>

            </div>
        </div>
    </div>

    <div class="container" id="botoes" hidden style="margin-top:4vh">
        <div class="row justify-content-center">
            <div class="col-2">
                <a href="<?php echo base_url('/usuario') ?>"><button class="btn btn-primary" id="botaosucesso">Continuar</button></a>
            </div>
            <div class="col-2">
                <button class="btn btn-primary" id="botaocopiar">Copiar senha</button>
            </div>
        </div>
    </div>
    <a href="<?php echo base_url('/recuperacao') ?>"><button class="btn btn-primary" id="botaofalha" hidden>Tentar novamente</button></a>
</div>

<br>
<?php echo $this->include('footer.php'); ?>