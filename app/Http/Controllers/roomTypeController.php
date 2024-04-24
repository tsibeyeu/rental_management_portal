<?php

namespace App\Http\Controllers;
use App\Models\RoomType;

use Illuminate\Http\Request;

class roomTypeController extends Controller
{
    public function showCreateRoomType(){
        $roomTypes=RoomType::all();
        return view('room.createRoomType',compact('roomTypes'));

    }  
    public function createRoomType(Request $request ){
        $roomType=new RoomType();
        $roomType->type=$request->type;
        $roomType->save();
        return redirect()->back()->with(['success'=> 'Room type created  successfully.']);


    }
    public function editRoomType(Request $request){
        $roomType_id=$request->input('roomType_id');
        $roomType=RoomType::find($roomType_id);
        return view('roomType.update',compact('roomType'));

    }

    public function updateRoomType(Request $request){
        $roomType_id=$request->input('roomType_id');
        $roomType=RoomType::find($roomType_id);
        $roomType->type=$request->type;
        $roomType->save();
        return redirect()->route('show.room.type.create')->with(['success'=> 'Room type updated  successfully.']);


    }
    public function destroy(Request $request){
        $roomType_id=$request->input('roomType_id');
        $roomType=RoomType::find($roomType_id);
        $roomType->delete();
        return redirect()->route('show.room.type.create')->with(['success'=> 'Room type deleted  successfully.']);


    }
}
