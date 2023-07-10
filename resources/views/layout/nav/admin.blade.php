<ul class="menu">
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('dashboard') }}</span>
        </a>
    </li>
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-files"></i>
            <span>{{__('Manage Website')}}</span>
        </a>
        <ul class="submenu">

            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Front Page Settings')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.scrollN.index')}}">{{__('Scroll Notice')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.slider.index')}}">{{__('Slider')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.benefit.index')}}">{{__('Benefits')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.tdue.index')}}">{{__('Total Dues')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Gallery')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.year.index')}}">{{__('Album Year')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.pGalleryCat.index')}}">{{__('Photo Album')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.pGallery.index')}}">{{__('Photo')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.vgalleryCat.index')}}">{{__('Video Album')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.vgallery.index')}}">{{__('Video')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Notice & Facilities')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.notice.index')}}">{{__('Notice')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.vNotice.index')}}">{{__('News & Events')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.facilities.index')}}">{{__('Facilities')}}</a></li>
                </ul>
            </li>
            {{-- <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Blog')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.tag.index')}}">{{__('Tags')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.blogcategory.index')}}">{{__('Category')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.blog.index')}}">{{__('Blogs')}}</a></li>
                </ul>
            </li> --}}
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Page Settings')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.page.index')}}">{{__('Web Page')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.front_menu.index')}}"> {{__('Manage Menu')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Setting')}}</a>
                <ul class="submenu">
                    {{-- <li class="py-1"><a href="{{route(currentUser().'.country.index')}}">{{__('Country')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.division.index')}}">{{__('Division')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.district.index')}}">{{__('District')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.district.index')}}">{{__('District')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.thana.index')}}">{{__('Thana')}}</a></li> --}}
                    <li class="py-1"><a href="{{route(currentUser().'.admin.index')}}">{{__('Users')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.bank.index')}}">{{__('Bank List')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.terms.index')}}">{{__('Terms & Condition')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.settings.index')}}">{{__('Website Settings')}}</a></li>
                </ul>
            </li>
        </ul>
    </li>
    
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-people-fill"></i> <span>{{__('Our Members')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.ourMember.index')}}">{{__('Applied Member')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.approve_member')}}">{{__('Approved Member')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-people-fill"></i> <span>{{__('Committees & Forums')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.committeeSession.index')}}">{{__('Committee Session')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.foundCommittee.index')}}">{{__('Foundind Committees')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.exeCommittee.index')}}">{{__('Executive Committee')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-telephone-fill"></i> <span>{{__('Contact Us')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.creason.index')}}">{{__('Website')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.contact.index')}}">{{__('Website Contact List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.mcreason.index')}}">{{__('Member Portal')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-telephone-fill"></i> <span>{{__('Payment')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.ppurpose.index')}}">{{__('Payment Purpose')}}</a></li>
        </ul>
    </li>
</ul>
