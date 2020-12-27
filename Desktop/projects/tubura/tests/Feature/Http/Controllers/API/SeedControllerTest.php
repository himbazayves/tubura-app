<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Seed;
use App\Models\User;

class SeedControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_seed_api()
    {
        $seed = factory(Seed::class)->make();
        $data = $seed->attributesToArray();
        $response = $this->json('POST','api/seeds',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_seed_api()
    {
        $seed = factory(Seed::class)->create();
        $data = factory(Seed::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/seeds/'.$seed->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_seed_api()
    {
        $seed = factory(Seed::class)->create();
        $response = $this->json('DELETE','api/seeds/'.$seed->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $seed->refresh();
        $this->assertDatabaseMissing('seeds',['id' => $seed->id]);

    }
}
