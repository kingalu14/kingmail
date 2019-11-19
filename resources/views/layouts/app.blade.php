<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mailing Campain System</title>
    <meta name="description" content="Marketing Mailing  Campain System ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    
    <link href="{{{asset('css/app.css')}}}" rel="stylesheet">
    <link href="{{{asset('vendors/font-awesome/css/font-awesome.min.css')}}}" rel="stylesheet">
    <link href="{{{asset('vendors/themify-icons/css/themify-icons.css')}}}" rel="stylesheet">
    <link href="{{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}}" rel="stylesheet">
    <link href="{{{asset('vendors/selectFX/css/cs-skin-elastic.css')}}}" rel="stylesheet">
    <link href="{{{asset('assets/css/style.css')}}}" rel="stylesheet">
    <script src="{{asset('vendors/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('vendors/tinymce/tinymce.min.js')}}"></script>
     @yield("styles")
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <script src="{{asset('vendors/tinymce/tinymce.min.js')}}"></script>


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

              
                <a class="navbar-brand" href="/">
                    <div class="login-logo">
                        <h1>KM</h1>  
                        <small>King Mail</small>
                    </div>
                </a>
                <a class="navbar-brand hidden" href="./">
                      <div class="login-logo ml-0" >
                         <h5>KM</h5>  
                         <h6 style="font-size:0.4em">King Mail</h6>
                      </div>
                </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
               @include('includes.menu')
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{asset('images/admin.png')}}" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{route('profile')}}"><i class="fa fa-user"></i> My Profile</a> 
                            <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-9">
                <div class="page-header float-left">
                    <div class="page-title">
                        @yield('page_title')
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="page-header float-right">
                    <div class="back mt-2 pd-0" >
                        <a class="btn btn-info float-right" href="{{ URL::previous() }}">Back <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            @include('flash::message')
            @include('errors.list')
            @yield('contents')
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
   
    <script src="{{asset('vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/widgets.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
 
    
   
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>


<script>
   var editor_config = {
        path_absolute : "/",
        selector: "textarea.textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern codesample",
            "fullpage toc imagetools help"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
        //external_plugins: { "nanospell": "vendors/tinymce/plugins/nanospell/plugin.js" },
        //nanospell_server:"php",
        browser_spellcheck: true,
        relative_urls: false,
        remove_script_host: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinymce.activeEditor.windowManager.open({
                file: '<?= route('elfinder.tinymce4') ?>',// use an absolute path!
                title: 'File manager',
                width: 900,
                height: 450,
                resizable: 'yes'
            }, {
                setUrl: function (url) {
                    win.document.getElementById(field_name).value = url;
                }
            });
        }
    };

    tinymce.init(editor_config);
    {!! \File::get(base_path('vendor/barryvdh/laravel-elfinder/resources/assets/js/standalonepopup.min.js')) !!}
</script>
    @yield("scripts")


</body>

</html>
