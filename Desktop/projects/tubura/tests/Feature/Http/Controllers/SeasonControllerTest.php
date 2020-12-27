<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Season;

class SeasonControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_season_and_redirects()
    {

        $season = factory(Season::class)->make();
        $data = $season->attributesToArray();
        $response = $this->post(route('seasons.store'), $data);
        $response->assertRedirect(route('seasons.index'));
        $response->assertSessionHas('status', 'Season created!');
    }

    /**
     * @test
     */
    public function it_updates_season_and_redirects()
    {
        $season = factory(Season::class)->create();
        $data = factory(Season::class)->make()->attributesToArray();
        $response = $this->put(route('seasons.update', ['season' => $season]), $data);
        $response->assertRedirect(route('seasons.index'));
        $response->assertSessionHas('status', 'Season updated!');
    }

    /**
     * @test
     */
    public function it_destroys_season_and_redirects()
    {
        $season = factory(Season::class)->create();
        $response = $this->delete(route('seasons.destroy', ['season' => $season]));
        $response->assertRedirect(route('seasons.index'));
        $response->assertSessionHas('status', 'Season destroyed!');
    }
}
