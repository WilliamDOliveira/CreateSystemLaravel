@extends('layouts.app')

@section('content')   

    <div class="row">
        <div class="col-xs-12 col-sm-9">

            <div class="jumbotron">
                <h1 align-center>{{ $company->name }}</h1>
                <p align-center class="lead">{{ $company->description }}</p>
            </div>

            <div class="row">
                @foreach( $company->projects as $project )
                    <div class="col-lg-4" style="min-height:220px;">
                        <h3>{{ $project->name }}</h3>
                        <p class="text-success" align-justify style="min-height:85px;">{{ $project->description }}</p>
                        <p><a class="btn btn-lg btn-block btn-primary" href="/projects/{{ $project->id }}" role="button">Ver Detalhes »</a></p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-3  blog-sidebar">
            <div class="sidebar-module">
                <h4>Actions</h4>
                <ol class="list-unstyled">
                    <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
                    <li><a href="#">Delete</a></li>
                    <li><a href="#">Add new Member</a></li>
                </ol>
            </div>
        </div>
    
    </div>    

@endsection    