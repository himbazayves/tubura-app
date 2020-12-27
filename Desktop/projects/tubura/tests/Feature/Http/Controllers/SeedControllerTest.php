<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Seed;

class SeedControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_seed_and_redirects()
    {

        $seed = factory(Seed::class)->make();
        $data = $seed->attributesToArray();
        $response = $this->post(route('seeds.store'), $data);
        $response->assertRedirect(route('seeds.index'));
        $response->assertSessionHas('status', 'Seed created!');
    }

    /**
     * @test
     */
    public function it_updates_seed_and_redirects()
    {
        $seed = factory(Seed::class)->create();
        $data = factory(Seed::class)->make()->attributesToArray();
        $response = $this->put(route('seeds.update', ['seed' => $seed]), $data);
        $response->assertRedirect(route('seeds.index'));
        $response->assertSessionHas('status', 'Seed updated!');
    }

    /**
     * @test
     */
    public function it_destroys_seed_and_redirects()
    {
        $seed = factory(Seed::class)->create();
        $response = $this->delete(route('seeds.destroy', ['seed' => $seed]));
        $response->assertRedirect(route('seeds.index'));
        $response->assertSessionHas('status', 'Seed destroyed!');
    }
}
