<!-- view/pessoa/visualizar.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Visualizar Pessoa</title>
  <link rel="icon" href="../favicon.png" type="image/png">
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
          <li class="nav-item"><a class="nav-link active" href="?rota=pessoas">Pessoas</a></li>
          <li class="nav-item"><a class="nav-link" href="?rota=contatos">Contatos</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Detalhes da Pessoa</h2>
    <dl class="row mt-4">
      <dt class="col-sm-3">Nome</dt>
      <dd class="col-sm-9"><?= htmlspecialchars($pessoa->getNome()) ?></dd>

      <dt class="col-sm-3">CPF/CNPJ</dt>
      <dd class="col-sm-9"><?= htmlspecialchars($pessoa->getCpfcnpj()) ?></dd>
    </dl>

    <h3 class="mt-5">Contatos</h3>
    <?php $contatos = $pessoa->getContatos()->toArray(); ?>
    <?php if (count($contatos)): ?>
      <ul class="list-group mt-3">
        <?php foreach ($contatos as $c): ?>
          <li class="list-group-item">
            <strong><?= $c->getTipo() ? 'Telefone' : 'Email' ?>:</strong>
            <?= htmlspecialchars($c->getDescricao()) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <div class="alert alert-secondary mt-3">Nenhum contato cadastrado.</div>
    <?php endif; ?>

    <div class="mt-4 d-flex gap-2">
      <a href="?rota=editar_pessoa&id=<?= $pessoa->getId() ?>" class="btn btn-warning">Editar</a>
      <a href="?rota=pessoas" class="btn btn-secondary">Voltar</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
