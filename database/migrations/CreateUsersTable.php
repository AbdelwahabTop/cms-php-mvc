<?php


class CreateUsersTable
{
    public static function usersTable($pdo)
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS users(
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL UNIQUE,
                email VARCHAR(255) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                thumbnail VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            $stm = $pdo->prepare($query);
            $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
