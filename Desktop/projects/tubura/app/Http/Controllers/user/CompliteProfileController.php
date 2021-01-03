<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cell;
use Auth;
use App\models\User;
use Alert;

class CompliteProfileController extends Controller
{


     function index(){
        $cells= Cell::all();
        return view('user.complite_profile',['cells'=>$cells]);
     }


    function complite(Request $request){
      $request->validate([
         'name'=>'required',
         'surname'=>'required',
         'phone_number'=>'required|max:10|min:10|unique:users',
         'cell'=>'required',
         'password'=>'required|min:8|confirmed'
         
     ]);


     

      $user= Auth::user();

      $user->name=$request->name;
      $user->surname=$request->surname;
      $user->phone_number=$request->phone_number;
      $user->cell_id=$request->cell;
      $user->save();
      return redirect()->route('dashboard')->with('toast_success', 'Your profile is complite!');

    }
}
