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
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>

 <script>
 jQuery(function($) {
    $(".edit_btn").click(function(e){
        e.preventDefault();
        var button =  $(this);
        var name = button.data('name');
        var bulk_id = button.data('bulk_id');
   
        $('#edit').on('shown.bs.modal', function (event) {
        var description = button.data('mydescription') 
        $(this).find('.modal-body #name').val(name);
        $(this).find('.modal-body #bulk_id').val(bulk_id);
        name ="";
        bulk_id= "";
     
        })

    });
  
   $('#delete').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget) 
       var bulk_id = button.data('bulk_id') 
       var modal = $(this)
       modal.find('.modal-body #bulk_id').val(bulk_id);
       })

  })

 </script>
  @endSection
  @section('page_title')
      <ol class="breadcrumb text-right">
            <li class="">Dashboard</li>
            <li class="active">Contacts Group</li>
      </ol>
  @endSection

@section('contents')
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
              
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Cantacts Group</strong>                    
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
                                          <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 188px;">Name</th>
                                          <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 108px;">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>   
                                    @if($bulks->count() > 0)   
                                    @foreach($bulks as $bulk)                                      
                                       <tr role="row" class="odd">
                                            <td class="">{{$bulk->name}}</td> 
                                            <td> 
                                               <div class="btn-group" role="group">
                                               <a href="{{route('contacts.bulk',$bulk->id)}}"> 
                                                   <button type="button" 
                                                     class="btn btn-round btn-info btn-sm">
                                                     <i class="fa fa-eye"></i> 
                                                     View</button> </a>   
                                                   <a href='#'> 
                                                   <button type="button" 
                                                     data-toggle="modal" data-target="#edit"
                                                     data-name="{{$bulk->name}}" 
                                                     data-bulk_id="{{$bulk->id}}" 
                                                     class="btn btn-round btn-warning btn-sm edit_btn">
                                                     <i class="fa fa-pencil"></i> 
                                                     edit</button> </a>                                       
                                                   <a href='#'> 
                                                     <button type="button" data-bulk_id="{{$bulk->id}}" 
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
      {!!Form::open(['method'=>'POST','data-parsley-validate'=>"",'route' =>'bulk.delete'])!!}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="bulk_id" id="bulk_id">
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
                    <h5 class="modal-title">Edit Contacts Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">							
     		        <div class="card-body">                   
                        {!!Form::open(['method'=>'PATCH','data-parsley-validate'=>"",'route' =>'bulk.update'])!!}
                           <div class="modal-body">
                                 <input type="hidden" name="bulk_id" id="bulk_id">
                                 <div class="form-group">								
                                    <label for="name" class=" form-control-label">Name</label>
                                    <input type="text" id="name" name="name" placeholder="Enter group name" class="form-control">
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
               <h5 class="modal-title" id="mediumModalLabel">New Contacts Group</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
              </button>
           </div>
           <div class="modal-body">
						  <div class="card-body">
                {!!Form::open(['method'=>'POST','data-parsley-validate'=>"",'role'=>'form','route' => 'bulk.store'])!!}                                 
                   <div class="form-group">								
                        <label for="name" class=" form-control-label">group Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter Group Name" class="form-control">
                    </div>
                    <input type="hidden" name="user_id" id="user_id" value={{Auth::user()->id}}>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button class="btn btn-primary" type="reset">Reset</button>
                    </div>
                {{ Form::close() }}         
              </div>
            </div>
       </div>
</div>
<!-- add new contact mode end -->

@endSection