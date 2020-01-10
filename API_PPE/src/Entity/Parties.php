<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PartiesRepository")
 */
class Parties
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $heure;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbjoueur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clients", inversedBy="parties")
     */
    private $pseudo_client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salle", inversedBy="parties")
     */
    private $idSalle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PartieObstacles", mappedBy="idPartie", orphanRemoval=true)
     */
    private $partieObstacles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transactions", mappedBy="idPartie")
     */
    private $transactions;

    public function __construct()
    {
        $this->partieObstacles = new ArrayCollection();
        $this->transactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(?string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getNbjoueur(): ?int
    {
        return $this->nbjoueur;
    }

    public function setNbjoueur(?int $nbjoueur): self
    {
        $this->nbjoueur = $nbjoueur;

        return $this;
    }

    public function getPseudoClient(): ?Clients
    {
        return $this->pseudo_client;
    }

    public function setPseudoClient(?Clients $pseudo_client): self
    {
        $this->pseudo_client = $pseudo_client;

        return $this;
    }

    public function getIdSalle(): ?Salle
    {
        return $this->idSalle;
    }

    public function setIdSalle(?Salle $idSalle): self
    {
        $this->idSalle = $idSalle;

        return $this;
    }

    /**
     * @return Collection|PartieObstacles[]
     */
    public function getPartieObstacles(): Collection
    {
        return $this->partieObstacles;
    }

    public function addPartieObstacle(PartieObstacles $partieObstacle): self
    {
        if (!$this->partieObstacles->contains($partieObstacle)) {
            $this->partieObstacles[] = $partieObstacle;
            $partieObstacle->setIdPartie($this);
        }

        return $this;
    }

    public function removePartieObstacle(PartieObstacles $partieObstacle): self
    {
        if ($this->partieObstacles->contains($partieObstacle)) {
            $this->partieObstacles->removeElement($partieObstacle);
            // set the owning side to null (unless already changed)
            if ($partieObstacle->getIdPartie() === $this) {
                $partieObstacle->setIdPartie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transactions[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transactions $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setIdPartie($this);
        }

        return $this;
    }

    public function removeTransaction(Transactions $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            $this->transactions->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getIdPartie() === $this) {
                $transaction->setIdPartie(null);
            }
        }

        return $this;
    }
}
