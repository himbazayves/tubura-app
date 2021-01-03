<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FertilizerApplication;

class FertilizerApplicationControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_fertilizer_application_and_redirects()
    {

        $fertilizerApplication = factory(FertilizerApplication::class)->make();
        $data = $fertilizerApplication->attributesToArray();
        $response = $this->post(route('fertilizer-applications.store'), $data);
        $response->assertRedirect(route('fertilizer-applications.index'));
        $response->assertSessionHas('status', 'FertilizerApplication created!');
    }

    /**
     * @test
     */
    public function it_updates_fertilizer_application_and_redirects()
    {
        $fertilizerApplication = factory(FertilizerApplication::class)->create();
        $data = factory(FertilizerApplication::class)->make()->attributesToArray();
        $response = $this->put(route('fertilizer-applications.update', ['fertilizer_application' => $fertilizerApplication]), $data);
        $response->assertRedirect(route('fertilizer-applications.index'));
        $response->assertSessionHas('status', 'FertilizerApplication updated!');
    }

    /**
     * @test
     */
    public function it_destroys_fertilizer_application_and_redirects()
    {
        $fertilizerApplication = factory(FertilizerApplication::class)->create();
        $response = $this->delete(route('fertilizer-applications.destroy', ['fertilizer_application' => $fertilizerApplication]));
        $response->assertRedirect(route('fertilizer-applications.index'));
        $response->assertSessionHas('status', 'FertilizerApplication destroyed!');
    }
}
