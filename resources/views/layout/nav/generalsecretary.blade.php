<ul class="menu">
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('dashboard') }}</span>
        </a>
    </li>

    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-gear-fill"></i>
            <span>{{__('Settings')}}</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item sidebar-item has-sub">
             <a href="#" class='sidebar-link'> {{__('User')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.users.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.users.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
		</ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-people-fill"></i> <span>{{__('Our Members')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.ourMember.index')}}">{{__('Applied Member')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.gs_approve_member')}}">{{__('GS Approved Member')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.approve_member')}}">{{__('Approved Member')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.archive_member')}}">{{__('Archive Member')}}</a></li>
        </ul>
    </li>

</ul>
