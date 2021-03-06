@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading"><h4 margin-none>Companies</h4></div>
    <div class="panel-body">
        <ul class="list-group">
        @foreach( $companies as $company ) 
            <li padding-none class="list-group-item">
                <a block padding href="{{ url("/companies/$company->id") }}" link-none>{{ $company->name }}
                </a>
            </li>
        @endforeach
        </ul>        
    </div>
</div>

<div class="jumbotron" style="background-color:#fff;">
    <h2>Vamos criar uma nova company?</h2>
    <a class="btn btn-primary btn-lg" margin-top href="/companies/create">Create new Company</a>
</div>

@endsection
