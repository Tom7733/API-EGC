<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\FonctionRepository")
 */
class Fonction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue("NONE")
     * @ORM\Column(type="string", length=50)
     */
    private $Categorie;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Operateur", mappedBy="fonction")
     */
    private $FonctionOperateur;

    public function __construct()
    {
        $this->FonctionOperateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?string
    {
        return $this->Categorie;
    }

    public function setCategorie(string $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
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

    /**
     * @return Collection|Operateur[]
     */
    public function getFonctionOperateur(): Collection
    {
        return $this->FonctionOperateur;
    }

    public function addFonctionOperateur(Operateur $FonctionOperateur): self
    {
        if (!$this->FonctionOperateur->contains($FonctionOperateur)) {
            $this->FonctionOperateur[] = $FonctionOperateur;
            $FonctionOperateur->setFonction($this);
        }

        return $this;
    }

    public function removeFonctionOperateur(Operateur $FonctionOperateur): self
    {
        if ($this->FonctionOperateur->contains($FonctionOperateur)) {
            $this->FonctionOperateur->removeElement($FonctionOperateur);
            // set the owning side to null (unless already changed)
            if ($FonctionOperateur->getFonction() === $this) {
                $FonctionOperateur->setFonction(null);
            }
        }

        return $this;
    }
}
