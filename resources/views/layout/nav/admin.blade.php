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
            <span>{{__('Manage Website')}}</span>
        </a>
        <ul class="submenu">

            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Front Page Settings')}}</a>
                <ul class="submenu">
                    <li class="py-1 submenu-item"><a href="{{route(currentUser().'.scrollN.index')}}">{{__('Scroll Notice')}}</a></li>
                    <li class="py-1 submenu-item"><a href="{{route(currentUser().'.slider.index')}}">{{__('Slider')}}</a></li>
                    {{-- <li class="py-1"><a href="{{route(currentUser().'.benefit.index')}}">{{__('Benefits')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.tdue.index')}}">{{__('Total Dues')}}</a></li> --}}
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Gallery')}}</a>
                <ul class="submenu">
                    <li class="py-1 submenu-item"><a href="{{route(currentUser().'.year.index')}}">{{__('Album Year')}}</a></li>
                    <li class="py-1 submenu-item"><a href="{{route(currentUser().'.pGalleryCat.index')}}">{{__('Photo Album')}}</a></li>
                    {{-- <li class="py-1 submenu-item"><a href="{{route(currentUser().'.pGallery.index')}}">{{__('Photo')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.vgalleryCat.index')}}">{{__('Video Album')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.vgallery.index')}}">{{__('Video')}}</a></li> --}}
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Notice & Facilities')}}</a>
                <ul class="submenu">
                    <li class="py-1 submenu-item"><a href="{{route(currentUser().'.notice.index')}}">{{__('Notice')}}</a></li>
                    <li class="py-1 submenu-item"><a href="{{route(currentUser().'.vNotice.index')}}">{{__('News & Events')}}</a></li>
                    <li class="py-1 submenu-item"><a href="{{route(currentUser().'.facilities.index')}}">{{__('Facilities')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Page Settings')}}</a>
                <ul class="submenu">
                    <li class="py-1 submenu-item"><a href="{{route(currentUser().'.page.index')}}">{{__('Web Page')}}</a></li>
                    <li class="py-1 submenu-item"><a href="{{route(currentUser().'.front_menu.index')}}"> {{__('Manage Menu')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Setting')}}</a>
                <ul class="submenu">
                    {{-- <li class="py-1"><a href="{{route(currentUser().'.country.index')}}">{{__('Country')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.division.index')}}">{{__('Division')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.district.index')}}">{{__('District')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.district.index')}}">{{__('District')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.thana.index')}}">{{__('Thana')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.admin.index')}}">{{__('Users')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.bank.index')}}">{{__('Bank List')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.terms.index')}}">{{__('Terms & Condition')}}</a></li> --}}
                    <li class="py-1 submenu-item"><a href="{{route(currentUser().'.settings.index')}}">{{__('Website Settings')}}</a></li>
                </ul>
            </li>
        </ul>
    </li>
    
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.ourMember.index')}}" class='sidebar-link'><i class="bi bi-people-fill"></i> <span>{{__('Applied Member')}}</span></a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.gs_approve_member')}}" class='sidebar-link'><i class="bi bi-people-fill"></i> <span>{{__('GS Approved Member')}}</span></a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.approve_member')}}" class='sidebar-link'><i class="bi bi-people-fill"></i> <span>{{__('Approved Member')}}</span></a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.archive_member')}}" class='sidebar-link'><i class="bi bi-people-fill"></i> <span>{{__('Archive Member')}}</span></a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.feeCollection.index')}}" class='sidebar-link'><i class="bi bi-currency-dollar"></i><span>{{__('Fees Collection List')}}</span></a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.feeCollection.create')}}" class='sidebar-link'><i class="bi bi-currency-dollar"></i> <span>{{__('Pay Now')}}</span></a>
    </li>
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.othersPay.index')}}" class='sidebar-link'><i class="bi bi-currency-dollar"></i><span>{{__('Others Collection List')}}</span></a>
    </li>
    
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-people-fill"></i> <span>{{__('Committees')}}</span></a>
        <ul class="submenu">
            <li class="py-1 submenu-item"><a href="{{route(currentUser().'.committeeSession.index')}}">{{__('Committee Session')}}</a></li>
            <li class="py-1 submenu-item"><a href="{{route(currentUser().'.exeCommittee.index')}}">{{__('Committee')}}</a></li>
        </ul>
    </li>
    {{-- <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-telephone-fill"></i> <span>{{__('Contact Us')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.creason.index')}}">{{__('Website')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.contact.index')}}">{{__('Website Contact List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.mcreason.index')}}">{{__('Member Portal')}}</a></li>
        </ul>
    </li> --}}
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-currency-dollar"></i><span>{{__('Payment')}}</span></a>
        <ul class="submenu">
            <li class="py-1 submenu-item"><a href="{{route(currentUser().'.ppurpose.index')}}">{{__('Fees')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-receipt"></i><span>{{__('Report')}}</span></a>
        <ul class="submenu">
            <li class="py-1 submenu-item"><a href="{{route(currentUser().'.trans_history_all')}}">{{__('Fee Report')}}</a></li>
        </ul>
    </li>
</ul>
