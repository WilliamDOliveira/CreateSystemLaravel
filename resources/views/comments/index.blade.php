@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading"><h4 margin-none>Projects</h4></div>
    <div class="panel-body">
        <ul class="list-group">
        @foreach( $projects as $project ) 
              <li padding-none class="list-group-item"><a block padding href="{{ url("/projects/$project->id") }}" link-none>{{ $project->name }}</a></li>  
        @endforeach  
        </ul>        
    </div>
</div>

<div class="jumbotron" style="background-color:#fff;">
    <h2>Vamos criar uma novo Projeto ?</h2>
    <a class="btn btn-primary btn-lg" margin-top href="/projects/create">Create new Project</a>
</div>

@endsection
