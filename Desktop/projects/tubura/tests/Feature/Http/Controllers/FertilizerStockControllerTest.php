<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FertilizerStock;

class FertilizerStockControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_fertilizer_stock_and_redirects()
    {

        $fertilizerStock = factory(FertilizerStock::class)->make();
        $data = $fertilizerStock->attributesToArray();
        $response = $this->post(route('fertilizer-stocks.store'), $data);
        $response->assertRedirect(route('fertilizer-stocks.index'));
        $response->assertSessionHas('status', 'FertilizerStock created!');
    }

    /**
     * @test
     */
    public function it_updates_fertilizer_stock_and_redirects()
    {
        $fertilizerStock = factory(FertilizerStock::class)->create();
        $data = factory(FertilizerStock::class)->make()->attributesToArray();
        $response = $this->put(route('fertilizer-stocks.update', ['fertilizer_stock' => $fertilizerStock]), $data);
        $response->assertRedirect(route('fertilizer-stocks.index'));
        $response->assertSessionHas('status', 'FertilizerStock updated!');
    }

    /**
     * @test
     */
    public function it_destroys_fertilizer_stock_and_redirects()
    {
        $fertilizerStock = factory(FertilizerStock::class)->create();
        $response = $this->delete(route('fertilizer-stocks.destroy', ['fertilizer_stock' => $fertilizerStock]));
        $response->assertRedirect(route('fertilizer-stocks.index'));
        $response->assertSessionHas('status', 'FertilizerStock destroyed!');
    }
}
