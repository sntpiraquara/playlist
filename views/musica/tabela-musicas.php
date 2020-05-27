<?php

$total_registros_por_pagina = "10";

$inicio = $pc - 0;
$inicio = $inicio * $total_registros_por_pagina;

$query_todos = "SELECT m.id, m.nomeMusica, m.id_artista, a.nome
FROM musicas m INNER JOIN artistas a
ON m.id_artista = a.id";

$query_limite = $query_todos . " LIMIT " . $inicio;
$limite = mysqli_query($db, $query_limite);
$todos = mysqli_query($db, $query_todos);

$count_rows = mysqli_num_rows($todos); // verifica o numero total de registos

$count_pages = $count_rows / $total_registros_por_pagina; // verifica a quantidade de paginas

//criando os botões de anterios e proximo
$anterior = $pc - 1;
$proximo = $pc + 1;?>
<div class="col-xl-12 col-sm-12">
	<h3>Músicas</h3>
		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<th>Nome</th>
				<th>Artista</th>
				<th></th>
			</tr>
		</thead>
		<!-- corpo da tabela  -->
		<tbody>
			<?php if (mysqli_num_rows($todos) === 0): ?>
				<tr>
					<td colspan="4">
						<p class="text-center">Nenhuma música cadastrada ainda.</p>
					</td>
				</tr>
			<?php else:
    while ($musica = mysqli_fetch_assoc($limite)): ?>
							<tr>
								<form action="editar.php" method="post">
									<input type="hidden" name="id" value="<?=$musica['id'];?>">
									<input type="hidden" name="nome" value="<?=$musica['nomeMusica'];?>">
									<input type="hidden" name="artista" value="<?=$musica['id_artista'];?>">
								</form>
								<td><?=$musica['nomeMusica'];?></td>
								<td><?=$musica['nome'];?></td>
								<td>
									<button type="button" class= "btn btn-primary btn-musica-editar">Editar</button>
									<button type="button" class="btn btn-danger btn-musica-excluir">Excluir</button>
								</td>
							</tr>
						<?php endwhile;?>
			<?php endif;?>
		</tbody>
	</table>
	<nav aria-label="Navegação de página exemplo">
		<ul class="pagination justify-content-end">
			<?php if ($pc > 1): ?>
				<li class="page-item"><a class="page-link" href="?pagina=<?php echo $anterior; ?>">Ver Menos</a></li>
			<?php endif;
if ($pc < $count_pages): ?>
				<li class="page-item"><a class="page-link" href="?pagina=<?php echo $proximo; ?>">Ver Mais</a></li>
			<?php endif;?>
		</ul>
	</nav>
</div>
<?php
require_once 'modals/modal-editar.php';
require_once 'modals/modal-excluir.php';
