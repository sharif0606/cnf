@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Executive Committee List</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('front')}}" class="breadcrumb-item router-link-active">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">list</a>
                        </li>
                        <li class="breadcrumb-item">data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container py-4">
    <div class="row">
        <div class="col-lg-3 mobileview">
            <div class="sidebar-menu vue-affix affix-top ">
                <div class="leftside-menu">
                    <div class="card  pb-4 me-4 rounded-10 bg-light">
                        <span class="shape"></span>
                        <span class="shape2"></span>
                        <div class="card-header">
                            <h4>Committee</h4>
                        </div>
                        <ul class="sideber-nav flex-culumn ps-3">
                        @php 
                            $curl=request()->path();
                            $rows=DB::select("SELECT * from front_menus where parent_id = (select parent_id from front_menus where href='$curl') and status =1 order by rang");
                        @endphp
                            @forelse($rows as $r)
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{url($r->href)}}">{{$r->name}}</a></li>
                            @empty
                            @endforelse
                            @forelse ($committeeSession as $cs)
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('exe-member-list',$cs->id)}}">{{$cs->session_name}}</a></li>
                            @empty
                                
                            @endforelse
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 ">
            <div class="about-title" id="grad">
                <h6 class="text-uppercase p-1">Executive Committee List</h6>
            </div>
            <div class="row small-view">
                <div class="col-lg-12">
                    <div class="card mt-3 pb-4 rounded-10 bg-light">
                        <div class="card-header ">
                            <h4
                                class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseTwo"
                                aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                Committee
                                </button>
                            </h4>
                        </div>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <ul class="sideber-nav flex-culumn ps-3 accordion-body">
                                    @forelse ($committeeSession as $cs)
                                    <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('exe-member-list',$cs->id)}}">{{$cs->session_name}}</a></li>
                                    @empty
                                        
                                    @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($exMember as $fm)
                <div class="col-md-4 py-2">
                    <div class="card member-box shadow-lg">
                        <span class="shape"></span>
                        <img class="card-img-top" src="{{asset('uploads/member_image/thumb/'.$fm->member?->image)}}" alt="No Photos">
                        <div class="card-body">
                            <span class="member-degignation">{{$fm->member?->club_designation}}</span>
                            <h4 class="member-title">{{$fm->member?->full_name }}</h4>
                            {{-- <small>
                                <strong>Email:</strong>
                                {{$fm->member?->email }}
                            </small> --}}
                            <small>
                                <strong>Company:</strong>
                                {{$fm->member?->company}}
                            </small>
                            <br>
                            <small>
                                <strong>Designation:</strong>
                                {{$fm->member?->designation }}
                            </small>
                        </div>
                        {{-- <div class="card-footer">
                            <div class="social">
                                <big>Follow:</big>
                                <span class="social-icon"><a href="{{$fm->member?->linkdin_link }}" target="_blank"><i class="bi bi-linkedin"></i></a></span>
                                <span class="social-icon"><a href="{{$fm->member?->twter_link }}" target="_blank"><i class="bi bi-twitter ms-0 ps-0"></i></a></span>
                                <span class="social-icon"><a href="{{$fm->member?->fb_link }}" target="_blank"><i class="bi bi-facebook ms-0 ps-0"></i></a></span>
                                <span class="social-icon"><a href="{{$fm->member?->youtube_link }}" target="_blank"><i class="bi bi-youtube ms-0 ps-0"></i></a></span>
                            </div>
                        </div> --}}
                    </div>
                </div>
                @empty
                <div class="col-12 text-center p-5">
                    <h3>No Data Found</h3>
                </div> 
                @endforelse
            </div>
            
        </div>
    </div>
</div>
@endsection