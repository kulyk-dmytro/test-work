<?php
namespace App\Services;

use App\Company;

class CompanyService
{
    public function storeCompany($request)
    {
        $company = Company::create([
            'name'    => $request->input('name'),
            'email'    => $request->input('email'),
            'logo'    => $request->input('logo'),
            'website' => $request->input('website'),
        ]);

        return $company;
    }
    public function updateCompany($request, $company_id)
    {
        $company = Company::findOrFail($company_id);
        $companyUpdated = $company->update([
            'name'    => $request->input('name'),
            'email'    => $request->input('email'),
            'logo'    => $request->input('logo'),
            'website' => $request->input('website'),
        ]);
        return $companyUpdated;
    }
    public function destroyCompany($company_id){
        $company = Company::findOrFail($company_id);
        $company->delete();
        return true;
    }
}