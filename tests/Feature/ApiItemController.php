<?php

namespace Tests\Feature;

use App\Item;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiItemController extends TestCase
{

    use RefreshDatabase;
    /**
     * testShowItemsViaApi
     *
     * @return void
     */
    public function testShowItemsViaApi()
    {

        $items = factory(Item::class,5)->create();
        $response = $this->json('GET','/api/items');
        $response->assertSuccessful();

        $response->assertJsonStructure([[
            'id','name','created_at','updated_at'
        ]]);

    }

    /**
     * testShowItemsViaApi
     *
     * @return void
     */
    public function testShowItemViaApi()
    {

        $item = factory(Item::class)->create();
        $response = $this->json('GET','/api/items' . $item->id);
        $response->assertSuccessful();

        $response->assertJsonStructure([
            'id','name','created_at','updated_at'
        ]);
        $response->assertJson([
            'id' => $item->id,
            'name' => $item->name,
            'created_at' => $item->created_at,
            'updated_at' => $item->updated_at,
        ]);

    }

    /**
     * testShowItemsViaApi
     *
     * @return void
     */
    public function testShowItemsViaApiAreBlankIfDatabaseIsEmpty()
    {

        $response = $this->json('GET','/api/items');
        $response->assertSuccessful();

    }
}
