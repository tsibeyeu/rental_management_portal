<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Tenant;
use App\Models\RoomTenant;
use App\Models\Room;
use App\Models\RoomType;
use App\Mail\signUpMail;


class userController extends Controller
{
    
   

    public function showLogin(){
        return view('user.login');
    }

    public function Login( Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            
           

            return redirect()->route('user.dashboard')->with(['welcome'=>'welcome']) ;

        }
        else{
            return redirect()->back()->with(['error'=>'you are not registered!']);


        }

       
    }
    
    public function dashboard(){
        // To fill cards
        $rooms=Room::get();
        $tenant=Tenant::all();
        $roomtype=RoomType::all();
        $tenantNumber=count($tenant);
        $roomNumber=count($rooms);
        $roomTypeNumber=count($roomtype);
        $roomRented=Room::latest()->where('status',false)->get();
        $roomUnrented=Room::latest()->where('status',true)->get();
        $rentedNumber=count($roomRented);
        $unRentedNumber=count($roomUnrented);
        if($roomNumber){

            $percentage = (round(($rentedNumber / $roomNumber) * 100,2));
            $percentageUnRented = (round(($unRentedNumber / $roomNumber) * 100,2));
        }else{
            $percentage=0;
            $percentageUnRented=0;
        }

        // To fill Area chart
        $getFloor=$rooms->pluck('floor')->toArray();
        // $getrooms=$rooms->where("status",false);
        // return $getrooms;

        
        return view('user.dashboard',compact('roomNumber','percentageUnRented','percentage','tenantNumber','getFloor','roomTypeNumber'));
    }

    public function adminDashboard(){
       
        $users=User::all();
        $rooms=Room::get();
        $tenant=Tenant::all();
        $roomtype=RoomType::all();
        $roomTypeNumber=count($roomtype);
        $tenantNumber=count($tenant);
        $roomNumber=count($rooms);
        $userNumber=count($users);
        $roomRented=Room::latest()->where('status',false)->get();
        $roomUnrented=Room::latest()->where('status',true)->get();
        $rentedNumber=count($roomRented);
        $unRentedNumber=count($roomUnrented);
        if($roomNumber){

            $percentage = (round(($rentedNumber / $roomNumber) * 100,2));
            $percentageUnRented = (round(($unRentedNumber / $roomNumber) * 100,2));
        }else{
            $percentage=0;
            $percentageUnRented=0;
        }
        return  view('admin.dashboard',compact('roomNumber','percentageUnRented','roomTypeNumber','tenantNumber','percentage','userNumber'));
    }



    public function logout(){
        Auth::logout();
        return redirect("/");
        }




        function index()  {
            $users=User::all();
            
           
           return view('user.index',compact('users'));
            
        }

        function create()  {
           $roles=Role::all();
            return view('user.create',compact('roles'));  
        }



        function store(Request $request)  {
            $request->validate([
                'first_name'=>'required|required|string|max:28',
                'second_name'=>'required|required|string|max:28',
                'email'=>'required|email',
                'password'=>'required|min:8',
                'roles'=>'required',
            ]);
            $existingPhoneNumber=User::where('phone_number',$request->phone_number)->first();
            $existingemail=User::where('email',$request->email)->first();
            if(!($existingPhoneNumber &&  $existingemail)){
                $user=new User();
                $user->first_name=$request->first_name;
                $user->second_name=$request->second_name;
                $user->email=$request->email;
                $user->password=Hash::make($request->password);
                $user->phone_number=$request->phone_number;
                $user->save();
                // $user->syncRoles($request->roles);
                if ($request->has('roles')) {
                    $roles = Role::whereIn('id', $request->roles)->get();
                    $user->syncRoles($roles);
                    $recipientEmail=$request->email;
                    $recipientname=$request->first_name;
                    Mail::to($recipientEmail)->send(new signUpMail($recipientname));
                }
                return redirect()->route('admin.users.index')->with(['success'=> 'User created  successfully.']);     
        }
    }
        function show(User $user)  {
            $roles=Role::all();
            $permissions=Permission::all();
           return view('user.role-permission',compact('roles','user','permissions'));
            
        }
        function edit($user)  {
            $user=User::find($user);
            return view('user.update',compact('user'));
            
        }
        function update(Request $request)  {
            $user_id= $request->input('user_id');
            $user=User::find($user_id);
            $user->update([
            'first_name'=>$request->first_name,
            'second_name'=>$request->second_name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
        ]);
        return redirect()->route('admin.users.index')->with(['success'=> 'User Updated successfully.']);     
        }


        function destroy(User $user)  {
            if ($user->hasRole('admin')) {
                return redirect()->back();
            }
            $user->delete();
            return redirect()->back()->with(['success'=> 'User deleted successfully.']);
        }

        function assignRole(Request $request,User $user)  {
            if ($user->hasRole($request->role)) {
                return redirect()->back();
            }
            $user->assignRole($request->role);
            return redirect()->back();
            
            
        }
        function removeRole(User $user ,Role $role)  {
            if ($user->hasRole($role)) {
                $user->removeRole($role);
                return redirect()->back();
            }
            return redirect()->back();
            
        }
        function givePermission(Request $request ,User $user)  {
            if ($user->hasPermissionTo($request->permission)) {
                return redirect()->back();
            }
            $user->givePermissionTo($request->permission);
            return redirect()->back();
            
        }
        function revokePermission(User $user ,Permission $permission)  {
            if ($user->hasPermissionTo($permission)) {
                $user->revokePermissionTo($permission);
                return redirect()->back();
            }
            return redirect()->back();
            
        }

    
    
    

}
