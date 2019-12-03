@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="employers">Employers</a></li>
                    <li class="breadcrumb-item"><a href="companies">Companies</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="row">

                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Hello <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}</strong> !
                    <p>If you are an autorezirovil and you are an administrator, you can create, edit and delete companies and employers.</p>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
