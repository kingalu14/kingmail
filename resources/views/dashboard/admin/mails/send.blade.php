@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="{{asset('vendors/chosen/chosen.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/chosen/chosen.min.css')}}">

  <style>
  
  .mail_content {
    background: none repeat scroll 0 0 #FFFFFF;
    border-radius: 4px;
    margin-top: 20px;
    min-height: 500px;
    padding: 10px 11px;
    width: 100%
}
.list-btn-mail {
    margin-bottom: 15px
}
.list-btn-mail.active {
    border-bottom: 1px solid #39B3D7;
    padding: 0 0 14px
}
.list-btn-mail>i {
    float: left;
    font-size: 18px;
    font-style: normal;
    width: 33px
}
.list-btn-mail>.cn {
    background: none repeat scroll 0 0 #39B3D7;
    border-radius: 12px;
    color: #FFFFFF;
    float: right;
    font-style: normal;
    padding: 0 5px
}
.button-mail {
    margin: 0 0 15px !important;
    text-align: left;
    width: 100%
}
button,
.buttons,
.btn,
.modal-footer .btn+.btn {
    margin-bottom: 5px;
    margin-right: 5px
}
.btn-group-vertical .btn,
.btn-group .btn {
    margin-bottom: 0;
    margin-right: 0
}
.mail_list_column {
    border-left: 1px solid #DBDBDB
}
.mail_view {
    border-left: 1px solid #DBDBDB
}
.mail_list {
    width: 100%;
    border-bottom: 1px solid #DBDBDB;
    margin-bottom: 2px;
    display: inline-block
}
.mail_list .left {
    width: 5%;
    float: left;
    margin-right: 3%
}
.mail_list .right {
    width: 90%;
    float: left
}
.mail_list h3 {
    font-size: 15px;
    font-weight: bold;
    margin: 0px 0 6px
}
.mail_list h3 small {
    float: right;
    color: #ADABAB;
    font-size: 11px;
    line-height: 20px
}
.mail_list .badge {
    padding: 3px 6px;
    font-size: 8px;
    background: #BAB7B7
}
@media (max-width: 767px) {
    .mail_list {
        margin-bottom: 5px;
        display: inline-block
    }
}
.mail_heading h4 {
    font-size: 18px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-top: 20px
}
.attachment {
    margin-top: 30px
}
.attachment ul {
    width: 100%;
    list-style: none;
    padding-left: 0;
    display: inline-block;
    margin-bottom: 30px
}
.attachment ul li {
    float: left;
    width: 150px;
    margin-right: 10px;
    margin-bottom: 10px
}
.attachment ul li img {
    height: 150px;
    border: 1px solid #ddd;
    padding: 5px;
    margin-bottom: 10px
}
.attachment ul li span {
    float: right
}
.attachment .file-name {
    float: left
}
.attachment .links {
    width: 100%;
    display: inline-block
}
.compose {
    padding: 0;
    position: fixed;
    bottom: 0;
    right: 0;
    background: #fff;
    border: 1px solid #D9DEE4;
    border-right: 0;
    border-bottom: 0;
    border-top-left-radius: 5px;
    z-index: 9999;
    display: none
}
.compose .compose-header {
    padding: 5px;
    background: #169F85;
    color: #fff;
    border-top-left-radius: 5px
}
.compose .compose-header .close {
    text-shadow: 0 1px 0 #ffffff;
    line-height: .8
}
.compose .compose-body .editor.btn-toolbar {
    margin: 0
}
.compose .compose-body .editor-wrapper {
    height: 100%;
    min-height: 50px;
    max-height: 180px;
    border-radius: 0;
    border-left: none;
    border-right: none;
    overflow: auto
}
.compose .compose-footer {
    padding: 10px
}
.editor.btn-toolbar {
    zoom: 1;
    background: #F7F7F7;
    margin: 5px 2px;
    padding: 3px 0;
    border: 1px solid #EFEFEF
}
.input-group {
    margin-bottom: 10px
}
.ln_solid {
    border-top: 1px solid #e5e5e5;
    color: #ffffff;
    background-color: #ffffff;
    height: 1px;
    margin: 20px 0
}
  
  </style>
@endSection

@section('scripts')
     <script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
     <script src="{{asset('assets/js/main.js')}}"></script>
     <script src="{{asset('vendors/chosen/chosen.jquery.min.js')}}"></script>
 <script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

  @endSection

  @section('page_title')
      <ol class="breadcrumb text-right">
            <li class="">Dashboard</li>
            <li class="">Mail</li>
            <li class="active">Compose</li>
      </ol>
  @endSection

@section('contents')
<div class="content mt-3">




<div class="row">
    <!-- /CONTANCT LIST -->

    <!-- /CONTANCT LIST -->

    <!-- CONTENT MAIL -->
      <div class="col-sm-12 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            <div class="col-md-8">
                    
                            </div>
                            <div class="col-md-4 text-right">
                              <p class="date"> 8:02 PM 12 FEB 2014</p>
                            </div>
                            <div class="col-md-12">
                            <div class="card-body card-block">
        
                   {!!Form::open(['method'=>'POST','data-parsley-validate'=>"",'class'=>'form-horizontal','role'=>'form','route'=>'mails.send'])!!}          
                     <div class="row form-group">
                         <div class="col col-md-2"><label for="text-input" class=" form-control-label">Subject</label></div>
                         <div class="col-12 col-md-10"><input type="text" id="subject" name="subject" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                     </div>


                     <div class="row form-group">
                         <div class="col col-md-2"><label for="text-input" class=" form-control-label">From</label></div>
                         <div class="col-12 col-md-10"><input type="text" id="from" name="from" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                     </div>

                     <div class="row form-group">
                         <div class="col col-md-2"><label for="template_id" class=" form-control-label">Template</label></div>
                         <div class="col-12 col-md-10">
                            {!! Form::select('template_id',$templates,null,array('class'=>'form-control ')) !!}    
                         </div>                     
                     </div>              
                     <div class="row form-group">
                         <div class="col col-md-2"><label for="text-input" class=" form-control-label">Group Contacts</label></div>
                         <div class="col-12 col-md-10">
                         {!! Form::select('bulk_id[]',$bulks,null,array('multiple' =>'multiple','class'=>'form-control standardSelect')) !!}
        
                        <div class="chosen-container chosen-container-multi" title="" style="width: 100%;"><ul class="chosen-choices">
                        </div>
                   
                         </div>
                    </div>                     
                    <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label"></label></div>
                            <div class="col-12 col-md-10">
                            <button type="submit" class="btn btn-success">Send</button>
                            </div>                     
                    </div>
             {!! Form::close() !!}
           </div>
        </div>
      </div>
    </div>
 </div>
   <!-- /CONTENT MAIL -->
</div>
             




</div>

@endSection