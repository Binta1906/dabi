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
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=autorisation::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $autorisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $document;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?user
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?user $utilisateur): self
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

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(string $document): self
    {
        $this->document = $document;

        return $this;
    }
}
