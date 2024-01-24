@extends('layout.app')
@section('pageTitle',trans('Applied Member List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <div>
                    <a class="float-end" href="{{route(currentUser().'.ourMember.create')}}" style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                </div>
                <div class="row pb-1">
                    <div class="col-12">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-sm-2">
                                    <input type="text" name="member_serial_no" value="{{isset($_GET['member_serial_no'])?$_GET['member_serial_no']:''}}" placeholder="Member ID Old" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="member_serial_no_new" value="{{isset($_GET['member_serial_no_new'])?$_GET['member_serial_no_new']:''}}" placeholder="Member ID New" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="name_bn" value="{{isset($_GET['name_bn'])?$_GET['name_bn']:''}}" placeholder="Member Name" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="nid" value="{{isset($_GET['nid'])?$_GET['nid']:''}}" placeholder="NID" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="license" value="{{isset($_GET['license'])?$_GET['license']:''}}" placeholder="license" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-info" type="submit">Search</button>
                                    <a class="btn btn-sm btn-warning" href="{{route(currentUser().'.ourMember.index')}}">Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('ক্রমিক নং')}}</th>
                                <th scope="col">{{__('নাম')}}</th>
                                <th scope="col">{{__('সিরিয়াল পুরাতন/নতুন')}}</th>
                                <th scope="col">{{__('আর এস')}}</th>
                                <th scope="col">{{__('পিতার নাম')}}</th>
                                <th scope="col">{{__('মাতার নাম')}}</th>
                                <th scope="col">{{__('মোবাইল (নিজস্ব)')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ourmember as $key=>$p)
                            <tr>
                                <th scope="row">{{ $ourmember->firstItem() + $key }}</th>
                                <td>{{$p->name_bn}}</td>
                                <td>{{$p->member_serial_no}}/{{$p->member_serial_no_new}}</td>
                                <td>
                                    @if ($p->renew_serial_no != '')
                                        {{$p->renew_serial_no}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{$p->father_name}}</td>
                                <td>{{$p->mother_name}}</td>
                                <td>{{$p->personal_phone}}</td>
                                <td class="white-space-nowrap">
                                   
                                    <a href="{{route(currentUser().'.ourMember.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a> &nbsp;
                                    <a class="text-danger" href="{{route(currentUser().'.ourMember.show',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                    </a>&nbsp;
                                    {{-- <a class="text-danger" href="#">
                                        <i class="bi bi-currency-dollar"></i>
                                    </a>&nbsp; --}}
                                    <button class="btn p-0 m-0" type="button" style="background-color: none; border:none;"
                                        data-bs-toggle="modal" data-bs-target="#balance"
                                        data-member-id="{{$p->id}}"
                                        data-member-old="{{$p->member_serial_no}}"
                                        data-member-new="{{$p->member_serial_no_new}}"
                                        data-trans_history="{{route(currentUser().'.trans_history',$p->id)}}"
                                        data-name="{{$p->name_bn}}"
                                        data-fee="{{ money_format($p->fee_amount?->sum('total_amount'))}}"
                                        data-fee-latest="{{money_format($p->fee_collection_last?->total_amount)}}"
                                        data-fee-latest-year="{{$p->fee_collection_last?->year}}"
                                        <span class="text-danger"><i class="bi bi-currency-dollar" style="font-size:1rem; color:rgb(246, 50, 35);"></i></span>
                                    </button>
                                    @if($p->renew_serial_no != '')
                                        @if(currentUser()=="generalsecretary" || currentUser()=="chairman")
                                        <a class="btn btn-sm btn-success" href="{{route(currentUser().'.to_approve_member',encryptor('encrypt',$p->id))}}">
                                            approval
                                        </a>&nbsp;
                                        @endif
                                    @endif
                                    <!-- <a class="text-danger" href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" onsubmit="return confirm('Are you sure?')" action="{{route(currentUser().'.ourMember.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form> -->
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="7" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {!! $ourmember->withQueryString()->links()!!}
                    </div>
                    <div class="modal fade" id="balance" tabindex="-1" role="dialog"
                        aria-labelledby="balanceTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header py-1">
                                    <h5 class="modal-title" id="batchTitle">Payment History</h5>
                                    <button type="button" class="close text-danger" data-bs-dismiss="modal"  aria-label="Close">
                                        <i class="bi bi-x-lg" style="font-size: 1.5rem;"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr class="bg-light">
                                                <th>নাম</th>
                                                <td id="memberName"></td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>সিরিয়াল পুরাতন/নতুন</th>
                                                <td id="memberSerial"></td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>মোট পেমেন্ট</th>
                                                <td id="totalAmount"></td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>সর্বশেষ পেমেন্ট</th>
                                                <td id="lastPaid"></td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>সর্বশেষ পেমেন্ট সাল</th>
                                                <td id="lastPayYear"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-info" id="moreDetailsLink" href="{{route(currentUser().'.trans_history_all')}}" >More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#balance').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var memberId = button.data('member-id');
            var memberSlOld = button.data('member-old');
            var memberSlNew = button.data('member-new');
            var name = button.data('name');
            var totalPaidAmount = button.data('fee');
            var lastPaidAmount = button.data('fee-latest');
            var lastPaidYear = button.data('fee-latest-year');
            // Set the values in the modal
            var modal = $(this);
            modal.find('#memberSerial').text(memberSlOld + '/' + memberSlNew);
            modal.find('#memberName').text(name);
            modal.find('#totalAmount').text(totalPaidAmount);
            modal.find('#lastPaid').text(lastPaidAmount);
            modal.find('#lastPayYear').text(lastPaidYear);

            //var moreDetailsLink = modal.find('#moreDetailsLink');
            //var newHref = button.data('trans_history');
            //moreDetailsLink.attr('href', newHref);
        });
    });
</script>
@endpush