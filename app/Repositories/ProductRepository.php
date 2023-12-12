<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Product;

class ProductRepository implements IProductRepository {

    public function findAll(): LengthAwarePaginator
    {
        return Product::paginate(15);
    }

    public function findById(int $productId): Product
    {
        return Product::findOrFail($productId);
    }

}