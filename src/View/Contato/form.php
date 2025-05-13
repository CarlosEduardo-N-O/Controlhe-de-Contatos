<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title><?= isset($contato) ? 'Editar' : 'Adicionar' ?> Contato</title>
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
          <li class="nav-item"><a class="nav-link" href="?rota=pessoas">Pessoas</a></li>
          <li class="nav-item"><a class="nav-link active" href="?rota=contatos">Contatos</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h2><?= isset($contato) ? 'Editar' : 'Adicionar' ?> Contato</h2>

    <form method="POST" action="?rota=salvar_contato">
      <?php if (isset($contato)): ?>
        <input type="hidden" name="id" value="<?= $contato->getId() ?>">
      <?php endif; ?>

      <div class="mb-3">
        <label for="pessoa" class="form-label">Pessoa</label>
        <select name="pessoa_id" id="pessoa" class="form-select" required>
          <option value="">— selecione —</option>
          <?php foreach ($pessoas as $p): ?>
            <option value="<?= $p->getId() ?>"
              <?= isset($contato) && $contato->getPessoa()->getId() === $p->getId() ? 'selected' : '' ?>>
              <?= htmlspecialchars($p->getNome()) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select name="tipo" id="tipo" class="form-select" required>
          <option value="">— selecione —</option>
          <option value="1" <?= isset($contato) && $contato->getTipo() == 1 ? 'selected' : '' ?>>Telefone</option>
          <option value="0" <?= isset($contato) && $contato->getTipo() == 0 ? 'selected' : '' ?>>Email</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input
          type="text"
          id="descricao"
          name="descricao"
          class="form-control"
          placeholder="Digite telefone ou e-mail"
          value="<?= isset($contato) ? htmlspecialchars($contato->getDescricao()) : '' ?>"
          required
        >
      </div>

      <button type="submit" class="btn btn-success"><?= isset($contato) ? 'Atualizar' : 'Salvar' ?></button>
      <a href="?rota=contatos" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
