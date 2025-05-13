<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title><?= isset($pessoa) ? 'Editar' : 'Adicionar' ?> Pessoa</title>
  <link rel="icon" href="../image/favicon.png" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
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
    <h2><?= isset($pessoa) ? 'Editar' : 'Adicionar' ?> Pessoa</h2>

    <form method="POST" action="?rota=salvar_pessoa">
      <?php if (isset($pessoa)): ?>
        <input type="hidden" name="id" value="<?= $pessoa->getId(); ?>">
      <?php endif; ?>

      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="nome" value="<?= isset($pessoa) ? $pessoa->getNome() : '' ?>" required>
      </div>

      <div class="mb-3">
        <label for="cpfcnpj" class="form-label">CPF ou CNPJ</label>
        <input type="text" name="cpfcnpj" class="form-control" id="cpfcnpj"
          value="<?= isset($pessoa) ? $pessoa->getCpfcnpj() : '' ?>"
          required maxlength="14">
      </div>

      <button type="submit" class="btn btn-success"><?= isset($pessoa) ? 'Atualizar' : 'Salvar' ?></button>
      <a href="?rota=pessoas" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>