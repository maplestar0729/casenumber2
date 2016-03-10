
  <style>
 
  #sortable { list-style-type: none; margin: 0; padding: 0; width:400px; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em;  }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script>
  $(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  });
  </script>
<div class="bs-docs-grid">
<div class="row">
    <div class="col-md-3 col-md-offset-3"><button value="儲存" class="btn btn-primary title-save">儲存</button></div></div>
</div>

<ul id="sortable">
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">1 </a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">2 </a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">3 </a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">4 </a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">5 </a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">6 </a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">7 </a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">8 </a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">9 </a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">10</a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">11</a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">12</a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">13</a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">14</a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">15</a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">16</a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">17</a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">18</a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">19</a>：<input type="text"/></li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">20</a>：<input type="text"/></li>
</ul>

<button value="儲存" class="btn btn-primary title-save">儲存</button>
</div>
<script >
$(document).ready(function(e) {
    $tCode = "";
	$.get( base_url+"title_edit/get_title_sort","", function( data ) {
//		alert(data[1].title_name);
		for(i = 0 ; i < 20 ; i++)
		{
			$tCode += '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><a class="title-sort">'+data[i].id+' </a>：<input type="text" value="'+data[i].title_name+'"/></li>'
		}
		$("#sortable").html($tCode);
	},"json");
	var title_data = new Array(20);
	$(".title-save").click(function(e){
		
			for(i = 0; i<20 ; i++)
			{
				title_data[i] = new Object;
				title_data[i].id = parseInt($($("#sortable > li")[i]).children(".title-sort").html());
				title_data[i].title_name = $($("#sortable > li")[i]).children("input").val();
				title_data[i].sort = i;
			}
			$.ajax({
				url : base_url + "title_edit/save_title_sort",
				data: {title_data : title_data},
				type: "post",
				success: function(d,t,r){
					alert("儲存成功");
				}, 
				dataType: "json"
				});
		});
	
});
</script>