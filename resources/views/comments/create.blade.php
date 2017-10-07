@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-xs-12 col-sm-offset-1 col-sm-10">

            <h2 align-center>Comment Your Project</h2>

              <form action="{{ route('comments.store') }}" method="POST" padding style="background-color:#ffffff;">  
             
                {{ csrf_field() }}

                <input name="commentable" type="hidden" value="Project">
                <input name="commentable_id" type="hidden" value="{{ $project->id }}">

                <div class="form-group">
                    <label for="project-name">Nome <span class="required">*</span></label>
                    <input  placeholder="Enter Name project"
                            id="project-name" 
                            type="text"
                            required
                            name="name"
                            spellcheck="false"
                            class="form-control" >                        
                </div>

                <div class="form-group">
                    <label for="project-name">Proof of work done ( url / photos )</label>
                    <input  placeholder="Enter url or screenshot"
                            id="project-name" 
                            type="url"
                            name="url"
                            spellcheck="false"
                            class="form-control" >                        
                </div>

                <div class="form-group">
                    <label for="project-description">Decription <span class="required">*</span> </label>
                    <textarea  placeholder="Enter Description project" style="resize:vertical;"
                            id="project-description" 
                            type="text"
                            required
                            name="description"
                            spellcheck="false"
                            class="form-control autosize-target text-left"
                            rows="5" ></textarea>                   
                </div>

                <div class="form-group">
                    <input type="submit" value="Create" class="btn btn-primary btn-block btn-large" />
                    <a href="javascript:history.back()" class="btn-info btn btn-large btn-block">Back</a>
                </div>


            </form>
        </div>        

    </div>

@endsection