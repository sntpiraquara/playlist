 <div>
  <div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">não</button>
          <button type="button" class="btn btn-success"><a class="buttonExcluir" href="excluir.php?musicaId=<?php echo $row['id']; ?>">sim</a></button>
        </div>
      </div>
    </div>
  </div>
</div>