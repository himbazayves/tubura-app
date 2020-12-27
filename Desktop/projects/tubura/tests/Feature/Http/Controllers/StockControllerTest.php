<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Stock;

class StockControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_stock_and_redirects()
    {

        $stock = factory(Stock::class)->make();
        $data = $stock->attributesToArray();
        $response = $this->post(route('stocks.store'), $data);
        $response->assertRedirect(route('stocks.index'));
        $response->assertSessionHas('status', 'Stock created!');
    }

    /**
     * @test
     */
    public function it_updates_stock_and_redirects()
    {
        $stock = factory(Stock::class)->create();
        $data = factory(Stock::class)->make()->attributesToArray();
        $response = $this->put(route('stocks.update', ['stock' => $stock]), $data);
        $response->assertRedirect(route('stocks.index'));
        $response->assertSessionHas('status', 'Stock updated!');
    }

    /**
     * @test
     */
    public function it_destroys_stock_and_redirects()
    {
        $stock = factory(Stock::class)->create();
        $response = $this->delete(route('stocks.destroy', ['stock' => $stock]));
        $response->assertRedirect(route('stocks.index'));
        $response->assertSessionHas('status', 'Stock destroyed!');
    }
}
