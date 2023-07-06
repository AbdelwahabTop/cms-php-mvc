<?php


class CreatePostsTable
{
    public static function postsTable($pdo)
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS posts(
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL UNIQUE,
                slug VARCHAR(255) NOT NULL ,
                body TEXT NOT NULL,
                thumbnail VARCHAR(255),
                isPublished VARCHAR(50) default 1,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            $stm = $pdo->prepare($query);
            $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
