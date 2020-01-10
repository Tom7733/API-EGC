<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\OperateurSalleRepository")
 */
class OperateurSalle
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue("NONE")
     * @ORM\ManyToOne(targetEntity="App\Entity\Operateur", inversedBy="operateurSalles")
     * @ORM\JoinColumn(name="id", nullable=false)
     */
    private $idOperateur;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue("NONE")
     * @ORM\ManyToOne(targetEntity="App\Entity\Salle")
     * @ORM\JoinColumn(name="id", nullable=false)
     */
    private $idSalle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdOperateur(): ?Operateur
    {
        return $this->idOperateur;
    }

    public function setIdOperateur(?Operateur $idOperateur): self
    {
        $this->idOperateur = $idOperateur;

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
}
