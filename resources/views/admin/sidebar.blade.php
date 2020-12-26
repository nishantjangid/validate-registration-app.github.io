<div class="sidebarHeader">
    <div class="text-center text-info py-3">
        <h3>Admin Panel</h3>
    </div>
</div>
<div class="sidebarBody">
    <ul class="sidebarMenu">                
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>

        <button class="dropdown-btn"><i class="fa fa-fw fa-users"></i> Employee
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="{{route('view-employee')}}"><i class="fa fa-fw fa-eye"></i> View Employees</a>
            <a href="{{route('insert-employee')}}"><i class="fa fa-fw fa-pencil"></i> Insert Employee</a>
        </div>
        <li><a href={{url('/')}}><i class="fa fa-fw fa-code"></i> Website</a></li>
        <li><a href=""></a></li>
    </ul>
</div>