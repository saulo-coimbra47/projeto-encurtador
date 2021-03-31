<?php echo $this->include('header.php', array('titulo' => $titulo)); ?>
    <br>
    <div class="container">
    
        <?php if (isset($msgErro)): ?>
            <div class="row justify-content-center">
                <div class="col-md-4 align-self-center">
                    <div class="alert alert-danger" role="alert" >
                        <?php echo $msgErro; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($msgSucesso)): ?>
            <div class="row justify-content-center">
                <div class="col-md-4 align-self-center">
                    <div class="alert alert-success" align="center">    
                       <strong> <?php echo $msgSucesso; ?> </strong>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        
        

        <form id="formLogin" method="POST" action="<?php echo base_url('usuario/entrar') ?>">

        
            
            <h1 class="h1 text-center">Login</h1>

            <div class="row justify-content-center" style="margin-top:4vh">
                <div class="col-md-3 align-self-center">
                    <div class="form-group">
                        <label for="Usuario">Nome do usuário</label>  
                        <input id="nome" name="nome" placeholder="" class="form-control input-md" type="text">   
                    </div>

                    <div class="form-group">
                        <label for="Senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="">
                    </div>
                </div>
            </div>

            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary btn-lg">Fazer login</button>
                <br>
                <br>
                <div style="font-size:small;">
                    Não possui uma conta? <a href="<?php echo base_url('/cadastro'); ?>">Cadastre-se</a>
                </div>
        
                <div style="font-size: small;">
                    Esqueceu sua senha? <a href="<?php echo base_url('/recuperacao'); ?>">Esqueci minha senha</a>
                </div>
            </div>
        </form>

    </div>

    <br>

<?php echo $this->include('footer.php'); ?>