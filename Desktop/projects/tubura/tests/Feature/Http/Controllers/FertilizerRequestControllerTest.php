<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FertilizerRequest;

class FertilizerRequestControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_fertilizer_request_and_redirects()
    {

        $fertilizerRequest = factory(FertilizerRequest::class)->make();
        $data = $fertilizerRequest->attributesToArray();
        $response = $this->post(route('fertilizer-requests.store'), $data);
        $response->assertRedirect(route('fertilizer-requests.index'));
        $response->assertSessionHas('status', 'FertilizerRequest created!');
    }

    /**
     * @test
     */
    public function it_updates_fertilizer_request_and_redirects()
    {
        $fertilizerRequest = factory(FertilizerRequest::class)->create();
        $data = factory(FertilizerRequest::class)->make()->attributesToArray();
        $response = $this->put(route('fertilizer-requests.update', ['fertilizer_request' => $fertilizerRequest]), $data);
        $response->assertRedirect(route('fertilizer-requests.index'));
        $response->assertSessionHas('status', 'FertilizerRequest updated!');
    }

    /**
     * @test
     */
    public function it_destroys_fertilizer_request_and_redirects()
    {
        $fertilizerRequest = factory(FertilizerRequest::class)->create();
        $response = $this->delete(route('fertilizer-requests.destroy', ['fertilizer_request' => $fertilizerRequest]));
        $response->assertRedirect(route('fertilizer-requests.index'));
        $response->assertSessionHas('status', 'FertilizerRequest destroyed!');
    }
}
