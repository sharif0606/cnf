@extends('frontend.app')
@section('pageTitle',trans('Home'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="facilities-main px-5 pt-3">
      <div class="facilities text-center5">
        <!-- Gallery end -->
        <!-- member reg. start -->
        <div class="container p-0 justify-content-center bg-light member-section shadow">
        <!-- <span class="bubble1"></span>
        <span class="bubble2"></span>
        <span class="bubble3"></span>
        <span class="bubble4"></span>
        <span class="bubble5"></span> -->
          <div class="p-5 rounded shadow">
            <div class="row member-inner">
              <div class="col-12">
                <p>Benefits of Members</p>
              </div>
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-6 col-md-3">
                    <ul class="navbar-nav">
                    @forelse ($benefit as $b)
                      <li role="button" class="nav-item" onmouseover="show_details({{$b->id}})">
                        <i class="bi bi-caret-right-fill"></i> <span>{{$b->benefit}}</span>
                      </li>
                    @empty
                      <li class="nav-item">
                          <i class="bi bi-caret-right-fill"></i> <span>Advocacy for Software & ITES</span>
                      </li>
                    @endforelse
                    </ul>
                  </div>
                  
                  <div class="col-sm-6 col-md-9">
                    @forelse ($benefit as $i=>$b)
                    <span class="description des{{$b->id}} @if($i!=0) hidden @endif ">
                      <i class="bi bi-file-earmark-font-fill"></i> <span>{{$b->description}}</span>
                    </span>
                  @empty
                    <p class="nav-item">
                        <i class="bi bi-caret-right-fill"></i> <span>Advocacy for Software & ITES</span>
                    </p>
                  @endforelse
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- member reg. end -->
      </div>
    </section>
<!-- // Basic multiple Column Form section end -->
    @endsection
@push('scripts')
<script>
  function show_details(e){
    $('.description').hide();
    $('.des'+e).show();
  }
</script>
@endpush