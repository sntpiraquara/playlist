feather.replace();

$('.btn-musica-editar').click(function(){
  const $el = $(this);
  const row = $el.parents('tr')

  const id = row.find('input[name="id"]').val()
  const nome = row.find('input[name="nome"]').val()
  const artista = row.find('input[name="artista"]').val()

  const $modal = $('#musicaEditarModal')

  $modal.on('shown.bs.modal', function () {
    $modal.find('input[name="id"]').val(id)
    $modal.find('input[name="nome"]').val(nome)
    $modal.find('input[name="artista"]').val(artista)
  })

  $modal.modal('show')
});

$('.btn-musica-excluir').click(function(){
  const $el = $(this);
  const row = $el.parents('tr');
  const id = row.find('input[name="id"]').val();
  const nome = row.find('input[name="nome"]').val()

  const $modal = $('#musicaExcluirModal');

  $modal.on('shown.bs.modal', function () {
    $modal.find('.musica-modal-excluir-btn').attr('data-id', id);
    $modal.find('.musica-nome').html(nome);
  })

  $modal.modal('show')
});

$('.musica-modal-excluir-btn').click(function(){
  const id = $(this).attr('data-id');
  document.location.href = `/actions/musica/excluir.php?musicaId=${id}`
});

