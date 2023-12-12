<?php

namespace Tests\Feature\Product;

use Tests\BaseTestCase;
use App\Models\Product;

class ProductBaseTest extends BaseTestCase
{
    const HTTP_API_PRODUCT = '/api/products';

    public static function mockProduct()
    {
        return Product::factory()->create();
    }

}
