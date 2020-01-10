<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PartieObstaclesRepository")
 */
class PartieObstacles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue("NONE")
     * @ORM\ManyToOne(targetEntity="App\Entity\Parties", inversedBy="partieObstacles")
     * @ORM\JoinColumn(name="id", nullable=false)
     */
    private $idPartie;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue("NONE")
     * @ORM\ManyToOne(targetEntity="App\Entity\Obstacle", inversedBy="partieObstacles")
     * @ORM\JoinColumn(name="id", nullable=false)
     */
    private $idObstacle;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $qte;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdObstacle(): ?Obstacle
    {
        return $this->idObstacle;
    }

    public function setIdObstacle(?Obstacle $idObstacle): self
    {
        $this->idObstacle = $idObstacle;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(?int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
