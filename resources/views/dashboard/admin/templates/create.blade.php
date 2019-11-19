@extends('layouts.app')

@section('page_title')
      <ol class="breadcrumb text-right">
            <li class="">Dashboard</li>
            <li class="active">Templates</li>
            <li class="active">Create</li>
      </ol>
@endSection
@section('contents')
{!!Form::open(['method'=>'POST','data-parsley-validate'=>"",'role'=>'form','route' => 'templates.store'])!!} 
   @include('includes.template_form')
    <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:5px"> 
            <button type="submit" class="btn btn-success">Save</button>
            <button class="btn btn-primary" type="reset">Reset</button>
        </div>
	</div>
  {!! Form::close() !!}   
@endSection

@section('scripts')

  
@endSection