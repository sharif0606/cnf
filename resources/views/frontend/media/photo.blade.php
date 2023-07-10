@extends('frontend.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Photo Gallery</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="#" class="breadcrumb-item router-link-active">Media</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">photo gallery</a>
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
            <div class="row gallery-photo align-items-center">
                @forelse ($photo as $p)
                    <div class="col-lg-3">
                        <a data-fancybox="gallery" href="{{asset('uploads/pGgallery/'.$p->feature_image)}}" data-caption="{{$p->Caption}}">
                            <div class="card card-gallery shadow-sm">
                                <img src="{{asset('uploads/pGgallery/'.$p->feature_image)}}" class="img-fluid">
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-lg-3">
                        <div class="text-center">
                            <h3 class="mt-5">There is no Photo uploaded yet</h3>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="my-3">
                {!! $photo->links()!!}
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    $('[data-fancybox="gallery"]').fancybox({
        buttons: [
            "slideShow",
            "thumbs",
            "zoom",
            "fullScreen",
            "share",
            "close"
        ],
        loop: false,
        protect: true
    });
</script>
@endpush