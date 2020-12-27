<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Year;
use App\Models\User;

class YearControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_year_api()
    {
        $year = factory(Year::class)->make();
        $data = $year->attributesToArray();
        $response = $this->json('POST','api/years',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_year_api()
    {
        $year = factory(Year::class)->create();
        $data = factory(Year::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/years/'.$year->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_year_api()
    {
        $year = factory(Year::class)->create();
        $response = $this->json('DELETE','api/years/'.$year->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $year->refresh();
        $this->assertDatabaseMissing('years',['id' => $year->id]);

    }
}
