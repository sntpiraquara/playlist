<div class="col-xl-6 col-12">
  <h2>Cadastrar Música</h2>
  <form method="POST" action="../actions/musica/cadastrar.php">
    <div class="form-group">
      <label for="nome">Título</label>
      <input class="form-control" id="nome" required="required" type="text" name="nome" placeholder="Nome da Musica">
    </div>

    <div class="form-group">
      <label for="artista">Nome do artista</label>
      <input class="form-control" id="artista" required="required" type="text" name="artista" placeholder="Nome do Artista/Banda">
    </div>
    
    <div class="form-group">
      <label for="tipo">Tipo</label>
      <select name="tipo" id="tipo" class="form-control">
        <option value="agitada">Agitada</option>
        <option value="transição">Transição</option>
        <option value="adoração">Adoração</option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Cadastrar</button>
  </form>

</div>
<!-- /.col -->
