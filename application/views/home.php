<style>
.edit{width: 22px;cursor:pointer;}
</style>
<script>

//編輯此筆
function editFormatter(value, row, index) {
    return [        
//	<a data-toggle="modal"><button id="new" type="button" class="btn btn-primary">新增</button></a>
        '<a  href="#editModal" data-toggle="modal" class="edits ml10" href="javascript:void(0)" title="編輯">',
			'<img class="edit" src="'+base_url+'public/img/edit-icon.png'+'">',
        '</a>'
    ].join('');
}
function statusFormatter(value, row, index) {
    return [  '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>',
			'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' ].join('');
}
</script>
<div class="bs-docs-grid">
    <div id="toolbar">
    	<a href="#addModal" data-toggle="modal"><button id="new" type="button" class="btn btn-primary">新增</button></a>
        <!--<button id="remove" class="btn btn-danger" disabled>
            <i class="glyphicon glyphicon-remove"></i> Delete
        </button>-->
    </div>
	<table  data-toggle="table"
			data-toolbar="#toolbar"
            data-search="true"
            data-show-refresh="true"
            data-show-toggle="true"
            data-show-columns="true"
            data-show-export="true"
            data-detail-formatter="detailFormatter"
            data-minimum-count-columns="2"
            data-show-pagination-switch="true"
            data-pagination="true"
            data-id-field="caseno"
            data-url="<?=base_url("/home/get_case_tab/".$year)?>"
			data-page-list="[2, 3, 4 , 10, 100, ALL]"
    	>
        <thead>

	        <tr>
           		<th data-field='id' data-width='50'	data-visible="false">id</th>
           		<th data-field='edit' data-width='30'  data-formatter="editFormatter" data-events="editEvents">編輯</th>
           		<th data-field='caseno' data-width='50' data-sortable="true" data-filter-control="true"  >案件編號</th>
           		<th data-field='name' data-width='100' data-sortable="true" data-filter-control="true" data-editable="true"  style="width:100px">案件名稱</th>
        <?php 
			for($i=0; $title_sort[$i]['title_name'] != ""; $i++)
			{
				echo "
						<th data-field='title".($title_sort[$i]['id']+1)."_status' data-formatter='statusFormatter' data-events='statusEvent' data-width='30'>".$title_sort[$i]['title_name']."狀態</th>
						<th data-field='title".($title_sort[$i]['id']+1)."' data-width='50'>".$title_sort[$i]['title_name']."日期</th>
				";
			}
			?>
            </tr>
        </thead>
        </table>
	<div class="modal fade " id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" data-keyboard="false" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">新增</h4>
				</div>		
				<div class="modal-body clearfix" >	
					<form action="<?=base_url('/home/new_case_data')?>"  method="post" accept-charset="utf-8" id="new_data_frm">
                    <!--<form  method="post" accept-charset="utf-8" id="edit_frm">-->
						<div class="form-group col-sm-12" >
							<label class="col-sm-3 control-label">案件編號</label>
							<div class="col-sm-9">
								<input  type="text" class="form-control" name="case_code_en" id="case_code_en" maxlength="1" size="1" style="width:35px"  required="required" >						
								<select type="text" class="form-control" name="case_code_year" id="case_code_year"  style="width:70px"/>
                                </select>
								<input type="text" class="form-control"  name="case_code_n" id="case_code_n" maxlength="2" size="2" style="width:70px"  required="required" >						
							</div>																
						</div>					
						<div class="form-group col-sm-12" >
							<label class="col-sm-3 control-label">案件名稱</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="case_name"/>
							</div>					
						</div>					
						<div class="form-group col-sm-12" >
							<div class="col-sm-offset-3 col-sm-3">
                            
								 <a  id="save" class="btn btn-primary" >儲存</a>
							</div>
							<div class="col-sm-6">
								 <div id="register_error" class="msg"></div>
							</div>					
						</div>
					</form>
				</div>			
			</div>
		</div>
	</div>	
	<div class="modal fade " id="editModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" data-keyboard="false" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">編輯</h4>
				</div>		
				<div class="modal-body clearfix" >	
					<form action="<?=base_url('/home/update_caseno_data')?>"  method="post" accept-charset="utf-8" id="up_data_frm">
                    <!--<form  method="post" accept-charset="utf-8" id="edit_frm">-->
						<div class="form-group col-sm-12" >
							<label class="col-sm-3 control-label">案件編號</label>
							<div class="col-sm-9" id="edit_casnno">
													
							</div>																
						</div>					
						<div class="form-group col-sm-12" >
							<label class="col-sm-3 control-label">案件名稱</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" id="edit_case_name"/>
							</div>					
						</div>
                        <?php
							for($i=0; $title_sort[$i]['title_name'] != ""; $i++)
							{
								echo '<div class="form-group col-sm-12" >
										<label class="col-sm-3 control-label">'.$title_sort[$i]['title_name'].'日期</label>
										<div class="col-sm-9">
											<input type="text" class="status_date form-control" name="title'.($title_sort[$i]['id']+1).'" id="title'.($title_sort[$i]['id']+1).'"/>
										</div>					
									</div>
								';
							}
						?>
                        <input type="hidden" id="edit_case_year" name="year" />
                        <input type="hidden" id="edit_case_id" name="id" />
						<div class="form-group col-sm-12" >
							<div class="col-sm-offset-3 col-sm-3">
                            	<button type="submit" class="btn btn-primary" >儲存</button>
							</div>
							<div class="col-sm-6">
								 <div id="register_error" class="msg"></div>
							</div>					
						</div>
					</form>
				</div>			
			</div>
		</div>
	</div>	
