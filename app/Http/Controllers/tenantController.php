<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Tenant;
use App\Models\RoomTenant;
use App\Models\LicenseAgreement;
use App\Models\PaymentHistory;
use App\Mail\PaymentConfirmationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Log;
use Illuminate\Http\Request;

class tenantController extends Controller
{
    public function showCreateTenant(Request $request){
        $room_id=$request->input('room_id');
        $room=Room::find($room_id);
        return view('tenant.create',compact('room'));

    }
    public function createTenant(Request $request,$id){
        $tenant=new Tenant();
        $tenant->name=$request->name;
        $tenant->email=$request->email;
        $tenant->phone_number=$request->phone_number;
        $tenant->address=$request->address;
        if($tenant->save()){
           
            $room=Room::find($id);
            $room->status=false;
            $room->save();
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
                $licenseAgreement=new LicenseAgreement();
                $licenseAgreement->room_tenant_id=$roomTenant->id;
                $licenseAgreement->start_date=$request->start_date;
                $licenseAgreement->expire_date=$request->expire_date;
                $licenseAgreement->price=$request->price;
                $licenseAgreement->license_status=true;  
         if($licenseAgreement->save()){
                    $paymentHistory= new PaymentHistory();
                    $startDate = Carbon::parse($request->from);
                    $endDate = Carbon::parse($request->to);
                    $daysDifference = $endDate->diffInDays($startDate);
                    $months=$daysDifference/30;
                    $price=$request->price;
                    $paid=$months * $price;
        
                    $paymentHistory->license_agreement_id=$licenseAgreement->id;
                    $paymentHistory->from=$request->from;
                    $paymentHistory->to=$request->to;
                    $paymentHistory->price=$paid;
                    if( $paymentHistory->save()){
                        $recipientEmail=$request->email;
                        $recipientname=$request->name;
                        try{

                            Mail::to($recipientEmail)->send(new PaymentConfirmationMail($recipientname,$paid));
                        }catch(\Exception $e){
                            log::error('Error saving PaymentHistory or sending email: ' . $e->getMessage());
                              return redirect()->route('tenant.show')->with(['success'=> 'Tenant created successfully. Email notification will be sent when you are online']);
                        }
                    }
                   
                    return redirect()->route('tenant.show')->with(['success'=> 'Tenant created successfully.']);
                }  
        }

    }
}

    

       public function show(){
        $user=Auth::user();
        $tenants=Tenant::all();
        
        return view('tenant.show', compact('tenants'));
       }
       

       public function editTenant($id){
        $tenant=Tenant::find($id);
        
         return view('tenant.update',compact('tenant',));
             }

        

       public function updateTenant( Request $request){
        $tenant_id= $request->input('tenant_id');
        $tenant=Tenant::find($tenant_id);
        $tenant->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address,
        ]);
        
        return redirect()->route('tenant.show')->with(['success'=> 'Tenant Updated successfully.']);

       }

       public function destroy(Request $request)
       {
           $tenant_id = $request->input('tenant_id');
           $tenant = Tenant::find($tenant_id);
       
           // Check if the tenant exists
           if (!$tenant) {
               return redirect()->back()->with(['error'=> 'Tenant not found.']);
           }
       
           $roomTenants = $tenant->roomTenants;
           foreach ($roomTenants as $roomTenant) {
               $room = $roomTenant->room;
               $room->status = true; // Update room status
               $room->save();
       
               $licenseAgreements = $roomTenant->licenseAgreements;
               foreach ($licenseAgreements as $licenseAgreement) {
                   $paymentHistories = $licenseAgreement->paymentHistories;
                   foreach ($paymentHistories as $paymentHistory) {
                       $paymentHistory->delete();
                   }
                   $licenseAgreement->delete();
               }
       
               // Remove the room tenant relationship
               $roomTenant->delete();
           }
       
           // Delete the tenant
           $tenant->delete();
       
           return redirect()->route('tenant.show')->with(['success'=> 'Tenant and related records deleted successfully.']);
       }
       
    
      
    }

