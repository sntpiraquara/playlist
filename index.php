<?php
$title = 'playlist';

require_once 'header.php';

verificaUsuarioLogado();
?>
<body>
  <div class="container">
    <div class="row">
      <?php
include 'indexCadastrar.php';
include 'indexGerar.php';
include 'tabelaMusicas.php';

include 'footer.php';
