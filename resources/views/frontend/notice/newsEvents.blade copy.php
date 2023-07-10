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
        <div class="col-sm-12 col-md-6 offset-md-3 col-lg-8 offset-lg-2 pt-2">
            <div class="member-search">
                <div class="search-body">
                    <h1>News Search</h1>
                    <form action="{{route('news.search')}}" method="get">
                        <div class="searchBox">
                            <input type="text" value="{{ request()->input('name', '') }}"  name="name" id="search" placeholder="Search by title">
                            <button type="submit">
                                <span class="bi bi-search"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @forelse($newsEv as $news)
        <div class="col-sm-12 col-md-6 col-lg-4 p-3">
           <div class="card card-body events-card">
                <div class="row text-black">
                    <div class="col-12">
                        <h6 class="events-title">{{$news->title}}</h6>
                    </div>
                    <div class="col-md-12 mb-4">
                        <span class="events-date">
                            <i class="mdi mdi-calendar pr-1"></i>
                            {{date('j F, Y', strtotime($news->created_at))}}
                        </span>
                    </div>
                    <div class="col-md-6 text-center">
                        <img class="events-image" src="{{asset('uploads/video_notice/thumb/'.$news->image)}}" alt="">
                    </div>
                    <div class="description events col-md-6">
                        {{$news->short_description}}
                        {{-- <a href="{{asset('uploads/video_notice/'.$news->notice_file)}}" target="_blank" class="btn btn-danger">Details</a> --}}
                        @if($news->notice_file)
                        <a href="{{asset('uploads/video_notice/'.$news->notice_file)}}" target="_blank" class="btn btn-sm btn-danger">See more</a>
                        @else
                        <a href="#" onclick="alert('Sorry!! file has not uploaded yet')" class="btn btn-sm btn-danger">See more</a>
                        @endif
                    </div>
                    <span class="events shape1"></span>
                </div>
           </div>
        </div>
        @empty
        <div class="text-center p-4">
            No Data Found
        </div>
        @endforelse
        <div class=" my-3">
            {!! $newsEv->links()!!}
        </div>
    </div>
</div>
@endsection