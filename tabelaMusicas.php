<div class="col-xl-12 col-sm-12">
  <div class="table-responsive ">
    <div class="container">
      <h3>Musicas</h3>
      <table class="tabela table">
        <thead>
          <tr>
            <th>nome da musica</th>
            <th>nome do artista</th>
            <th>tipo de musica</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <!-- corpo da tabela  -->
        <tbody>
          <?php $sql = "SELECT * FROM musicas";

$todasMusicas = mysqli_query($db, $sql);

if (mysqli_num_rows($todasMusicas) > 0):
    while ($row = mysqli_fetch_assoc($todasMusicas)): ?>
				             <form action="editar.php" method="post">
				              <tr>
				                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
				                <input type="hidden" name="nome" value="<?php echo $row['nomeMusica']; ?>">
				                <input type="hidden" name="artista" value="<?php echo $row['nomeArtista']; ?>">
				                <input type="hidden" name="tipo" value="<?php echo $row['tipo']; ?>">

				                <td><?php echo $row['nomeMusica']; ?></td>
				                <td><?php echo $row['nomeArtista']; ?></td>
				                <td><?php echo $row['tipo']; ?></td>
				                <td><button type= "button" class= "btn btn-primary btn-musica-editar">Editar</button></td>
				                <td>
				                  <a type="button" class="btn btn-danger" href="excluir.php?musicaId=<?php echo $row['id']; ?>">excluir</a>
				                </td>
				              <?php endwhile;?>
            </tr>
          </form>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
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
</div>
<?php endif;?>
</div>
