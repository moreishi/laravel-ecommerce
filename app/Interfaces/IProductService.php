<?php

namespace App\Interfaces;

use App\Models\Product;
use App\DTO\ProductDTO;

interface IProductService {

    public function create(ProductDTO $productDTO) : Product;
    
    public function update(ProductDTO $productDTO, int $productId) : Product;
    
    public function delete(int $productId);

}