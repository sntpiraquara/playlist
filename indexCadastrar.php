<body>
  <div class="container">
    <div class="row">
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
            <label for="tipo">Tipo</label><br>
            <select name="tipo" id="tipo" class="form-control">
              <option value="agitada">Agitada</option>
              <option value="transição">Transição</option>
              <option value="adoração">Adoração</option>
            </select>
          </p>

          <p>
            <button type="submit" class="btn btn-success">cadastrar</button>
            <a class="btn btn-danger" href="logout.php">logout</a>
          </p>

        </form>
      </div>
