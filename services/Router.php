<?php

class Router
{
    public function handleRequest($route)
    {
        if (empty($route)) {
            $blogController = new BlogController();
            $blogController->home();
        }
    }
}