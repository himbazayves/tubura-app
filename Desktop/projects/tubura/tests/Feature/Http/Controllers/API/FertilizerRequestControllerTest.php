<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FertilizerRequest;
use App\Models\User;

class FertilizerRequestControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_fertilizer_request_api()
    {
        $fertilizerRequest = factory(FertilizerRequest::class)->make();
        $data = $fertilizerRequest->attributesToArray();
        $response = $this->json('POST','api/fertilizer-requests',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_fertilizer_request_api()
    {
        $fertilizerRequest = factory(FertilizerRequest::class)->create();
        $data = factory(FertilizerRequest::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/fertilizer-requests/'.$fertilizerRequest->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_fertilizer_request_api()
    {
        $fertilizerRequest = factory(FertilizerRequest::class)->create();
        $response = $this->json('DELETE','api/fertilizer-requests/'.$fertilizerRequest->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $fertilizerRequest->refresh();
        $this->assertDatabaseMissing('fertilizer_requests',['id' => $fertilizerRequest->id]);

    }
}
