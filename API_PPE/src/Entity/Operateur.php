<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\OperateurRepository")
 */
class Operateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fonction", inversedBy="villeOperateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fonction;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="operateurs")
     */
    private $villeOperateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OperateurSalle", mappedBy="idOperateur", orphanRemoval=true)
     */
    private $operateurSalles;

    public function __construct()
    {
        $this->operateurSalles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getFonction(): ?Fonction
    {
        return $this->fonction;
    }

    public function setFonction(?Fonction $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getVilleOperateur(): ?Ville
    {
        return $this->villeOperateur;
    }

    public function setVilleOperateur(?Ville $villeOperateur): self
    {
        $this->villeOperateur = $villeOperateur;

        return $this;
    }

    /**
     * @return Collection|OperateurSalle[]
     */
    public function getOperateurSalles(): Collection
    {
        return $this->operateurSalles;
    }

    public function addOperateurSalle(OperateurSalle $operateurSalle): self
    {
        if (!$this->operateurSalles->contains($operateurSalle)) {
            $this->operateurSalles[] = $operateurSalle;
            $operateurSalle->setIdOperateur($this);
        }

        return $this;
    }

    public function removeOperateurSalle(OperateurSalle $operateurSalle): self
    {
        if ($this->operateurSalles->contains($operateurSalle)) {
            $this->operateurSalles->removeElement($operateurSalle);
            // set the owning side to null (unless already changed)
            if ($operateurSalle->getIdOperateur() === $this) {
                $operateurSalle->setIdOperateur(null);
            }
        }

        return $this;
    }
}
