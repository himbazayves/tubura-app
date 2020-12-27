<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Fertilizer;
use App\Models\User;

class FertilizerControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_fertilizer_api()
    {
        $fertilizer = factory(Fertilizer::class)->make();
        $data = $fertilizer->attributesToArray();
        $response = $this->json('POST','api/fertilizers',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_fertilizer_api()
    {
        $fertilizer = factory(Fertilizer::class)->create();
        $data = factory(Fertilizer::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/fertilizers/'.$fertilizer->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_fertilizer_api()
    {
        $fertilizer = factory(Fertilizer::class)->create();
        $response = $this->json('DELETE','api/fertilizers/'.$fertilizer->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $fertilizer->refresh();
        $this->assertDatabaseMissing('fertilizers',['id' => $fertilizer->id]);

    }
}
