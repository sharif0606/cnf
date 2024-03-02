@extends('layout.app')
@section('pageTitle',trans('Create Others Collection'))
@section('pageSubTitle',trans('Create'))

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route(currentUser().'.othersPay.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <h6>Others Collection</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th>Date</th>
                                                <td><input required type="text" id="toDayDate" class="form-control" name="voucher_date" value="{{old('voucher_date')}}" placeholder="dd-mm-yyyy"></td>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <td><input type="text" class="form-control" name="member_name" value=""></td>
                                            </tr>
                                            <tr>
                                                <th>Receipt No</th>
                                                <td><input type="text" required class="form-control" name="receipt_no" value="{{old('receipt_no')}}"></td>
                                            </tr>
                                            <tr>
                                                <th>Year</th>
                                                <td><input type="text" required class="form-control" name="year" value="{{old('year')}}"></td>
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
                                                <tr>
                                                    <td><input type="text" class="form-control" name="code[]" value=""></td>
                                                    <td><input type="text" class="form-control" name="fee_name[]" value=""></td>
                                                    <td><input type="number" step="any" class="form-control fee_amount" onkeyup="payment(this)" name="amount[]"></td>
                                                    <td class="text-primary text-center" onClick='addPaymentRow();' style="width: 3%;"><i style="font-size: 1.5rem;" class="bi bi-plus-square-fill"></i></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="text-center">
                                                    <th colspan="2">Total Amount</th>
                                                    <td colspan="2"><input type="text" class="form-control totalAmount" name="total_fees" readonly></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
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
    $(function() {
      $("#toDayDate").datepicker({
        dateFormat: "dd-mm-yy",
        onSelect: function(dateText, inst) {
        }
      });

      $("#toDayDate").datepicker("setDate", new Date());
    });
</script>
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
            <td><input type="number" step="any" class="form-control fee_amount" onkeyup="payment(this)" name="amount[]"></td>
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

