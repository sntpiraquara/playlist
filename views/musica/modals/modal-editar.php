<div class="modal fade" id="musicaEditarModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar musica</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true"> &times; </span>
        </button>
      </div>

      <div class="modal-body">
        <form action="actions/musica/editar.php" method="post">
          <input type="hidden" name="id" value="">

          <div class="form-group">
            <label for="nomeMusica">Título</label><br>
            <input id="nomeMusica" required="required" class="form-control" type="text" name="nome">
          </div>

          <div class="form-group">
            <label for="nomeArtista">Artista</label><br>
            <input id="nomeArtista" required="required" class="form-control" type="text" name="artista">
          </div>

          <div class="form-group">
            <label for="tipoMusica">Tipo</label><br>
            <select name="tipo" id="tipoMusica" class="form-control">
              <option value="agitada">Agitada</option>
              <option value="transição">Transição</option>
              <option value="adoração">Adoração</option>
            </select>
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
