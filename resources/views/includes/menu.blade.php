<ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Contact Manager </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-users"></i><a href="{{route('bulk')}}">Contact Groups</a></li>                
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope"></i>Mail </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="{{route('mails.send')}}">Compose</a></li>
                     
                        </ul>
                    </li>
                    <h3 class="menu-title">Settings</h3><!-- /.menu-title -->
                    <li class="">
                        <a href="{{route('templates')}}"> <i class="menu-icon fa fa-file-text-o"></i>Mail Templates</a>
                    </li>
               
                </ul>