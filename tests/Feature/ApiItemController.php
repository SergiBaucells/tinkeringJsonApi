<?php

namespace Tests\Feature;

use App\Item;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiItemController extends TestCase
{
    /**
     * testShowItemsViaApi
     *
     * @return void
     */
    public function testShowItemsViaApi()
    {

        $this->$this->withoutExceptionHandling();
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
    public function testShowItemsViaApiAreBlankIfDatabaseIsEmpty()
    {

        $response = $this->json('GET','/api/items');
        $response->assertSuccessful();

    }
}
