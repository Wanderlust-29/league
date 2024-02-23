<?php

class Game
{
    private ?int $id = null;
    private string $name;
    private string $date;
    private Team $team_1;
    private Team $team_2;
    private Team $winner;

    public function __construct(string $name, string $date, Team $team_1, Team $team_2, Team $winner)
    {
        $this->name = $name;
        $this->date = $date;
        $this->team_1 = $team_1;
        $this->team_2 = $team_2;
        $this->winner = $winner;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getTeam_1(): Team
    {
        return $this->team_1;
    }

    public function setTeam_1(Team $team_1): void
    {
        $this->team_1 = $team_1;
    }

    public function getTeam_2(): Team
    {
        return $this->team_2;
    }

    public function setTeam_2(Team $team_2): void
    {
        $this->team_2 = $team_2;
    }

    public function getWinner(): Team
    {
        return $this->winner;
    }

    public function setWinner(Team $winner): void
    {
        $this->winner = $winner;
    }
}
