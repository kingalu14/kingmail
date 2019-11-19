    <div class="form-group">                                
        {!!Form::label('name','Template Name',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12',))!!}
        <div class="col-md-12 col-sm-12 col-xs-12"> 
        {!!Form::text('name',null,array('id'=>"group_id",'class'=>'form-control col-md-12 col-xs-12','required'=>"required"))!!}
        </div>
    </div>
    <div class="form-group">   
        {!!Form::label('contents','Contents',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12',))!!}                             
        <div class="col-md-12 col-sm-12 col-xs-12"> 
        {!!Form::textarea('contents',null,array('id'=>"editor1",'class'=>'form-control textarea col-md-7 col-xs-12'))!!}                          
        </div>
    </div>

