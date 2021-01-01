<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\SeedRequest;

class SeedRequestControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_seed_request_and_redirects()
    {

        $seedRequest = factory(SeedRequest::class)->make();
        $data = $seedRequest->attributesToArray();
        $response = $this->post(route('seed-requests.store'), $data);
        $response->assertRedirect(route('seed-requests.index'));
        $response->assertSessionHas('status', 'SeedRequest created!');
    }

    /**
     * @test
     */
    public function it_updates_seed_request_and_redirects()
    {
        $seedRequest = factory(SeedRequest::class)->create();
        $data = factory(SeedRequest::class)->make()->attributesToArray();
        $response = $this->put(route('seed-requests.update', ['seed_request' => $seedRequest]), $data);
        $response->assertRedirect(route('seed-requests.index'));
        $response->assertSessionHas('status', 'SeedRequest updated!');
    }

    /**
     * @test
     */
    public function it_destroys_seed_request_and_redirects()
    {
        $seedRequest = factory(SeedRequest::class)->create();
        $response = $this->delete(route('seed-requests.destroy', ['seed_request' => $seedRequest]));
        $response->assertRedirect(route('seed-requests.index'));
        $response->assertSessionHas('status', 'SeedRequest destroyed!');
    }
}
