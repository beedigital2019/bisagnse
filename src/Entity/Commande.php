<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Timestampable;
use App\Repository\CommandeRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Commande
{
    use Timestampable;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroCommande;



    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commande")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Pin::class, inversedBy="commande")
     */
    private $pin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCommande(): ?int
    {
        return $this->numeroCommande;
    }

    public function setNumeroCommande(int $numeroCommande): self
    {
        $this->numeroCommande = $numeroCommande;

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPin(): ?Pin
    {
        return $this->pin;
    }

    public function setPin(?Pin $pin): self
    {
        $this->pin = $pin;

        return $this;
    }
}
