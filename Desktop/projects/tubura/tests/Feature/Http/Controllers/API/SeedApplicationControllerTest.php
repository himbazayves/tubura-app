<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\SeedApplication;
use App\Models\User;

class SeedApplicationControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_seed_application_api()
    {
        $seedApplication = factory(SeedApplication::class)->make();
        $data = $seedApplication->attributesToArray();
        $response = $this->json('POST','api/seed-applications',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_seed_application_api()
    {
        $seedApplication = factory(SeedApplication::class)->create();
        $data = factory(SeedApplication::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/seed-applications/'.$seedApplication->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_seed_application_api()
    {
        $seedApplication = factory(SeedApplication::class)->create();
        $response = $this->json('DELETE','api/seed-applications/'.$seedApplication->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $seedApplication->refresh();
        $this->assertDatabaseMissing('seed_applications',['id' => $seedApplication->id]);

    }
}
