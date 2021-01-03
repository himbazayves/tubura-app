<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FertilizerApplication;
use App\Models\User;

class FertilizerApplicationControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_fertilizer_application_api()
    {
        $fertilizerApplication = factory(FertilizerApplication::class)->make();
        $data = $fertilizerApplication->attributesToArray();
        $response = $this->json('POST','api/fertilizer-applications',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_fertilizer_application_api()
    {
        $fertilizerApplication = factory(FertilizerApplication::class)->create();
        $data = factory(FertilizerApplication::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/fertilizer-applications/'.$fertilizerApplication->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_fertilizer_application_api()
    {
        $fertilizerApplication = factory(FertilizerApplication::class)->create();
        $response = $this->json('DELETE','api/fertilizer-applications/'.$fertilizerApplication->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $fertilizerApplication->refresh();
        $this->assertDatabaseMissing('fertilizer_applications',['id' => $fertilizerApplication->id]);

    }
}
