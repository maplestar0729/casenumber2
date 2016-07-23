<style>
.edit{width: 22px;cursor:pointer;}
.title_status{
    border-right: 0px #82FFFF solid;
}
.casenoEdit{
    width: 99%;
	font-family:標楷體;
	font-size:20px;
	color:blue;
    min-height:25px ;
    height:auto;
}
.casenoEdit:hover{
    background-color: #CCDDFF;

}
.chk{
  color: #666666;
  font-size: 20px;
}
.NOClass{
	color: red;
	font-weight:bolder;
	font-size:18px;
}
.chgToFormal{
	color:red;
	font-size:18px;
}
.btn-mystyle{
	color: #fff;
    background-color: #5E825E;
    border-color: #4cae4c;
}
.tab-title{
	font-family:標楷體;
	font-size: 24px;
}
.line_5_style{
  background-color:#CEFFCE;
}
</style>

<script type="text/javascript" src="<?=base_url('public/plugin/bootstrap-table-master/src/extensions/export/bootstrap-table-export.js');?>" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url('public/js/tableExport.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/plugin/tableExport.jquery.plugin/jspdf/libs/sprintf.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/plugin/tableExport.jquery.plugin/jspdf/jspdf.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/plugin/tableExport.jquery.plugin/jspdf/libs/base64.js');?>"></script>
<div class="btn btn-mystyle top_btn" id="tab_execel_export">
	列印excel
</div>
<div class="bs-docs-grid" id="year_data_tab_div">
    <div id="toolbar" class="list-inline">
        <ul class="list-inline">
        <?php if(isset($year)){?>
    	<li><a href="#addModal" data-toggle="modal"><button id="new" type="button" class="btn btn-mystyle">新增</button></a></li>
        <li class="tab-title"><?=$year?>年案件編號表</li>
        <?php } else{?>
            <li>
                <?php if($isOld == "old"){ ?>
                    <h4>舊年份搜尋</h4>
                <?php } else { ?>
                    <h4>搜尋</h4>
                <?php } ?>
            </li>
            <li>


                <form action="<?=base_url('/search/index')?>"  method="GET" accept-charset="utf-8" >

                    <input type="text" name="str" value="<?=$search_str?>">
                    <button type="submit">搜尋</button>
                </form>
            </li>
        <?php }?>
        </ul>
    </div>

	<table id="year_data_tab"
            data-toggle="table"
			data-toolbar="#toolbar"
            data-search="true"
            data-show-refresh="true"
            data-show-columns="true"
            data-show-export="true"
            data-detail-formatter="detailFormatter"
            data-minimum-count-columns="2"
            data-show-pagination-switch="true"
            data-pagination="false"
            data-sort-name="caseno"
            data-url="<?=base_url($get_case_tab_link)?>"
			data-page-list="[10, 20, 25 , 50, 100, ALL]"
            data-tab-name='caseindex_caseno'
            data-show-footer="false"
            data-row-style="rowStyle"
    	>
        <thead>

	        <tr>
           		<th data-field='id' data-width='10'	data-visible="false" >id</th>
           		<th data-field='edit' data-width='10' data-visible="false" data-formatter="editFormatter" data-events="editEvents">編</th>
           		<th data-field='caseno' data-width='50' data-cell-style="NOStyle" data-sortable="true" data-filter-control="true" >NO</th>
           		<th data-field='name' data-width='350'  data-formatter="nameFormatter" data-events="nameEvents"  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>
        <?php
			for($i=0; $title_sort[$i]['title_name'] != ""; $i++)
			{
			    //echo "<th data-field='title".($title_sort[$i]['id']+1)."_state' data-cell-style='statusStyle'  data-width='5'></th>";
			    echo "<th data-field='title".($title_sort[$i]['id']+1)."' data-formatter='statusFormatter' data-events='statusEvents' data-width='120'>".$title_sort[$i]['title_name']."</th>";

			}
			?>
            </tr>
        </thead>
        <tfoot>
	        <tr>
           		<th >NO</th>
           		<th >案件名稱</th>
              <?php
          			for($i=0; $title_sort[$i]['title_name'] != ""; $i++)
          			{
          			    //echo "<th data-field='title".($title_sort[$i]['id']+1)."_state' data-cell-style='statusStyle'  data-width='5'></th>";
          			    echo "<th >".$title_sort[$i]['title_name']."</th>";

          			}
      			?>
            </tr>
        </thead>
        </table>

