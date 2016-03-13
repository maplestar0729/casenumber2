﻿<style>
.edit{width: 22px;cursor:pointer;}
.title_status{
    border-right: 0px #82FFFF solid;
}
</style>
<script>

</script>
<div class="bs-docs-grid">
    <div id="toolbar">
    	<a href="#addModal" data-toggle="modal"><button id="new" type="button" class="btn btn-primary">新增</button></a>
        <!--<button id="remove" class="btn btn-danger" disabled>
            <i class="glyphicon glyphicon-remove"></i> Delete
        </button>-->
        <?php
            echo (date("Y") - 1911).date("/m/d");
         ?>
    </div>

	<table id="yead_data_tab"
            data-toggle="table"
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
			    //echo "<th data-field='title".($title_sort[$i]['id']+1)."_state' data-cell-style='statusStyle'  data-width='5'></th>";
			    echo "<th data-field='title".($title_sort[$i]['id']+1)."' data-formatter='statusFormatter' data-events='statusEvents' data-width='50'>".$title_sort[$i]['title_name']."日期</th>";

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
$year = <?=$year?>;
title_sort = <?=json_encode($title_sort)?>;

//編輯此筆
function editFormatter(value, row, index) {
    return [
        '<a  href="#editModal" data-toggle="modal" class="edits ml10" href="javascript:void(0)" title="編輯">',
			'<img class="edit" src="'+base_url+'public/img/edit-icon.png'+'">',
        '</a>'
    ].join('');
}

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
    }
};
function statusStyle(value, row, index) {
    return {
        classes : 'title_status'
    };
}

function statusFormatter(value, row, index) {
    //debugger;
    title_state = row[this.field + "_state" ];
    if (title_state == 1) {
        sCode = '<a class="musPick"><span class="glyphicon glyphicon-unchecked chk" data-title="'+this.field+'" aria-hidden="true"></span></a>';
    } else {
        sCode = '<a class="musPick"><span class="glyphicon glyphicon-ban-circle ban" data-title="'+this.field+'" aria-hidden="true"></span></a>';
        sCode += " <input data-title-id='"+row.id+"' data-title='"+this.field+"' class='row_date' value='" + value + "' >";
    }
    return [sCode].join('');
}
var calset={
        "dow":['日','月','火','水','土','金','木'],
        "tbBgColor":"91FEFF",
        "months":["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        "click_over": function(){
            val_name = this.formname.attr("data-title");
            id = this.formname.attr("data-title-id");
            //d = this.formname.val();
            d_str = this.formname.val();
            data = { 'id' : id,
                   'title' : val_name,
                   'status' : 0,
                   'date' : d_str,
                   'year' : $year
            }
            //debugger;

            update_status(data);

        }
    };
$(document).on("click",".row_date", function(e){
    picksel($(this),calset);
});
window.statusEvents = {
    'click .chk': function (e, value, row, index) {
        val_name = $(this).attr("data-title");
        id = row.id;
        d = new Date();
        d_str = (d.getFullYear() - 1911) + "/" + (d.getMonth() + 1) + "/" + d.getDate();
        data = { 'id' : id,
               'title' : val_name,
               'status' : 0,
               'date' : d_str,
               'year' : $year
        }
        update_status(data);
    },
    'click .ban': function (e, value, row, index) {
        val_name = $(this).attr("data-title");
        id = row.id;
        data = { 'id' : id,
               'title' : val_name,
               'status' : 1,
               'date' : "",
               'year' : $year

        }
        update_status(data);
    }
};
function update_status(data){
    $.ajax({
          url:base_url+"home/update_status",
          data:data,
          dataType:"JSON",
          type:"POST",
          success:function(){
              location.reload();

          }

    });

}
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
//    $(document).on("calDate",".row_date");
});

</script>
