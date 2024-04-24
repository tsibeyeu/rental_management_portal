<?php

namespace App\Http\Controllers;
use App\Models\LicenseAgreement;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmationMail;
use Carbon\Carbon;

use Illuminate\Http\Request;

class paymentHistoryController extends Controller
{
    public function show($id){
        $licenseAgreements=LicenseAgreement::find($id);
        return view('payment.show', compact('licenseAgreements','id'));
       }

       public function showCreatePayment($id){
        $licenseAgreementId=$id;
        return view('payment.create',compact('licenseAgreementId'));
        
       }

       public function createPayment(Request $request, $id){
        $paymentHistory= new PaymentHistory();
        $licenseAgreement=LicenseAgreement::find($id);
        $roomtent=$licenseAgreement->roomTenant;
        $startDate = Carbon::parse($request->from);
        $endDate = Carbon::parse($request->to);
        $daysDifference = $endDate->diffInDays($startDate);
        $months=$daysDifference/30;
        $price=$licenseAgreement->price;
        $paid=$months * $price;

        $paymentHistory->license_agreement_id=$licenseAgreement->id;
        $paymentHistory->from=$request->from;
        $paymentHistory->to=$request->to;
        $paymentHistory->price=$paid;
        if( $paymentHistory->save()){
            $recipientEmail=$roomtent->tenant->email;
            $recipientname=$roomtent->tenant->name;
            Mail::to($recipientEmail)->send(new PaymentConfirmationMail($recipientname,$paid));
        }
        return redirect()->route('tenant.show')->with(['success'=> 'Payment paid successfully.']);
       }

       public function editPayment(Request $request){
        $paymentHistory_id= $request->input('paymentHistory_id');
        $paymentHistory=PaymentHistory::find($paymentHistory_id);
        $licenseAgreement_id= $request->input('licenseAgreement_id');
        $licenseAgreement=LicenseAgreement::find($licenseAgreement_id);

                return view('payment.update',compact('paymentHistory','licenseAgreement'));
             }

             public function updatePayment(Request $request){
                $paymentHistory_id= $request->input('paymentHistory_id');
                $paymentHistory=PaymentHistory::find($paymentHistory_id);
                $licenseAgreement_id= $request->input('licenseAgreement_id');
                $licenseAgreement=LicenseAgreement::find($licenseAgreement_id);
                $price= $licenseAgreement->price;
                
                
                $from = Carbon::parse($request->from);
                $to = Carbon::parse($request->to);
                $daysDifference = $to->diffInDays($from);
                $months=$daysDifference/30;
                $paid=$price * $months;
                $paymentHistory->update([
                'from'=>$request->from,
                'to'=>$request->to,
                'price'=>$paid,

            ]);
                return redirect()->back()->with(['success'=> 'Payment Updated successfully.']);

             }

             
             public function  destroy(Request $request ){
                $paymentHistory_id= $request->input('paymentHistory_id');
                $paymentHistory=PaymentHistory::find($paymentHistory_id);
               
                            $paymentHistory->delete();

                                     
                
                return redirect()->back()->with(['success'=> 'Payment record deleted successfully.']);
                
            }

      
}
