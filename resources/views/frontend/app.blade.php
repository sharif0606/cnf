@php $setting=\App\Models\setting::first(); @endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CNF | @yield('pageTitle')</title>
    <!-- Bootstrap 5.2 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Kolker+Brush&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!-- google icon -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <!-- Bootsrap icon -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <!--OWL CSS-->
    <!-- Basic stylesheet -->
    <link rel="stylesheet" href="{{ asset('owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/owl.theme.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css')}}" />
  </head>
  <body>
        <!-- header section -->
        <header class="bg-white ">
          <div class="container">
            <div class="row">
              <div class="col-sm-4 col-7 logo-sec">
                <a href="{{route('front')}}"><img src="{{asset('uploads/settings/header_logo/'.$setting?->header_logo)}}" alt="" class="mw-100" /></a>
              </div>
    
              <div class="col-sm-8 col-5 header-right">
                  
                <div style="font-size: 10.1pt; " class="d-flex justify-content-end d-none d-md-flex scicon">
                  <a class="pt-2" href="#"><i class="bi bi-facebook"></i></a>
                  <a class="pt-2" href="#"><i class="bi bi-twitter"></i></a>
                  <a class="pt-2" href="#"><i class="bi bi-linkedin"></i></a>
                  <a class="pt-2" href="#"><i class="bi bi-youtube"></i></a>
    
                  <a  id="text-right-dec" href="{{route('memLogin')}}">Member Login</a>
                  <a href="{{route('member_registration')}}" class="become-member">Become a Member</a>
                </div>
                
                <div class="row">
                  <div class="col-sm-12 col-12 d-flex justify-content-end " >
                    
                    <nav class="navbar navbar-expand-md navbar-light pb-0">
                      <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    
                      <div style="margin-top: 10px;" class="collapse navbar-collapse navbar-collapse-top " id="navbarNav">
                        @php $rows = DB::table('front_menus')->where('parent_id',0)->where('status',1)->orderBy("rang");
                            $flcount=$rows->count();
                        @endphp
                        <ul class="navbar-nav mr-auto pb-2 ">
                          @forelse($rows->get() as $i=>$mf)
                            @php $rows_second = DB::select("SELECT * FROM front_menus WHERE parent_id='{$mf->id}' and status='1' ORDER BY rang"); @endphp
                              @if($rows_second) 
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle nav_a_padding" href="{{url($mf->href)}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{$mf->name}}
                                  @if($i==0)
                                    <button class="float-end  d-block d-sm-none home-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                                      ×
                                    </button>
                                  @endif
                                </a>

                                <div style="width:{{180*count($rows_second)}}px" class="dropDown rowsecond{{$i}} dropdown-menu mega-menu shadow megamenu-lg @if($flcount>5 && $i<=1) left-position @else right-position @endif" aria-labelledby="navbarDropdown">
                                  <div class="row m-0">
                                    @foreach($rows_second as $ms)
                                      @php $rows_third = DB::select("SELECT * FROM front_menus WHERE parent_id='{$ms->id}' and status='1' ORDER BY rang"); @endphp
                                      @if($rows_third)
                                        <div class="col-sm pe-0 ">
                                          <ul class="ps-2">
                                              <h4 class="menu-head">
                                                <a href="{{url($ms->href)}}">{{$ms->name}}</a>
                                              </h4>
                                              @foreach($rows_third as $mt)
                                                <li class="subMenu"><a href="{{url($mt->href)}}"><span><i class="bi bi-chevron-double-right"></i></span> {{$mt->name}}</a></li>
                                              @endforeach
                                          </ul>
                                        </div>
                                      @else
                                        <script>
                                          document.getElementsByClassName('rowsecond{{$i}}')[0].style.width='170px';
                                        </script>
                                        <ul class="ps-2">
                                          <li class="subMenu"><a href="{{url($ms->href)}}"><span><i class="bi bi-chevron-double-right"></i></span> {{$ms->name}}</a></li>
                                        </ul>
                                      @endif
                                    @endforeach
                                  </div>
                                </div>
                              </li>
                              @else

                                <li class="nav-item ">
                                  <a class="nav-link nav_a_padding" href="{{url($mf->href)}}">{{$mf->name}}
                                    @if($i==0)
                                    <button class="float-end  d-block d-sm-none home-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                                      ×
                                    </button>
                                    @endif
                                  </a>
                                </li>
                              @endif
                            @empty
                          
                              <li class="nav-item ">
                                <a class="nav-link nav_a_padding" href="{{route('front')}}">Home
                                  <button class="float-end  d-block d-sm-none home-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                                    ×
                                  </button>
                                </a>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle nav_a_padding" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  About Us
                                </a>
                                <div class="dropDown dropdown-menu mega-menu shadow megamenu-lg" aria-labelledby="navbarDropdown">
                                  <div class="row m-0 ">
                                    <div class="col-lg-4 pe-0">
                                      <ul class="ps-2">
                                        <h4 class="menu-head">
                                          <a href="">About</a>
                                        </h4>
                                        <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Core values</a></li>
                                        <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Mission</a></li>
                                        <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Vission</a></li>
                                      </ul>
                                    </div>
                                    <div class="col-lg-4 pe-0">
                                      <ul class="ps-2">
                                        <h4 class="menu-head">
                                          <a href="">Our Team</a>
                                        </h4>
                                        <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Core values</a></li>
                                        <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Mission</a></li>
                                        <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Vission</a></li>
                                      </ul>
                                    </div>
                                    <div class="col-lg-4 pe-0">
                                      <ul class="ps-2">
                                        <h4 class="menu-head">
                                          <a href="">Committees & Forums</a>
                                        </h4>
                                        <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Core values</a></li>
                                        <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Mission</a></li>
                                        <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Vission</a></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle nav_a_padding" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Club Facilities
                                </a>
                                  <ul class="ps-4 dropdown-menu shadow small-menu">
                                    <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Core values</a></li>
                                    <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Mission</a></li>
                                    <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Vission</a></li>
                                  </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle nav_a_padding" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Members
                                </a>
                                  <ul class="ps-4 dropdown-menu shadow small-menu">
                                    <li class="subMenu"><a href="{{route('member.list')}}"><span><i class="bi bi-chevron-double-right"></i></span> Member List</a></li>
                                    <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Mission</a></li>
                                    <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Vission</a></li>
                                  </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle nav_a_padding" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Publications
                                </a>
                                  <ul class="ps-4 dropdown-menu shadow small-menu">
                                    <li class="subMenu"><a href=""> <span><i class="bi bi-chevron-double-right"></i></span> Core values</a></li>
                                    <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Mission</a></li>
                                    <li class="subMenu"><a href=""><span><i class="bi bi-chevron-double-right"></i></span> Vission</a></li>
                                  </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle nav_a_padding" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Media
                                </a>
                                  <ul class="ps-4 dropdown-menu shadow small-menu">
                                    <li class="subMenu"><a href="{{route('all-notice')}}"><span><i class="bi bi-chevron-double-right"></i></span> Notice</a></li>
                                    <li class="subMenu"><a href="{{route('event-notice')}}"><span><i class="bi bi-chevron-double-right"></i></span> News & Events</a></li>
                                    <li class="subMenu"><a href="{{route('pGallery')}}"><span><i class="bi bi-chevron-double-right"></i></span> Photo Gallery</a></li>
                                    <li class="subMenu"><a href="{{route('vGallery')}}"><span><i class="bi bi-chevron-double-right"></i></span> Video Gallery</a></li>
                                  </ul>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link nav_contact_padding" href="{{route('contact-Us')}}">Contact Us</a>
                              </li>
                              <li class="nav-item d-flex d-sm-none">
                                <a class="nav-link nav_a_padding" href="">Member Login</a>
                              </li>
                              <li class="nav-item d-flex d-sm-none">
                                <a class="nav-link nav_a_padding" href="">Become a Member</a>
                              </li>
                            @endforelse
                          </ul>
                      </div>
                    </nav>
                  </div>
                  <!-- <div class="col-sm-4 d-none d-sm-flex d-flex justify-content-end mt-4">
                    <div class="social-icon">
                      <i class="bi bi-facebook"></i>
                      <i class="bi bi-twitter"></i>
                      <i class="bi bi-linkedin"></i>
                      <i class="bi bi-youtube"></i>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </header>
