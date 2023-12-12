<?php

namespace Tests\Feature\Product;

use Tests\Feature\Product\ProductBaseTest;
use App\Models\Product;

class ProductEditTest extends ProductBaseTest
{
    public function test_update_product(): void
    {
        $model = Product::factory()->make();

        $response = $this->actingAs(ProductBaseTest::mockAsUser())
            ->put(ProductBaseTest::HTTP_API_PRODUCT . '/' . ProductBaseTest::mockProduct()->id, [
            'name' => $model->name,
            'description' => $model->description,
            'price' => $model->price,
        ]);

        $content = json_decode($response->content());

        $response->assertStatus(200);
        
        $this->assertEquals($model->name, $content->name);
        $this->assertEquals($model->description, $content->description);
        $this->assertEquals($model->price, $content->price);
    }
}
