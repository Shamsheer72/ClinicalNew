<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Profile;

use DB;

class ProfilesController extends Controller
{
    public function profile($user)
    {
        $user = User::findorFail($user);

        return view('profiles.profile',[
            'user' => $user
        ]);
    }

    public function create(Request $request)
    {
        $roles = DB::table('roles')->get();

        // dd($request->session());


        // echo '<pre>' , var_dump($request->session()->get('profile')) , '</pre>';

        $profile = $request->session()->get('profile');

        $profiles = Profile::where('user_id', auth()->user()->id)->get();

        // echo '<pre>' , var_dump($profiles[0]->patientfirst) , '</pre>';

        return view('profiles.create',compact('profile', $profile,'roles',$roles,'profiles',$profiles));
    }

    public function store(Request $request)
    {
        // $profile = new Profile();

        $data = $this->validate($request, [
            'role' => 'required',
            'patientfirst'=>'required',
            'patientlast'=> 'required',
            'patientdate' => 'required',
            'addressinfo'=> 'required',
            'contactinfo'=> 'required',
            'companyinfo'=> 'required',
            'jobtitleinfo'=> 'required',
            'nameofcharity' => 'required',
            'bankname' => 'required',
            'account_number' => 'required',
            'credit_card_info' => 'required',
            'ach_info' => 'required',
        ]);

        if(empty($request->session()->get('profile'))){
            $profile = new Profile();
            $profile->fill($data);
            $request->session()->put('profile', $profile);
        }else{
            $profile = $request->session()->get('profile');
            $profile->fill($data);
            $request->session()->put('profile', $profile);
        }

        // $profile->saveProfile($data);

        // return redirect('/create/profile')->with('success', 'New Profile details Added');
        return redirect('/profiles/create-step2');
    }

    public function createStep2(Request $request)
    {
        $profile = $request->session()->get('profile');
        return view('profiles.step2',compact('profile',$profile));
    }

    public function storestep(Request $request)
    {
        $profile = $request->session()->get('profile');
        $profile->user_id = auth()->user()->id;
        // echo '<pre>' , var_dump($request->session()->get('profile')->patientlast) , '</pre>';
        // $profile->saveProfile($data);
        $profile->save();
        return redirect('/profile/thanks');
    }


    public function index()
    {
        $profiles = Profile::where('user_id', auth()->user()->id)->get();

        return view('profiles.index',compact('profiles'));
    }

    public function edit($id)
    {
        $profile = Profile::where('user_id', auth()->user()->id)
                           ->where('id', $id)
                           ->first();

        return view('profiles.edit', compact('profile', 'id'));
    }

    public function update(Request $request, $id)
    {
        $profile = new Profile();

        $data = $this->validate($request, [
            'role' => 'required',
            'patientfirst'=>'required',
            'patientlast'=> 'required',
            'patientdate' => 'required',
            'addressinfo'=> 'required',
            'contactinfo'=> 'required | numeric',
            'companyinfo'=> 'required',
            'jobtitleinfo'=> 'required',
            'nameofcharity' => 'required',
            'bankname' => 'required',
            'account_number' => 'required',
            'credit_card_info' => 'required',
            'ach_info' => 'required',
        ]);

        $data['id'] = $id;

        $profile->updateProfile($data);

        return redirect('/home')->with('success', 'Profile Details has been updated!!');
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);

        $profile->delete();

        return redirect('/home')->with('success', 'Profile Details has been deleted!!');
    }

    public function thanks()
    {
        return view('profiles.thanks');
    }
}
