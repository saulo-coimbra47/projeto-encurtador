<?php 
    echo $this->include( $header ,array('titulo' => $titulo) );
?>
<br>
<br>
<?php if (isset($msgAltSucesso)): ?>
    <div class="row justify-content-center">
        <div class="col-md-4 align-self-center">
            <div class="alert alert-success" role="alert" >
                <?php echo $msgAltSucesso; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (isset($msgErroURL)): ?>
    <div class="alert alert-danger" role="alert" >
        <?php echo $msgErroURL; ?>
    </div>
<?php endif; ?>
    <div class="container" style="text-align: center;">
        <div class="alert alert-alert" role="alert" style="text-align: center;" id="erro" hidden>

        </div>
        <img src="../public/img/logoencurtador.png" class="img-fluid" width="620" height="420" alt="Encurtador">
    </div>
    <br>
    <div class="container">
        <div class="card" style="background-color: #3f536e; border-radius: 10px;">
            <div class="card-header">
                <form id="formURL" action="" method="">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">URL</span>
                        </div>
                        <input type="text" class="form-control" name="urlOriginal" id="urlOriginal" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>
            </div>
            <div class="card-body">
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-primary btn-lg" name="botaoencurtar" id="botaoencurtar">Encurtar</button>
                    </div>
                </form>
                <br>
                <div id="mostraurl" hidden>
                    <div class="alert alert-success" role="alert" style="text-align: center;" id="urlcurta">
                       
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <button type="button" class="btn btn-primary" id="copiaurl">Copiar url curta</button>
                        <a href="<?php echo base_url(); ?>"><button type="button" class="btn btn-primary">Encurtar outra URL</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br>

<?php echo $this->include('footer.php'); ?>