<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employer;
use App\Http\Requests\UpdateEmployer;
use App\Services\EmployerService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployer;
use Illuminate\Pagination\Paginator;

class EmployerController extends Controller
{
    private $employerService;

    public function __construct(EmployerService $employerService)
    {
        $this->employerService = $employerService;
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

        $employers = Employer::paginate($perPage);
        return view('admin.employers.employers', ['employers' => $employers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employers.createEmployer', [
            'first_name'    => [],
            'last_name'    => [],
            'email'    => [],
            'phone'    => [],
            'companies' => Company::get(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployer $request)
    {
        $request->validated();
        $this->employerService->storeEmployer($request);
        return redirect()->route('employers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employer = Employer::findOrFail($id);
        return view('admin.employer', ['employer' => $employer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employer = Employer::with('company')->findOrFail($id);
        return view('admin.employers.editEmployer', [
            'first_name'    => $employer->first_name,
            'last_name'    => $employer->last_name,
            'email'    => $employer->email,
            'phone' => $employer->phone,
            'company_id' => $employer->company_id,
            'companies' => Company::get(),
            'employer' => $employer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployer $request, $id)
    {
        $request->validated();
        $this->employerService->updateEmployer($request, $id);
        return redirect()->route('employers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employerService->destroyEmployer($id);
        return redirect()->route('employers.index')->with('messageSuccess', 'Delete success!');
        //to do return with message and display on the screen
    }
}
