<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Category;

class CategoryRepository implements ICategoryRepository {

    public function findAll() : LengthAwarePaginator {
        return Category::paginate(15);
    }

    public function findById(int $categoryId) : Category {
        return Category::findOrFail($categoryId);
    }

}

