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
                <img src="{{asset('uploads/Slide_image/thumb/'.$slide->image)}}" class="d-block w-100 slider-img" alt="..." />
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
        <div class="col-lg-6 offset-lg-3 col-sm-12">
          <div class="member-search">
              <div class="search-body">
                  <h1>সদস্য সার্চ</h1>
                  <form action="{{route('member.list')}}" method="get">
                      <div class="searchBox">
                          <input type="text" value="{{ request()->input('name', '') }}"  name="name" id="search" placeholder="সদস্য নং, আর এস এল নং">
                          <button type="submit">
                              <span class="bi bi-search"></span>
                          </button>
                      </div>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </section>
    <section class="member-counter container my-5">
      <div class="row text-center member-animate">
        <div class="col member-1">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$allMember}}</p>
            <p class="my-auto">মোট সদস্য</p>
          </div>
        </div>
        <div class="col member-2">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$activeMember}}</p>
            <p class="my-auto">সক্রিয় সদস্য</p>
          </div>
        </div>
        <div class="col member-3">
          <div class="card p-1 shadow my-2">
            <span class="material-icons"> groups </span>
            <p>{{$approveMember}}</p>
            <p class="my-auto">পুনর্ণবীকরণ সদস্য</p>
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
                  <p class="fs-4 mb-1 pt-1">নিউজ এবং ইভেন্ট</p>
                </a>
              </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner n-item-center notice-carousel shadow text-center">
                @forelse ($vNotice as $v)
                  @if ($v->link != '')
                    <div class="carousel-item active">
                    <iframe class="notice-img" width="100%" height="315" src="https://www.youtube.com/embed/{{$v->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                  @else
                    <div class="carousel-item active">
                      <iframe class="notice-img" width="100%" height="315" src="https://www.youtube.com/embed/tGPUQ76HIOE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                  @endif
                @empty
                <div class="carousel-item active">
                 <iframe class="notice-img" width="100%" height="315" src="https://www.youtube.com/embed/tGPUQ76HIOE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                @endforelse
                @forelse ($vNotice as $notic)
                  @if ($notic->image != '')
                    <div class="carousel-item ">
                      <img
                        src="{{asset('uploads/video_notice/'.$notic->image)}}"
                        class="d-block w-100 notice-img"
                        alt="..."/>
                    </div>
                  @else
                    <div class="carousel-item active">
                      <iframe class="notice-img" width="100%" height="315" src="https://www.youtube.com/embed/tGPUQ76HIOE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                  @endif
                @empty
                <div class="carousel-item active">
                  <iframe class="notice-img" width="100%" height="315" src="https://www.youtube.com/embed/tGPUQ76HIOE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
                <p class="fs-4 mb-1 pt-1">নোটিশ</p>
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
    <!--<section class="facilities-main">
      <div class="facilities text-center py-5">
        <div class="container my-4">
          <h4 class="section-title animate-title">কার্যক্রম সমূহ</h4>
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
      </div>-->
      <!-- backgourd overlay animate clircle 
      <div class="facilites-bg-shadow"></div>-->
      <!--<div class="facilitics-circle1"></div>
      <div class="facilitics-circle2"></div>
      <div class="facilitics-circle3"></div>
    </section>-->
    <!-- Facilities ends -->
    <!-- OUr Member -->
    <div class="memberdiv">
      <div class="our-members member-background">
        <section class="container pb-5 ">
          {{-- <div class="our-members">
          </div> --}}
          <h4 class="animate-title m-0">কার্যনির্বাহী সদস্য</h4>
          {{-- <h5 class="animate-title text-center">
            @if($committeeSession)
              {{$committeeSession->session_name}}
            @endif
          </h5> --}}
          <span></span>
          <div class="row">
              @if($executiveMember)
                @foreach ($executiveMember as $exe)
                  @if($exe->order_by == 1)
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="card executive-member-box-head shadow p-2">
                        <span class="shape"></span>
                        <div class="text-center">
                          @if ($exe->member?->image != '')
                            <img class="card-img-top" src="{{asset('uploads/memberImage/'.$exe->member?->image)}}" alt="No Photos">
                          @else
                            <img class="card-img-top" src="{{asset('img/demo.png')}}" alt="No Photos">
                          @endif
                        </div>
                        <div class="card-body text-center">
                          <h3 class="m-0 member-title">{{$exe->member?->name_bn}}</h3>
                          <small>{{$exe->designation}}</small><br>
                          <small>{{$exe->member?->personal_phone}}</small>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              @endif
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                      <h4 style="font-size: 22px; margin-bottom: .5rem; margin-top: 3rem; color:rgb(23, 23, 246)">চট্টগ্রাম ক্লিয়ারিং এন্ড ফরওয়ার্ডিং এজেন্টস্ কর্মচারী ইউনিয়ন (সি,বি,এ)</h4>
                      <span style="background-color: green; border: solid transparent 1px; border-radius: 50px; font-size: 22px; color: #fff; padding: 2px 12px 1px 12px;">রেজি নং- ২৩৪</span>
                      <h5 style="font-size: 32px; margin-bottom: .5rem; margin-top:.9rem; color: red;">কার্যনির্বাহী পরিষদের নির্বাচিত কর্মকর্তাবৃন্দ</h5>
                      @if($committeeSession)
                      <p style="font-size: 22px; color: rgb(23, 23, 246);">{{$committeeSession->session_name}}</p>
                      @endif
                    </div>
              @if($executiveMember)
                @foreach ($executiveMember as $exe)
                  @if($exe->order_by == 2)
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="card executive-member-box-head shadow p-2">
                        <span class="shape"></span>
                        <div class="text-center">
                          @if ($exe->member?->image != '')
                            <img class="card-img-top" src="{{asset('uploads/memberImage/'.$exe->member?->image)}}" alt="No Photos">
                          @else
                            <img class="card-img-top" src="{{asset('img/demo.png')}}" alt="No Photos">
                          @endif
                        </div>
                        <div class="card-body text-center">
                          <h3 class="m-0 member-title">{{$exe->member?->name_bn}}</h3>
                          <small>{{$exe->designation}}</small><br>
                          <small>{{$exe->member?->personal_phone}}</small>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              @endif
            {{-- <div class="col-lg-12 d-flex justify-content-between mb-4">
              @if($executiveMember)
                @foreach ($executiveMember as $exe)
                  @if(($exe->order_by == 1) || ($exe->order_by == 2))
                    <div class="card executive-member-box-head shadow p-2">
                      <span class="shape"></span>
                      <div class="text-center">
                        @if ($exe->member?->image != '')
                          <img class="card-img-top" src="{{asset('uploads/memberImage/'.$exe->member?->image)}}" alt="No Photos">
                        @else
                          <img class="card-img-top" src="{{asset('img/demo.png')}}" alt="No Photos">
                        @endif
                      </div>
                      <div class="card-body text-center">
                        <h3 class="m-0 member-title">{{$exe->member?->name_bn}}</h3>
                        <small>{{$exe->designation}}</small><br>
                        <small>{{$exe->member?->personal_phone}}</small>
                      </div>
                    </div>
                  @endif
                @endforeach
              @endif
            </div> --}}
              @if($executiveMember)
                @forelse ($executiveMember as $exec)
                  @if(($exec->order_by != 1) && ($exec->order_by != 2))
                      <div class="col-lg-2 col-md-4 col-6 item">
                          <div class="card executive-member-box shadow">
                            <span class="shape"></span>
                            <div class="text-center">
                              @if ($exec->member?->image != '')
                                <img class="card-img-top" src="{{asset('uploads/memberImage/'.$exec->member?->image)}}" alt="No Photos">
                              @else
                                <img class="card-img-top" src="{{asset('img/demo.png')}}" alt="No Photos">
                              @endif
                            </div>
                            <div class="card-body text-center mt-2">
                              <h3 class="m-0 member-title">{{$exec->member?->name_bn}}</h3>
                              <small>{{$exec->designation}}</small><br>
                              <small>{{$exec->member?->personal_phone}}</small>
                            </div>
                        </div>
                    </div>
                  @endif
                  @empty
                  <div class="col-12">
                    <img class="w-100" src="https://cnfemployeesunion.com/public/uploads/Slide_image/thumb/1689222373.jpg" alt="" />
                  </div>
                @endforelse
              @endif
          </div>
        </section>
      </div>
    </div>
    <div class="memberdiv">
      <div class="our-members member-background">
        <section class="container pb-5 ">
          {{-- <div class="our-members">
          </div> --}}
          <h4 class="animate-title">সদস্য সমূহ</h4>
          <div class="row owl-member owl-theme">
          @forelse ($ourMember as $fm)
          <div class="col-12 item pe-3 ps-3">
            <div class="card member-box shadow">
                <span class="shape"></span>
                <img class="card-img-top" src="{{asset('uploads/memberImage/'.$fm->image)}}" alt="No Photos">
                <div class="card-body">
                    <h3 class="m-0 member-title">{{$fm->name_bn }}</h3>
                    <small>
                        <strong>প্রতিষ্ঠান:</strong>
                        {{$fm->nameAddress_of_present_institute}}
                    </small>
                    <br>
                    <small>
                      <strong>পদবী:</strong>
                      {{$fm->designation_of_present_job }}
                    </small><br>
                    <a class="btn btn-sm btn-primary" href="{{route('member_link',encryptor('encrypt',$fm->id))}}">View Profile</a>
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
                <div class="border-member text-center">
                  <img src="{{ asset('img/Chairman or1.png')}}" alt="" />
                  <p>Md. Rafique Uddin Babul</p>
                  <p>Sizzing Group, Managing Director</p>
                  <p>Liffe Member - LM-002</p>
                  <a href="{{route('member_link',encryptor('encrypt',816))}}">member profile</a>
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
          <h4 class="pt-5 animate-title">ছবি গ্যালারি</h4>
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
                  <img class="gallery-zoom"  src="https://cnfemployeesunion.com/public/uploads/Slide_image/thumb/1689222373.jpg" alt="" />
                  <div class="heading">
                    <h4>AGE -2023</h4>
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

