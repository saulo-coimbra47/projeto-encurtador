<?php echo $this->include('header.php', array('titulo' => $titulo)); ?>


<?php if (isset($msgErro)) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $msgErro; ?>
    </div>
<?php endif; ?>
<div class="card" id="card-cadastro" style="background-color:#87CEFA">
    <div class="card-header">
        <h1 class="h1 text-center">Cadastro</h1>
    </div>
    <div class="card-body">
        <form id="formCadastro" method="POST" action="<?php echo base_url('cadastro/inserir') ?>">

            <div class="form-group">
                <label for="NomeUsuario">Nome de usuário</label>
                <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" placeholder="nome_usuario1234">
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="exemploemail@mail.com">
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
            </div>

            <div class="row align-items-center">
                <div class="col">
                    <label for="Senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="XXXXXXXX">
                </div>
                <div class="col">
                    <label for="ConfirmaSenha">Confirme sua senha</label>
                    <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" placeholder="XXXXXXXX">
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col">
                    <label for="Pergunta">Pergunta de segurança</label>
                    <select class="form-control" id="opt" name="pergunta">
                        <option value="" disabled selected>
                            <h>Pergunta de segurança</h>
                        </option>
                        <option value="Qual nome do seu primeiro animal de estimação?">
                            <p>Qual nome do seu primeiro animal de estimação?</p>
                        </option>
                        <option value="Em que cidade você nasceu?">
                            </p>Em que cidade você nasceu?</p>
                        </option>
                        <option value="Qual é a sua comida favorita?">
                            </p>Qual é a sua comida favorita?</p>
                        </option>
                        <option value="Qual é o nome do(a) seu(sua) professor(a) preferido(a)?">
                            </p>Qual é o nome do(a) seu(sua) professor(a) preferido(a)?</p>
                        </option>
                        <option value="Qual nome do seu melhor amigo(a) de infância?">
                            </p>Qual nome do seu melhor amigo(a) de infância?</p>
                        </option>
                    </select>
                </div>
                <div class="col">
                    <label for="Resposta">Sua resposta</label>
                    <input type="text" class="form-control" id="resposta" name="resposta" placeholder="Resposta">
                    <small id="respostaHelp" class="form-text text-muted">Salve a sua resposta em um local seguro, ela é a chave de recuperação para a sua conta!</small>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            </div>
        </form>
    </div>
</div>



<br>

<?php echo $this->include('footer.php'); ?>