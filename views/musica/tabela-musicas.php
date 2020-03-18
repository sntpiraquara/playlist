<?php
$sql = "SELECT * FROM musicas";
$musicasQuery = mysqli_query($db, $sql);
?>
<div class="col-xl-12 col-sm-12">
	<h3>Músicas</h3>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Artista</th>
				<th>Tipo</th>
				<th></th>
			</tr>
		</thead>
		<!-- corpo da tabela  -->
		<tbody>
			<?php if (mysqli_num_rows($musicasQuery) === 0): ?>
				<tr>
					<td colspan="4">
						<p class="text-center">Nenhuma música cadastrada ainda.</p>
					</td>
				</tr>
			<?php else:
    while ($musica = mysqli_fetch_assoc($musicasQuery)): ?>
							<tr>
								<form action="editar.php" method="post">
									<input type="hidden" name="id" value="<?=$musica['id'];?>">
									<input type="hidden" name="nome" value="<?=$musica['nomeMusica'];?>">
									<input type="hidden" name="artista" value="<?=$musica['nomeArtista'];?>">
									<input type="hidden" name="tipo" value="<?=$musica['tipo'];?>">
								</form>
								<td><?=$musica['nomeMusica'];?></td>
								<td><?=$musica['nomeArtista'];?></td>
								<td><?=$musica['tipo'];?></td>
								<td>
									<button type="button" class= "btn btn-primary btn-musica-editar">Editar</button>
									<button type="button" class="btn btn-danger btn-musica-excluir">Excluir</button>
								</td>
							</tr>
						<?php endwhile;?>
			<?php endif;?>
		</tbody>
	</table>
</div>
<?php
require_once 'modals/modal-editar.php';
require_once 'modals/modal-excluir.php';
?>
