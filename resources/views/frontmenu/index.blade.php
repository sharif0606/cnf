@extends('layout.app')
@section('pageTitle',trans('Frontend Menu List'))
@section('pageSubTitle',trans('List'))
@push('styles')

<link href="{{ asset('assets/ddmenu/css/style.css') }}" rel="stylesheet" type="text/css" />
<style>
    .insertion_div{
        display: none;
    }
</style>
@endpush
@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">

            <div class="card">
                
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif


                <?php
                    $menu_lnk=array(
                                'Home'					=>'/',
                                'Blank'					=>'#',
                                'Member Login' 		    =>'mlogin',
                                'Become a Member' 		=>'memberRegister',
                                'Founding Committee' 	=>'founding-member',
                                'Executive Committee' 	=>'executive-session-member',
                                'Notice' 		        =>'all-notice',
                                'News & Events' 		=>'news-events',
                                'Member List' 		    =>'memberlist',
                                'Photo Gallery' 		=>'photo_gallery',
                                'Video Gallery' 		=>'video_gallery',
                                'Club Dues' 		    =>'club-dues',
                                'Contact Us' 			=>'contact_us'
                                );
                ?>


                <!-- table bordered -->
                <div class="widget-content padding">
                    <div class="row">				
                        <div class="col-md-6">
                            <div class="widget" style="min-height:500px;">
                                <div class="widget-content padding">
                                    <div class="widget-content padding">
                                        <a class="btn btn-info" href="javascript:void(0);" onclick=" $('.reset').click(); $('.insertion_div').toggle();$('[name=id]').val(0);">
                                            <i class="fa fa-plus" aria-hidden="true"></i>Add New Menu
                                        </a><hr/>
                                        <div class="insertion_div">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item"><a class="nav-link link active"data-bs-toggle="tab" href="#link">From List</a></li>
                                                <li class="nav-item"><a class="nav-link page" data-bs-toggle="tab" href="#page">From Page</a></li>
                                            </ul>
                                            <div class="tab-content pt-3">
                                                <div id="link" class="tab-pane container active">
                                                    <form class="menu_form" action="{{route(currentUser().'.front_menu.save')}}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Menu Name</label>
                                                            <input type="text" class="form-control" name="name" required>
                                                            <input type="hidden" name="id" value="0">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Menu Link</label>
                                                            <select class="form-control" name="href">
                                                                <option value=''>Select Menu</option>
                                                                <?php if($menu_lnk){
                                                                        foreach($menu_lnk as $k=>$v){ ?>
                                                                        <option value="<?= $v ?>"><?= $k ?></option>
                                                                <?php } } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-label-left">Save</button>
                                                            <button type="reset" class="reset btn btn-warning">Reset</button>
                                                            <button type="button" class="btn btn-danger pull-right" onclick="$('.insertion_div').hide();">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="page" class="tab-pane container fade">
                                                    <form class="menu_form" action="{{route(currentUser().'.front_menu.save')}}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Menu Name</label>
                                                            <input type="text" class="form-control" name="name" required>
                                                            <input type="hidden" name="id" value="0">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Menu Link</label>
                                                            <select class="form-control" name="href">
                                                                <option value=''>Select Page</option>
                                                                <?php if($pages){
                                                                        foreach($pages as $mp){ ?>
                                                                        <option value="page/<?= $mp['page_slug'] ?>"><?= $mp['page_title'] ?></option>
                                                                <?php } } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-label-left">Save</button>
                                                            <button type="reset" class="reset btn btn-warning">Reset</button>
                                                            <button type="button" class="btn btn-danger pull-right" onclick="$('.insertion_div').hide();">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-content">
                                        <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="90%">
                                            <thead>
                                                <tr>
                                                    <th>#SL</th>
                                                    <th>Menu Name</th>
                                                    <th>Menu Link</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($menus as $nl){ ?>
                                                <tr>
                                                    <td><?= $i;?></td>
                                                    <td><?= $nl['name'];?></td>
                                                    <td><?= $nl['href'];?></td>
                                                    <td>
                                                        <?php if($nl['status']==1){ ?>
                                                            <a href="#" onclick="return confirm('Do you want to inactive this menu')" class="label label-success">Active</a>
                                                        <?php } else { ?>
                                                            <a href="#" onclick="return confirm('Do you want to active this menu')" class="label label-danger">Inactive</a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </a>&nbsp;
                                                        <button class="btn btn-link btn-sm" type="button" onclick="edit('{{$nl->id}}','<?= explode('/',$nl->href)[0];?>')">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button> &nbsp;
                                                        <a href="{{route(currentUser().'.front_menu.detroy',$nl->id)}}" onclick="return confirm('Are you sure to delete this?')">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">		
                                <?php
            
                                /* Function menu_showNested
                                * @desc Create inifinity loop for nested list from database
                                * @return echo string
                                */
                                function menu_showNested($parentID) {
                                    $sql = "SELECT * FROM front_menus WHERE parent_id='$parentID' and status='1' ORDER BY rang";
                                    $rowsm = DB::select($sql);
                                    if ($rowsm) {
                                        echo "\n";
                                        echo "<ol class='dd-list'>\n";
                                            foreach($rowsm as $i=>$row) {
                                                echo "\n";
                                                
                                                echo "<li class='dd-item' data-id='{$row->id}'>\n";
                                                    echo "<div class='dd-handle'>".++$i.": {$row->name}</div>\n";
                                                
                                                    // Run this function again (it would stop running when the mysql_num_result is 0
                                                    menu_showNested($row->id);
                                                
                                                echo "</li>\n";
                                            }
                                        echo "</ol>\n";
                                    }
                                }
                                
                                
                                
                                
                                ## Show the top parent elements from DB
                                ######################################
                                $sql = "SELECT * FROM front_menus WHERE parent_id='0' and status='1' ORDER BY rang";
                                $rows = DB::select($sql);
                                
                                echo "<div class='cf nestable-lists'>\n";
                                    echo "<div class='dd' id='nestableMenu'>\n\n";
                                        echo "<ol class='dd-list'>\n";
                                        
                                            foreach($rows as $i=>$row) {
                                                
                                                echo "\n";
                                                
                                                echo "<li class='dd-item' data-id='{$row->id}'>";
                                                    echo "<div class='dd-handle'>".++$i.": {$row->name}</div>";
                                                
                                                
                                                menu_showNested($row->id);
                                                
                                                echo "</li>\n";
                                            }
                                            
                                        echo "</ol>\n\n";
                                    echo "</div>\n";
                                echo "</div>\n\n";
                                
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bordered table end -->


@endsection

@push('scripts')
<script src="{{ asset('assets/ddmenu/js/jquery.nestable.js') }}"></script>
<script type="text/javascript">

	window.onload=function(){
		
		/* The output is ment to update the nestableMenu-output textarea
		 * So this could probably be rewritten a bit to only run the menu_updatesort function onchange
		*/
		var updateOutput = function(e)
		{
			var list   = e.length ? e : $(e.target),
				output = list.data('output');
			if (window.JSON) {
				output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
				var jsonstring=window.JSON.stringify(list.nestable('serialize'));
				
				$.get("{{route(currentUser().'.front_menu.mss')}}",{ jsonstring:jsonstring },function(data, status){ /*document.getElementById('ss').innerHTML=data;*/ });
	
				
				 //$.get(baseUrl+"web_conf/menu/mss/"+jsonstring, function(data){ alert(data);   });
				
			} else {
				output.val('JSON browser support required for this demo.');
			}
		};
		
		// activate Nestable for list menu
		$('#nestableMenu').nestable({
			group: 1
		})
		.on('change', updateOutput);

		
		
		// output initial serialised data
		updateOutput($('#nestableMenu').data('output', $('#nestableMenu-output')));

		$('#nestable-menu').on('click', function(e)
		{
			var target = $(e.target),
				action = target.data('action');
			if (action === 'expand-all') {
				$('.dd').nestable('expandAll');
			}
			if (action === 'collapse-all') {
				$('.dd').nestable('collapseAll');
			}
		});

		$('#nestable3').nestable();

	}
	
	function edit(ids,ohref){
		$('.insertion_div').show();
		var menu=<?= json_encode($menus); ?>;
		for(i=0; i < menu.length;i++){
			if(ids==menu[i].id){
				var id=menu[i].id;
				var name=menu[i].name;
				var href=menu[i].href;
			}
		}
		
        if(ohref=='page'){
            $('[href="#page"]').tab('show');
			$('#page [name=id]').val(id);
			$('#page [name=name]').val(name);
			$('#page [name=href]').val(href);
		}
		else{
            $('[href="#link"]').tab('show');
			$('#link [name=id]').val(id);
			$('#link [name=name]').val(name);
			$('#link [name=href]').val(href);
		}
		
	}
	</script>
@endpush