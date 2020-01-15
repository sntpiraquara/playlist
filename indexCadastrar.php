<div class="col-xl-6 col-12">
  <p>
    <h2>cadastrar musicas</h2>
  </p>
  <form method="POST" action="cadastrarMusica.php">
    <p>
      <label for="nome">Nome da musica</label><br>
      <input class="form-control" id="nome" required="required" type="text" name="nome" placeholder="Nome da Musica">
    </p>

    <p>
      <label for="artista">Nome do artista</label><br>
      <input class="form-control" id="artista" required="required" type="text" name="artista" placeholder="Nome do Artista/Banda">
    </p>

    <p>
      <input id="agitada" required="required" type="radio" name="tipo" value="agitada">
      <label for="agitada">Agitada</label>
    </p>

    <p>
      <input id="transicao" required="required" type="radio" name="tipo" value="transição">
      <label for="transicao">Transição</label>
    </p>

    <p>
      <input id="adoracao" required="required" type="radio" name="tipo" value="adoração">
      <label for="adoracao">Adoração</label>
    </p>

    <p>
      <button type="submit" class="btn btn-success">cadastrar</button>
    <a class="btn btn-danger" href="logout.php">logout</a>
    </p>

  </form>
</div>
