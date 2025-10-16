<?php

// src/Entity/Bet.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Bet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'bets')]
    #[ORM\JoinColumn(nullable: false)]
    private User $user;

    #[ORM\ManyToOne(targetEntity: SportMatch::class, inversedBy: 'bets')]
    #[ORM\JoinColumn(nullable: false)]
    private SportMatch $match;

    #[ORM\Column(type: 'string', length: 255)]
    private string $prediction;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $betDate;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $pointsAwarded = null;

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

    public function getMatch(): SportMatch
    {
        return $this->match;
    }

    public function setMatch(SportMatch $match): self
    {
        $this->match = $match;

        return $this;
    }

    public function getPrediction(): string
    {
        return $this->prediction;
    }

    public function setPrediction(string $prediction): self
    {
        $this->prediction = $prediction;

        return $this;
    }

    public function getBetDate(): \DateTimeInterface
    {
        return $this->betDate;
    }

    public function setBetDate(\DateTimeInterface $betDate): self
    {
        $this->betDate = $betDate;

        return $this;
    }

    public function getPointsAwarded(): ?int
    {
        return $this->pointsAwarded;
    }

    public function setPointsAwarded(?int $pointsAwarded): self
    {
        $this->pointsAwarded = $pointsAwarded;

        return $this;
    }
}
