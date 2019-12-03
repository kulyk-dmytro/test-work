@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('employers.index')}}">Employers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr />
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
        </div>
        <form class="form-horizontal" action="{{route('employers.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.formEmployer')
        </form>
    </div>

@endsection