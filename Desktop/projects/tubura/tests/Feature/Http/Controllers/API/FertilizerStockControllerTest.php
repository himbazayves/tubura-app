<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FertilizerStock;
use App\Models\User;

class FertilizerStockControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_fertilizer_stock_api()
    {
        $fertilizerStock = factory(FertilizerStock::class)->make();
        $data = $fertilizerStock->attributesToArray();
        $response = $this->json('POST','api/fertilizer-stocks',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_fertilizer_stock_api()
    {
        $fertilizerStock = factory(FertilizerStock::class)->create();
        $data = factory(FertilizerStock::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/fertilizer-stocks/'.$fertilizerStock->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_fertilizer_stock_api()
    {
        $fertilizerStock = factory(FertilizerStock::class)->create();
        $response = $this->json('DELETE','api/fertilizer-stocks/'.$fertilizerStock->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $fertilizerStock->refresh();
        $this->assertDatabaseMissing('fertilizer_stocks',['id' => $fertilizerStock->id]);

    }
}
