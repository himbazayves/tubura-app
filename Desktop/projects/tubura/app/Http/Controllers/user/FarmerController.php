<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\Cell;
use Auth;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmers= Farmer::all();
        return view('user.farmer.index',['farmers'=>$farmers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cells= Cell::all();
        return view('user.farmer.create',['cells'=>$cells]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

       $request->validate([
           
        'name'=>'required',
        'surname'=>'required',
        'phone_number'=>'required|max:10|min:10|unique:farmers',
       
        
        'NID'=>'required|unique:farmers|min:16|max:16',
        'land_size'=>'required',
           
           
           
           
           ]);
       
        $name=$request->input('name');
        $surname=$request->input('surname');
        $NID=$request->NID;
        $cell_id=Auth::user()->cell_id;
        $phone_number=$request->phone_number;
        $land_size=$request->land_size;
        
        

        $farmer=new Farmer;
        $farmer->name=$name;
        $farmer->surname=$surname;
        $farmer->cell_id=$cell_id;
        $farmer->NID=$NID;
        $farmer->phone_number=$phone_number;
        $farmer->land_size=$land_size;

        $farmer->save();
        

        return redirect()->route('farmers.index')->with('success','Farmer saved successfully');
                                
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $farmer= Farmer::find($id);
       
        return view('user.farmer.show',['farmer'=>$farmer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
        $farmer= Farmer::find($id);
        $cells= Cell::all();
        return view('user.farmer.edit',['farmer'=>$farmer,'cells'=>$cells]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           
            'name'=>'required',
            'surname'=>'required',
            'phone_number'=>'required|max:10|min:10',
          
            
            'NID'=>'required|max:16|min:16',
              'land_size'=>'required' 
               
               
               
               ]);
            $farmer=Farmer::find($id);

            if($farmer->NID !=$request->NID) {
                $request->validate([
           
                    'NID'=>'unique:farmers'
                 ]);

              }  

               //,
           
            $name=$request->input('name');
            $surname=$request->input('surname');
            $NID=$request->NID;
            $cell_id=Auth::user()->cell_id;
            $phone_number=$request->phone_number;
            $land_size=$request->land_size;
            
            
    
            
            $farmer->name=$name;
            $farmer->surname=$surname;
            $farmer->cell_id=$cell_id;
            $farmer->NID=$NID;
            $farmer->phone_number=$phone_number;
            $farmer->land_size=$land_size;
    
            $farmer->save();

        
            
    
            return redirect()->route('farmers.index')->with('success','Farmer edited successfully');
                                    
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farmer=Farmer::find($id);
       
       
       
        $farmer->delete();
        return redirect()->back()->with('success','Farmer deleted successfully');

    }
}
