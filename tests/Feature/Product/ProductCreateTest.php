<?php

namespace Tests\Feature\Product;

use Tests\Feature\Product\ProductBaseTest;
use App\Models\Product;

class ProductCreateTest extends ProductBaseTest
{
    public function test_create_biller(): void
    {
        $model = Product::factory()->make();
        // dd($model);
        $response = $this->actingAs(ProductBaseTest::mockAsUser())->post(ProductBaseTest::HTTP_API_PRODUCT, [
            'name' => $model->name,
            'description' => $model->description,
            'price' => $model->price,
        ]);

        $content = json_decode($response->content());
        
        $response->assertStatus(201);

        $this->assertEquals($model->name, $content->name);
        $this->assertEquals($model->description, $content->description);
        $this->assertEquals($model->price, $content->price);
    }
}
