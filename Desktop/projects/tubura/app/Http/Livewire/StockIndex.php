<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Stock;
use App\Models\Year;
use App\Models\Season;

class StockIndex extends Component
{


    public $year_id;
    public $season;
    public $stock=[];
    //public $years, $seasons;


     //public function yearsAndSeans(){

      //  $this->year= Year::all()->get();
       // $this->season= Season::all()->get();
    // }


    public function stock()
    {


   
        
   
    return    $stock=Stock::where('season', $this->season)
              ->get();
         
          

    }


    public function updatedQuery()
    {


   
        
   
    return    $stock=Stock::where('season', $this->season)
              ->get();
         
          

    }
    public function render()
    {
        return view('livewire.stock-index',['years'=>Year::all(),'seasons'=>Season::all(),'stock'=>$this->stock() ]);
    }
}
