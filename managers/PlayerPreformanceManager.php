<?php

class PlayerPerformanceManager extends AbstractManager
{
    public function findOne(int $id) : ?PlayerPerformance
    {
        $query = $this->db->prepare('SELECT * FROM player_performance
                                    WHERE id=:id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        $pm = new PlayerManager();
        $player = $pm->findOne($result["player"]);
        $newPlayer = new Player($player["nickname"], $player["bio"], $player["portrait"], $player["team"]);

        $gm = new GameManager();
        $game = $gm->findOne($result["logo"]);
        $newGame = new Game($game["name"], $game["date"], $game["team_1"], $game["team_2"], $game["winner"]);

        $playerPerf = new PlayerPerformance($newPlayer, $newGame, $result["point"], $result["assists"]);
        $playerPerf->setId($result["id"]);
        return $playerPerf;
    }
}