<?php

namespace Tests\Feature\Category;

use Illuminate\Support\Facades\Storage;
use Tests\Feature\Category\CategoryBaseTest;

class CategoryReadTest extends CategoryBaseTest
{
    public function test_read_category(): void
    {
        $response = $this->actingAs(CategoryBaseTest::mockAsUser())->get(CategoryBaseTest::HTTP_API_CATEGORY);

        $response->assertStatus(200);
    }

    public function test_read_category_by_id(): void
    {
        $response = $this->actingAs(CategoryBaseTest::mockAsUser())
            ->get(CategoryBaseTest::HTTP_API_CATEGORY . '/' . CategoryBaseTest::mockCategory()->id);

        $response->assertStatus(200);
    }
}
