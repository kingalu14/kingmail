@if(Session::has('errors'))
    <ul class="alert alert-danger" style="list-style: none;">
        @foreach($errors->all() as $error)
            <span class="sr-only">Error:</span>
            <li><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> {{$error}}</li>
        @endforeach
    </ul>
@endif

