@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-xs-12 col-sm-offset-1 col-sm-10">

            <h2 align-center>Edit your Company</h2>

            <form action="{{ route('companies.update' , [ $company->id ]) }}" method="POST" padding style="background-color:#ffffff;">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="put">
                
                <div class="form-group">
                    <label for="company-name">Nome <span class="required">*</span></label>
                    <input  placeholder="Enter Name Company"
                            id="company-name" 
                            type="text"
                            required
                            name="name"
                            spellcheck="false"
                            class="form-control"
                            value="{{ $company->name }}" >                        
                </div>

                <div class="form-group">
                    <label for="company-description">Decription <span class="required">*</span> </label>
                    <textarea  placeholder="Enter Description Company" style="resize:vertical;"
                            id="company-description" 
                            type="text"
                            required
                            name="description"
                            spellcheck="false"
                            class="form-control autosize-target text-left"
                            rows="5" >{{ $company->description }}</textarea>                   
                </div>

                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary btn-block btn-large" />
                    <a href="javascript:history.back()" class="btn-info btn btn-large btn-block">Back</a>
                </div>


            </form>
        </div>        

    </div>

@endsection