@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row">{{$employer->id}}</th>
                            <td>{{$employer->first_name}}</td>
                            <td>{{$employer->last_name}}</td>
                            <td>{{$employer->email}}</td>
                            <td>{{$employer->phone}}</td>
                            @if($employer->company_id != null)
                                <td>{{$employer->company->name}}</td>
                            @else
                                <td>No company</td>
                            @endif
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
