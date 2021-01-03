<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\SeedApplication;

class SeedApplicationControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_seed_application_and_redirects()
    {

        $seedApplication = factory(SeedApplication::class)->make();
        $data = $seedApplication->attributesToArray();
        $response = $this->post(route('seed-applications.store'), $data);
        $response->assertRedirect(route('seed-applications.index'));
        $response->assertSessionHas('status', 'SeedApplication created!');
    }

    /**
     * @test
     */
    public function it_updates_seed_application_and_redirects()
    {
        $seedApplication = factory(SeedApplication::class)->create();
        $data = factory(SeedApplication::class)->make()->attributesToArray();
        $response = $this->put(route('seed-applications.update', ['seed_application' => $seedApplication]), $data);
        $response->assertRedirect(route('seed-applications.index'));
        $response->assertSessionHas('status', 'SeedApplication updated!');
    }

    /**
     * @test
     */
    public function it_destroys_seed_application_and_redirects()
    {
        $seedApplication = factory(SeedApplication::class)->create();
        $response = $this->delete(route('seed-applications.destroy', ['seed_application' => $seedApplication]));
        $response->assertRedirect(route('seed-applications.index'));
        $response->assertSessionHas('status', 'SeedApplication destroyed!');
    }
}
