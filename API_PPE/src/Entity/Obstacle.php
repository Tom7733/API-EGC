<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ObstacleRepository")
 */
class Obstacle
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
    private $type;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PartieObstacles", mappedBy="idObstacle", orphanRemoval=true)
     */
    private $partieObstacles;

    public function __construct()
    {
        $this->partieObstacles = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $partieObstacle->setIdObstacle($this);
        }

        return $this;
    }

    public function removePartieObstacle(PartieObstacles $partieObstacle): self
    {
        if ($this->partieObstacles->contains($partieObstacle)) {
            $this->partieObstacles->removeElement($partieObstacle);
            // set the owning side to null (unless already changed)
            if ($partieObstacle->getIdObstacle() === $this) {
                $partieObstacle->setIdObstacle(null);
            }
        }

        return $this;
    }
}
