<div class="col-xl-12 col-sm-12">
  <div class="table-responsive ">
    <div class="container">
      <h3>Musicas</h3>

      <?php $sql = "SELECT * FROM musicas";

$todasMusicas = mysqli_query($db, $sql);

if (mysqli_num_rows($todasMusicas) > 0) {
    ?>
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
            <?php while ($row = mysqli_fetch_assoc($todasMusicas)): ?>
             <form action="editar.php" method="post">
              <tr>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="nome" value="<?php echo $row['nomeMusica']; ?>">
                <input type="hidden" name="artista" value="<?php echo $row['nomeArtista']; ?>">
                <input type="hidden" name="tipo" value="<?php echo $row['tipo']; ?>">

                <td><?php echo $row['nomeMusica']; ?></td>
                <td><?php echo $row['nomeArtista']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td><button type="button" class= "btn btn-primary btn-musica-editar">Editar</button></td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluir">
                 excluir
               </button></td>
              <?php
endwhile;
} else {
    echo "Nenhuma musica cadastrada ainda!";
}
?>
        </tr>
      </form>
    </tbody>
  </table>
</div>
</div>
</div>
<!-- Modal do editar -->
<?php
include 'modalEditar.php';
include 'modalExcluir.php';
?>
</div>
</div>
