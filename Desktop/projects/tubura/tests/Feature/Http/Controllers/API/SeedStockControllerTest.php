<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\SeedStock;
use App\Models\User;

class SeedStockControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_seed_stock_api()
    {
        $seedStock = factory(SeedStock::class)->make();
        $data = $seedStock->attributesToArray();
        $response = $this->json('POST','api/seed-stocks',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_seed_stock_api()
    {
        $seedStock = factory(SeedStock::class)->create();
        $data = factory(SeedStock::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/seed-stocks/'.$seedStock->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_seed_stock_api()
    {
        $seedStock = factory(SeedStock::class)->create();
        $response = $this->json('DELETE','api/seed-stocks/'.$seedStock->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $seedStock->refresh();
        $this->assertDatabaseMissing('seed_stocks',['id' => $seedStock->id]);

    }
}
