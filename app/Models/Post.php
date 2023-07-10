<?php

namespace App\Models;

use PDO;

class Post
{
    public function allPost($table)
    {
        $query = "SELECT * FROM {$table}";
        try {
            $stm = connect()->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function storePost($imgUrl, $data)
    {
        $data['thumbnail'] = $imgUrl;

        $query = sprintf(
            "INSERT INTO %s (%s) VALUES(%s)",
            "posts",
            implode(', ', array_keys($data)),
            ":" . implode(', :', array_keys($data))
        );

        try {
            $stm = connect()->prepare($query);
            $stm->execute($data);
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function showPost($table, $id)
    {
        $query = "SELECT * FROM {$table} WHERE id=?";

        $stm = connect()->prepare($query);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    public function deletePost($table, $id)
    {
        $query = "DELETE FROM {$table} WHERE id=?";

        $stm = connect()->prepare($query);
        $stm->execute([$id]);
    }

    public function updatePost($table, $id, $imgUrl, $data)
    {
        $data['thumbnail'] = $imgUrl;

        $query = "UPDATE {$table} 
                    SET title = ?,
                        slug = ?,
                        body = ?,
                        thumbnail = ?,
                        isPublished = ?,
                        created_at = ?
                    WHERE id = ?";

        $stm = connect()->prepare($query);
        $stm->bindValue(1, $data['title']);
        $stm->bindValue(2, $data['slug']);
        $stm->bindValue(3, $data['body']);
        $stm->bindValue(4, $imgUrl);
        $stm->bindValue(5, $data['isPublished']);
        $stm->bindValue(6, $data['created_at']);
        $stm->bindValue(7, $id);

        $stm->execute();
    }
}
