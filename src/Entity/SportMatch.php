<?php

// src/Entity/Match.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class SportMatch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $teamHome;

    #[ORM\Column(type: 'string', length: 255)]
    private string $teamAway;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $matchDate;

    #[ORM\Column(type: 'string', length: 20)]
    private string $matchStatus;

    #[ORM\OneToMany(mappedBy: 'match', targetEntity: Bet::class)]
    private Collection $bets;

    public function __construct()
    {
        $this->bets = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTeamHome(): string
    {
        return $this->teamHome;
    }

    public function setTeamHome(string $teamHome): self
    {
        $this->teamHome = $teamHome;

        return $this;
    }

    public function getTeamAway(): string
    {
        return $this->teamAway;
    }

    public function setTeamAway(string $teamAway): self
    {
        $this->teamAway = $teamAway;

        return $this;
    }

    public function getMatchDate(): \DateTimeInterface
    {
        return $this->matchDate;
    }

    public function setMatchDate(\DateTimeInterface $matchDate): self
    {
        $this->matchDate = $matchDate;

        return $this;
    }

    public function getMatchStatus(): string
    {
        return $this->matchStatus;
    }

    public function setMatchStatus(string $matchStatus): self
    {
        $this->matchStatus = $matchStatus;

        return $this;
    }

    /**
     * @return Collection|Bet[]
     */
    public function getBets(): Collection
    {
        return $this->bets;
    }
}
