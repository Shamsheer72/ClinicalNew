<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = ['user_id', 'role','role_id','patientfirst', 'patientlast','patientdate','path','file_name','addressinfo','contactinfo',
                           'companyinfo','jobtitleinfo' , 'nameofcharity' , 'bankname' , 'account_number','credit_card_info','ach_info'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function saveProfile($data)
    // {
    //         $this->user_id = auth()->user()->id;
    //         $this->role = $data['role'];
    //         $this->patientfirst = $data['patientfirst'];
    //         $this->patientlast = $data['patientlast'];
    //         $this->patientdate = $data['patientdate'];
    //         $this->addressinfo = $data['addressinfo'];
    //         $this->contactinfo = $data['contactinfo'];
    //         $this->companyinfo = $data['companyinfo'];
    //         $this->jobtitleinfo = $data['jobtitleinfo'];
    //         $this->jobtitleinfo = $data['jobtitleinfo'];
    //         $this->jobtitleinfo = $data['jobtitleinfo'];
    //         $this->jobtitleinfo = $data['jobtitleinfo'];
    //         $this->save();
    //         return 1;
    // }

    // public function updateProfile($data)
    // {
    //         $profile = $this->find($data['id']);
    //         $profile->user_id = auth()->user()->id;
    //         $profile->role = $data['role'];
    //         $profile->patientfirst = $data['patientfirst'];
    //         $profile->patientlast = $data['patientlast'];
    //         $profile->patientdate = $data['patientdate'];
    //         $profile->addressinfo = $data['addressinfo'];
    //         $profile->contactinfo = $data['contactinfo'];
    //         $profile->companyinfo = $data['companyinfo'];
    //         $profile->jobtitleinfo = $data['jobtitleinfo'];
    //         $this->jobtitleinfo = $data['jobtitleinfo'];
    //         $this->jobtitleinfo = $data['jobtitleinfo'];
    //         $this->jobtitleinfo = $data['jobtitleinfo'];
    //         $profile->save();
    //         return 1;
    // }
}
