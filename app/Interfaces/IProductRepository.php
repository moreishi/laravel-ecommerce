<?php

namespace App\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;

interface IProductRepository {

    public function findAll() : LengthAwarePaginator;

    public function findById(int $productId) : Product;

}