@extends('layout.app')
@section('pageTitle',trans('Add Founding Executive Committee'))
@section('pageSubTitle',trans('add'))

@section('content')
<div class="row m-3">
    <div class="col-lg-4 offset-lg-4 col-sm-12 text-center mb-4">
        <h4 class="p-2 text-uppercase bg-danger text-white">Add Founding Executive</h4>
    </div>
    <div class="col-lg-8 offset-lg-2 col-sm-12 ">
        <input type="text" name="" id="item_search" class="form-control  ui-autocomplete-input" placeholder="Search by name or id" style="border-color: red;">
    </div>
</div>
<div class="row m-3">
    <div class="col-lg-12 col-sm-12 col-md-12 tbl-scroll">
        <form method="post" action="{{route(currentUser().'.foundCommittee.store')}}">
            @csrf
            <table class="table mb-5">
                <thead>
                    <tr class="bg-primary text-white text-center">
                        <th class="p-2">Member Name</th>
                        <th class="p-2">Member ID</th>
                        <th class="p-2">Contact</th>
                        <th class="p-2">Action</th>
                    </tr>
                </thead>
                <tbody id="details_data">
    
                </tbody>
            </table>
            <div class="col-2 offset-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-block btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>


<script>
    $(function() {
    $("#item_search").bind("paste", function(e){
        $("#item_search").autocomplete('search');
    } );
    $("#item_search").autocomplete({
        source: function(data, cb){
            
            $.ajax({
            autoFocus:true,
                url: "{{route(currentUser().'.member_search')}}",
                method: 'GET',
                dataType: 'json',
                data: {
                    name: data.term
                },
                success: function(res){
                console.log(res);
                    var result;
                    result = [{label: 'No Records Found ',value: ''}];
                    if (res.length) {
                        result = $.map(res, function(el){
                            return {
                                label: el.value1 +' '+ el.value2 +'['+ el.label+']',
                                value: '',
                                id: el.id,
                                item_name: el.value
                            };
                        });
                    }

                    cb(result);
                },error: function(e){
                    console.log("error "+e);
                }
            });
        },

            response:function(e,ui){
            if(ui.content.length==1){
                $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
                $(this).autocomplete("close");
            }
            //console.log(ui.content[0].id);
            },

            //loader start
            search: function (e, ui) {
            },
            select: function (e, ui) { 
                if(typeof ui.content!='undefined'){
                console.log("Autoselected first");
                if(isNaN(ui.content[0].id)){
                    return;
                }
                var item_id=ui.content[0].id;
                }
                else{
                console.log("manual Selected");
                var item_id=ui.item.id;
                }

                return_row_with_data(item_id);
                $("#item_search").val('');
            },   
            //loader end
    });
});
function return_row_with_data(item_id){
  $("#item_search").addClass('ui-autocomplete-loader-center');
    $.ajax({
            autoFocus:true,
                url: "{{route(currentUser().'.member_search_data')}}",
                method: 'GET',
                dataType: 'json',
                data: {
                    item_id: item_id
                },
                success: function(res){
                    $('#details_data').append(res);
                    $("#item_search").val('');
                    $("#item_search").removeClass('ui-autocomplete-loader-center');
                },error: function(e){
                    console.log("error "+e);
                }
            });
	
}
//INCREMENT ITEM
function removerow(e){
  $(e).parents('tr').remove();
}
</script>
@endpush