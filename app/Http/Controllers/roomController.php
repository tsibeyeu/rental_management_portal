<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\RoomRecord;
use App\Models\TenantRecord;
use App\Models\RoomType;
use App\Models\Tenant;
use App\Models\RoomTenant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class roomController extends Controller
{


    public function showCreateRoom(){
        $roomTypes=RoomType::all();
        return view('room.create',compact('roomTypes'));
    }

    public function createRoom(Request $request){
        $user=Auth::user();
        $existingRoom=Room::where('room_number',$request->room_number)->first();
        if($existingRoom){
            return redirect()->route('show.room.create')->with(['error'=> 'This room number already existed.']); 
        }
        $room=new Room();
        $room->user_id=$user->id;
        $room->room_type_id=$request->roomType_id;
        $room->floor=$request->floor;
        $room->room_number=$request->room_number;
        $room->square_area=$request->square_area;
        $room->price_per_area=$request->price_per_area;
        $room->total_price=$request->total_price;
        $room->save();
        
        return redirect()->route('room')->with(['success'=> 'Room created  successfully.']);

    }

    public function showRoom(){
        $rooms=Room::all();
        
        return view('room.show',compact('rooms'));
    }

    public function show($id){
        $tenant=Tenant::find($id);
        $roomTenants= $tenant->roomTenants;
        return view('room.tenantRoom',compact('roomTenants','tenant','id'));

    }

       public function showAddRoom($id){
        $tenant=Tenant::find($id);
        $rooms = Room::where('status', true)->get();
       
            return view('room.addroom',compact('tenant','rooms'));

       }


       public function addRoom(Request $request){
           $tenant_id=$request->input('tenant_id');
           $room_id=$request->input('room_id');
           $tenant=Tenant::find($tenant_id);
           $room=Room::find($room_id);
           $roomTenant=new RoomTenant();
           $roomTenant->tenant_id=$tenant->id;
           $roomTenant->room_id=$room->id;
           $roomTenant->floor=$room->floor;
           $roomTenant->room_number=$room->room_number;
           $roomTenant->square_area=$room->square_area;
           $roomTenant->price_per_area=$room->price_per_area;
           $roomTenant->total_price=$room->total_price;
           $roomTenant->status=false;
           if($roomTenant->save()){
            $room->status=false;
            $room->save();
            $roomTenantId=$roomTenant->id;
            return view('license.create',compact('roomTenantId','room'));
           }

       }

       public function editRoom(Request $request){
        $room_id=$request->input('room_id');
        $room=Room::find($room_id);
        return view('room.update',compact('room'));
        
                
             }

             public function updateRoom(Request $request){
               
                $room_id= $request->input('room_id');
                $room=Room::find($room_id);
                $room_type=$room->roomType;

                $room->floor=$request->floor;
                $room->room_number=$request->room_number;
                $room->square_area=$request->square_area;
                $room->price_per_area=$request->price_per_area;
                $room->total_price=$request->total_price;
                $room->save();
                
                $roomTenants=$room->roomTenants;
               
               
                foreach($roomTenants as $roomTenant){
                    $statusFalseRoomTenants=$roomTenant->where('status',false)->get();
                   foreach($statusFalseRoomTenants as $statusFalseRoomTenant){

                       $statusFalseRoomTenant->update([
                           "floor"=>$request->floor,
                           "room_number"=>$request->room_number,
                           "square_area"=>$request->square_area,
                           "price_per_area"=>$request->price_per_area,
                           
                       ]);
                     
                       
                   }
                

                }
                return redirect()->route('room')->with(['success'=> 'Room updated  successfully.']);

             }

             public function destroy(Request $request)
                         {
                             $room_id = $request->input('room_id');
                             $room = Room::find($room_id);

                             if (!$room) {
                                      return redirect()->back()->with(['error'=> 'Room not found.']);
                                   }

                     $roomTenants = $room->roomTenants;
                     foreach ($roomTenants as $roomTenant) {
                              $licenseAgreements = $roomTenant->licenseAgreements;
                         foreach ($licenseAgreements as $licenseAgreement) {
                                   $paymentHistories = $licenseAgreement->paymentHistories;
                                foreach ($paymentHistories as $paymentHistory) {
                                    $paymentHistory->delete();
                                 }
                                     $licenseAgreement->de7lete();
                                   }

                                    $roomTenant->delete();
                             }

                             $roomType = $room->roomType;
                             $roomType->delete();

                             $room->delete();

                            return redirect()->route('room')->with(['success'=> 'Room and related records deleted successfully.']);
                          }




               public function ReleaseRoom(Request $request){
                   $tenant_id=$request->input('tenant_id');
                   $tenant=Tenant::find($tenant_id);
                   $room_id=$request->input('room_id');
                   $room=Room::find($room_id);
                   $roomTenants=$tenant->roomTenants;
                   foreach($roomTenants as $roomTenant){
                       $statusFalseRoomTenants=$roomTenant->where('status',false)->get();
                       foreach($statusFalseRoomTenants as $statusFalseRoomTenant){
                           

                           if( $statusFalseRoomTenant->room_id == $room->id )
                           {
                               $statusFalseRoomTenant->status=true;
                               $statusFalseRoomTenant->save();
                               $room->status=true;
                               $room->save();
                               return redirect()->back()->with(['success'=> 'Room  released successfully.']);
       
                           }
                       }

                   }
               }


               public function Detail(Request $request){
                
                $roomTenants=RoomTenant::where('room_id',$request->input('room_id'))->get();
               
                
                return view('tenant.detail',compact('roomTenants'));
               }
               
}
