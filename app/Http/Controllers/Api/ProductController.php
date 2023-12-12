<?php

namespace App\Http\Controllers\Api;

use App\DTO\ProductDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

use App\Repositories\ProductRepository;
use App\Services\ProductService;

class ProductController extends Controller
{

    public $productRepository;
    public $productService;

    public function __construct(
        ProductRepository $productRepository, 
        ProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->productRepository->findAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        $productDTO = new ProductDTO(
            $request->name,
            $request->description,
            $request->price
        );

        return $this->productService->create($productDTO);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $productId)
    {
        return $this->productRepository->findById($productId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $productId)
    {
        $productDTO = new ProductDTO(
            $request->name,
            $request->description,
            $request->price
        );

        return $this->productService->update($productDTO, $productId); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $productId)
    {
        return $this->productService->delete($productId);
    }
}
