    <div class="col-xl-4 col-12">
      <h2>gerar playlist</h2>
      <form method="POST" action="gerar.php">

        <p><label for="agitada">agitada</label><br>
          <input id="agitada" class="form-control" required="required" name="quantidadeAgitada" type="number">
        </p>
        <p><label for="transição">transição</label><br>
          <input id="transição" class="form-control" required="required" name="quantidadeTransicao" type="number">
        </p>
        <p><label for="adoração">Adoração</label><br>
          <input id="adoração" class="form-control" required="required" name="quantidadeAdoracao" type="number">
        </p>
        <p><button  type="submit" class="btn btn-success">gerar</button></p>
		<?php aviso();?>
      </form>
  </div>
</div>
