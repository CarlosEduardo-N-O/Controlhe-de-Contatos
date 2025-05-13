<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Controle de Contatos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../image/favicon.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
    .welcome-section {
      height: 80vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="?rota=index">Controle de Contatos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="?rota=pessoas">Pessoas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?rota=contatos">Contatos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="welcome-section">
    <div class="container">
      <h1 class="display-4">Bem-vindo</h1>
      <p class="lead">Utilize o menu acima para gerenciar suas pessoas e contatos de forma simples e eficiente.</p>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
