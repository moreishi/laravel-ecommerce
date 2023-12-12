<?php

namespace Tests\Feature\Product;

use Tests\Feature\Product\ProductBaseTest;
use Tests\TestCase;
use App\Models\Product;

class ProductReadTest extends ProductBaseTest
{
    public function test_read_product(): void
    {
        $response = $this->actingAs(ProductBaseTest::mockAsUser())->get(ProductBaseTest::HTTP_API_PRODUCT);

        $response->assertStatus(200);
    }

    public function test_read_product_by_id(): void
    {
        $response = $this->actingAs(ProductBaseTest::mockAsUser())
            ->get(ProductBaseTest::HTTP_API_PRODUCT . '/' . ProductBaseTest::mockProduct()->id);

        $response->assertStatus(200);
    }
}