</div>
<div>


            <div style="width:60%;min-width: 400px;" class="list-inline">
                <div id="toolbar_undecided">
                    <ul class="list-inline">
                    <?php if(isset($year)){?>
                    <li><a href="#addModal_undecided" data-toggle="modal"><button id="new" type="button" class="btn btn-mystyle">新增</button></a></li>
                    <li class="tab-title"><?=$year?>年尚未編號案件表</li>
                    <?php } else{?>


                    <?php }?>
                    </ul>
                </div>
                <div >
            <table id="year_undecided"
                    data-toggle="table"
                    data-toolbar="#toolbar_undecided"
                    data-search="true"
                    data-show-refresh="true"
                    data-show-columns="true"
                    data-show-export="true"
                    data-minimum-count-columns="2"
                    data-show-pagination-switch="true"
					data-pagination="false"
					data-sort-name="id"
                    data-id-field="caseno"
                    data-url="<?=base_url($search_case_tab_undecided_link)?>"
                    data-page-list="[10, 20, 25 , 50, 100, ALL]"
                    data-tab-name='caseindex_caseno_undecided'
                    data-row-style="rowStyle"
                    style="width:550px;min-width: 550px;"

                >
                <thead>

                    <tr>
                        <th data-field='id' data-width='50'	data-visible="false" data-sortable="true">id</th>
                        <th data-field='year' data-width='50' data-cell-style="NOStyle" data-cell-style="undecided_tab_year" data-sortable="true" data-filter-control="true">年</th>
                        <th data-field='name' data-width='350'  data-formatter="nameFormatter" data-events="nameEvents"  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>
                        <th data-field='edit' data-width='50' data-formatter="undecidedEditFormatter" data-events="undecidedEditEvents">給編號</th>
                        <th data-field='del' data-width='50' data-formatter="undecidedDelFormatter" data-events="undecidedDelEvents">刪</th>

                    </tr>
                </thead>
                </table>
            </div>

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
                                <label class="col-sm-3 control-label">預設選項</label>
                                <div class="col-sm-9">
                                    <select name="case_title" class="form-control">
                                        <option value="1">不管控</option>
                                        <option value="0">進度點記錄</option>
                                    </select>
                                </div>
                            </div>
    						<div class="form-group col-sm-12" >
    							<div class="col-sm-offset-3 col-sm-3">

    								 <a  id="save" class="btn btn-mystyle" >儲存</a>
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

    								 <button type="submit" class="btn btn-mystyle" >儲存</button>
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
                                	<button type="submit" class="btn btn-mystyle" >儲存</button>
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
      <div class="modal fade " id="delModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" data-keyboard="false" aria-hidden="true">
    		<div class="modal-dialog" style="width:200px">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    					<h4 class="modal-title">刪除確認</h4>
    				</div>
    				<div class="modal-body clearfix" >
                        <input type="hidden" id="del_case_id" name="id" />
                        <input type="hidden" id="tab_name" name="tab_name" />
    					<div class="form-group col-sm-12" >
    						<div class=" col-sm-3">
                            	<button type="submit" class="btn btn-mystyle del_btn" >刪除</button>
    						</div>
                            <div class=" col-sm-1">

    						</div>
                            <div class=" col-sm-3">
                            	<button type="submit" class="btn btn-danger cancel_btn" data-dismiss="modal" aria-label="Close">取消</button>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
</div>
<div style="display:none">
  <table id="year_all_data">
  </table>
</div>
<script>

title_sort = <?=json_encode($title_sort)?>;


var replaceWith = $('<input id="temp_name_input" name="temp" style="width:80%" />');
var save_ok_With = $('<a class="glyphicon glyphicon-ok musPick name_save_ok"  aria-hidden="true"> </a>');
var remove_With = $('<a class="glyphicon glyphicon-remove musPick name_cancel"  aria-hidden="true"></a>');
var connectWith = $('input[name="hiddenField"]');
function NOStyle(value, row, index)
{
	return {
            classes: "NOClass"
        };
}
function rowStyle(row, index)
{
  if ((index+1) % 5 == 0 ) {
      return {
          classes: "line_5_style"
      };
  }
  return {};
}

