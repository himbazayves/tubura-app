<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Season;
use App\Models\User;

class SeasonControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_season_api()
    {
        $season = factory(Season::class)->make();
        $data = $season->attributesToArray();
        $response = $this->json('POST','api/seasons',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_season_api()
    {
        $season = factory(Season::class)->create();
        $data = factory(Season::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/seasons/'.$season->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_season_api()
    {
        $season = factory(Season::class)->create();
        $response = $this->json('DELETE','api/seasons/'.$season->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $season->refresh();
        $this->assertDatabaseMissing('seasons',['id' => $season->id]);

    }
}
