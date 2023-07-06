<?php

namespace App\Models;

class Post
{

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

            startSession();
            setSession('success', 'Post added succesfully');
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
