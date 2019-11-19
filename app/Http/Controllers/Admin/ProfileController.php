<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Profiles\ProfileRepository;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;        

class ProfileController extends Controller
{
    private $profile;
    public function __construct(ProfileRepository $profile){
        $this->profile = $profile;
    }

    public function index(){
     
          $profile=$this->profile->getProfileId(Auth::user()->id);
          return view('dashboard.admin.profiles.index',['profile'=>$profile]);
       
    }

    public function edit($id)
    {
        //$users=User::all();
        $user = User::where("id", $id)->first();
        return view('dashboard.admin.profiles.edit', (['user' => $user]));
    }
    public function updatePassword(Request $request)
    {
        $user = User::find($request->user_id);
        if (isset($request->password)) {
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);
            if (Hash::check($request->old_password, $user->password)) {

                $user->password = Hash::make($request->password);
                if ($user->update()) {
                    flash('Your Password updated successfull')->success();
                    return redirect()->route('dashboard.admin.profiles.index');
                } else {
                    flash('Your Password  not updated')->error();
                    return redirect()->back();
                }
            } else {
                flash( 'ERROR !!  Your Old Password does not much with one present in our record')->error();
                return redirect()->back();
            }
        }
    }  


}
