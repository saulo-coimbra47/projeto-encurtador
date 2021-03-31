<?php echo $this->include('headerLogado.php', array('titulo' => $titulo)); ?>

<br>
<br>
<div class="container">
<?php $cont = 0; ?>
  <div class="table-responsive">
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">URL original</th>
          <th scope="col">URL curta</th>
          <th scope="col">Acessos</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php foreach( $infoUrl as $url ): ?>
          <td><?php echo $url->url_original; ?></td>
          <td id="url<?php echo $cont; ?>"><?php echo $url->url_curta; ?></td>
          <td><?php echo $url->acessos; ?></td>
          <?php $cont += 1 ?>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</div>



<?php echo $this->include('footer.php'); ?>