<style>
.edit{width: 22px;cursor:pointer;}
.title_status{
    border-right: 0px #82FFFF solid;
}
.casenoEdit{
    width: 99%;
    min-height:25px ;
    height:auto;
}
.casenoEdit:hover{
    background-color: #0066FF;
    color: white;
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

	<table id="year_data_tab"
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
            data-sort-name="caseno"
            data-url="<?=base_url("/home/get_case_tab/".$year)?>"
			data-page-list="[10, 20, 25 , 50, 100, ALL]"
            data-tab-name='caseindex_caseno'
    	>
        <thead>

	        <tr>
           		<th data-field='id' data-width='50'	data-visible="false">id</th>
           		<th data-field='edit' data-width='30' data-visible="false" data-formatter="editFormatter" data-events="editEvents">編輯</th>
           		<th data-field='caseno' data-width='20' data-sortable="true" data-filter-control="true">案件編號</th>
           		<th data-field='name' data-width='50'  data-formatter="nameFormatter" data-events="nameEvents"  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>
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


        <div style="width:60%;min-width: 450px;">
        <div id="toolbar_undecided">
        	<a href="#addModal_undecided" data-toggle="modal"><button id="new" type="button" class="btn btn-primary">新增</button></a>
            <!--<button id="remove" class="btn btn-danger" disabled>
                <i class="glyphicon glyphicon-remove"></i> Delete
            </button>-->
        </div>
        <table id="year_undecided"
                data-toggle="table"
                data-toolbar="#toolbar_undecided"
                data-search="true"
                data-show-refresh="true"
                data-show-toggle="true"
                data-show-columns="true"
                data-show-export="true"
                data-minimum-count-columns="2"
                data-show-pagination-switch="true"
                data-pagination="true"
                data-id-field="caseno"
                data-url="<?=base_url("/home/get_case_tab_undecided/".$year)?>"
                data-page-list="[10, 20, 25 , 50, 100, ALL]"
                data-tab-name='caseindex_caseno_undecided'
            >
            <thead>

                <tr>
                    <th data-field='id' data-width='50'	data-visible="false">id</th>
                    <th data-field='edit' data-width='30' data-formatter="undecidedEditFormatter" data-events="undecidedEditEvents">編輯</th>
                    <th data-field='year' data-width='20' data-sortable="true" data-filter-control="true">年</th>
                    <th data-field='name' data-width='50'  data-formatter="nameFormatter" data-events="nameEvents"  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>

                </tr>
            </thead>
            </table>
        </div>
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
							<label class="col-md-3 control-label">案件編號</label>
							<ul class="list-inline">
                                <li ><input  type="text" class="form-control" name="case_code_en" id="case_code_en" maxlength="1" size="1" style="width:35px"  required="required" ></li>
								<li ><select type="text" class="form-control case_modal_year" name="case_code_year" id="case_code_year"  style="width:70px"/>
                                </select></li>
								<li ><input type="text" class="form-control"  name="case_code_n" id="case_code_n" maxlength="2" size="2" style="width:70px"  required="required" ></li>
							</ul>
						</div>
						<div class="form-group col-sm-12" >
							<label class="col-sm-3 control-label">案件名稱</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="case_name" id="case_name"/>
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
                        <input type="hidden" name="undecided_tab_id" id="undecided_tab_id" value="0">
					</form>
				</div>
			</div>
		</div>
	</div>
    <div class="modal fade " id="addModal_undecided" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" data-keyboard="false" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">新增</h4>
				</div>
				<div class="modal-body clearfix" >
					<form action="<?=base_url('/home/new_case_undecided')?>"  method="post" accept-charset="utf-8" id="new_data_frm_undecided">
                    <!--<form  method="post" accept-charset="utf-8" id="edit_frm">-->
						<div class="form-group col-sm-12" >
							<label class="col-md-3 control-label">年</label>
							<ul class="list-inline">
								<li ><select type="text" class="form-control case_modal_year" name="case_code_year"  style="width:70px"/>
                                </select></li>
							</ul>
						</div>
						<div class="form-group col-sm-12" >
							<label class="col-sm-3 control-label">案件名稱</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="case_name"/>
							</div>
						</div>
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


var replaceWith = $('<input id="temp_name_input" name="temp" style="width:80%" />');
var save_ok_With = $('<a class="glyphicon glyphicon-ok musPick name_save_ok"  aria-hidden="true"> </a>');
var remove_With = $('<a class="glyphicon glyphicon-remove musPick name_cancel"  aria-hidden="true"></a>');
var connectWith = $('input[name="hiddenField"]');

function nameFormatter(value, row, index){
    return [
        '<div class="casenoEdit musPick">'+row.name+'</div>'
    ].join('');
}

function nameStyle(value, row, index) {
    return {
        classes : 'name_style_td'
    };
}

function set_caseno_name($data){
    $.ajax({
        url:base_url+"home/update_caseno_data",
        type:"POST",
        dataType:"JSON",
        data:$data,
        success:function(){
            alert("OK");
            //location.reload();
        },
        error:function(){
            alert("error");
        }

    })
}
var temp_enter_input;

window.nameEvents = {
    'click .casenoEdit' :function (e, value, row, index){
        var elem = $(this);
        $(".casenoEdit").show();
        this.esc_input = function(event){
            replaceWith.remove();
            save_ok_With.remove();
            remove_With.remove();
            elem.show();
        }

        this.enter_input = function(event){
            $data = {"id": row.id,
             "set_data" : {
                        "name" : replaceWith.val()
                        },
             "tab_name" : remove_With.parent().parent().parent().parent().attr("data-tab-name")
            }
            set_caseno_name($data);
            if (replaceWith.val() != "") {
                elem.text(replaceWith.val());
            }

            temp_esc_input();
        }

        temp_enter_input = this.enter_input;
        temp_esc_input  = this.esc_input;
        elem.hide();
        str_name_html = elem.html();
        elem.after(remove_With);
        elem.after(save_ok_With);
        elem.after(replaceWith);
        replaceWith.focus();
        replaceWith.val(str_name_html);



        replaceWith.keypress(function(event ){
            if ( event.which == 13 ) {
                temp_enter_input();
            }

        });
        replaceWith.keyup(function(event){
            if(event.keyCode == 27){
                temp_esc_input();
            }
        })
        save_ok_With.click(function(e){
            temp_enter_input();
        });
        remove_With.click(function(e){
            temp_esc_input();
        });
    }
}
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

function statusFormatter(value, row, index) {
    //debugger;
    title_state = row[this.field + "_state" ];
    if (title_state == 1) {
        sCode = '<a class="musPick"><span class="glyphicon glyphicon-unchecked chk" data-title="'+this.field+'" aria-hidden="true"></span></a>';
    } else {
        sCode = '<div class="row"><div class="col-md-1"><a class="musPick"><span class="glyphicon glyphicon-ban-circle ban" data-title="'+this.field+'" aria-hidden="true"></span></a></div>';
        if(title_state == 0){
            sCode += " <div data-title-id='"+row.id+"' data-title='"+this.field+"' class='row_date musPick col-md-9 date_done' >" + value + "</div></div>";
        } else {
            sCode += " <div data-title-id='"+row.id+"' data-title='"+this.field+"' class='row_date musPick col-md-9 date_done_befor' >" + value + "</div></div>";
        }
    }
    return [sCode].join('');
}
var calset={
        "dow":['日','一','二','三','四','五','六'],
        "tbBgColor":"91FEFF",
        "months":["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        "element_type":"html",
        "click_over": function(){
            val_name = this.formname.attr("data-title");
            id = this.formname.attr("data-title-id");
            //d = this.formname.val();
            d_str = this.formname.html();
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
moncalendar = 0;
$(document).on("click",".row_date", function(e){
    e.stopPropagation();
    if(moncalendar==0)
	{
			moncalendar = new makecaldef("moncalendar");
	}
    moncalendar.picksel($(this),calset);
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
    },
    'dblclick .row_date' :function (e, value, row, index){
        var temp_row_date = $(this);
        var data = new Object();
        if($(this).css('color') == 'rgb(255, 0, 0)')
        {
            title = $(this).attr('data-title')+"_state";
            data['id'] = row.id;
            data["set_data"] = new Object();
            data["set_data"][title] = 0;
            data["tab_name"] = $(this).parent().parent().parent().parent().parent().attr("data-tab-name")
            $.ajax({
                  url:base_url+"home/update_caseno_data",
                  data:data,
                  dataType:"JSON",
                  type:"POST",
                  success:function(){
                      //location.reload();
                      temp_row_date.css({color:'rgb(0, 0, 255)'});
                  }

            });

        }else if($(this).css('color') == 'rgb(0, 0, 255)')
        {
            title = $(this).attr('data-title')+"_state";
            data['id'] = row.id;
            data["set_data"] = new Object();
            data["set_data"][title] = 2;
            data["tab_name"] = $(this).parent().parent().parent().parent().parent().attr("data-tab-name")
            $.ajax({
                  url:base_url+"home/update_caseno_data",
                  data:data,
                  dataType:"JSON",
                  type:"POST",
                  success:function(){
                      //location.reload();
                      temp_row_date.css({color:'rgb(255, 0, 0)'});
                  }

            });
        }
    }
};


function undecidedEditFormatter(){
    uCode = "";
    uCode += "<a href='#addModal' data-toggle='modal' class='glyphicon glyphicon-share chgToFormal' ></a>";
    return uCode;
}

window.undecidedEditEvents = {
    "click .chgToFormal" : function (e, value, row, index) {
        $("#case_code_year").val(row.year);
        $("#case_name").val(row.name);
        $("#undecided_tab_id").val(row.id);
    }
}


function update_status(data){
    $.ajax({
          url:base_url+"home/update_status",
          data:data,
          dataType:"JSON",
          type:"POST",
          success:function(){
              //location.reload();

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


	for(i = d.getFullYear()-1911 ; i >= start_year; i-- )
	{
		$(".case_modal_year").append($("<option></option>").attr("value", i).text( (i >=100)? padLeft(i-100,2) : i));
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
			return;
		}
		case_code_en = $("#case_code_en").val();

		$("#case_code_en").val(case_code_en.toUpperCase());
		$("#new_data_frm").submit();

	});

});

</script>
