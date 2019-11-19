@extends('layouts.app')

@section('page_title')
      <ol class="breadcrumb text-right">
            <li class="">Dashboard</li>
            <li class="active">Templates</li>
            <li class="active">Edit</li>
            <li class="active">{{$template->name}}</li>
      </ol>
@endSection
@section('contents')
{!!Form::model($template,['method'=>'PATCH','enctype'=>'multipart/form-data','route'=>['templates.update',$template->id]])!!}
    @include('includes.template_form')
    <div class="form-group">
       <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:5px"> 
          <button type="submit" class="btn btn-success">Update</button>
      </div>
	</div>
{!! Form::close() !!}    
@endSection

@section('scripts')


 
@endSection