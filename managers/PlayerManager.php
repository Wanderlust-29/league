<?php

class PlayerManager extends AbstractManager
{   

    public function findOne(int $id) : ?Player
    {
        $query = $this->db->prepare('SELECT * FROM players
                                    WHERE id=:id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        $mm = new MediaManager();
        $portrait = $mm->findOne($result["portrait"]);
        $newPortrait = new Media($portrait["url"], $portrait["alt"]);

        $tm = new TeamManager();
        $team = $tm->findOne($result["team"]);
        $logo = $mm->findOne($team["logo"]);
        $newTeam = new Team($team["name"], $team["description"], $logo);
        $newTeam->setId($team["id"]);

        $player = new Player($result["nickname"], $result["bio"], $newPortrait, $newTeam);
        $team->setId($result["id"]);
        return $player;
    }
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM players');

        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $players =[];

        foreach ($result as $item){
            $mm = new MediaManager();
            $portrait = $mm->findOne($item["portrait"]);
            $newPortrait = new Media($portrait->getUrl(), $portrait->getAlt());
    
            $tm = new TeamManager();
            $team = $tm->findOne($item["team"]);
    
            $player = new Player($item["nickname"], $item["bio"], $newPortrait, $team);
            $player->setId($item["id"]);
            $players[]= $player;
        }
        return $players;


    }
    // public function findFirstTeam() : array
    // {
    //     $query = $this->db->prepare('SELECT * FROM players 
    //                                 WHERE team = 1');
    //     $query->execute();
    //     $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //     $players = [];

    //     foreach($result as $item)
    //     {
    //         $mm = new MediaManager();
    //         $portrait = $mm->findOne($item["portrait"]);
    //         $newPortrait = new Media($portrait["url"], $portrait["alt"]);
            
    //         $tm = new TeamManager();
    //         $team = $tm->findOne($item["team"]);
    //         $logo = $mm->findOne($team["logo"]);
    //         $newTeam = new Team($team["name"], $team["description"], $logo);
    //         $newTeam->setId($team["id"]);

    //         $player = new Player($item["nickname"], $item["bio"], $newPortrait, $newTeam);
    //         $player->setId($item["id"]);
    //         $players[] = $player;
    //     }
    //     return $players;
    // }
    // public function findTopThreePlayer() : array
    // {
    //     $query = $this->db->prepare('SELECT players.*, media.url AS media_url, media.alt AS media_alt 
    //                                 FROM player_performance
    //                                 JOIN players ON players.id = player_performance.player
    //                                 JOIN media ON media.id = players.portrait 
    //                                 ORDER BY player_performance.points DESC
    //                                 LIMIT 3');
    //     $query->execute();
    //     $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //     $players = [];

    //     foreach($result as $item)
    //     {
    //         $portrait = new Media($item["url"], $item["alt"]);
    //         $player = new Player($item["nickname"], $item["bio"], $portrait, $item["team"]);
    //         $player->setId($item["id"]);
    //         $players[] = $player;
    //     }
    //     return $players;
    // }
}