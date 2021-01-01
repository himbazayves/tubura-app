<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\SeedRequest;
use App\Models\User;

class SeedRequestControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_seed_request_api()
    {
        $seedRequest = factory(SeedRequest::class)->make();
        $data = $seedRequest->attributesToArray();
        $response = $this->json('POST','api/seed-requests',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_seed_request_api()
    {
        $seedRequest = factory(SeedRequest::class)->create();
        $data = factory(SeedRequest::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/seed-requests/'.$seedRequest->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_seed_request_api()
    {
        $seedRequest = factory(SeedRequest::class)->create();
        $response = $this->json('DELETE','api/seed-requests/'.$seedRequest->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $seedRequest->refresh();
        $this->assertDatabaseMissing('seed_requests',['id' => $seedRequest->id]);

    }
}
