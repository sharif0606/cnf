@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Video Gallery</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-item router-link-active">Media</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">Video gallery</a>
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
                            <h4>Media Center</h4>
                        </div>
                        <ul class="sideber-nav flex-culumn ps-3">
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('pGallery')}}">Photo Gallery</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('vGallery')}}">Video Gallery</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 ">
            <div class="row gallery photo">
                @forelse ($videoYear as $p)
                <div class="col-lg-4 text-center">
                    <a href="{{route('vAlbum',$p->id)}}">
                        <div class="card shadow-sm mb-3">
                            <div class="card-gallery">
                                <img class="img-fluid" src="{{asset('uploads/yearVideo/thumb/'.$p->feature_video)}}" alt="">
                            </div>
                            <div class="card-body my-2">
                                <h4>Videos of {{$p->year}}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-lg-4 text-center">
                    <div class="text-center">
                        <h3 class="mt-5">There is no Video uploaded yet</h3>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection