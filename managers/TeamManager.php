<?php

class TeamManager extends AbstractManager
{
    public function findFirst() : ?Team
    {
        $query = $this->db->prepare('SELECT * FROM teams LIMIT 1');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        $mm = new MediaManager();
        $logo = $mm->findOne($result["logo"]);

        $team = new Team($result["name"], $result["description"], $logo);
        $team->setId($result["id"]);
        return $team;
    }

    public function findOne(int $id) : ?Team
    {
        $query = $this->db->prepare('SELECT * FROM teams
                                    WHERE id=:id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        $mm = new MediaManager();
        $logo = $mm->findOne($result["logo"]);

        $team = new Team($result["name"], $result["description"], $logo);
        $team->setId($result["id"]);
        return $team;
    }

    public function findAll() : ?array
    {
        $query = $this->db->prepare('SELECT * FROM teams');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $teams = [];
        foreach($result as $item) {
        $mm = new MediaManager();
        $logo = $mm->findOne($item["logo"]);

        $team = new Team($item["name"], $item["description"], $logo);
        $team->setId($item["id"]);
        $teams[] = $team;
    }
    return $teams;
    }
}