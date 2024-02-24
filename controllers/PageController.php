<?php

class PageController extends AbstractController
{
    public function home() : void
    {
        $tm = new TeamManager();
        $pm = new PlayerManager();
        $gm = new GameManager();

        $teams = $tm->findAll();
        $players = $pm->findAll();
        $games = $gm->findAll();

        dump($teams);
        dump($players);
        dump($games);

        $this->render("home.html.twig", [
            "teams" => $teams,
            "players" => $players,
            "games" => $games
        ]);
    }
}