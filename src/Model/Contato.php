<?php
namespace App\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contatos")
 */
class Contato
{
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer") */
    private $id;

    /** @ORM\Column(type="boolean") */
    private $tipo;  // true para Telefone, false para Email

    /** @ORM\Column(type="string", length=255) */
    private $descricao;  // Descrição do contato (número de telefone ou email)

    /**
     * @ORM\ManyToOne(targetEntity="Pessoa", inversedBy="contatos")
     * @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $pessoa;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function getTipo(): bool
    {
        return $this->tipo;
    }

    /**
     * @param bool $tipo
     */
    public function setTipo(bool $tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @param Pessoa $pessoa
     */
    public function setPessoa(Pessoa $pessoa): void
    {
        $this->pessoa = $pessoa;
    }

    /**
     * @return Pessoa|null
     */
    public function getPessoa(): ?Pessoa
    {
        return $this->pessoa;
    }
}
