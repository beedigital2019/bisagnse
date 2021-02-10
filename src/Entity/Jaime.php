<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\JaimeRepository;
use App\Entity\Traits\Timestampable;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=JaimeRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Jaime
{
    use Timestampable;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="jaime")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Pin::class, inversedBy="jaime")
     */
    private $pin;

    public function getId(): ?int
    {
        return $this->id;
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
