@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Updated Member List</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('front')}}" class="breadcrumb-item router-link-active">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">updated member list</a>
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
                            <h4>Membership</h4>
                        </div>
                        {{-- <ul class="sideber-nav flex-culumn ps-3">
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('member.list')}}">Member List</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('memLogin')}}">Member Login</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('member_registration')}}">Become a member</a></li>
                        </ul> --}}
                        <ul class="sideber-nav flex-culumn ps-3">
                        @php 
                            $curl=request()->path();
                            $rows=DB::select("SELECT * from front_menus where parent_id = (select parent_id from front_menus where href='$curl') and status =1 order by rang");
                        @endphp
                            @forelse($rows as $r)
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{url($r->href)}}">{{$r->name}}</a></li>
                            @empty
                            @endforelse
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 ">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="member-search">
                        <div class="search-body">
                            <h1>সদস্য সার্চ</h1>
                            <form action="" method="get">
                                <div class="searchBox">
                                    <input type="text" value="{{ request()->input('name', '') }}"  name="name" id="search" placeholder="সদস্য নং, আর এস এল নং">
                                    <button type="submit">
                                        <span class="bi bi-search"></span>
                                    </button>
                                </div>
                            </form>
                            <div class="search-menu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <fieldset class="advance-search-body border">
                        <legend >
                            <button class=" btn-explore" type="button" data-bs-toggle="collapse" data-bs-target="#advance-search" aria-expanded="false" aria-controls="advance-search">
                                Advance Search
                            </button>
                        </legend>
                        <div id="advance-search" class="py-2 px-5 collapse">
                            <form action="" method="get" class="row">
                                <div class="form-group col-lg-5 p-1">
                                    <label for="" class="mb-0">আর এস এল</label>
                                    <input type="text" name="rsl_no" placeholder="আর এস এল" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group col-lg-2 align-self-end p-1">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-lg-12">
                    <div class="card card-body shadow-sm">
                        @forelse ($member as $m)
                        <div class="search-list-item row ">
                            <div class="col-lg-4 align-self-center text-center">
                                <a href="{{route('member_link',encryptor('encrypt',$m->id))}}">
                                    <img src="{{asset('uploads/memberImage/'.$m->image)}}" alt="No Image" width="150px">
                                </a>
                            </div>
                            <div class="col-lg-4 text-center border-end ps-0 pe-0">
                                <a href="{{route('member_link',encryptor('encrypt',$m->id))}}">
                                    <h1> {{$m->name_bn}}</h1>
                                </a>
                                <h5>
                                    সদস্য নং/নতুন : {{$m->member_serial_no}}/
                                    @if ($m->member_serial_no_new != '')
                                        {{$m->member_serial_no_new}}
                                    @else
                                        N/A
                                    @endif
                                </h5>
                                <h5>আর এস এল : {{$m->renew_serial_no}}</h5>
                            </div>
                            <div class="col-lg-4 align-self-center">
                                <h5>মোবাইল : {{$m->personal_phone}}</h5>
                                <h5>জেলা : {{$m->district}}</h5>
                                <h5>উপজেলা : {{$m->upazila}}</h5>
                                <h5>গ্রাম : {{$m->village}}</h5>
                                <h5>রিনিউ ইস্যু : {{ $m->fee_collection_last ? \Carbon\Carbon::parse($m->fee_collection_last->date)->format('d-F-Y') : '' }}</h5>
                                <h5>রিনিউ মেয়াদ  : {{$m->fee_collection_last?->year}}</h5>
                            </div>
                            {{-- <div class="col-lg-2 align-self-center text-center">
                                <a href="{{route('member_link',encryptor('encrypt',$m->id))}}" class="btn btn-sm btn-outline-explore">View Profile</a>
                            </div> --}}
                        </div>
                        @empty
                        <div class="search-list-item row ">
                            <div class="text-center">No Data Found</div>
                        </div>
                        @endforelse
                        <div class="my-3">
                            {!! $member->links()!!}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection