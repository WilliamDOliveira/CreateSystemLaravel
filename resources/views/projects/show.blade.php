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

    <!-- Comentarios -->
        <div class="row">

            <div class="col-xs-12 col-sm-offset-1 col-sm-10">

                <h2 align-center>Comment Your Project</h2>

                <form action="{{ route('comments.store') }}" method="POST" padding style="background-color:#ffffff;">  
                
                    {{ csrf_field() }}

                    <input name="commentable" type="hidden" value="Project">
                    <input name="commentable_id" type="hidden" value="{{ $project->id }}">

                    <div class="form-group">
                        <label for="project-name">Comment <span class="required">*</span></label>
                        <textarea  placeholder="Enter Comment"
                                id="comment-body" 
                                type="text"
                                required
                                name="body"
                                rows="3"
                                spellcheck="false"
                                class="form-control" ></textarea>                      
                    </div>

                    <div class="form-group">
                        <label for="project-name">Proof of work done ( url / photos )</label>
                        <textarea  placeholder="Enter url or screenshot"
                                id="comment-url" 
                                type="url"
                                name="url"
                                rows="2"
                                spellcheck="false"
                                class="form-control" ></textarea>                                              
                    </div>                   

                    <div class="form-group">
                        <input type="submit" value="Create" class="btn btn-primary btn-block btn-large" />
                        <a href="javascript:history.back()" class="btn-info btn btn-large btn-block">Back</a>
                    </div>


                </form>
            </div>        

        </div>
    <!-- Comentarios -->

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



