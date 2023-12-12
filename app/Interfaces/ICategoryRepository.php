<?php

namespace App\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Category;

interface ICategoryRepository {

    public function findAll() : LengthAwarePaginator;

    public function findById(int $categoryId) : Category;
    
}