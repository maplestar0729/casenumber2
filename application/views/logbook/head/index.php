<style>
	.pl_t{
	  border-bottom: 3px double black;
	  font-size:30px;
	  font-family:DFKai-sb;
	  font-weight: bolder;
	}
    .btn-mystyle{
        color: #fff;
        background-color: #5E825E;
        border-color: #4cae4c;
    }
	.line_5_style{
        background-color:#CEFFCE;
    }
	.casenoEdit{
		width:100%;
		height:20px;
	}
	.casenoEdit:hover{
		background-color:#FFEE99;
	}
</style>

<div>
    <ul class="list-inline">
        <li class=" col-md-2" >
            <span class="pl_t">工作內容編輯</span>
        </li>
        <li class=" col-md-2" >
            <span class="pl_t">
                <?php
                    switch($set_type)
                    {
                        case "w":
                        case "W":
                            echo "案件";
                            break;
                        case "D":
                        case "d":
                            echo "指派";
                            break;
                    }
                ?>
                編輯
            </span>
        </li>
    </ul>
    <br>
    <br>
    <br>
    <div id="toolbar" class="list-inline">
        <a href="#addModal" data-toggle="modal" class="btn btn-mystyle">新增</a>
    </div>
    <div style="width:500px">
    <table id="head_edit"
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
			data-row-style="rowStyle"
            data-url="<?=base_url("logbook_head/get_head_list/".$set_type)?>"
            data-page-list="[10, 20, 25 , 50, 100, ALL]"
            data-show-footer="false"
            data-sort-name="sort_no"
            style="width:450px"
        >
        <thead>

            <tr>
                <th data-field='uid' data-width='10'	data-visible="false" >id</th>
                <th data-field='sort_no' data-formatter="sortFormatter" data-events="work_contentEvents" data-width='50'    data-sortable="true" data-filter-control="true" data-editable="true"  >排序</th>
                <th data-field='work_content' data-formatter="work_contentFormatter" data-events="work_contentEvents"  data-width='400' data-sortable="true" data-filter-control="true" data-editable="true"  >內容</th>
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
    					<form action="<?=base_url('/logbook_head/edit_head')?>"  method="post" accept-charset="utf-8" id="new_data_frm">
                        <!--<form  method="post" accept-charset="utf-8" id="edit_frm">-->
    						<div class="form-group col-md-12" >
    							<label class="col-md-3 control-label">排序</label>
    							<div class="col-md-7">
    							<input type="number"  class="form-control" name="sort_no" value="0" max="99" min="0" style="width:100px">
    							</div>
    						</div>
    						<div class="form-group col-md-12" >
    							<label class="col-md-3 control-label">工作內容</label>
    							<div class="col-md-9">
    								<input type="text" class="form-control" name="work_content" id="work_content" style="width:100%"/>
    							</div>
    						</div>
    						<div class="form-group col-md-12" >
    							<div class="col-md-10">

    								 <button type="submit"  id="save" class="btn btn-mystyle" >新增</button>
    							</div>
    							<div class="col-md-6">
    								 <div id="register_error" class="msg"></div>
    							</div>
    						</div>
                            <input type="hidden" name="uid" value="0">
                            <input type="hidden" name="type" value="<?=$set_type?>">
                            <input type="hidden" name="state" value="A">
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>

<script>


function rowStyle(row, index)
{
  if ((index+1) % 5 == 0 ) {
      return {
          classes: "line_5_style"
      };
  }
  return {};
}

var replaceWith = $('<input id="temp_name_input" name="temp" style="width:80%" />');
var save_ok_With = $('<a class="glyphicon glyphicon-ok musPick name_save_ok"  aria-hidden="true"> </a>');
var remove_With = $('<a class="glyphicon glyphicon-remove musPick name_cancel"  aria-hidden="true"></a>');
var connectWith = $('input[name="hiddenField"]');
function work_contentFormatter(value, row, index){
    return [
        '<div data-field="work_content" class="casenoEdit musPick">'+row.work_content+'</div>'
    ].join('');
}

function sortFormatter(value, row, index){
    return [
        '<div data-field="sort_no" class="casenoEdit musPick">'+row.sort_no+'</div>'
    ].join('');
}

window.work_contentEvents = {
    'click .casenoEdit' :function (e, value, row, index){
        var elem = $(this);
        $(".casenoEdit").show();
        this.esc_input = function(event){
            replaceWith.remove();
            save_ok_With.remove();
            remove_With.remove();
            elem.show();
        }

        this.set_logbook_head = function ($data){
            $.ajax({
                url:base_url+"logbook_head/edit_head",
                type:"POST",
                dataType:"JSON",
                data:$data,
                success:function(){
                    alert("OK");
                    elem.text(replaceWith.val());
                    if($data.sort_no)
                    {
                        row.sort_no = replaceWith.val();
                    }else if($data.work_content)
                    {
                        row.work_content = replaceWith.val();

                    }
                },
                error:function(){
                    alert("error");
                }

            })
        }

        this.enter_input = function(event){
            if(elem.attr("data-field") == "work_content")
            {
                $data = {"uid":  row.uid,
                            "work_content" : replaceWith.val()
                        }    

            }else if(elem.attr("data-field") == "sort_no")
            {
                $data = {"uid":  row.uid,
                            "sort_no" : replaceWith.val()
                        }    
                
            }
            
            
            temp_set_head($data);
            // if (replaceWith.val() != "") {
            //     elem.text(replaceWith.val());
            // }
            // elem.text(replaceWith.val());
            temp_esc_input();
        }
        temp_set_head = this.set_logbook_head;
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
var page_menu_sel_elem = ".work_head_<?= $set_type ?>";
$(document).ready(function(){
    $("#title_edit_menu " + page_menu_sel_elem+" a").css("color","red");
    $("#title_edit_menu .work_head a").css("color","red");
});

</script>