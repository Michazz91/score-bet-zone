<?php

// src/Entity/Badge.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Badge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $badgeName;

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\Column(type: 'string', length: 255)]
    private string $criteria;

    #[ORM\OneToMany(mappedBy: 'badge', targetEntity: UserBadge::class)]
    private Collection $userBadges;

    public function __construct()
    {
        $this->userBadges = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBadgeName(): string
    {
        return $this->badgeName;
    }

    public function setBadgeName(string $badgeName): self
    {
        $this->badgeName = $badgeName;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCriteria(): string
    {
        return $this->criteria;
    }

    public function setCriteria(string $criteria): self
    {
        $this->criteria = $criteria;

        return $this;
    }

    /**
     * @return Collection|UserBadge[]
     */
    public function getUserBadges(): Collection
    {
        return $this->userBadges;
    }
}
