<div class="col-xl-4 col-12">
  <h2>Gerar Playlist</h2>

  <form method="POST" action="gerar.php">
    <div class="form-group">
      <label for="agitada">Agitada</label>
      <input id="agitada" class="form-control" required="required" name="quantidadeAgitada" type="number">
    </div>

    <div class="form-group">
      <label for="transição">Transição</label>
      <input id="transição" class="form-control" required="required" name="quantidadeTransicao" type="number">
    </div>

    <div class="form-group">
      <label for="adoração">Adoração</label>
      <input id="adoração" class="form-control" required="required" name="quantidadeAdoracao" type="number">
    </div>

    <button  type="submit" class="btn btn-success">Gerar</button>
    
    <?php aviso();?>

  </form>
</div>
