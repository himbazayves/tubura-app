<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\SeasonType;
use App\Models\User;

class SeasonTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_season_type_api()
    {
        $seasonType = factory(SeasonType::class)->make();
        $data = $seasonType->attributesToArray();
        $response = $this->json('POST','api/season-types',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_season_type_api()
    {
        $seasonType = factory(SeasonType::class)->create();
        $data = factory(SeasonType::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/season-types/'.$seasonType->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_season_type_api()
    {
        $seasonType = factory(SeasonType::class)->create();
        $response = $this->json('DELETE','api/season-types/'.$seasonType->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $seasonType->refresh();
        $this->assertDatabaseMissing('season_types',['id' => $seasonType->id]);

    }
}
