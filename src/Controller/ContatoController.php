<?php

namespace App\Controller;

use App\Model\Pessoa;
use App\Model\Contato;

class ContatoController
{
    private $entityManager;

    public function __construct($em)
    {
        $this->entityManager = $em;
    }

    public function index()
    {
        $filtro = trim($_GET['filtro'] ?? '');

        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('p', 'c')
            ->from(Pessoa::class, 'p')
            ->leftJoin('p.contatos', 'c')
            ->orderBy('p.nome', 'ASC');

        if ($filtro !== '') {
            $qb->where(
                $qb->expr()->orX(
                    $qb->expr()->like('LOWER(p.nome)', ':filtro'),
                    $qb->expr()->like('LOWER(c.descricao)', ':filtro')
                )
            )
                ->setParameter('filtro', '%' . strtolower($filtro) . '%');
        }

        $pessoas = $qb->getQuery()->getResult();

        include __DIR__ . '/../View/Contato/index.php';
    }

    public function visualizar($id)
    {
        $contato = $this->entityManager->find(Contato::class, $id);
        if (!$contato) {
            echo "Contato não encontrado.";
            return;
        }
        include __DIR__ . '/../View/Contato/show.php';
    }

    public function adicionar()
    {
        $pessoas = $this->entityManager
            ->getRepository(Pessoa::class)
            ->findAll();

        include __DIR__ . '/../View/Contato/form.php';
    }

    public function editar($id)
    {
        $contato = $this->entityManager
            ->getRepository(Contato::class)
            ->find($id);
        if (!$contato) {
            echo "Contato não encontrado.";
            return;
        }

        $pessoas = $this->entityManager
            ->getRepository(Pessoa::class)
            ->findAll();

        include __DIR__ . '/../View/Contato/form.php';
    }

    public function salvar()
    {
        $id        = $_POST['id']        ?? null;
        $pessoaId  = $_POST['pessoa_id'] ?? null;
        $tipo      = $_POST['tipo']      ?? '';
        $descricao = $_POST['descricao'] ?? '';

        $pessoa = $this->entityManager->find(Pessoa::class, $pessoaId);
        if (!$pessoa) {
            echo "Pessoa não encontrada.";
            return;
        }

        if ($id) {
            $contato = $this->entityManager
                ->getRepository(Contato::class)
                ->find($id);
            if (!$contato) {
                echo "Contato não encontrado para editar.";
                return;
            }
        } else {
            $contato = new Contato();
            $contato->setPessoa($pessoa);
            $this->entityManager->persist($contato);
        }

        $contato->setTipo($tipo);
        $contato->setDescricao($descricao);

        $this->entityManager->flush();

        header('Location: ?rota=contatos');
        exit;
    }

    public function deletar($id)
    {
        $contato = $this->entityManager->find(Contato::class, $id);
        if ($contato) {
            $this->entityManager->remove($contato);
            $this->entityManager->flush();
        }

        header('Location: ?rota=contatos');
        exit;
    }
}