<div class="main">
  @yield('content')
</div>
    

    <!--  support -->
    <section class="support justify-content-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 d-flex justify-content-center text-1">
          <i class="bi bi-headset my-auto"></i>
            <p class="my-auto ">{{ $setting?->footer_top_p1_text }}</p>
          </div>
          <div class="col-md-4 d-flex text-center justify-content-between my-3 py-3 py-sm-0 text-2">
            <p class="my-auto py-sm-2 py-md-0 w-100 text-center" id="support-number">{{ $setting?->footer_top_p2_text }}</p>
          </div>
          <div class="col-md-4 d-flex justify-content-center text-3">
            <p class="my-auto">{{ $setting?->footer_top_p3_text }}</p>
          </div>
        </div>
      </div>
    </section>
    <!--  support ends -->
    <!-- footer -->
    <footer class="position-relative">
      <div class="footer">
        <div class="container">
          <div class="footer-logo">
            <img src="{{asset('uploads/settings/footer_logo/'.$setting?->footer_logo)}}" alt="" />
          </div>
          <div class="row footer-nav">
            <div class="col-sm-4">
              <h6>Location</h6>
              <div class="contact">
                <span
                  ><i class="bi bi-geo-alt-fill"></i>
                  <p>
                    {{ $setting?->address }}
                  </p>
                </span>
                <span>
                  <i class="bi bi-telephone-fill"></i>
                  <p>{{ $setting?->contact_no }}</p>
                </span>
                <span>
                  <i class="bi bi-envelope-fill"></i>
                  <p>{{ $setting?->email_address }}</p>
                </span>
              </div>
              <h5 class="mt-4 mb-2">Connect With Us</h5>
              <div class="social-icon">
                <a href="{{ $setting?->facebook_link }}"><i class="bi bi-facebook ms-0 ps-0"></i></a>
                <a href="{{ $setting?->twitter_link }}"><i class="bi bi-twitter ms-0 ps-0"></i></a>
                <a href="{{ $setting?->linkdin_link }}"><i class="bi bi-linkedin ms-0 ps-0"></i></a>
                <a href="{{ $setting?->youtube_link }}"><i class="bi bi-youtube ms-0 ps-0"></i></a>
              </div>
            </div>
            <div class="col-sm-8 justify-content-end">
              <h6>Google Map</h6>
              <iframe
                class="container-fluid footer-ifram"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14763.086755567325!2d91.80151863306914!3d22.32447277470316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8caa5739671%3A0xb923ad5eba0512c6!2sC%20%26%20F%20Tower%2C%201222%20Sheikh%20Mujib%20Rd%2C%20Chittagong%204100!5e0!3m2!1sen!2sbd!4v1689223359684!5m2!1sen!2sbd"
                width="700"
                height="293"
                style="border: 0; padding:0px"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 copyright">
              <p>&copy copyright 2023 CNF</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 d-flex payment-img">
              <p>We Accept</p>
              <img class="img-fluid" src="{{asset('uploads/settings/we_accept_1/'.$setting?->footer_top_p1_image)}}" alt="" />
              <img class="img-fluid" src="{{asset('uploads/settings/we_accept_2/'.$setting?->footer_top_p2_image)}}" alt="" />
              <img class="img-fluid" src="{{asset('uploads/settings/we_accept_3/'.$setting?->footer_top_p3_image)}}" alt="" />
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5 mt-2 developer">
              Developed By : <a href="https://muktodharaltd.com/">Muktodhara Technology Ltd</a>
            </div>
          </div>
        </div>
      </div>
      <!-- overlay circle -->
      <div class="footer-circle1"></div>
      <div class="footer-circle2"></div>
      <div class="footer-top-overlay"></div>
    </footer>

    <!-- footer end -->
    <!-- Boostrap 5.2 link -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        ScrollReveal({ 
          reset: true ,
          distance: '60px',
          duration: 800,
          delay: 200
        });
        ScrollReveal().reveal('.support .text-1', { delay: 200, origin: 'left' });
        ScrollReveal().reveal('.support .text-2', { delay: 200, origin: 'top' });
        ScrollReveal().reveal('.support .text-3', { delay: 200, origin: 'right' });
    </script>


    
    <!-- owl js -->
    <script src="{{ asset('assets/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{ asset('owl-carousel/owl.carousel.js')}}"></script>
    <!-- My JS -->
    <script src="{{ asset('js/app.js')}}"></script>
    @stack('scripts')
  </body>
</html>
