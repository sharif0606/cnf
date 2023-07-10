@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Total Dues</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('front')}}" class="breadcrumb-item router-link-active">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">Total Dues</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container py-4">
    <div class="row">
        {{-- <div class="col-lg-3 mobileview">
            <div class="sidebar-menu vue-affix affix-top ">
                <div class="leftside-menu">
                    <div class="card  pb-4 me-4 rounded-10 bg-light">
                        <span class="shape"></span>
                        <span class="shape2"></span>
                        <div class="card-header">
                            <h4>Member Type</h4>
                        </div>
                        <ul class="sideber-nav flex-culumn ps-3">
                           
                            
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('club_dues')}}?slug=1">Founder Member</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('club_dues')}}?slug=2">Life Member</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('club_dues')}}?slug=3">Permanent Member</a></li>
                            <li class="nav-item my-2"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{route('club_dues')}}?slug=4">Permanent Terminated Member</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-lg-12 px-2 ">
            <form action="" method="get">
                <div class="row justify-content-center my-3">
                    <div class="col-lg-4">
                        <div class="member-search">
                            <div class="search-body">
                                <h1>Member Type</h1>
                                <div class="selectBox">
                                    <select name="member_type" class="memberTypeSelect" required>
                                        <option value="">Select Member Type</option>
                                        <option value="1" {{ (old('member_type') == 1 || request()->input('member_type') == 1) ? 'selected' : '' }}>Founding Member</option>
                                        <option value="2" {{ (old('member_type') == 2 || request()->input('member_type') == 2) ? 'selected' : '' }}>Life Member</option>
                                        <option value="3" {{ (old('member_type') == 3 || request()->input('member_type') == 3) ? 'selected' : '' }}>Permanent Member</option>
                                        <option value="4" {{ (old('member_type') == 4 || request()->input('member_type') == 4) ? 'selected' : '' }}>Donor Member</option>
                                        <option value="5" {{ (old('member_type') == 5 || request()->input('member_type') == 5) ? 'selected' : '' }}>Service Member</option>
                                        <option value="6" {{ (old('member_type') == 6 || request()->input('member_type') == 6) ? 'selected' : '' }}>Temporary Member</option>
                                        <option value="7" {{ (old('member_type') == 7 || request()->input('member_type') == 7) ? 'selected' : '' }}>Honorary Member</option>
                                        <option value="8" {{ (old('member_type') == 8 || request()->input('member_type') == 8) ? 'selected' : '' }}>Corporate Member</option>
                                        <option value="9" {{ (old('member_type') == 9 || request()->input('member_type') == 9) ? 'selected' : '' }}>Diplomate Member</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="member-search">
                            <div class="search-body">
                                <h1>Member Search</h1>
                                <div class="searchBox">
                                    <input type="text" value="{{ request()->input('search', '') }}" name="search" placeholder="Membership code/name">
                                    <button type="submit">
                                        <span class="bi bi-search"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="row justify-content-center mt-5">
                @php $mt=array("","Founding Member","Life Member","Permanent Member","Donor Member","Service Member","Temporary Member","Honorary Member","Corporate Member","Diplomate Member"); @endphp
                @php $st=array("","Active","Inactive","Terminated"); @endphp
                @if ($members)
                <div class="col-lg-6">
                    <div class="card company-info shadow-sm mb-3">
                        <div class="card-header">
                            <h5>Member Information</h5>
                        </div>
                        <div class="card-body" style="min-height:290px;">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th width="30%">Name</th>
                                    <td width="1">:</td>
                                    <td width="68">{{$members->member->full_name}}</td>
                                </tr>
                                <tr>
                                    <th width="37%">Member Type</th>
                                    <td width="2">:</td>
                                    <td width="61">{{$mt[$members->member_type]}}</td>
                                </tr>
                                <tr>
                                    <th width="37%">Membership Code</th>
                                    <td width="2">:</td>
                                    <td width="61">{{$members->member->membership_no}}</td>
                                </tr>
                                <tr>
                                    <th width="37%">Email</th>
                                    <td width="2">:</td>
                                    <td width="61">{{$members->member->email}}</td>
                                </tr>
                                <tr>
                                    <th width="37%">Contact</th>
                                    <td width="2">:</td>
                                    <td width="61">{{$members->member->cell_number}}</td>
                                </tr>
                                <tr>
                                    <th width="37%">Address</th>
                                    <td width="2">:</td>
                                    <td width="61">{{$members->member->present_address}}</td>
                                </tr>
                                <tr>
                                    <th width="37%">Status</th>
                                    <td width="2">:</td>
                                    <td width="61">{{$st[$members->status]}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card company-info shadow-sm mb-3">
                        <div class="card-header" >
                            <h5>Total Dues</h5>
                        </div>
                        <div class="card-body" style="min-height:290px;">
                            <table class="table table-sm table-borderless">
                                @if ($members->y2016 != null)
                                <tr>
                                    <th width="40">2016</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2016}}</td>
                                </tr>
                                @else
                                @endif

                                @if ($members->y2017 != null)
                                <tr>
                                    <th width="40">2017</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2017}}</td>
                                </tr>
                                @else
                                @endif

                                @if ($members->y2018 != null)
                                <tr>
                                    <th width="40">2018</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2018}}</td>
                                </tr>
                                @else
                                @endif

                                @if ($members->y2019 != null)
                                <tr>
                                    <th width="40">2019</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2019}}</td>
                                </tr>
                                @else
                                @endif
                                
                                @if ($members->y2020 != null)
                                <tr>
                                    <th width="40">2020</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2020}}</td>
                                </tr>
                                @else
                                @endif

                                @if ($members->y2021 != null)
                                <tr>
                                    <th width="40">2021</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2021}}</td>
                                </tr>
                                @endif

                                @if ($members->y2022 != null)
                                <tr>
                                    <th width="40">2022</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2022}}</td>
                                </tr>
                                @endif

                                @if ($members->y2023 != null)
                                <tr>
                                    <th width="40">2023</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2023}}</td>
                                </tr>
                                @endif

                                @if ($members->y2024 != null)
                                <tr>
                                    <th width="40">2024</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->y2024}}</td>
                                </tr>
                                @endif

                                @if ($members->subscription_interest != null)
                                <tr>
                                    <th width="40">10% interest in subscription</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->subscription_interest}}</td>
                                </tr>
                                @else
                                @endif
                                
                                @if ($members->land_developmnet_fee != null)
                                <tr>
                                    <th width="40">Land Development Fee Dues</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->land_developmnet_fee}}</td>
                                </tr>
                                @else
                                @endif

                                @if ($members->land_interest != null)
                                <tr>
                                    <th width="40">10% Interest in Subscription & Land Fee</th>
                                    <td width="2">:</td>
                                    <td width="58">{{$members->land_interest}}</td>
                                </tr>
                                @else
                                @endif

                                <tr>
                                    <th width="40" colspan="3"><hr></th>
                                </tr>
                                <tr>
                                    <th width="40">Total Dues</th>
                                    <td width="2">:</td>
                                    <td width="58">{{ ($members->y2016 +$members->y2017 + $members->y2018 + $members->y2019 + $members->y2020 +$members->y2021+$members->y2022+$members->y2023+$members->y2024 + $members->subscription_interest + $members->land_interest+ $members->land_developmnet_fee) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @else
                    <div class="text-center mt-4">
                        <h4>No Data Found</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection