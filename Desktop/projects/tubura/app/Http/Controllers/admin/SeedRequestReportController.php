<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\SeedRequest;
use App\Models\Seed;
use App\Models\Cell;
use App\Models\SeedApplication;
use Alert;

class SeedRequestReportController extends Controller
{
    function index(){


        $reports= SeedRequest::all();
        $seeds=Seed::all();
        $seedApplication=SeedApplication::all();
        $cells=Cell::all();

    return view('admin.report.seed.index',['reports'=>$reports,'seeds'=>$seeds,'seedApplication'=>$seedApplication,'cells'=>$cells]);


    }


    function filter(Request $request){

        $reports= SeedRequest::all();
        $seeds=Seed::all();
        $seedApplication=SeedApplication::all();
        $cells=Cell::all();

        $c = SeedRequest::query();
        // $province=$request->input('province');
         
          $cell=$request->cell;
          $seed=$request->seed;
          $application=$request->application;
          
 
         // $sector=$request->input('sector');
         // $start=$request->input('start_date');
         // $end=$request->input('end_date');
         // $user_id = Auth::user()->id;
         
         // if (!empty($province)) {
         //    $c = $c->where('province', $province);
       //  }


         
          if (!empty($application)) {
              //$district=District::find($district)->name;
             $c = $c->where('seed_application_id', $application);
             
         }
         if (!empty($seed)) {
             $c = $c->where('seed_id', $seed);
         }


         

         if (!empty($cell)) {
           $c = $c->where('cell_id', $cell);
          // $C=$c->join('farmers', 'cells.id', '=', $cell);
        }
         
       
 
 
 
         
         
 
        
      
         
         
         
         
         $c = $c->get();
         $requests=$c;
         
         if(count($requests)>0){
         
         $number=count($requests);
            
         
 
       
             
             return view('admin.report.seed.filter',['requests'=>$requests,'seeds'=>$seeds,'seedApplication'=>$seedApplication,'cells'=>$cells])->with('toast_success', 'Your query returned');
                                                 
                                                 
             
         }
         
         
         return redirect()->back()->with('warning', 'No result found for your query'); 
 
        
    }
}
