@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
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
  @endSection

  @section('page_title')
      <ol class="breadcrumb text-right">
            <li class="">Dashboard</li>
            <li class="">Contacts</li>
            <li class="active">Edit</li>
      </ol>
  @endSection

@section('contents')
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                  
                        <div class="card">
                           
                            <div class="card-header">
                                <strong class="card-title">Edit</strong>
                                <a class="btn btn-info float-right" href="{{ URL::previous() }}">Back <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                            <div class="card-body">
                                <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row"><div class="col-sm-12 col-md-6"> </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                               
                                </div>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>

@endSection