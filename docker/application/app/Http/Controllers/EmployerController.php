<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployer;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = Employer::paginate(5);
        return view('admin.employers', ['employers' => $employers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createEmployer', [
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
        $validatedData = $request->validated();

        $employer = Employer::create([
            'first_name'    => $request->input('first_name'),
            'last_name'    => $request->input('last_name'),
            'email'    => $request->input('email'),
            'phone'    => $request->input('phone'),
            'company_id' => intval($request->input('company_id')),
        ]);

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
        return view('admin.editEmployer', [
//            'first_name'    => $employer->first_name,
//            'last_name'    => $employer->last_name,
//            'email'    => $employer->email,
//            'phone' => $employer->phone,
//            'company_id' => $employer->company_id,
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employer = Employer::findOrFail($id);
        $employer->delete();
        return redirect()->route('employers.index')->with('messageSuccess', 'Delete success!');
        //to do return with message and display on the screen
    }
}
