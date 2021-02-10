<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PinRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PinRepository::class)
 */
class Pin
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
    private $nomPin;

    /**
     * @ORM\Column(type="string", length=255)
     * @var MediaObject|null
     * @ORM\ManyToOne(targetEntity=MediaObject::class)
     * @ORM\JoinColumn(nullable=true)
     * @ApiProperty(iri="http://schema.org/image")
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="pin")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="pin")
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity=Jaime::class, mappedBy="pin")
     */
    private $jaime;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="pin")
     */
    private $commande;

    public function __construct()
    {
        $this->commentaire = new ArrayCollection();
        $this->jaime = new ArrayCollection();
        $this->commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPin(): ?string
    {
        return $this->nomPin;
    }

    public function setNomPin(string $nomPin): self
    {
        $this->nomPin = $nomPin;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

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

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setPin($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getPin() === $this) {
                $commentaire->setPin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Jaime[]
     */
    public function getJaime(): Collection
    {
        return $this->jaime;
    }

    public function addJaime(Jaime $jaime): self
    {
        if (!$this->jaime->contains($jaime)) {
            $this->jaime[] = $jaime;
            $jaime->setPin($this);
        }

        return $this;
    }

    public function removeJaime(Jaime $jaime): self
    {
        if ($this->jaime->removeElement($jaime)) {
            // set the owning side to null (unless already changed)
            if ($jaime->getPin() === $this) {
                $jaime->setPin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommande(): Collection
    {
        return $this->commande;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commande->contains($commande)) {
            $this->commande[] = $commande;
            $commande->setPin($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commande->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getPin() === $this) {
                $commande->setPin(null);
            }
        }

        return $this;
    }
}
