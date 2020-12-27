<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Fertilizer;

class FertilizerControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_fertilizer_and_redirects()
    {

        $fertilizer = factory(Fertilizer::class)->make();
        $data = $fertilizer->attributesToArray();
        $response = $this->post(route('fertilizers.store'), $data);
        $response->assertRedirect(route('fertilizers.index'));
        $response->assertSessionHas('status', 'Fertilizer created!');
    }

    /**
     * @test
     */
    public function it_updates_fertilizer_and_redirects()
    {
        $fertilizer = factory(Fertilizer::class)->create();
        $data = factory(Fertilizer::class)->make()->attributesToArray();
        $response = $this->put(route('fertilizers.update', ['fertilizer' => $fertilizer]), $data);
        $response->assertRedirect(route('fertilizers.index'));
        $response->assertSessionHas('status', 'Fertilizer updated!');
    }

    /**
     * @test
     */
    public function it_destroys_fertilizer_and_redirects()
    {
        $fertilizer = factory(Fertilizer::class)->create();
        $response = $this->delete(route('fertilizers.destroy', ['fertilizer' => $fertilizer]));
        $response->assertRedirect(route('fertilizers.index'));
        $response->assertSessionHas('status', 'Fertilizer destroyed!');
    }
}
