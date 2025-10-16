<?php

// src/Entity/UserBadge.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class UserBadge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'userBadges')]
    #[ORM\JoinColumn(nullable: false)]
    private User $user;

    #[ORM\ManyToOne(targetEntity: Badge::class, inversedBy: 'userBadges')]
    #[ORM\JoinColumn(nullable: false)]
    private Badge $badge;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $earnedDate;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBadge(): Badge
    {
        return $this->badge;
    }

    public function setBadge(Badge $badge): self
    {
        $this->badge = $badge;

        return $this;
    }

    public function getEarnedDate(): \DateTimeInterface
    {
        return $this->earnedDate;
    }

    public function setEarnedDate(\DateTimeInterface $earnedDate): self
    {
        $this->earnedDate = $earnedDate;

        return $this;
    }
}