</div>
<script>
title_sort = <?=json_encode($title_sort)?>;

window.editEvents = {    
    'click .edits': function (e, value, row, index) {
		$("#edit_casnno").html(row.caseno);
		$("#edit_case_name").val(row.name);
		$("#edit_case_year").val(row.year);
		$("#edit_case_id").val(row.id);
		for(i = 0; title_sort[i]['title_name'] ; i++)
		{
			$("#title"+(parseInt(title_sort[i].id)+1)).val(row["title"+(parseInt(title_sort[i].id)+1)]);
		}
//		alert(row.id);
//		var windowObjectReference = window.open('<?=base_url("sponsor/edit").'/';?>' + row.id, 'member');
    }
};
<?php
	if( isset($new_case_save_pass))
		echo 'new_case_save_pass = '.$new_case_save_pass.';';
?>

$(document).ready(function(e) {
	if(typeof(new_case_save_pass) != 'undefined')
	{
		if(new_case_save_pass == false)
		{
			alert("儲存失敗");
		}else {
			alert("儲存成功");
		}
	}
	$('.status_date').datepickerTW();

/*
	col_data = [{
					field: 'id',
					title: 'id',
					visible: false,
				},{
					field: 'edit',
					title: '編輯',
					sortable: true,
					width: 50,
					formatter: 'mid_formatter'
				},{
					field: 'caseno',
					title: '案件編號',
					sortable: true,
					width: 100,
				},	{
					field: 'date',
					title: '建立日期',
					width: 100,
				}, {
					field: 'name',
					title: '案件名稱',
					editable: "true",
				}];;
	
	for(i = 0 ; title_sort[i].title_name ; i++)
	{
		col_data.push({ 
						field : 'title' + title_sort[i].id + '_status',
						title : title_sort[i].title_name + '狀態'
					 },
					 { 
						field : 'title' + title_sort[i].id,
						title : title_sort[i].title_name
					 });

	}
	$('#table').bootstrapTable({
		columns: col_data,
		url: base_url + "/home/get_case_tab/"+year
/*		data: [{
			id: 1,
			name: 'Item 1',
			price: '$1'
		}, {
			id: 2,
			name: 'Item 2',
			price: '$2'
		}]
	});   */ 
	for(i = d.getFullYear()-1911 ; i >= start_year; i-- )
	{
		$("#case_code_year").append($("<option></option>").attr("value", i).text( (i >=100)? padLeft(i-100,2) : i));
	}
	$(document).on("click", "#save", function() {
		if(checkValEng($("#case_code_en").val()) == false)
		{
			alert("編號開頭請輸入英文");
			return;
		}
		if(isNaN($("#case_code_n").val()) == true)	
		{
			alert("編號欄位請輸入數字");
//			$("#case_code_n").after("請輸入數字");
			return;
		}
		case_code_en = $("#case_code_en").val();
		
		$("#case_code_en").val(case_code_en.toUpperCase());
		$("#new_data_frm").submit();
/*		$.ajax({
			url: base_url+'home/new_case_data',
			type:"post",
			data: $(this).closest('form').serialize(),
			dataType: "html",
			error:function (e){
				console.log(e);
			},
			success: function(result){
//				a = 1;
//				$.growlUI(result);
				alert("新增成功");
				location.reload();
			}			
		});*/
	});
});

</script>