<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\UpdateCompany;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompany;
use Illuminate\Pagination\Paginator;

class CompanyController extends Controller
{
    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$currentPage - which pagination page to display, by default the first
        //$perPage - how many default items to display per page

//        $currentPage = $request->input('current_page' , 1);
        $perPage = $request->input('per_page', 5);

//        Paginator::currentPageResolver(function () use ($currentPage) {
//            return $currentPage;
//        });

        $companies = Company::paginate($perPage);
        return view('admin.companies.companies', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.createCompany', [
            'name'    => [],
            'email'    => [],
            'logo'    => [],
            'website'    => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        $request->validated();
        $this->companyService->storeCompany($request);
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.editCompany', [
            'name'    => $company->name,
            'email'    => $company->email,
            'logo'    => $company->logo,
            'website' => $company->website,
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompany $request, $id)
    {
        $request->validated();
        $this->companyService->updateCompany($request, $id);
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->companyService->destroyCompany($id);
        return redirect()->route('companies.index')->with('messageSuccess', 'Delete success!');
        //to do return with message and display on the screen
    }
}
