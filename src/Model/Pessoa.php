<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="pessoas")
 */
class Pessoa
{
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer") */
    private $id;

    /** @ORM\Column(type="string") */
    private $nome;

    /** @ORM\Column(type="string", length=14, unique=true) */
    private $cpfcnpj;

    /** 
     * @ORM\OneToMany(targetEntity="Contato", mappedBy="pessoa", cascade={"persist", "remove"})
     */
    private $contatos;

    public function __construct() {
        $this->contatos = new ArrayCollection();
    }

    public function getId() { return $this->id; }

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }

    public function getCpfcnpj() { return $this->cpfcnpj; }
    public function setCpfcnpj($cpfcnpj) { $this->cpfcnpj = $cpfcnpj; }

    public function getContatos() { return $this->contatos; }
    
    public function addContato(Contato $contato) {
        $this->contatos[] = $contato;
        $contato->setPessoa($this);
    }
}
