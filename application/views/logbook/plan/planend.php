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
    #today_logbook_frm input{
		width:100%;
	}
	#today_logbook_frm #today_logbook{
		padding-left:180px
	}
</style>

<div>

    <ul class="list-inline">
        <li class=" col-md-2" >
            <span class="pl_t">工作計畫成果</span>
        </li>
    </ul>
    <br>
    <br>
    <br>
    <div id="history_logbook">
      <div id="toolbar" class="list-inline">
      </div>
      <table id="logbook_tab"
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
                data-url="<?=base_url("logbook_plan/get_plan_END_list")?>"
                data-page-list="[10, 20, 25 , 50, 100, ALL]"
                data-show-footer="false"
                data-row-style="rowStyle"
			<?php if($this->session->userdata('case_number')["class"] != 3) {?>
				style="width:1240px"
			<?php }else{ ?>
				style="width:1180px"
			<?php } ?>
          >
            <thead>

              <tr>
                  <th data-field='NO' data-width='10'	data-visible="false" >id</th>
                  <th data-field='date' data-width='100'  data-sortable="true" data-filter-control="true" data-editable="true"  >日期</th>
				  <th data-field='member' data-width='80' data-formatter="MemberFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >成員</th>
                  <th data-field='type' data-width='110' data-formatter="TypeFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >工作類型</th>
                  <th data-field='state' data-width='110' data-formatter="StateFormatter"  data-sortable="true" data-filter-control="true" data-editable="true"  >工作類型</th>
                  <th data-field='caseno' data-width='100' data-sortable="true" data-filter-control="true" >案件編號</th>
                  <th data-field='name' data-width='300'  data-sortable="true" data-filter-control="true" data-editable="true"  >案件名稱</th>

				  <th data-field='state2' data-formatter="schFormatter_END" data-width='300'  data-sortable="true" data-filter-control="true" data-editable="true"  >進度</th>
                  <th data-field='Other' data-formatter="OtherFormatter_END" data-events="OtherEvents" data-width='50'  data-sortable="true" data-filter-control="true" data-editable="true"  >重新啟動</th>

				</tr>
            </thead>
          </table>
  </div>  
</div>


<script>


window.OtherEvents= {
    'click .plan_open' :function (e, value, row, index){
        if(!confirm("確認是否重新啟動"))
		{
			return;
		}
        var stn_data = {
            "state2":"D",
            "NO":row.NO
        }
        update_plan(stn_data);
    }
}
function update_plan(stn_data){
    $.ajax({
        url:base_url+"logbook_plan/update_plan",
        type:"POST",
        dataType:"JSON",
        data:stn_data,
        success:function(){
            alert("OK");
            location.reload();
        },
        error:function(){
            alert("error");
        }

    })
}
function OtherFormatter_END(value, row, index){
    var rtn_str = "";

        rtn_str += '<a class="glyphicon glyphicon-share musPick plan_open"  aria-hidden="true"> </a>';
    return rtn_str;
}

function MemberFormatter(value, row, index){
    return row.member +" "+row.member_name;
}
function TypeFormatter(value, row, index){
    tmp_str ="";
    switch (value) {
        case "D":
            tmp_str = "指派"
            break;
        case "W":
            tmp_str = "案件"
            break;
        case "L":
            tmp_str = "學習"
            break;

        default:
            
            break;
    }
        return tmp_str;
}
function StateFormatter(value, row, index){
    tmp_str ="";
    switch (value) {
        case "A":
            tmp_str = "草稿"
            break;
        case "B":
            tmp_str = "公開"
            break;

        default:
            
            break;
    }
        return tmp_str;
}
function schFormatter_END(value, row, index){
    tmp_str ="";

		switch (row.state2) {

			case "P":
				tmp_str = "暫緩"
				break;
			case "E":
				tmp_str = "完成"
				break;
			default:           
				break;
		}
        return tmp_str;
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


$(document).ready(function(){
      needata = "";


    // $("#title_edit_menu .work_plan a").css("color","red");
    $("#title_edit_menu .work_plan_E a").css("color","red");
});

</script>