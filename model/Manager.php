<?php


class Manager
{
    protected function dbConnect()
    {
        $database = new \PDO('mysql:host=localhost;dbname=p5blog;charset=utf8', 'root', '');
        return $database;
    }
}
