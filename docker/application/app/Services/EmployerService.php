<?php
namespace App\Services;

use App\Employer;

class EmployerService
{
    public function storeEmployer($request)
    {
        $employer = Employer::create([
            'first_name'    => $request->input('first_name'),
            'last_name'    => $request->input('last_name'),
            'email'    => $request->input('email'),
            'phone'    => $request->input('phone'),
            'company_id' => intval($request->input('company_id')),
        ]);

        return $employer;
    }
    public function updateEmployer($request, $employer_id)
    {
        $employer = Employer::findOrFail($employer_id);
        $employerUpdated = $employer->update([
            'first_name'    => $request->input('first_name'),
            'last_name'    => $request->input('last_name'),
            'email'    => $request->input('email'),
            'phone'    => $request->input('phone'),
            'company_id' => intval($request->input('company_id')),
        ]);
        return $employerUpdated;
    }
    public function destroyEmployer($employer_id){
        $employer = Employer::findOrFail($employer_id);
        $employer->delete();
        return true;
    }
}