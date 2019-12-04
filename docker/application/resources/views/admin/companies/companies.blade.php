@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Companies</li>
                    </ol>
                </nav>
            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                    <div class="col-md-2 offset-md-6 text-center">
                        <a href="{{route('companies.create')}}" class="btn btn-outline-primary" role="button" aria-pressed="true">Add company</a>
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Website</th>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            @endif
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <th scope="row">{{$company->id}}</th>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td><img src="{{ asset('storage/' . $company->logo) }}" alt="img" class="img-thumbnail rounded-circle" width="200"></td>
                            <td>{{$company->website}}</td>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                    <td>
                                        <a class="btn btn-default" href="{{route('companies.edit', $company)}}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form onsubmit="if(confirm('Удалить?')){ return true} else {return false}" action="{{route('companies.destroy', $company)}}" method="post">
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
                <p>{{ $companies->links() }}</p>
            </div>
        </div>
    </div>
@endsection
