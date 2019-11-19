@extends('layouts.app')
@section('page_title')
      <ol class="breadcrumb text-right">
            <li class="">Dashboard</li>
            <li class="active">Profile</li>
            <li class="active">Edit</li>
      </ol>
  @endSection
@section('contents')
<div >
            <div >
                  
                  
          
                  </div>
                  <div>
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                           <div id="crop-avatar">  
                              <!-- Current avatar -->
                              <img class="img-responsive avatar-view" src="{{asset("images/picture.png")}}" width="200" height="300" alt="Avatar" title="Change the avatar">
                              </div>
                              <h4 class="">{{$user->fname}} {{$user->lname}}</h4>
                              <ul class="list-unstyled user_data">
                                <li><i class="fa fa-envelope user-profile-icon"></i> {{$user->email}}</li>
                              </ul>
                           </div>
                    </div> 
                    <div class="col-md-9 col-sm-9 col-xs-12"> 
                        
                                    <!------------------------personal informations----------------->
                                    <div class='col-lg12 col-sm-12 col-xs-12 col-md-12'>
                                        <div>
                                        
                                            <!--------------end title----------------->
                                            <div>
                                            <br>
                                              {!!Form::model($user,['method'=>'PATCH','data-parsley-validate'=>"",'class'=>'form-horizontal form-label-left','role'=>'form','enctype'=>'multipart/form-data','route' => 'profile.update'])!!}
                                                  <div class="form-group">                                
                                                    {!!Form::label('name','Name *',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12','placeholder'=>"" ))!!}
                                                   <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                    {!!Form::text('name',null,array('id'=>"first-name",'class'=>'form-control col-md-7 col-xs-12','required'=>"required",'placeholder'=>"",'disabled' => 'disabled'))!!}
                                                    </div>
                                                     {!!Form::hidden('user_id',$user->id)!!}
                                                   </div>

                                                    <div class="form-group">
                                                        {!!Form::label('email','Email address *',array('class'=>'control-label col-md-3 col-sm-3 col-xs-12','placeholder'=>"" ))!!}
                                                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                                                        {!!Form::email('email',null,array('id'=>"email",'class'=>'form-control col-md-7 col-xs-12','required'=>"required",'placeholder'=>"Enter email"))!!}
                                                        </div> 
                                                    </div>

                                                    <br>                  
                                                    <div class='clearfix'></div>                                       
                                                  
                                                <!--------------login informaition----------------->
                                            
                                                <div class='clearfix'></div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </div> 
                                             {!! Form::close() !!}
                                             

                                            {!!Form::model($user,['method'=>'PATCH','data-parsley-validate'=>"",'class'=>'form-horizontal form-label-left','role'=>'form','enctype'=>'multipart/form-data','route' => 'profile.updatePassword'])!!}
                                                 <div class="form-group">
                                                    <h2 class='text-left'>Password Reset</h2>
                                        
                                                    @if(Auth::user()->id == $user->id)
                                                      <label  for="old_password" class="control-label col-md-3 col-sm-3 col-xs-12">Old Password</label>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input type="password" class="form-control" name="old_password" placeholder="Old Password" required> 
                                                      </div>
                                                    @endif  
                                                  </div>                                     
                                                  <div class="form-group" >
                                                      <label  for="password" class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                         <input type="password" class="form-control" name="password" placeholder="New Password" required>
                                                       </div>
                                                         {!!Form::hidden('user_id',$user->id)!!}
                                                  </div>
                                                  <div class="form-group">
                                                      <label  for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm New Password</label>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="password" class="form-control" name="password_confirmation"  placeholder="New Password" required>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                      </div>
                                                  </div> 
                                            {!! Form::close() !!}
                                    </div>
                                                <!--------------end login informaition ----------------->                      
                               </div>
                           </div>
                                            <!--------------end content----------------->
                           </div>
                       </div>
                         <!------------------------personal inforamtions----------------->
                    </div>        
                    </div>
                  </div>
                </div>

                <!------------------------------------add new device modal--------------------------------------------------------->
<!-- Button trigger modal -->
<!------------------------------------end add new device modal--------------------------------------------------------->
@endSection