<?php

namespace App\Http\Livewire;

use Livewire\Component;



class Stock extends Component
{

    public $year,$season;


    public function updatedQuery()
    {


    $stock=BookType::where('name', 'Audio')
        ->get();
        
    $bookType=$bookType->first()->id;
    return   $this->books = Book::where('book_type_id', $bookType)
                        ->where('title', 'like', '%' . $this->query . '%')
                       
                        ->paginate(12);
         
          

    }

    public function render()
    {
        return view('livewire.stock');
    }
}
