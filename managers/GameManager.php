<?php

class GameManager extends AbstractManager
{
    public function findOne(int $id) : ?Game
    {
        $query = $this->db->prepare('SELECT * FROM games
                                    WHERE id=:id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        $tm = new TeamManager();

        $team1 = $tm->findOne($result["team_1"]);
        $team2 = $tm->findOne($result["team_2"]);
        $winner = $tm->findOne($result["winner"]);

        $game = new Game($result["name"], $result["date"], $team1, $team2, $winner);
        $game->setId($result["id"]);
        return $game;
    }

    public function findAll(): array
    {
        $query = $this->db->prepare('SELECT * FROM games');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $games = [];
    
        foreach ($result as $item) {
            $tm = new TeamManager();

            $team1 = $tm->findOne($item["team_1"]);
            $team2 = $tm->findOne($item["team_2"]);
            $winner = $tm->findOne($item["winner"]);
    
            $game = new Game($item["name"], $item["date"], $team1, $team2, $winner);
            $game->setId($item["id"]);
            $games[] = $game;
        }
        return $games;
    }
    

    public function findLastGame() : ?Game {
        $query = $this->db->prepare('SELECT * FROM games
                                    ORDER BY date DESC LIMIT 1');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $tm = new TeamManager();

        $team1 = $tm->findOne($result["team_1"]);
        $team2 = $tm->findOne($result["team_2"]);
        $winner = $tm->findOne($result["winner"]);

        $game = new Game($result["name"], $result["date"], $team1, $team2, $winner);
        $game->setId($result["id"]);
        return $game;
    }
}