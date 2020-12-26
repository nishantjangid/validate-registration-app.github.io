<div class="profileDetail">
    <div class="profileImage">
        @if(Session::has('user'))
        <img src={{asset("profiles/".Session::get('user')->profile)}} alt="{{Session::get('user')->profile}}">
        @endif
    </div>
    <ul class="profileMenu">
        <li class="{{ (request()->is('edit-profile')) ? 'activeMenu' : '' }}"><a href={{url('edit-profile')}}><i class="fa fa-fw fa-pencil"></i> Edit Profile</a></li>
        <li class="{{ (request()->is('change-password')) ? 'activeMenu' : '' }}"><a href={{('change-password')}}><i class="fa fa-fw fa-lock"></i> Change Password</a></li>
        <li><a href={{url('logout')}}><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
    </ul>
</div>