<?php

namespace App\Services;

use App\Interfaces\IProductService;
use App\Models\Product;
use App\DTO\ProductDTO;

class ProductService implements IProductService {

    public function create(ProductDTO $productDTO): Product
    {
    
        $product = Product::create([
            'name' => $productDTO->name,
            'description' => $productDTO->description,
            'price' => $productDTO->price
        ]);

        return $product;
    }

    public function update(ProductDTO $productDTO, int $productId): Product
    {
        $product = Product::find($productId);
        $product->name = $productDTO->name;
        $product->description = $productDTO->description;
        $product->price = $productDTO->price;
        $product->save();

        return $product;
    }

    public function delete(int $productId)
    {
        if(Product::find($productId)) {
            Product::destroy($productId);
            return true;
        }
        
        return false;
    }

}