<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
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
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $codepostal;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Clients", mappedBy="idVille")
     */
    private $clients;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Operateur", mappedBy="villeOperateur")
     */
    private $operateurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Salle", mappedBy="idVille")
     */
    private $salles;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->operateurs = new ArrayCollection();
        $this->salles = new ArrayCollection();
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

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(?string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * @return Collection|Clients[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Clients $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setIdVille($this);
        }

        return $this;
    }

    public function removeClient(Clients $client): self
    {
        if ($this->clients->contains($client)) {
            $this->clients->removeElement($client);
            // set the owning side to null (unless already changed)
            if ($client->getIdVille() === $this) {
                $client->setIdVille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Operateur[]
     */
    public function getOperateurs(): Collection
    {
        return $this->operateurs;
    }

    public function addOperateur(Operateur $operateur): self
    {
        if (!$this->operateurs->contains($operateur)) {
            $this->operateurs[] = $operateur;
            $operateur->setVilleOperateur($this);
        }

        return $this;
    }

    public function removeOperateur(Operateur $operateur): self
    {
        if ($this->operateurs->contains($operateur)) {
            $this->operateurs->removeElement($operateur);
            // set the owning side to null (unless already changed)
            if ($operateur->getVilleOperateur() === $this) {
                $operateur->setVilleOperateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Salle[]
     */
    public function getSalles(): Collection
    {
        return $this->salles;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->salles->contains($salle)) {
            $this->salles[] = $salle;
            $salle->setIdVille($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        if ($this->salles->contains($salle)) {
            $this->salles->removeElement($salle);
            // set the owning side to null (unless already changed)
            if ($salle->getIdVille() === $this) {
                $salle->setIdVille(null);
            }
        }

        return $this;
    }
}
