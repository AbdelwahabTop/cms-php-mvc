<?php

namespace App\Controllers;

use App\Models\Categories;

class CategoriesController
{
    public function create()
    {
        $categories = (new Categories)->showAll('categories');

        return view("create", ['categories' => $categories]);
    }
}
