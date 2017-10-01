@extends('layouts.app')

@section('content')   

    <div class="row">
        <div class="col-xs-12 col-sm-9">

            <div class="well well-lg">
                <h1 align-center>{{ $project->name }}</h1>
                <p align-center class="lead">{{ $project->description }}</p>
            </div>

            <div class="row">
                {{--  @foreach( $project->projects as $project )  --}}
                    <div class="col-lg-4" style="min-height:220px;">
                        <h3>{{ $project->name }}</h3>
                        <p class="text-success" align-justify style="min-height:85px;">{{ $project->description }}</p>
                        <p><a class="btn btn-lg btn-block btn-primary" href="/projects/{{ $project->id }}" role="button">Ver Detalhes »</a></p>
                    </div>
                {{--  @endforeach  --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-3  blog-sidebar">
            <!-- project config  -->
            <div class="sidebar-module">
                <h4 align-center>Actions project</h4>
                <ol class="list-unstyled">
                    <li><a class="btn btn-primary btn-block btn-large" margin-bottom href="/projects">List my projects</a></li>                
                    <li><a class="btn btn-primary btn-block btn-large" margin-bottom href="/projects/create">Create new project</a></li>                
                    <li><a class="btn btn-primary btn-block btn-large" margin-bottom href="/projects/{{ $project->id }}/edit">Edit project</a></li>
                    <!-- Somente o usuário que criou o projeto pode apaga lo -->
                    <!-- Verificando se o mesmo id que criou o proj é o que está logado -->
                    @if( $project->user_id == Auth::user()->id )
                    <li><a class="btn btn-danger btn-block btn-large" href="#" data-toggle="modal" data-target="#deleteproject">Delete project</a></li>
                    @endif
                </ol>
            </div>

        </div>
    
    </div>    

    <!-- Delete Form -->
    <form action="{{ route( 'projects.destroy' , [ $project->id ] ) }}" id="deleteprojectForm" method="POST" style="display:none">
        <input type="hidden" name="_method" value="delete">
        {{ csrf_field() }}
    </form>
    <!-- Delete Form -->

    <!-- Modal -->
    <div class="modal fade" id="deleteproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete</h4>
            </div>
            <div class="modal-body text-danger">
                Are you sure you wish to delete this project ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="deleteproject()">Yes</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

@endsection    



