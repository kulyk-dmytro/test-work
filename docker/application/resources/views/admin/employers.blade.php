@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employers</li>
                    </ol>
                </nav>
            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                    <div class="col-md-2 offset-md-6 text-center">
                        <a href="{{route('employers.create')}}" class="btn btn-outline-primary" role="button" aria-pressed="true">Add employer</a>
                    </div>
                @endif
            @endif

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
                        @if(\Illuminate\Support\Facades\Auth::check())
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            @endif
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employers as $employer)
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
                            @if(\Illuminate\Support\Facades\Auth::check())
                                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                    <td>
                                        <a class="btn btn-default" href="{{route('employers.edit', $employer)}}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form onsubmit="if(confirm('Удалить?')){ return true} else {return false}" action="{{route('employers.destroy', $employer)}}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p>{{ $employers->links() }}</p>
            </div>
        </div>
    </div>
@endsection
