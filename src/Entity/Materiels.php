<?php

namespace App\Entity;

use App\Repository\MaterielsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterielsRepository::class)
 */
class Materiels
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_materiel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_materiel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMateriel(): ?string
    {
        return $this->nom_materiel;
    }

    public function setNomMateriel(string $nom_materiel): self
    {
        $this->nom_materiel = $nom_materiel;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTypeMateriel(): ?string
    {
        return $this->type_materiel;
    }

    public function setTypeMateriel(string $type_materiel): self
    {
        $this->type_materiel = $type_materiel;

        return $this;
    }
}