function footerFormatter(value, row, index,a,b)  {
    return "test";
}

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
        /*'<a  href="#editModal" data-toggle="modal" class="edits ml10" href="javascript:void(0)" title="編輯">',
			'<img class="edit" src="'+base_url+'public/img/edit-icon.png'+'">',
        '</a>',*/
        '<a  href="#delModal" data-toggle="modal" class="del_case ml10" href="javascript:void(0)" title="刪除">',
			'<i class="glyphicon glyphicon-remove del_case"></i>',
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
    },
    "click .del_case" : function (e, value, row, index) {
        $("#delModal #del_case_id").val(row.id);
        $("#delModal #tab_name").val("caseindex_caseno");
    },
};
function get_date_html_str(data)
{
	var tmp_str = ""
	if(data.status == 1 ) {
	  tmp_str += '<div align="center">';
	  tmp_str += '<a class="musPick"><i data-status="'+data.status+'" class="glyphicon glyphicon-ban-circle chk" data-title-id="'+data.id+'" data-title="'+data.title+'" aria-hidden="true"></i></a>';
	  tmp_str += '</div>';

	}else if(data.status == 3){
		iCodeColor = "style='color:	red;'";
		tmp_str += '<div class="row"><div class="col-md-1"><i data-status="'+data.status+'" data-title-id="'+data.id+'"  class="glyphicon glyphicon-star chk musPick" '+iCodeColor+' data-title="'+data.title+'" aria-hidden="true"></i></div>';
		tmp_str += " <div data-title-id='"+data.id+"' data-title='"+data.title+"' class='row_date musPick col-md-9'></div>";
		tmp_str += '</div>';
	}
	else 
	{
		if(data.date)
		{
			iCodeColor = "style='color:#666666;'";
			iCodeClass = "ban";
		}else{
			iCodeColor = "style='color:	#00FF00;'";
			iCodeClass = "chk";
		}
		tmp_str += '<div class="row">';
		tmp_str += '<div class="col-md-1"><i data-status="'+data.status+'" data-title-id="'+data.id+'"  class="glyphicon glyphicon-unchecked '+iCodeClass+' musPick" '+iCodeColor+' data-title="'+data.title+'" aria-hidden="true"></i></div>';
		if(data.status == 0){
		  tmp_str += " <div data-title-id='"+data.id+"' data-title='"+data.title+"' class='row_date musPick col-md-9 date_done' >"+data.date+"</div>";
		}else{
		  tmp_str += " <div data-title-id='"+data.id+"' data-title='"+data.title+"' class='row_date musPick col-md-9 date_done_befor' >"+data.date+"</div>";
		}
		tmp_str += '</div>';
	}
	return tmp_str;
}
function statusFormatter(value, row, index) {
    //debugger;
	tmp_data = new Object();
    tmp_data.status = row[this.field + "_state" ];
	tmp_data.id = row.id;
	tmp_data.title = this.field;
	tmp_data.date = value;
	sCode = get_date_html_str(tmp_data);
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
            if(this.formname.css('color') == 'rgb(119, 0, 119)')
            {
                data_status = 0;
            }else{
                data_status = 2;
            }
            data = { 'id' : id,
                   'title' : val_name,
                   'status' : data_status,
                   'date' : d_str,
                   'year' : $year
            }
            //debugger;

            update_status(data,this.formname.parent().parent());

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

function update_status(data,tab_element){
    //tab_element.html("");
    $.ajax({
          url:base_url+"home/update_status",
          data:data,
          dataType:"JSON",
          type:"POST",
          success:function(text,e,obj){
              sCode = get_date_html_str(data);
              $( tab_element).html(sCode);
              //setTimeout(function(){

              //},1000);
          }

    });
}
$(document).on("click",".chk",function (e) {
	if($(this).attr("data-status") == 0)
	{
		tmp_status = 3;
	}else if($(this).attr("data-status") == 1)
	{
		tmp_status = 0;
	}else if($(this).attr("data-status") == 3)
	{
		tmp_status = 1;
	} 
	
    val_name = $(this).attr("data-title");
    id = $(this).attr("data-title-id");
    d = new Date();
    //d_str = (d.getFullYear() - 1911) + "/" + (d.getMonth() + 1) + "/" + d.getDate();
    data = { 'id' : id,
           'title' : val_name,
           'status' : tmp_status,
           'date' : "",
           'year' : $year
    }
    update_status(data,$(this).parent().parent().parent());
});
$(document).on("click",".ban", function (e, value, row, index) {
    val_name = $(this).attr("data-title");
    id = $(this).attr("data-title-id");
    data = { 'id' : id,
           'title' : val_name,
           'status' : 1,
           'date' : "",
           'year' : $year

    }
    update_status(data,$(this).parent().parent().parent());
});
$(document).on("dblclick",".row_date",function (e){
    var temp_row_date = $(this);
    var data = new Object();
    title = $(this).attr('data-title')+"_state";
    data['id'] = $(this).attr("data-title-id");
    data["set_data"] = new Object();
    data["tab_name"] = $(this).parent().parent().parent().parent().parent().attr("data-tab-name");
    if($(this).css('color') == 'rgb(119, 0, 119)')
    {

        data["set_data"][title] = 0;

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

        data["set_data"][title] = 2;
        $.ajax({
              url:base_url+"home/update_caseno_data",
              data:data,
              dataType:"JSON",
              type:"POST",
              success:function(){
                  //location.reload();
                  temp_row_date.css({color:'rgb(119, 0, 119)'});
              }

        });
    }
});
window.statusEvents = {


};

function undecidedDelFormatter(){
    uCode = "";
    uCode += "<a  class='glyphicon glyphicon-remove delUndecided musPick' ></a>";
    return uCode;
}

window.undecidedDelEvents = {
    "click .delUndecided" : function (e, value, row, index) {
        if(confirm("是否刪除"))
        {
            data = new Object();
            data['id'] = row.id;
            $.ajax({
                  url:base_url+"home/del_undecided",
                  data:data,
                  dataType:"JSON",
                  type:"POST",
                  success:function(){
                      location.reload();

                  }

            });
        }
    },
}

function undecidedEditFormatter(){
    uCode = "";
    uCode += "<a href='#addModal' data-toggle='modal' class='glyphicon glyphicon-share chgToFormal' ></a> ";
//    uCode += "<a  class='glyphicon glyphicon-remove delUndecided' ></a>";
    return uCode;
}

window.undecidedEditEvents = {
    "click .chgToFormal" : function (e, value, row, index) {
        $("#case_code_year").val(row.year);
        $("#case_name").val(row.name);
        $("#undecided_tab_id").val(row.id);
    }
}


function undecided_tab_year()
{
  return  {
            classes: "undecided_tab_year"
        };
}

<?php
	if( isset($new_case_save_pass))
		echo 'new_case_save_pass = '.$new_case_save_pass.';';
?>

$(document).ready(function(e) {

	if(typeof(new_case_save_pass) != 'undefined')
	{
		debugger;
		if(new_case_save_pass == false)
		{
			alert(new_case_save_pass);
		}else {
			alert(new_case_save_pass);
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

    $("#delModal .del_btn").click(function(){
        data = new Object();
        data['id'] = $("#delModal #del_case_id").val();
        $.ajax({
              url:base_url+"home/del_case",
              data:data,
              dataType:"JSON",
              type:"POST",
              success:function(){
                  location.reload();

              }

        });
    });
    if (page_name == "case_show" && typeof(Storage) !== "undefined" ) {
    // Store
        if(localStorage.getItem("lastyear")  != "null" && $year == 0)
        {
                temp_to_year = localStorage.getItem("lastyear");
                location.href = base_url+"home/index/" + temp_to_year;
        }else {

            localStorage.setItem("lastyear",$year );
        }
        // Retrieve

    }
    if($("#year_data_tab th").length > 2)
    {
        nowWidth = 50+350;
        x = $("#year_data_tab thead th").length - 2;
        $("#year_data_tab").width(nowWidth + x * 120);
    }
  	$("#new").click(function(){
  		$("#new_data_frm")[0].reset();
  		if($year)
  		{
  			$(".case_modal_year").val($year);
  		}
  	});
    if($year)
    {
        $(".case_modal_year").val($year);
    }
    $("#tab_execel_export").on("click",year_all_data_export);
	$(".case_title").html("<h1>案件編號系統</h1>");
});



function year_all_data_export()
{
	top_tab_data = $("#year_data_tab").html();
	bot_tab_data = $("#year_undecided tbody").html();
	$("#year_all_data").html(top_tab_data).children("tbody").append(bot_tab_data);
	$("#year_all_data .undecided_tab_year").html("");
	$("#year_all_data").parent().show();
	$("#year_all_data").tableExport({type:'excel',escape:'false'})
	$("#year_all_data").parent().hide();

}

</script>
