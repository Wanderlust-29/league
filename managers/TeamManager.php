<?php

class TeamManager extends AbstractManager
{
    public function findFirst() : ?Team
    {
        $query = $this->db->prepare('SELECT teams.*, media.url AS media_url, media.alt AS media_alt FROM teams 
        JOIN media ON media.id= teams.logo LIMIT 1');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $logo = new Media($result["media_url"], $result["media_alt"]);
            $team = new Team($result["name"], $result["description"], $logo);
            $team->setId($result["id"]);
            return $team;
        } else {
            return null;
        }
    }

    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT teams.*, media.url AS media_url, media.alt AS media_alt FROM teams 
        JOIN media ON media.id = teams.logo');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $teams = [];

        foreach($result as $item)
        {
            $logo = new Media($item["media_url"], $item["media_alt"]);
            $team = new Team($item["name"], $item["description"], $logo);
            $team->setId($item["id"]);
            $teams[] = $team;
        }

        return $teams;
    }
    public function lastMatch() : array
    {
        $query = $this->db->prepare('SELECT teams.*, media.url AS media_url, media.alt AS media_alt FROM teams 
        JOIN media ON media.id = teams.logo');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $teams = [];

        foreach($result as $item)
        {
            $logo = new Media($item["media_url"], $item["media_alt"]);
            $team = new Team($item["name"], $item["description"], $logo);
            $team->setId($item["id"]);
            $teams[] = $team;
        }

        return $teams;
    }
}