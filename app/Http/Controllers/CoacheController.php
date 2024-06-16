<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coache;

class CoacheController extends Controller
{
    function index()   {
        $coaches=Coache::all();
        return view('coache.index',compact('coaches'));
     }
    
     function create() {
        return view('coache.create');
     }
    
     function store(Request $request) {
        $coache=new Coache();
         $coache->name=$request->name;
         $coache->email=$request->email;
         $coache->phone_number=$request->phone_number;
         $coache->expertise=$request->expertise;
         $coache->save();
         $coaches=Coache::all();
        return view('coache.index',compact('coaches'));
     }
    
     function edit(Request $request) {
        $coache_id=$request->input('coache_id');
        $coache=Coache::find($coache_id);
        return view('coache.edit',compact('coache'));
     }
    
     function update(Request $request) {
        $coache=Coache::find($request->input('coache_id'));
        $coache->name=$request->name;
        $coache->email=$request->email;
        $coache->phone_number=$request->phone_number;
        $coache->expertise=$request->expertise;
        $coache->save();
        $coaches=Coache::all();
        return view('coache.index',compact('coaches'));
     } 
    
     function destroy(Request $request) {
        $coache=Coache::find($request->input('coache_id'));
        $coache->delete();
        $coaches=Coache::all();
        return view('coache.index',compact('coaches'));
    
     }
}
