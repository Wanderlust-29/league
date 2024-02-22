<?php

// BlogController.php

class BlogController extends AbstractController
{
    public function home() : void
    {
        $tm = new TeamManager();
        $pm = new PlayerManager();

        $team = $tm->findFirst();
        $players = $pm->findFirstTeam();
        $topPlayers = $pm->findTopThreePlayer();

        $this->render("home.html.twig", [
            "team" => $team,
            "players" => $players,
            "topPlayers" => $topPlayers,
        ]);
    }
}