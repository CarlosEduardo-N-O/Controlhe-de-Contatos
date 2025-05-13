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
        include __DIR__ . '/../View/Pessoa/form.php';
    }

    public function salvar()
    {
        $id = $_POST['id'] ?? null;
        $nome = $_POST['nome'] ?? '';
        $cpfcnpj = $_POST['cpfcnpj'] ?? '';
        $erro = '';

        try {
            if (empty($nome) || empty($cpfcnpj)) {
                throw new \Exception('Nome e CPF/CNPJ são obrigatórios.');
            }

            if ($id) {
                $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($id);
                if (!$pessoa) {
                    throw new \Exception('Pessoa não encontrada.');
                }
            } else {
                $pessoa = new Pessoa();
            }

            $pessoa->setNome($nome);
            $pessoa->setCpfcnpj($cpfcnpj);

            $this->entityManager->persist($pessoa);
            $this->entityManager->flush();

            header('Location: ?rota=pessoas');
            exit;
        } catch (\Exception $e) {
            // Em caso de erro, define mensagem e carrega novamente o form com os dados preenchidos
            $erro = $e->getMessage();

            if (isset($pessoa) && $pessoa instanceof Pessoa) {
                // mantém objeto carregado ao editar
            } else {
                $pessoa = new Pessoa();
                $pessoa->setNome($nome);
                $pessoa->setCpfcnpj($cpfcnpj);
            }

            // variável $erro será utilizada na view
            include __DIR__ . '/../View/Pessoa/form.php';
        }
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
