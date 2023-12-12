<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\CategoryRepository;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    
    public $categoryRepository;
    public $categoryService;

    public function __construct(
        CategoryRepository $categoryRepository, 
        CategoryService $categoryService)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return $this->categoryRepository->findAll();
    }

    public function show(string $categoryId)
    {
        return $this->categoryRepository->findById($categoryId);
    }

}
