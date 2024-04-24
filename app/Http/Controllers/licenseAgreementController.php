<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\LicenseAgreement;
use Illuminate\Http\Request;
use App\Models\RoomTenant;

class licenseAgreementController extends Controller
{
    public function show(Request $request,$id){
        $tenant=$request->input('tenant_id');
        $roomTenants = RoomTenant::where([
            ['tenant_id', $tenant],
            ['room_id', $id]
        ])->get();
       
        return view('license.show', compact('roomTenants'));
       }

       public function showCreateNewAgreement($id){
        $licenseAgreement=LicenseAgreement::find($id);
        $roomTenantId= $licenseAgreement->room_tenant_id;
        $roomTenant=$licenseAgreement->roomTenant;
        $room=$roomTenant->room;
        
       

        return view('license.create',compact('roomTenantId','room'));

       }

       public function createNewAgreement(Request $request, $id){
        $licenseAgreement=new LicenseAgreement();
        $licenseAgreement->room_tenant_id=$id;
        $licenseAgreement->start_date=$request->start_date;
        $licenseAgreement->expire_date=$request->expire_date;
        $licenseAgreement->price=$request->price;
        $licenseAgreement->license_status=true;

        if($licenseAgreement->save()){
            $licenseAgreementId=$licenseAgreement->id;

            return view('payment.create',compact('licenseAgreementId'));
        }

       }

       public function editLicense(Request $request){
        $licenseAgreement_id=$request->input('licenseAgreement_id');
        $licenseAgreement=LicenseAgreement::find($licenseAgreement_id);
        
                return view('license.update',compact('licenseAgreement',));
             }



             public function updateLicense(Request $request){
                $licenseAgreement_id= $request->input('licenseAgreement_id');
                $licenseAgreement=LicenseAgreement::find($licenseAgreement_id);
                $roomTenant=$licenseAgreement->roomTenant;
                $room=$roomTenant->room;
                
                $licenseAgreement->update([
                    'start_date'=>$request->start_date,
                    'expire_date'=>$request->expire_date,
                    'price'=>$request->price,
                ]);
                if($request->license_status == "unactive"){
                    $licenseAgreement->update([
                        'license_status'=>false,
                    ]);
                   
                }else{
                    $licenseAgreement->update([
                        'license_status'=>true,
                    ]);
                }
                return redirect()->route('tenant.show')->with(['success'=> 'License Updated successfully.']);

             }

             public function  destroy(Request $request ){
                $licenseAgreement_id= $request->input('licenseAgreement_id');
                $licenseAgreement=LicenseAgreement::find($licenseAgreement_id);
               
                    $paymentHistories=$licenseAgreement->paymentHistories;
                        foreach($paymentHistories as $paymentHistory){
                            $paymentHistory->delete();
                            $licenseAgreement->delete();
                                     
                }
                return redirect()->route('tenant.show')->with(['success'=> ' License Agreement records deleted successfully.']);
                
            }
            
              
        }



