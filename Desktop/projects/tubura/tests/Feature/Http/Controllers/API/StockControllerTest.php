<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Stock;
use App\Models\User;

class StockControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_stock_api()
    {
        $stock = factory(Stock::class)->make();
        $data = $stock->attributesToArray();
        $response = $this->json('POST','api/stocks',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_stock_api()
    {
        $stock = factory(Stock::class)->create();
        $data = factory(Stock::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/stocks/'.$stock->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_stock_api()
    {
        $stock = factory(Stock::class)->create();
        $response = $this->json('DELETE','api/stocks/'.$stock->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $stock->refresh();
        $this->assertDatabaseMissing('stocks',['id' => $stock->id]);

    }
}
