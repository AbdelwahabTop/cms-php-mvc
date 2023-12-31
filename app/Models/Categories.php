<?php

namespace App\Models;

use PDO;

class Categories
{
    public function showAll($table)
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

    public function selectedCategories($id)
    {
        $query = "SELECT post_categories.category_id FROM categories
            JOIN post_categories ON categories.id = post_categories.category_id
            JOIN posts ON post_categories.post_id = posts.id
            WHERE posts.id = ?";

        $stm = connect()->prepare($query);
        $stm->execute([$id]);

        return $stm->fetchAll(PDO::FETCH_COLUMN);
    }

    public function nameSelectedCategories($id)
    {
        $query = "SELECT categories.name  FROM categories
            JOIN post_categories ON categories.id = post_categories.category_id
            JOIN posts ON post_categories.post_id = posts.id
            WHERE posts.id = ?";

        $stm = connect()->prepare($query);
        $stm->execute([$id]);

        return $stm->fetchAll(PDO::FETCH_COLUMN);
    }

    public function numOfCategories()
    {
        $query = "SELECT category_id FROM post_categories";

        $stm = connect()->prepare($query);
        $stm->execute();

        return array_count_values($stm->fetchAll(PDO::FETCH_COLUMN));
    }
}
