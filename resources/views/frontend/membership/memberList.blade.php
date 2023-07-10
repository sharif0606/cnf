@extends('frontend.app')
@section('content')
<section class="about-support">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-0">Member List</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('front')}}" class="breadcrumb-item router-link-active">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">member list</a>
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
                            <h1>Member Search</h1>
                            <form action="" method="get">
                                <div class="searchBox">
                                    <input type="text" value="{{ request()->input('name', '') }}"  name="name" id="search" placeholder="Company Name">
                                    <button type="submit">
                                        <span class="bi bi-search"></span>
                                    </button>
                                </div>
                            </form>
                            <div class="search-menu">
                                <ul class="nav flex-row justify-content-between">
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'A']) }}" class="char"><span>A</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'B']) }}" class="char"><span>B</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'C']) }}" class="char"><span>C</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'D']) }}" class="char"><span>D</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'E']) }}" class="char"><span>E</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'F']) }}" class="char"><span>F</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'G']) }}" class="char"><span>G</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'H']) }}" class="char"><span>H</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'I']) }}" class="char"><span>I</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'J']) }}" class="char"><span>J</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'K']) }}" class="char"><span>K</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'L']) }}" class="char"><span>L</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'M']) }}" class="char"><span>M</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'N']) }}" class="char"><span>N</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'O']) }}" class="char"><span>O</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'P']) }}" class="char"><span>P</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'Q']) }}" class="char"><span>Q</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'R']) }}" class="char"><span>R</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'S']) }}" class="char"><span>S</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'T']) }}" class="char"><span>T</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'U']) }}" class="char"><span>U</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'V']) }}" class="char"><span>V</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'W']) }}" class="char"><span>W</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'X']) }}" class="char"><span>X</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'Y']) }}" class="char"><span>Y</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('searchByLetter', ['letter' => 'Z']) }}" class="char"><span>Z</span></a>
                                    </li>
                                </ul>
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
                                <div class="form-group p-1">
                                    <label for="all_member"><input type="radio" id="all_member" name="member_type" value="" {{ request('member_type') === '' ? 'checked' : '' }}> All</label>
                                    <label for="donor_member"><input type="radio" id="donor_member" name="member_type" value="1" {{ request('member_type') == '1' ? 'checked' : '' }}> Donor Member</label>
                                    <label for="life_member"><input type="radio" id="life_member" name="member_type" value="2" {{ request('member_type') == '2' ? 'checked' : '' }}> Life Member</label>
                                    <label for="service_member"><input type="radio" id="service_member" name="member_type" value="3" {{ request('member_type') == '3' ? 'checked' : '' }}> Service Member</label>
                                    <label for="temp_member"><input type="radio" id="temp_member" name="member_type" value="4" {{ request('member_type') == '4' ? 'checked' : '' }}> Temporary Member</label>
                                    <label for="pm_member"><input type="radio" id="pm_member" name="member_type" value="5" {{ request('member_type') == '5' ? 'checked' : '' }}> Permanent Member</label>
                                    <label for="honor_member"><input type="radio" id="honor_member" name="member_type" value="6" {{ request('member_type') == '6' ? 'checked' : '' }}> Honorary Member</label>
                                    <label for="corporate_member"><input type="radio" id="corporate_member" name="member_type" value="7" {{ request('member_type') == '7' ? 'checked' : '' }}> Corporate Member</label>
                                    <label for="diplomate_member"><input type="radio" id="diplomate_member" name="member_type" value="8" {{ request('member_type') == '8' ? 'checked' : '' }}> Diplomate Member</label>
                                </div>
                                <div class="form-group col-lg-5 p-1">
                                    <label for="" class="mb-0">Membership ID</label>
                                    <input type="text" name="member_id" id="" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group col-lg-5 p-1">
                                    <label for="" class="mb-0">Rep. Name</label>
                                    <input type="text" name="member_name" id="" class="form-control form-control-sm shadow-none">
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
                            <div class="col-lg-2 align-self-center text-center">
                                <img src="{{asset('uploads/member_image/thumb/'.$m->image)}}" alt="No Image" width="100px">
                            </div>
                            <div class="col-lg-2 text-center border-end ps-0 pe-0">
                                <h1> {{$m->full_name}}</h1>
                                <h5>
                                    @if ($m->membership_applied == 1){{'Donor Member'}}
                                    @elseif($m->membership_applied == 2){{'Life Member'}}
                                    @elseif($m->membership_applied == 3){{'Service Member'}}
                                    @elseif($m->membership_applied == 4){{'Temporary Member'}}
                                    @elseif($m->membership_applied == 5){{'Permanent Member'}}
                                    @elseif($m->membership_applied == 6){{'Honorary Member'}}
                                    @elseif($m->membership_applied == 7){{'Corporate Member'}}
                                    @elseif($m->membership_applied == 8){{'Diplomate Member'}}
                                    @endif
                                </h5>
                                @if($m->attach_pdf)
                                {{-- <a href="{{asset('uploads/company_pdf/'.$m->attach_pdf)}}" target="_blank" class="btn-custom text-danger">[PDF Profile]</a> --}}
                                @else
                                {{-- <a href="#" onclick="alert('Sorry!! profile has not uploaded yet')" class="btn-custom text-danger">[PDF Profile]</a> --}}
                                @endif
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <h4><a href="#">{{$m->company}}</a></h4>
                                <p>{{$m->designation}}</p>
                            </div>
                            {{-- <div class="col-lg-2 align-self-center text-center">
                                <a href="#" class="btn btn-sm btn-outline-explore">More Details</a>
                            </div> --}}
                        </div>
                        @empty
                        <div class="search-list-item row ">
                            <div class="text-center">No Data Found</div>
                        </div>
                        @endforelse
                        <div class="d-flex justify-content-end mt-2">
                            {!! $member->links()!!}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('input[type=radio][name=member_type]').change(function() {
            var value = $(this).val();
            var url = "{{ route('member.list') }}" + "?member_type=" + value;
            window.location.href = url;
        });
    });
</script>
@endpush