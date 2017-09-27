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
            <!-- Company config  -->
            <div class="sidebar-module">
                <h4 align-center>Actions Company</h4>
                <ol class="list-unstyled">
                    <li><a class="btn btn-primary btn-block btn-large" margin-bottom href="/companies">List my Companies</a></li>                
                    <li><a class="btn btn-primary btn-block btn-large" margin-bottom href="/companies/create">Create new Company</a></li>                
                    <li><a class="btn btn-primary btn-block btn-large" margin-bottom href="/companies/{{ $company->id }}/edit">Edit Company</a></li>
                    <li><a class="btn btn-danger btn-block btn-large" href="#" data-toggle="modal" data-target="#deleteCompany">Delete Company</a></li>
                </ol>
            </div>
            <!-- Project config  -->
            <div class="sidebar-module">
                <h4 align-center>Actions Project</h4>
                <ol class="list-unstyled">
                    <li><a class="btn btn-primary btn-block btn-large" margin-bottom href="/projects/create">Create new Project</a></li>
                </ol>
            </div>
        </div>
    
    </div>    

    <!-- Delete Form -->
    <form action="{{ route( 'companies.destroy' , [ $company->id ] ) }}" id="deleteCompanyForm" method="POST" style="display:none">
        <input type="hidden" name="_method" value="delete">
        {{ csrf_field() }}
    </form>
    <!-- Delete Form -->

    <!-- Modal -->
    <div class="modal fade" id="deleteCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete</h4>
            </div>
            <div class="modal-body text-danger">
                Are you sure you wish to delete this Company ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="deleteCompany()">Yes</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

@endsection    



