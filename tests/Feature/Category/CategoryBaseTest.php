<?php

namespace Tests\Feature\Category;

use Tests\BaseTestCase;
use App\Models\Category;

class CategoryBaseTest extends BaseTestCase
{
    const HTTP_API_CATEGORY = '/api/categories';

    public static function mockCategory()
    {
        return Category::factory()->create();
    }

}
