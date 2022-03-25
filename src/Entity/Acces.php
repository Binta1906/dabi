<?php

namespace App\Entity;

use App\Repository\AccesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccesRepository::class)
 */
class Acces
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=autorisation::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $autorisation;

    /**
     * @ORM\ManyToOne(targetEntity=Document::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $document;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getAutorisation(): ?autorisation
    {
        return $this->autorisation;
    }

    public function setAutorisation(?autorisation $autorisation): self
    {
        $this->autorisation = $autorisation;

        return $this;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(string $document): self
    {
        $this->document = $document;

        return $this;
    }
}
