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

    public function storePost($imgUrl, $data, $categoryIds)
    {
        $conn = connect();

        $data['thumbnail'] = $imgUrl;

        $query = sprintf(
            "INSERT INTO %s (%s) VALUES(%s)",
            "posts",
            implode(', ', array_keys($data)),
            ":" . implode(', :', array_keys($data))
        );

        try {
            $stm = $conn->prepare($query);
            $stm->execute($data);
        } catch (\Throwable $th) {
            die($th->getMessage());
        }

        $postId = $conn->lastInsertId();

        // Prepare the SQL statement for linking the post to categories in the "post_categories" table
        $query = "INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, :category_id)";
        $stmt = $conn->prepare($query);

        foreach ($categoryIds as $categoryId) {
            $stmt->execute(['post_id' => $postId, 'category_id' => $categoryId]);
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
