    <div class="col-xl-4 col-12">
      <h2>gerar playlist</h2>
      <form method="POST" action="gerar.php">

        <p>Agitada <br><input class="form-control" required="required" name="quantidadeAgitada" type="number"></p>
        <p>transição <br><input class="form-control" required="required" name="quantidadeTransicao" type="number"></p>
        <p>Adoração<br><input class="form-control" required="required" name="quantidadeAdoracao" type="number"></p>
        <p><button  type="submit" class="btn btn-success">gerar</button></p>
		<?php aviso();?>
      </form>
  </div>
</div>
