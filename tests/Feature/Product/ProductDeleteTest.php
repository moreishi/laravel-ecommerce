<?php

namespace Tests\Feature\Product;

use Tests\Feature\Product\ProductBaseTest;
use App\Models\Product;

class ProductDeleteTest extends ProductBaseTest
{
    public function test_delete_product(): void
    {
        $response = $this->actingAs(ProductBaseTest::mockAsUser())
            ->delete(ProductBaseTest::HTTP_API_PRODUCT . '/' . ProductBaseTest::mockProduct()->id);
        $response->assertStatus(200);
    }
}
