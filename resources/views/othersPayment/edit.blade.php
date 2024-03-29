@extends('layout.app')
@section('pageTitle',trans('Update Others Collection'))
@section('pageSubTitle',trans('Update'))

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.othersPay.update',encryptor('encrypt',$otherCollection->id))}}">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <h6>Others Collection</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th>Voucher No</th>
                                                <td><input type="text" class="form-control" name="voucher_no" value="{{old('voucher_no',$otherCollection->vhoucher_no)}}" disabled></td>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <td><input type="text" class="form-control datepicker" required name="voucher_date" value="{{ old('voucher_date', \Carbon\Carbon::parse($otherCollection->date)->format('d-m-Y') ) }}" placeholder="dd-mm-yyyy"></td>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <td><input type="text" class="form-control" name="member_name" value="{{$otherCollection->name}}" required></td>
                                            </tr>
                                            <tr>
                                                <th>Receipt No</th>
                                                <td><input type="text" class="form-control" required name="receipt_no" value="{{old('receipt_no',$otherCollection->receipt_no)}}"></td>
                                            </tr>
                                            <tr>
                                                <th>Year</th>
                                                {{-- <td><input type="text" class="form-control" required name="year" value="{{old('year',$otherCollection->year)}}"></td> --}}
                                                <td>
                                                    <table width= 100%>
                                                        <tr>
                                                            <td>
                                                                <select id="month" name="month" class="form-control">
                                                                    <option value="">Select Month</option>
                                                                    <option value="01" {{ old('month',$otherCollection->month)== '01' ? 'selected':''}}>January</option>
                                                                    <option value="02" {{ old('month',$otherCollection->month)== '02' ? 'selected':''}}>February</option>
                                                                    <option value="03" {{ old('month',$otherCollection->month)== '03' ? 'selected':''}}>March</option>
                                                                    <option value="04" {{ old('month',$otherCollection->month)== '04' ? 'selected':''}}>April</option>
                                                                    <option value="05" {{ old('month',$otherCollection->month)== '05' ? 'selected':''}}>May</option>
                                                                    <option value="06" {{ old('month',$otherCollection->month)== '06' ? 'selected':''}}>June</option>
                                                                    <option value="07" {{ old('month',$otherCollection->month)== '07' ? 'selected':''}}>July</option>
                                                                    <option value="08" {{ old('month',$otherCollection->month)== '08' ? 'selected':''}}>August</option>
                                                                    <option value="09" {{ old('month',$otherCollection->month)== '09' ? 'selected':''}}>September</option>
                                                                    <option value="10" {{ old('month',$otherCollection->month)== '10' ? 'selected':''}}>October</option>
                                                                    <option value="11" {{ old('month',$otherCollection->month)== '11' ? 'selected':''}}>November</option>
                                                                    <option value="12" {{ old('month',$otherCollection->month)== '12' ? 'selected':''}}>December</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select id="year" name="year" class="form-control">
                                                                    <option value="">Select Year</option>
                                                                    @for($i=2021; $i<= date('Y')+10; $i++)
                                                                        <option value="{{$i}}" {{ old('year',$otherCollection->year)== $i ? 'selected':''}}>{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="text-center">
                                        <h6>Collection Details</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th>Code</th>
                                                    <th>Pay Purpose</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="payment">
                                                @forelse ($collectionDetail as $f)
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="code[]" value="{{$f->code}}"></td>
                                                        <td><input type="text" class="form-control" name="fee_name[]" value="{{$f->name}}"></td>
                                                        <td><input type="number" step="any" class="form-control fee_amount" onkeyup="payment(this)" name="amount[]" value="{{$f->amount}}" required></td>
                                                        <td class="text-center fs-4" style="width: 3%;">
                                                            <span class="text-danger" onClick='RemoveRow(this);'><i class="bi bi-trash"></i></span>
                                                            <span class="text-primary" onClick='addPaymentRow();'><i class="bi bi-plus-square-fill"></i></span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4">No Data Found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr class="text-center">
                                                    <th colspan="2">Total Amount</th>
                                                    <td colspan="2"><input type="text" class="form-control totalAmount" name="total_fees" value="{{$otherCollection->total_amount}}" readonly></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info me-1 mb-1">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    function payment(e) {
        var totalFees = 0;
        $('.fee_amount').each(function() {
            totalFees += parseFloat($(this).val()) || 0;
        });

        $(".totalAmount").val(totalFees.toFixed(2));
    }

    function addPaymentRow(){
        var row=`<tr>
            <td><input type="text" class="form-control" name="code[]" value=""></td>
            <td><input type="text" class="form-control" name="fee_name[]" value=""></td>
            <td><input type="number" step="any" class="form-control fee_amount" onkeyup="payment(this)" name="amount[]" required></td>
            <td class="text-danger text-center" onClick='RemoveRow(this);' style="width: 3%;">
                <i style="font-size: 1.5rem;" class="bi bi-trash"></i>
            </td>
            
        </tr>`;
        $('#payment').append(row);
    }

    function RemoveRow(e) {
        if (confirm("Are you sure you want to remove this row?")) {
            $(e).closest('tr').remove();
            payment();
        }
    }
</script>

@endpush

