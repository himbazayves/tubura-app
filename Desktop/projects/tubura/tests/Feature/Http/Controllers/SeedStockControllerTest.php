<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\SeedStock;

class SeedStockControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_seed_stock_and_redirects()
    {

        $seedStock = factory(SeedStock::class)->make();
        $data = $seedStock->attributesToArray();
        $response = $this->post(route('seed-stocks.store'), $data);
        $response->assertRedirect(route('seed-stocks.index'));
        $response->assertSessionHas('status', 'SeedStock created!');
    }

    /**
     * @test
     */
    public function it_updates_seed_stock_and_redirects()
    {
        $seedStock = factory(SeedStock::class)->create();
        $data = factory(SeedStock::class)->make()->attributesToArray();
        $response = $this->put(route('seed-stocks.update', ['seed_stock' => $seedStock]), $data);
        $response->assertRedirect(route('seed-stocks.index'));
        $response->assertSessionHas('status', 'SeedStock updated!');
    }

    /**
     * @test
     */
    public function it_destroys_seed_stock_and_redirects()
    {
        $seedStock = factory(SeedStock::class)->create();
        $response = $this->delete(route('seed-stocks.destroy', ['seed_stock' => $seedStock]));
        $response->assertRedirect(route('seed-stocks.index'));
        $response->assertSessionHas('status', 'SeedStock destroyed!');
    }
}
