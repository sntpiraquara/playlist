<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Excluir música</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Deseja excluir a música <i><b><?php echo $row['nomeMusica']; ?></b></i>?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">não</button>
        <button type="button" class="btn btn-success"><a style="text-decoration:none; color: white;" href="excluir.php?musicaId=<?php echo $row['id']; ?>">sim</a></button>
      </div>
    </div>
  </div>
</div>