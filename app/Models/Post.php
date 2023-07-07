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
}
