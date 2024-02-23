<?php

class PlayerPerformance
{
    private ?int $id = null;
    private Player $player;
    private Game $game;
    private int $points;
    private int $assists;

    public function __construct(Player $player, Game $game, int $points, int $assists)
    {
        $this->player = $player;
        $this->game = $game;
        $this->points = $points;
        $this->assists = $assists;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function setPlayer(Player $player): void
    {
        $this->player = $player;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function setGame(Game $game): void
    {
        $this->game = $game;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function setPoints(int $points): void
    {
        $this->points = $points;
    }

    public function getAssists(): int
    {
        return $this->assists;
    }

    public function setAssists(int $assists): void
    {
        $this->assists = $assists;
    }
}
