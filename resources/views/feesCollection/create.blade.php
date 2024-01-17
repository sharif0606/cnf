@extends('layout.app')
@section('pageTitle',trans('Create Fees Collection'))
@section('pageSubTitle',trans('Create'))

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.feeCollection.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <h6>Fees Collection</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th>Date</th>
                                                <td><input required type="text" id="toDayDate" class="form-control" name="voucher_date" value="{{old('voucher_date')}}" placeholder="dd-mm-yyyy"></td>
                                            </tr>
                                            <tr>
                                                <th>Member ID</th>
                                                <td><input type="text" id="member_serial_no" class="form-control" name="">
                                                    <input type="hidden" id="memberId" class="form-control" name="member_id"></td>
                                            </tr>
                                            <tr>
                                                <th>National ID</th>
                                                <td><input type="text" class="form-control" name="nid" value=""></td>
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
                                        <h6>Fees Table</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($fees as $f)
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="code[]" value="{{$f->code}}" readonly>
                                                            <input type="hidden" name="fee_id[]" value="{{$f->id}}">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="fee_name[]" value="{{$f->name}}" readonly></td>
                                                        <td><input type="text" class="form-control fee_amount" name="amount[]"></td>
                                                        <td><button type="button" class="btn btn-sm btn-danger remove-row">Remove</button></td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4">No Data Found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr class="text-center">
                                                    <th colspan="2">Total Fees</th>
                                                    <td colspan="2"><input type="text" class="form-control" name="total_fees"></td>
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
$(document).ready(function() {
    $('#member_serial_no').keyup(function() {
        var member_serial_no = $(this).val();
        if (memberId !== '') {
            $.ajax({
                url: '{{route(currentUser().'.getMember')}}',
                type: 'GET',
                data: {
                    member_serial_no: member_serial_no
                },
                dataType: 'json',
                success: function(response) {
                    var member = response.member;
                    // Fill the input fields with the received data
                    $('input[name="member_id"]').val(member.id);
                    $('input[name="nid"]').val(member.nid);
                    $('input[name="member_name"]').val(member.name_bn);
                },
                error: function(xhr, status, error) {
                    console.log(error); // Handle the error if needed
                }
            });
        } else {
            // Clear the input fields if the memberId is empty
            $('input[name="nid"]').val('');
            $('input[name="member_name"]').val('');
        }
    });
});

</script>
<script>
    $(document).ready(function() {
        function calculateTotalFees() {
            var totalFees = 0;
            // Loop through each fee amount input field
            $('.fee_amount').each(function() {
                var amountValue = parseFloat($(this).val()) || 0;
                totalFees += amountValue;
            });
            // Update the total fees input field
            $('[name="total_fees"]').val(totalFees);
        }
        calculateTotalFees();

        // Call the function whenever a fee amount input changes
        $('.fee_amount').on('input', function() {
            calculateTotalFees();
        });
        // Handle click event for "Remove" button
        $(document).on('click', '.remove-row', function() {
            // Remove the entire table row (tr) when the button is clicked
            $(this).closest('tr').remove();
            // Recalculate the total fees
            calculateTotalFees();
        });
    });
</script>

@endpush

