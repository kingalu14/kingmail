@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <style>
  .btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}

  
  </style>
@endSection

@section('scripts')
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/init-scripts/data-table/datatables-init.js')}}"></script>

 <script>
 jQuery(function($) {
    $(".edit_btn").click(function(e){
        e.preventDefault();
        var button =  $(this);
        var fname = button.data('fname');
        var lname = button.data('lname');
        var email = button.data('email');
        var contact_id = button.data('contact_id');
   
        $('#edit').on('shown.bs.modal', function (event) {
        var description = button.data('mydescription') 
        $(this).find('.modal-body #fname').val(fname);
        $(this).find('.modal-body #lname').val(lname);
        $(this).find('.modal-body #email').val(email);
        $(this).find('.modal-body #contact_id').val(contact_id);
        fname ="";
        lname ="";
        email ="";
        contact_id= "";
     
        })

    });
  
   $('#delete').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget) 
       var contact_id = button.data('contact_id') 
       var modal = $(this)
       modal.find('.modal-body #contact_id').val(contact_id);
       })

  })

 </script>
  @endSection
  @section('page_title')
      <ol class="breadcrumb text-right">
            <li class="">Dashboard</li>
            <li class="active">{{$bulk->name}}</li>
            <li class="active">Contacts</li>
      </ol>
  @endSection

@section('contents')
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card"> 
                            <div class="card-header">
                                <strong class="card-title">Cantacts</strong>                    
                                <button type="button" class="btn btn-success mb-1 btn-circle" data-toggle="modal" data-target="#mediumModal">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row"><div class="col-sm-12 col-md-6"> </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                                    <thead class="thead-dark">
                                      <tr role="row">
                                          <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 188px;">First Name</th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending" aria-sort="ascending" style="width: 315px;">Last Name</th>
                                          <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137px;">Email</th>
                                          <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 108px;">Status</th>
                                          <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 108px;">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>   
                                    @if($contacts->count() > 0)   
                                      @foreach($contacts as $contact)                                      
                                       <tr role="row" class="odd">
                                            <td class="">{{$contact->fname}}</td>
                                            <td class="sorting_1">{{$contact->lname}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->receive==1 ? 'active' : 'inactive'}}</td>
                                            <td> 
                                               <div class="btn-group" role="group">
                                                   <a href='#'> 
                                                   <button type="button"  
                                                     data-toggle="modal" data-target="#edit"
                                                     data-fname="{{$contact->fname}}" data-lname="{{$contact->lname}}" 
                                                     data-contact_id="{{$contact->id}}" data-email="{{$contact->email}}" 
                                                     class="btn btn-round btn-warning btn-sm edit_btn">
                                                     <i class="fa fa-pencil"></i> 
                                                     edit</button> </a>                                       
                                                   <a href='#'> 
                                                     <button type="button" data-contact_id="{{$contact->id}}" 
                                                     data-toggle="modal" data-target="#delete"
                                                     class="btn btn-round btn-danger btn-sm delete"><i class="fa fa-trash"></i> 
                                                     delete</button></a>
                                               </div>
                                            </td>
                                        </tr>
                                       @endforeach 
                                     @endif   
                                        </tbody>
                                </table>
                                </div>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div>
<!-- add new contact mode -->

<div class="modal  fade " id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger">    
        <h4 class="modal-title text-center text-light" id="myModalLabel">Delete Confirmation</h4>
      </div>
      {!!Form::open(['method'=>'POST','data-parsley-validate'=>"",'route' =>'contacts.delete'])!!}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="contact_id" id="contact_id">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-outline-danger">Yes, Delete</button>
	      </div>
          {!! Form::close() !!}
    </div>
  </div>
</div>

<!-- Modal -->

<div class="modal fade" id="edit">
         <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">							
     		        <div class="card-body">                   
                        {!!Form::open(['method'=>'PATCH','data-parsley-validate'=>"",'route' =>'contacts.update'])!!}
                           <div class="modal-body">
                              <input type="hidden" name="contact_id" id="contact_id">
                              <div class="form-group">								
                                <label for="fname" class=" form-control-label">First Name</label>
                                <input type="text" id="fname" name="fname" placeholder="Enter first name" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="iname" class=" form-control-label">Last Name</label>
                                  <input type="text"  id="lname" placeholder="Enter last name"  name="lname" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="email" class=" form-control-label">Email</label>
                                  <input type="email" id="email" name="email" placeholder="example@kingmail.com" class="form-control">
                              </div> 
                          </div>
                          <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                        {!! Form::close() !!}
                   </div>
                </div>
            </div>
         </div>
     </div>

<!-- Modal -->

<div class="modal fade" id="mediumModal">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">New Contact</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
							
							<div class="card-body">
     <div class="custom-tab">
             <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active show" id="custom-nav-home-tab" 
                           data-toggle="tab" href="#custom-nav-home" role="tab"
                           aria-controls="custom-nav-home" aria-selected="true">Contact Form</a>
                        <a class="nav-item nav-link" id="custom-nav-profile-tab"
                           data-toggle="tab" href="#custom-nav-profile" role="tab" 
                           aria-controls="custom-nav-profile" aria-selected="false">Import</a>
                 </div>
             </nav>
             <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                       <div class="tab-pane fade active show" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                        {!!Form::open(['method'=>'POST','data-parsley-validate'=>"",'role'=>'form','route' => 'contacts.store'])!!}                                 
                          <div class="form-group">	
                              <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                              <input type="hidden" id="bulk_id" name="bulk_id" value="{{$bulk->id}}"> 							
                              <label for="fname" class=" form-control-label">First Name</label>
                              <input type="text" id="fname" name="fname" placeholder="Enter first name" class="form-control">
                          </div>
                          <div class="form-group">                                                       
                              <label for="iname" class=" form-control-label">Last Name</label>
                              <input type="text"  id="lname" placeholder="Enter last name"  name="lname" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="email" class=" form-control-label">Email</label>
                              <input type="email" id="email" name="email" placeholder="example@kingmail.com" class="form-control">
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-success">Submit</button>
                              <button class="btn btn-primary" type="reset">Reset</button>
                          </div>
                         {{ Form::close() }}                           
                       </div>
                        <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                           <small>Import contacts from csv/excel</small>
                          {!!Form::open(['method'=>'POST','enctype'=>"multipart/form-data",'role'=>'form','route' => 'excel.import'])!!}  
                            <div class="form-group">
                                <input type="file" id="file" name="file">
                            </div>
                            <input type="hidden" id="bulk_id" name="bulk_id" value="{{$bulk->id}}"> 	
                            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                            <div class="form-group">
                                  <button type="submit"  class="btn btn-success">Save</button>                              
                            </div>
                          {{ Form::close() }}   
                   </div> 
              </div>
           </div>
        </div>
     </div>
  </div>
</div>
<!-- add new contact mode end -->

@endSection