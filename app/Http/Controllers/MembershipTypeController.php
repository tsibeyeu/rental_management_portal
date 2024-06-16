<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembershipType;

class MembershipTypeController extends Controller
{
    function index()   {
        $membershipTypes=MembershipType::all();
        return view('membership-type.index',compact('membershipTypes'));
     }
    
     function create() {
        return view('membership-type.create');
     }
    
     function store(Request $request) {
        $membershipType=new MembershipType();
        $membershipType->name=$request->name;
        $membershipType->price=$request->price;
        $membershipType->save();
        $membershipTypes=MembershipType::all();
        return view('membership-type.index',compact('membershipTypes'));
     }
    
     function edit(Request $request) {
        $membershipType_id=$request->input('membershipType_id');
        $membershipType=MembershipType::find($membershipType_id);
        return view('membership-type.edit',compact('membershipType'));
     }
    
     function update(Request $request) {
        $membershipType=MembershipType::find($request->input('membershipType_id'));
        $membershipType->name=$request->name;
        $membershipType->price=$request->price;
        $membershipType->save();
        $membershipTypes=MembershipType::all();
        return view('membership-type.index',compact('membershipTypes'));
     } 
    
     function destroy(Request $request) {
        $membershipType=MembershipType::find($request->input('membershipType_id'));
        $membershipType->delete();
        $membershipTypes=MembershipType::all();
        return view('membership-type.index',compact('membershipTypes'));
    
     }
}
