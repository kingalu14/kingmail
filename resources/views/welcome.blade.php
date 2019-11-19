@extends('layouts.app')

@section('contents')
  <form action="">
  <textarea id="editor1">
  </textarea>
  </form>


@endSection

@section('scripts')
@include('ckfinder::setup')
<script src="{{asset('js/ckfinder/ckfinder.js')}}"></script>
<script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
    <style>
        .ck-editor__editable {
            min-height: 200px;
        }
    </style>
    <script src="https://cdn.ckeditor.com/4.9.2/standard-all/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
    <script>
		// Note: in this sample we use CKEditor with two extra plugins:
		// - uploadimage to support pasting and dragging images,
		// - image2 (instead of image) to provide images with captions.
		// Additionally, the CSS style for the editing area has been slightly modified to provide responsive images during editing.
		// All these modifications are not required by CKFinder, they just provide better user experience.
        var editor = CKEDITOR.replace( 'editor1' );
        CKFinder.setupCKEditor( editor );
    </script>
    <script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script>
@endSection