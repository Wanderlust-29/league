<?php

class PlayerManager extends AbstractManager
{
    public function findFirstTeam() : array
    {
        $query = $this->db->prepare('SELECT players.*, media.url AS media_url, media.alt AS media_alt 
                                    FROM players 
                                    JOIN media ON media.id = players.portrait 
                                    WHERE players.team = 1');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $players = [];

        foreach($result as $item)
        {
            $portrait = new Media($item["media_url"], $item["media_alt"]);
            $player = new Player($item["nickname"], $item["bio"],$portrait, $item["team"]);
            $player->setId($item["id"]);
            $players[] = $player;
        }

        return $players;
    }
    public function findTopThreePlayer() : array
    {
        $query = $this->db->prepare('SELECT players.*, media.url AS media_url, media.alt AS media_alt 
                                    FROM player_performance
                                    JOIN players ON players.id = player_performance.player
                                    JOIN media ON media.id = players.portrait 
                                    ORDER BY player_performance.points DESC
                                    LIMIT 3');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $players = [];

        foreach($result as $item)
        {
            $portrait = new Media($item["media_url"], $item["media_alt"]);
            $player = new Player($item["nickname"], $item["bio"], $portrait, $item["team"]);
            $player->setId($item["id"]);
            $players[] = $player;
        }

        return $players;
    }
}