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
                        <div class="card-header">
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
        </div>
    </div>
</div>
@endsection