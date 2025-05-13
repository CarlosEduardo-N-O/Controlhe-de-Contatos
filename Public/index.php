<?php
require_once "../bootstrap.php";

use App\Controller\PessoaController;
use App\Controller\ContatoController;

$rota = $_GET['rota'] ?? 'index';
$controle = null;

switch ($rota) {
    // ROTAS PARA PESSOAS
    case 'pessoas':
        $controle = new PessoaController($entityManager);
        $controle->index();
        break;

    case 'visualizar_pessoa':
        $controle = new PessoaController($entityManager);
        $controle->visualizar($_GET['id'] ?? null);
        break;

    case 'adicionar_pessoa':
        $controle = new PessoaController($entityManager);
        $controle->adicionar();
        break;

    case 'editar_pessoa':
        $controle = new PessoaController($entityManager);
        $controle->editar($_GET['id'] ?? null);
        break;

    case 'salvar_pessoa':
        $controle = new PessoaController($entityManager);
        $controle->salvar();
        break;

    case 'excluir_pessoa':
        $controle = new PessoaController($entityManager);
        $controle->deletar($_GET['id'] ?? null);
        break;

    // ROTAS PARA CONTATOS
    case 'contatos':
        $controle = new ContatoController($entityManager);
        $controle->index();
        break;

    case 'adicionar_contato':
        $controle = new ContatoController($entityManager);
        $controle->adicionar();
        break;

    case 'editar_contato':
        $controle = new ContatoController($entityManager);
        $controle->editar($_GET['id'] ?? null);
        break;

    case 'salvar_contato':
        $controle = new ContatoController($entityManager);
        $controle->salvar();
        break;

    case 'visualizar_contato':
        $controle = new ContatoController($entityManager);
        $controle->visualizar($_GET['id'] ?? null);
        break;

    case 'excluir_contato':
        $controle = new ContatoController($entityManager);
        $controle->deletar($_GET['id'] ?? null);
        break;

    // TELA INICIAL
    case 'index':
    default:
        include __DIR__ . '/../src/View/index.php';
        break;
}
