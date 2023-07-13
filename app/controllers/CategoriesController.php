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

    public function showCategories()
    {
        $categories = (new Categories)->showAll('categories');
        $numOfCategories = (new Categories)->numOfCategories('categories');

        return view("categories", ['categories' => $categories, 'numOfCategories' => $numOfCategories]);
    }
}
