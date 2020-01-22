<div class="col-xl-12 col-sm-12">
  <h3>Musicas cadastradas</h3>
  <div class="table-responsive">
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
        <?php
// pegando dados do banco da playlist->musica
$sql = "SELECT * FROM musicas";

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
										                <td><button type= "button" class= "btn btn-primary btn-musica-editar">editar</button></td>
										                <td>
										                  <a type="button" class="btn btn-danger" href="excluir.php?musicaId=<?php echo $row['id']; ?>">excluir</a>
										                </td>
										              </form>
										            <?php endwhile;?>
          </tr>
        </tbody>
      </table>
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
            <td><p><p>nome da musica</p><input type="text" name="nome"></p></td>
            <td><p><p>nome do artista</p><input type="text" name="artista"></p></td>
            <td><p><p>tipo</p><input type="text" name="tipo"></p></td>
          </div>
          <div class= "modal-footer" >
            <div class="container">
              <div class="row">
                <button type= "button" class= "btn btn-danger" data-dismiss= "modal" >cancelar</button>
                <button type= "submit" class= "btn btn-success" >salvar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endif;?>
</div>