<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\SalleRepository")
 */
class Salle
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
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Theme", inversedBy="salles")
     */
    private $idTheme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="salles")
     */
    private $idVille;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $heure_ouverture;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $heure_fermeture;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Parties", mappedBy="idSalle")
     */
    private $parties;

    public function __construct()
    {
        $this->parties = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getIdTheme(): ?Theme
    {
        return $this->idTheme;
    }

    public function setIdTheme(?Theme $idTheme): self
    {
        $this->idTheme = $idTheme;

        return $this;
    }

    public function getIdVille(): ?Ville
    {
        return $this->idVille;
    }

    public function setIdVille(?Ville $idVille): self
    {
        $this->idVille = $idVille;

        return $this;
    }

    public function getHeureOuverture(): ?string
    {
        return $this->heure_ouverture;
    }

    public function setHeureOuverture(?string $heure_ouverture): self
    {
        $this->heure_ouverture = $heure_ouverture;

        return $this;
    }

    public function getHeureFermeture(): ?string
    {
        return $this->heure_fermeture;
    }

    public function setHeureFermeture(?string $heure_fermeture): self
    {
        $this->heure_fermeture = $heure_fermeture;

        return $this;
    }

    /**
     * @return Collection|Parties[]
     */
    public function getParties(): Collection
    {
        return $this->parties;
    }

    public function addParty(Parties $party): self
    {
        if (!$this->parties->contains($party)) {
            $this->parties[] = $party;
            $party->setIdSalle($this);
        }

        return $this;
    }

    public function removeParty(Parties $party): self
    {
        if ($this->parties->contains($party)) {
            $this->parties->removeElement($party);
            // set the owning side to null (unless already changed)
            if ($party->getIdSalle() === $this) {
                $party->setIdSalle(null);
            }
        }

        return $this;
    }
}
