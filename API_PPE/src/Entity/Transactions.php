<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TransactionsRepository")
 */
class Transactions
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
    private $typePaiement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $creditTransaction;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clients", inversedBy="transactions")
     */
    private $pseudo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parties", inversedBy="transactions")
     */
    private $idPartie;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $etat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypePaiement(): ?string
    {
        return $this->typePaiement;
    }

    public function setTypePaiement(?string $typePaiement): self
    {
        $this->typePaiement = $typePaiement;

        return $this;
    }

    public function getCreditTransaction(): ?int
    {
        return $this->creditTransaction;
    }

    public function setCreditTransaction(?int $creditTransaction): self
    {
        $this->creditTransaction = $creditTransaction;

        return $this;
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPseudo(): ?Clients
    {
        return $this->pseudo;
    }

    public function setPseudo(?Clients $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getIdPartie(): ?Parties
    {
        return $this->idPartie;
    }

    public function setIdPartie(?Parties $idPartie): self
    {
        $this->idPartie = $idPartie;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
