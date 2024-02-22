<?php

class Team
{
    private ? int $id = null;
    private string $name;
    private string $description;
    private Media $logo;

    public function __construct(string $name, string $description, Media $logo)
    {
        $this->name = $name;
        $this->description = $description;
        $this->logo = $logo;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $url
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Media
     */
    public function getLogo(): Media
    {
        return $this->logo;
    }

    /**
     * @param Media $logo
     */
    public function setLogo(Media $logo): void
    {
        $this->logo = $logo;
    }
}