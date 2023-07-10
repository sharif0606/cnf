@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">News & Events</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-item router-link-active">News & Events</a>
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
        {{-- <div class="col-lg-3 mobileview">
            <div class="sidebar-menu  ">
                <div class="leftside-menu">
                    <div class="card  pb-4 me-2 rounded-10 bg-light">
                        <span class="shape"></span>
                        <span class="shape2"></span>
                        <div class="card-header">
                            <h4>Member Type</h4>
                        </div>
                        <ul class="sideber-nav flex-culumn ps-3">
                            @forelse ($newsEv as $mt)
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('event_notice_detail',$mt->id)}}">{{$mt->title}}</a></li>
                            @empty
                                
                            @endforelse
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-1 ">
            <div class="about-title" id="grad">
                <h6 class="text-uppercase p-1">News & Events</h6>
            </div>
        </div> --}}
        <div class="col-lg-3 mobileview">
            <div class="sidebar-menu  ">
                <div class="leftside-menu">
                    <div class="card  pb-4 me-2 rounded-10 bg-light">
                        <span class="shape"></span>
                        <span class="shape2"></span>
                        <div class="card-header">
                            <h4>Member Type</h4>
                        </div>
                        <ul class="sideber-nav flex-culumn ps-3">
                            @forelse ($newsEv as $mt)
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('event_notice_detail',$mt->id)}}">{{$mt->title}}</a></li>
                            @empty
                                
                            @endforelse
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-1 ">
            <div class="about-title" id="grad">
                <h6 class="text-uppercase p-1">News & Events</h6>
            </div>
            <div class="row mt-4">
                @if ($detail)
                <div class="col-lg-8 offset-2">
                    <iframe class="notice-img" width="100%" height="315" src="https://www.youtube.com/embed/{{$detail->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div>
                    <h3 class="text-danger">{{$detail->title}}</h3>
                    <em><strong><p>{{date('j F, Y', strtotime($detail->created_at))}}</p></strong></em>
                </div>
                <div class="text-center">
                    <p>{{$detail->short_description}}</p>
                </div>
                @else
                    
                @endif
            </div>
        </div>
    </div>
</div>
@endsection