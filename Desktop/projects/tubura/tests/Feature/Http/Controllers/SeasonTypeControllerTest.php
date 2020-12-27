<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\SeasonType;

class SeasonTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_season_type_and_redirects()
    {

        $seasonType = factory(SeasonType::class)->make();
        $data = $seasonType->attributesToArray();
        $response = $this->post(route('season-types.store'), $data);
        $response->assertRedirect(route('season-types.index'));
        $response->assertSessionHas('status', 'SeasonType created!');
    }

    /**
     * @test
     */
    public function it_updates_season_type_and_redirects()
    {
        $seasonType = factory(SeasonType::class)->create();
        $data = factory(SeasonType::class)->make()->attributesToArray();
        $response = $this->put(route('season-types.update', ['season_type' => $seasonType]), $data);
        $response->assertRedirect(route('season-types.index'));
        $response->assertSessionHas('status', 'SeasonType updated!');
    }

    /**
     * @test
     */
    public function it_destroys_season_type_and_redirects()
    {
        $seasonType = factory(SeasonType::class)->create();
        $response = $this->delete(route('season-types.destroy', ['season_type' => $seasonType]));
        $response->assertRedirect(route('season-types.index'));
        $response->assertSessionHas('status', 'SeasonType destroyed!');
    }
}
