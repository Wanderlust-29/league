<?php

class Player
{
    private ?int $id = null;
    private string $nickname;
    private string $bio;
    private Media $portrait;
    private int $team;

    public function __construct(string $nickname, string $bio, Media $portrait, int $team)
    {
        $this->nickname = $nickname;
        $this->bio = $bio;
        $this->portrait = $portrait;
        $this->team = $team;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getBio(): string
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     */
    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }

    /**
     * @return Media
     */
    public function getPortrait(): Media
    {
        return $this->portrait;
    }

    /**
     * @param Media $portrait
     */
    public function setPortrait(Media $portrait): void
    {
        $this->portrait = $portrait;
    }

    /**
     * @return int
     */
    public function getTeam(): int
    {
        return $this->team;
    }

    /**
     * @param int $team
     */
    public function setTeam(int $team): void
    {
        $this->team = $team;
    }
}
