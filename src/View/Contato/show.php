<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Visualizar Contato</title>
  <link rel="icon" href="../image/favicon.png" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="min-vh-100 d-flex flex-column">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="?rota=index">Controle de Contatos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="?rota=pessoas">Pessoas</a></li>
          <li class="nav-item"><a class="nav-link active" href="?rota=contatos">Contatos</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Detalhes do Contato</h2>
    <dl class="row mt-4">
      <dt class="col-sm-3">Pessoa</dt>
      <dd class="col-sm-9"><?= htmlspecialchars($contato->getPessoa()->getNome()) ?></dd>

      <dt class="col-sm-3">Tipo</dt>
      <dd class="col-sm-9">
        <?= $contato->getTipo() ? 'Telefone' : 'Email' ?>
      </dd>

      <dt class="col-sm-3">Descrição</dt>
      <dd class="col-sm-9"><?= htmlspecialchars($contato->getDescricao()) ?></dd>
    </dl>

    <div class="mt-4 d-flex gap-2">
      <a href="?rota=editar_contato&id=<?= $contato->getId() ?>" class="btn btn-warning">Editar</a>
      <a href="?rota=contatos" class="btn btn-secondary">Voltar</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
