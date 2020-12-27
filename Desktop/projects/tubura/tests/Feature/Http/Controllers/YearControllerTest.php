<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Year;

class YearControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_year_and_redirects()
    {

        $year = factory(Year::class)->make();
        $data = $year->attributesToArray();
        $response = $this->post(route('years.store'), $data);
        $response->assertRedirect(route('years.index'));
        $response->assertSessionHas('status', 'Year created!');
    }

    /**
     * @test
     */
    public function it_updates_year_and_redirects()
    {
        $year = factory(Year::class)->create();
        $data = factory(Year::class)->make()->attributesToArray();
        $response = $this->put(route('years.update', ['year' => $year]), $data);
        $response->assertRedirect(route('years.index'));
        $response->assertSessionHas('status', 'Year updated!');
    }

    /**
     * @test
     */
    public function it_destroys_year_and_redirects()
    {
        $year = factory(Year::class)->create();
        $response = $this->delete(route('years.destroy', ['year' => $year]));
        $response->assertRedirect(route('years.index'));
        $response->assertSessionHas('status', 'Year destroyed!');
    }
}
