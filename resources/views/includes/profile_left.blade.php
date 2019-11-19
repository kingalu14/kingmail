 <div class="profile_img">
    <div id="crop-avatar">
    <!-- Current avatar -->
      <img class="img-responsive avatar-view" src="{{asset("images/picture.png")}}" width="150" height="300" alt="Avatar" title="Change the avatar">
   </div>
 </div>
    <h4 class="">{{Auth::user()->fname}} {{Auth::user()->lname}}</h4>
  <ul class="list-unstyled user_data">
    <li><i class="fa fa-envelope user-profile-icon"></i> {{Auth::user()->email}}</li>
  </ul>
   <a href="{{route('profile.edit',Auth::user()->id)}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
   <br>
