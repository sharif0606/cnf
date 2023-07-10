@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')

    <!-- slider -->
    <section class="slider">
      <div id="sliderDiv"  class="carousel slide" data-interval="3000"  data-bs-ride="carousel">
        <div class="carousel-indicators">
          @forelse ($slider as $slide)
          <button type="button" data-bs-target="#sliderDiv"
            data-bs-slide-to="{{$loop->index}}"
            class="{{$loop->index==0?'active':''}}"
            {{$loop->index==0?'aria-current="true"':''}}
            aria-label="Slide {{++$loop->index}}">
          </button>
          @empty
          <button type="button" data-bs-target="#sliderDiv" data-bs-slide-to="0"
            class="active" aria-current="true" aria-label="Slide 1">
          </button>
          @endforelse

        </div>
        <div class="carousel-inner">
            @forelse ($slider as $slide)
              <div class="carousel-item {{$loop->index==0?'active':''}}">
                    <img
                    src="{{asset('uploads/Slide_image/thumb/'.$slide->image)}}"
                    class="d-block w-100 slider-img" alt="..." />
              </div>
            @empty
            <div class="carousel-item active">
              <img src="{{ asset('img/slider2.jpg')}}" class="d-block w-100 slider-img" alt="..." />
            </div>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#sliderDiv"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#sliderDiv"
          data-bs-slide="next" >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!-- slider end -->
    <!-- Member Counter -->
    <section class="member-counter container my-5">
      <div class="row text-center member-animate">
        <div class="col member-1">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$donor}}</p>
            <p class="my-auto">Donor Member</p>
          </div>
        </div>
        <div class="col member-2">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Service}}</p>
            <p class="my-auto">Service Member</p>
          </div>
        </div>
        <div class="col member-3">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Life}}</p>
            <p class="my-auto">Life Member</p>
          </div>
        </div>
        <div class="col member-4">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Temporary}}</p>
            <p class="my-auto">Temporary Member</p>
          </div>
        </div>
        <div class="col member-5">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p class="counter">{{$Permanent}}</p>
            <p class="my-auto">Permanent Member</p>
          </div>
        </div>
        <div class="col member-6">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Honorary}}</p>
            <p class="my-auto">Honorary Member</p>
          </div>
        </div>
        <div class="col member-7">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Corporate}}</p>
            <p class="my-auto">Corporate Member</p>
          </div>
        </div>
        <div class="col member-8">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$Diplomate}}</p>
            <p class="my-auto">Diplomate Member</p>
          </div>
        </div>
      </div>


      
    </section>
    <!-- Member counter end -->
    <!-- Blog slide & Notice Section -->
    <section class="pb-5">
      <div class="container notice-blog bg-light shadow rounded-3">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7">
              <div class="mt-3 d-flex notice-div-one ">
                <span class="material-icons me-2"> today </span>
                <a href="{{route('event-notice')}}">
                  <p class="fs-4 mb-1 pt-1">News & Events</p>
                </a>
              </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner n-item-center notice-carousel shadow text-center">
                @forelse ($vNotice as $v)
                <div class="carousel-item active">
                 <iframe class="notice-img" width="100%" height="315" src="https://www.youtube.com/embed/{{$v->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                @empty
                <div class="carousel-item active">
                 <iframe class="notice-img" width="100%" height="315" src="https://www.youtube.com/embed/uA0ag5gEZt8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                @endforelse
                @forelse ($vNotice as $notic)
                <div class="carousel-item ">
                  <img
                    src="{{asset('uploads/video_notice/'.$notic->image)}}"
                    class="d-block w-100 notice-img"
                    alt="..."/>
                </div>
                @empty
                <div class="carousel-item active">
                  <iframe class="notice-img" width="100%" height="315" src="https://www.youtube.com/embed/uA0ag5gEZt8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                @endforelse
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-5 notice">
            <div class="mt-3 d-flex notice-div-one">
              <span class="material-icons me-2"> today </span>
              <a href="{{route('all-notice')}}">
                <p class="fs-4 mb-1 pt-1">Notice</p>
              </a>
            </div>
            <div class="height-300">
                @forelse ($notice as $n)
                  <div class="notice-title notice-div-two">
                    <p class="mb-0">
                      <a href="{{asset('uploads/notice_image/'.$n->noticefile)}}" class="notice_title" target="_blank">{{$n->title}}</a>
                    </p>
                    <div class="d-flex notice-time">
                      <span class="material-symbols-outlined"> alarm </span>
                      <p class="mb-2">{{date('j F, Y', strtotime($n->published_date))}} </p>
                    </div>
                  </div>
                @empty
                <div class="notice-title">
                  <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Dolores, numquam?
                  </p>
                  <div class="d-flex notice-time">
                    <span class="material-symbols-outlined"> alarm </span>
                    <p class="mb-2">19 January, 2023</p>
                  </div>
                </div>
              @endforelse
            </div>
            <div class="views-notice">
              <a href="{{route('all-notice')}}">Views All Notices</a>
            </div>
          </div>
          <div class="col-12">
              <marquee width="98%"  onmouseover="this.stop();" onmouseout="this.start();" direction="left" height="content-fit" class="p-2">
                <ul class="m-0">
                  @forelse ($scroll_notice as $sn)
                    <li><p class="px-2">{{$sn->text}}</p></li>
                  @empty
                    {{-- <li><p class="px-2">There is no update at this momment</p></li> --}}
                  @endforelse
                </ul>
              </marquee>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog & Notice end -->
    <!-- Facilities -->
    <section class="facilities-main">
      <div class="facilities text-center py-5">
        <div class="container my-4">
          <h4 class="section-title animate-title">FACILITIES</h4>
          <div class="row justify-content-center owl-facilities owl-theme animate-facilities">
            @forelse ($facilities as $fac)
              <div class="col-12 item  d-flex justify-content-center">
                <figure class="shadow">
                  <img class=" zoom" src="{{asset('uploads/facilities/thumb/'.$fac->image)}}" alt="" />
                  
                  <div class="facilities-heading">
                    <h4>{{$fac->title}}</h4>
                  </div>
                </figure>
              </div>
            @empty
              <div class="col-12 item  d-flex justify-content-center">
                <figure class="shadow">
                  <img class=" zoom" src="{{ asset('img/fasi.jpg')}}" alt="" />
                  
                  <div class="facilities-heading">
                    <h4>Restaurent</h4>
                  </div>
                </figure>
              </div>
            @endforelse

          </div>
        </div>
      </div>
      <!-- backgourd overlay animate clircle 
      <div class="facilites-bg-shadow"></div>-->
      <div class="facilitics-circle1"></div>
      <div class="facilitics-circle2"></div>
      <div class="facilitics-circle3"></div>
    </section>
    <!-- Facilities ends -->
    <!-- OUr Member -->
    <div class="memberdiv">
      <div class="our-members member-background">
        <section class="container pb-5 ">
          {{-- <div class="our-members">
          </div> --}}
          <h4 class="animate-title">OUR MEMBERS</h4>
          <div class="row owl-member owl-theme">
          @forelse ($ourMember as $fm)
          <div class="col-12 item pe-3 ps-3">
            <div class="card member-box shadow">
                <span class="shape"></span>
                <img class="card-img-top" src="{{asset('uploads/member_image/thumb/'.$fm->image)}}" alt="No Photos">
                <div class="card-body">
                    <span class="member-degignation">
                        @if ($fm->membership_applied == 1){{'Donor Member'}}
                        @elseif($fm->membership_applied == 2){{'Service Member'}}
                        @elseif($fm->membership_applied == 3){{'Life Member'}}
                        @elseif($fm->membership_applied == 4){{'Temporary Member'}}
                        @elseif($fm->membership_applied == 5){{'Permanent Member'}}
                        @elseif($fm->membership_applied == 6){{'Honorary Member'}}
                        @elseif($fm->membership_applied == 7){{'Corporate Member'}}
                        @elseif($fm->membership_applied == 8){{'Diplomate Member'}}
                        @endif
                    </span>
                    <h3 class="member-title">{{$fm->given_name }} {{$fm->surname }}</h3>
                    <small>
                        <strong>Company:</strong>
                        {{$fm->company}}
                    </small>
                    <br>
                    <small>
                      <strong>Designation:</strong>
                      {{$fm->designation }}
                  </small>
                </div>
                {{-- <div class="card-footer">
                    <div class="social">
                        <big>Follow:</big>
                        <span class="social-icon"><a href="{{$fm->linkdin_link }}" target="_blank"><i class="bi bi-linkedin"></i></a></span>
                        <span class="social-icon"><a href="{{$fm->twter_link }}" target="_blank"><i class="bi bi-twitter ms-0 ps-0"></i></a></span>
                        <span class="social-icon"><a href="{{$fm->fb_link }}" target="_blank"><i class="bi bi-facebook ms-0 ps-0"></i></a></span>
                        <span class="social-icon"><a href="{{$fm->youtube_link }}" target="_blank"><i class="bi bi-youtube ms-0 ps-0"></i></a></span>
                    </div>
                </div> --}}
            </div>
        </div>
            
          @empty
            <div class="col-12 item pe-3 ps-3">
              <div class="shadow p-2 mb-3"style="background: #FFF">
                <div class="border-member">
                  <img src="{{ asset('img/Chairman or1.png')}}" alt="" />
                  <p>Md. Rafique Uddin Babul</p>
                  <p>Sizzing Group, Managing Director</p>
                  <p>Liffe Member - LM-002</p>
                </div>
              </div>
            </div>
          @endforelse
          </div>
        </section>
      </div>
    </div>
    <!-- Our Members end -->
    <!-- Gallery -->
    <section class="gallery">
      <div class="galler-background py-3">
        <div class="container">
          <h4 class="pt-5 animate-title">GALLERY</h4>
          <div class="row justify-content-center pb-5 owl-gallery owl-theme">
            @forelse ($pgallery_cat as $p)
              <div class="col-12 item bg-transparent pe-3 ps-3">
                <div class="card mb-3 shadow bg-transparent ">
                  <a href="{{route('pGallery')}}">
                    <img class="gallery-zoom"  src="{{asset('uploads/pGcategory/thumb/'.$p->feature_image)}}" alt="" />
                  </a>
                  <div class="heading">
                    <h4>{{$p->name}}</h4>
                  </div>
                </div>
              </div>
            @empty

              <div class="col-12 item bg-transparent pe-3 ps-3">
                <div class="card mb-3 shadow bg-transparent ">
                  <img class="gallery-zoom"  src="{{ asset('img/slider-3-1.png')}}" alt="" />
                  <div class="heading">
                    <h4>AGE -2021</h4>
                  </div>
                </div>
              </div>
              <!-- <div class="col-12 item bg-transparent">
                <div class="card rounded-4 shadow mb-3 bg-transparent">
                  <img src="{{ asset('img/galary.pngz')}}" alt="" />
                  <div class="heading">
                    <h4>AGE -2021</h4>
                  </div>
                </div>
              </div> -->
            @endforelse

          </div>
        </div>
      </div>
      <div class="gallery-top-overlay"></div>
      <div class="gallery-bootom-overlay"></div>
    </section>
    <!-- Gallery end -->
    <!-- Facilities -->
    <section class="facilities-main px-5">
      <div class="facilities text-center5">
        <!-- Gallery end -->
        <!-- member reg. start -->
        <div class="justify-content-center bg-light member-section shadow">
          <span class="shape"></span>
        <span class="bubble1"></span>
        <span class="bubble2"></span>
        <span class="bubble3"></span>
        <span class="bubble4"></span>
        <span class="bubble5"></span>
          <div class="p-5 rounded shadow">
            <div class="row member-inner">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <p class="animate-title">Benefits of Members</p>
                <ul class="navbar-nav benefit">
                  @forelse ($benefit as $b)
                    <li class="nav-item">
                      <i class="bi bi-caret-right-fill"></i> <span>{{$b->benefit}}</span>
                    </li>
                  @empty
                    <li class="nav-item">
                        <i class="bi bi-caret-right-fill"></i> <span>Advocacy for Software & ITES</span>
                    </li>
                  @endforelse
                </ul>
                  @if($showViewMoreButton)
                      <div class="ps-1 viewbutton">
                          <a class="btn btn-sm btn-danger" href="{{ route('member.benefit') }}">View more</a>
                      </div>
                  @endif
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 become-member-text my-auto">
                <p><span>Become a <span class="theme-color">Member</span></span></p>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 apply-text">
                <a class="shadow" href="{{route('member_registration')}}">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
        <!-- member reg. end -->
      </div>
    </section>
    <!-- Facilities ends -->
    @endsection
    @push('scripts')
    <script>
      
        $('.owl-facilities').owlCarousel({
          loop:true,
          autoPlay:true,
          slideSpeed:1000,
          margin:10,
          responsive: true,
          items : 3,
          navigation:true,
          navigationText: [
            "<i class='bi bi-chevron-left'></i>",
            "<i class='bi bi-chevron-right'></i>"
          ],
          itemsDesktop : [1199,4],
          itemsDesktopSmall : [980,3],
          itemsTablet: [768,1],
          itemsMobile : [479,1]
        })

        $('.owl-member').owlCarousel({
          loop:true,
          autoPlay:true,
          slideSpeed:1000,
          margin:25,
          responsive: true,
          navigation:true,
          navigationText: [
            "<span class='bi bi-chevron-left'></span>",
            "<span class='bi bi-chevron-right'></span>"
          ],
          items : 4,
          itemsDesktop : [1199,4],
          itemsDesktopSmall : [980,3],
          itemsTablet: [768,2],
          itemsMobile : [479,1]
        })
        $('.owl-gallery').owlCarousel({
          loop:true,
          autoPlay:true,
          slideSpeed:1000,
          margin:25,
          responsive: true,
          navigation:true,
          navigationText: [
            "<i class='bi bi-chevron-left'></i>",
            "<i class='bi bi-chevron-right'></i>"
          ],
          items : 3,
          itemsDesktop : [1199,4],
          itemsDesktopSmall : [980,3],
          itemsTablet: [768,1],
          itemsMobile : [479,1]
        })

        
    </script>
    <script>
        ScrollReveal({ 
          reset: true ,
          distance: '60px',
          duration: 800,
          delay: 200
        });
        ScrollReveal().reveal('.notice-title p,.views-notice', { delay: 200, origin: 'right', interval: 30  });
        ScrollReveal().reveal('.member-animate .card, .facilities-main .animate-facilities', { delay: 200,  origin: 'bottom', interval: 30 });
        ScrollReveal().reveal('.viewbutton', { delay: 200,  origin: 'bottom' });
        ScrollReveal().reveal('.become-member-text', { delay: 200,  origin: 'top' });
        ScrollReveal().reveal('.apply-text', { delay: 200,  origin: 'right' });
        ScrollReveal().reveal('.news-event-text, .animate-title', { delay: 200,  origin: 'left' });
        ScrollReveal().reveal('.benefit li', { delay: 200,  origin: 'left', interval: 30 });
        ScrollReveal().reveal('.memberdiv .owl-member, .gallery .owl-gallery', { delay: 200,  origin: 'top', interval: 30 });
    </script>
    @endpush

