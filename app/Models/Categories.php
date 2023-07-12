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
}
