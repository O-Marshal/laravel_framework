<?php

namespace Tests\Unit;

use Ckryo\Framework\Models\ProductModel;
use Ckryo\Framework\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $p = ProductModel::with([])->find(42);
        $p->update([
            'name' => 'change name'
        ]);

        $this->assertTrue(true);
    }
}
