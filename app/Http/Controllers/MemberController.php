<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MembershipType;
use App\Models\Coache;
use App\Models\PackageSession;
use App\Models\MemberTrainingPackage;
use App\Models\TrainingPackage;
use Carbon\Carbon;
class MemberController extends Controller
{
    function index()   {
        $members=Member::all();
        return view('member.index',compact('members'));
     }
    
     function create(Request $request ) {
        $training_package_id = $request->trainingpackage_id ;
        
        $membershipTypes=MembershipType::all();
        $coaches=Coache::all();
        $packageSessions=PackageSession::all();
        return view('member.create',compact('membershipTypes','coaches','packageSessions','training_package_id'));
     }
    
     function store(Request $request) {
         $member=new Member();
         $member->name=$request->name;
         $member->email=$request->email;
         $member->phone_number=$request->phone_number;
         $member->address=$request->address;
         $member->membership_type_id =$request->membershipType_id;
         if ( $member->save()) {
            $memberTrainingPackage=new MemberTrainingPackage();
            $memberTrainingPackage->member_id = $member->id;
            $memberTrainingPackage->coache_id = $request->coache_id;
            $memberTrainingPackage->training_package_id = $request->training_package_id;
            $memberTrainingPackage->package_session_id = $request->package_session_id ;
            $memberTrainingPackage->join_date = $request->join_date ;
            $memberTrainingPackage->expire_date = $request->expire_date ;
            $trainingPackage=TrainingPackage::find($request->training_package_id);
            $membershipType=MembershipType::find($request->membershipType_id);
            $membershipPrice=$membershipType->price;
            $packagePrice=$trainingPackage->price;
            $join_date=Carbon::parse($request->join_date);
            $expire_date=Carbon::parse($request->expire_date);
            $daysDifference = $expire_date->diffInDays($join_date);
            $month=$daysDifference/30;
            $priceWithPackage=$month * $packagePrice;
            $memberTrainingPackage->price = $priceWithPackage + $membershipPrice;
            $memberTrainingPackage->save();
         }
         $members=Member::all();
        return view('member.index',compact('members'));
     }
    
     function edit(Request $request) {
        $member_id=$request->input('member_id');
        $member=Member::find($member_id);
        return view('member.edit',compact('member'));
     }
    
     function update(Request $request) {
        $member=Member::find($request->input('member_id'));
        $member->name=$request->name;
        $member->email=$request->email;
        $member->phone_number=$request->phone_number;
        $member->address=$request->address;
        $member->save();
        $members=Member::all();
        return view('member.index',compact('members'));
     } 
    
     function destroy(Request $request) {
        $member=Member::find($request->input('member_id'));
        $member->delete();
        $members=Member::all();
        return view('member.index',compact('members'));
    
     }
}
