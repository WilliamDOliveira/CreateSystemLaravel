@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-xs-12 col-sm-offset-1 col-sm-10">

            <h2 align-center>Edit your project</h2>

            <form action="{{ route('projects.update' , [ $project->id ]) }}" method="POST" padding style="background-color:#ffffff;">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="put">
                
                <div class="form-group">
                    <label for="project-name">Nome <span class="required">*</span></label>
                    <input  placeholder="Enter Name project"
                            id="project-name" 
                            type="text"
                            required
                            name="name"
                            spellcheck="false"
                            class="form-control"
                            value="{{ $project->name }}" >                        
                </div>

                <div class="form-group">
                    <label for="project-name">Quantity of days<span class="required">*</span></label>
                    <input  placeholder="Enter Quantity of days"
                            id="project-name" 
                            type="number"
                            required
                            name="days"
                            spellcheck="false"
                            value="{{ $project->days }}"
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
                            rows="5" >{{ $project->description }}</textarea>                   
                </div>

                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary btn-block btn-large" />
                    <a href="javascript:history.back()" class="btn-info btn btn-large btn-block">Back</a>
                </div>


            </form>
        </div>        

    </div>

@endsection