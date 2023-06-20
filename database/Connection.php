<?php



class Connection
{
    public static function make()
    {
        try {
            return new PDO("mysql:host=localhost;dbname=crud", "root", "");
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
