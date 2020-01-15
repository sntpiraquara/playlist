<footer>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
  $('.btn-musica-editar').click(function(){
    const $el = $(this);
    const row = $el.parents('tr')

    const id = row.find('input[name="id"]').val()
    const nome = row.find('input[name="nome"]').val()
    const artista = row.find('input[name="artista"]').val()
    const tipo = row.find('input[name="tipo"]').val()

    const $modal = $('#musicaEditarModal')

    $modal.on('shown.bs.modal', function () {
      $modal.find('input[name="id"]').val(id)
      $modal.find('input[name="nome"]').val(nome)
      $modal.find('input[name="artista"]').val(artista)
      $modal.find('input[name="tipo"]').val(tipo)
    })

    $modal.modal('show')
  })
</script>
</footer>
</body>
</html>
