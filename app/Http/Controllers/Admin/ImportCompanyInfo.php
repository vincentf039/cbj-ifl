<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Company;
use App\Events\CompanyRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jrean\UserVerification\Facades\UserVerification;

class ImportCompanyInfo extends Controller
{
    protected function guard()
    {
        return Auth::guard('company');
    }
    public function import()
    {
        $json = Storage::disk('files')->get('companiesInfo.json');
        $jsonObjects = json_decode($json);

        foreach ($jsonObjects as $data) {
            $company = new Company();
            $company->name = $data->{'Company Name'};
            $company->email = $data->{'Company Email'};
            $company->is_active = 0;
            $company->verified = 0;
            $company->save();

            $company->slug = Str::slug($company->name, '-') . '-' . $company->id;
            $company->update();

            // event(new Registered($company));
            // event(new CompanyRegistered($company));
            // $this->guard()->login($company);
            // UserVerification::generate($company);
            // UserVerification::send($company, 'Company Verification', config('mail.recieve_to.address'), config('mail.recieve_to.name'));
        }

        return 'Data imported successfully!';
    }
}