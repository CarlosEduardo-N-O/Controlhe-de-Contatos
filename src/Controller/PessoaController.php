<?php

namespace App\Controller;

use App\Model\Pessoa;

class PessoaController
{
    private $entityManager;

    public function __construct($em)
    {
        $this->entityManager = $em;
    }

    public function index()
    {
        $filtroNome = isset($_GET['filtro']) ? $_GET['filtro'] : '';

        $repo = $this->entityManager->getRepository(Pessoa::class);

        if (!empty($filtroNome)) {
            $qb = $this->entityManager->createQueryBuilder();
            $pessoas = $qb->select('p')
                ->from(Pessoa::class, 'p')
                ->where($qb->expr()->like('LOWER(p.nome)', ':nome'))
                ->setParameter('nome', '%' . strtolower($filtroNome) . '%')
                ->getQuery()
                ->getResult();
        } else {
            $pessoas = $repo->findAll();
        }

        include __DIR__ . '/../View/Pessoa/index.php';
    }


    public function visualizar($id)
    {
        $pessoa = $this->entityManager->find(Pessoa::class, $id);
        if (!$pessoa) {
            echo "Pessoa não encontrada.";
            return;
        }

        include __DIR__ . '/../View/Pessoa/show.php';
    }

    public function adicionar()
    {
        include __DIR__ . '/../View/Pessoa/form.php';
    }

    public function editar($id)
    {
        $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($id);
        include __DIR__ . '/..View/Pessoa/form.php';
    }

    public function salvar()
    {
        $id = $_POST['id'] ?? null;
        $nome = $_POST['nome'] ?? '';
        $cpfcnpj = $_POST['cpfcnpj'] ?? '';

        if ($id) {
            $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($id);
        } else {
            $pessoa = new Pessoa();
        }

        $pessoa->setNome($nome);
        $pessoa->setCpfcnpj($cpfcnpj);
        $this->entityManager->persist($pessoa);
        $this->entityManager->flush();

        header('Location: ?rota=pessoas');
    }

    public function deletar($id)
    {
        $pessoa = $this->entityManager->find(Pessoa::class, $id);
        if ($pessoa) {
            $this->entityManager->remove($pessoa);
            $this->entityManager->flush();
        }

        header('Location: ?rota=pessoas');
        exit;
    }
}
