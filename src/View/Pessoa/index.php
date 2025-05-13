<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Lista de Pessoas</title>
  <link rel="icon" href="../image/favicon.png" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    tr.selectable {
      cursor: pointer;
    }

    tr.active-selection {
      background-color: #cce5ff !important;
      color: #004085 !important;
      cursor: default;
    }

    tr.active-selection td {
      background-color: #cce5ff !important;
      color: #004085 !important;
    }

    #tabela-pessoas {
      user-select: none;
    }
  </style>
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

  <!-- Conteúdo -->
  <div class="container mt-4">
    <h2 class="mb-4">Pessoas</h2>

    <!-- Filtro -->
    <form method="GET" class="row g-3 mb-3">
      <input type="hidden" name="rota" value="pessoas">
      <div class="col-md-10">
        <input type="text" class="form-control" name="filtro" placeholder="Buscar por nome" value="<?= $_GET['filtro'] ?? '' ?>">
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-outline-primary w-100">Filtrar</button>
      </div>
    </form>

    <!-- Botões-->
    <div class="d-flex justify-content-start mb-3 gap-2">
      <a href="?rota=adicionar_pessoa" class="btn btn-success">Adicionar</a>
      <a id="btn-visualizar" href="#" class="btn btn-info disabled">Visualizar</a>
      <a id="btn-editar" href="#" class="btn btn-warning disabled">Editar</a>
      <a id="btn-excluir" href="#" class="btn btn-danger disabled" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
    </div>

    <!-- Lista de Pessoas -->
    <?php if (count($pessoas) > 0): ?>
      <table class="table table-striped table-hover" id="tabela-pessoas">
        <thead class="table-dark">
          <tr>
            <th>Nome</th>
            <th>CPF/CNPJ</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pessoas as $p): ?>
            <tr class="selectable" data-id="<?= $p->getId(); ?>">
              <td><?= $p->getNome(); ?></td>
              <td><?= $p->getCpfcnpj(); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <div class="alert alert-secondary">Nenhuma pessoa encontrada.</div>
    <?php endif; ?>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const btnVer = document.getElementById('btn-visualizar');
      const btnEdit = document.getElementById('btn-editar');
      const btnDel = document.getElementById('btn-excluir');
      const tabelaPessoas = document.getElementById('tabela-pessoas');

      let selectedItem = null;

      function clearSelection() {
        if (selectedItem) {
          selectedItem.classList.remove('active-selection');
          selectedItem = null;
        }
        btnVer.classList.add('disabled');
        btnEdit.classList.add('disabled');
        btnDel.classList.add('disabled');
        btnVer.href = '#';
        btnEdit.href = '#';
        btnDel.href = '#';
      }

      tabelaPessoas.querySelectorAll('.selectable').forEach(item => {
        item.addEventListener('click', function(event) {
          event.stopPropagation(); 
          if (selectedItem) selectedItem.classList.remove('active-selection');
          item.classList.add('active-selection');
          selectedItem = item;

          const selectedId = item.getAttribute('data-id');
          btnVer.classList.remove('disabled');
          btnEdit.classList.remove('disabled');
          btnDel.classList.remove('disabled');
          btnVer.href = `?rota=visualizar_pessoa&id=${selectedId}`;
          btnEdit.href = `?rota=editar_pessoa&id=${selectedId}`;
          btnDel.href = `?rota=excluir_pessoa&id=${selectedId}`;
        });
      });

      document.body.addEventListener('click', function(event) {
        if (!event.target.closest('#tabela-pessoas') && !event.target.closest('.btn')) {
          clearSelection();
        }
      });

      document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
          clearSelection();
        }
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>