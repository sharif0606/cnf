@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Profile</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="" class="breadcrumb-item router-link-active">Profile</a>
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
        <div class="col-lg-3">
            <div>
                <div class="card sidebar shadow-sm mb-3">
                    <div class="card-header">
                        <div class="user">
                            <div class="userName text-center">
                                <div class="mb-2">
                                    <img src="{{asset('uploads/member_image/thumb/'.encryptor('decrypt', request()->session()->get('image')))}}" alt="">
                                    
                                </div>
                                <h5 class="text-uppercase">{{encryptor('decrypt', request()->session()->get('full_name'))}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card sidemenu shadow-sm mb-3">
                    <div class="card-body">
                        <nav class="navbar navbar-expand-lg navbar-light pb-0">
                            <button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse" data-bs-target="#memberNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                                <div id="memberNav" class="navbar-collapse collapse">
                                    <ul class="nav flex-column w-100">
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="{{route('member.memdashboard')}}">Dashborad</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="">Personal Information</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="">Payments <span class="down-arrow"><i class="bi bi-chevron-right"></i></span></a>
                                            <ul class="submenu">
                                                <li class="nav-item"></i><a class="nav-link" href="">Account Status</a></li>
                                                <li class="nav-item"></i><a class="nav-link" href="">Payment History</a></li>
                                                <li class="nav-item"></i><a class="nav-link" href="">Member Due</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="">Bank List</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="">Change Request</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="">Online Helpdesk</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-1-menu" href="{{route('member.password')}}">Change Password</a></li>
                                        <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" id="side-5-menu" href="{{route('memberLogOut')}}">Logout</a></li>
                                    </ul>
                                </div>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 ">

            @yield('memberContent')
        </div>
    </div>
</div>
@endsection