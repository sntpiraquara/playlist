<div class= "modal fade" id= "musicaEditarModal" tabindex= "-1" role= "dialog" aria-labelledby= "exampleModalLabel" aria-hidden= "true">
  <div class= "modal-dialog" role= "document" >
    <div class= "modal-content" >
      <div class= "modal-header" >
        <h5 class= "modal-title" id= "exampleModalLabel" >Editar musica</h5>
        <button type= "button" class= "close" data-dismiss= "modal" aria-label= "Close">
          <span aria-hidden= "true" > &times; </span>
        </button>
      </div>
      <div class= "modal-body" >
        <!-- content -->
        <form action="editar.php" method="post">
          <input type="hidden" name="id" value="">
          <td>
            <p>
              <label for="nomeMusica">nome da musica</label><br>
              <input id="nomeMusica" required="required" class="form-control" type="text" name="nome" >
            </p>
          </td>

          <td>
            <p>
              <label for="nomeArtista">artista</label><br>
              <input id="nomeArtista" required="required" class="form-control" type="text" name="artista">
            </p>
          </td>
          <td>
            <label for="tipoMusica">tipo</label><br>
            <p>
              <select name="tipo" id="tipoMusica" class="form-control">
                <option value="agitada">Agitada</option>
                <option value="transição">Transição</option>
                <option value="adoração">Adoração</option>
              </select>
            </p>
          </td>
        </div>
        <div class= "modal-footer" >
          <button type= "button" class= "btn btn-danger" data-dismiss= "modal" >cancelar</button>
          <button type= "submit" class= "btn btn-success" >salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
