	<nav id="column-left" class="my_scrollbar active">
    	<div id="title_edit_menu">
				<ul class="menu" style="color:white;">
					<li>
					<?php
	            echo (date("Y") - 1911).date("/m/d");
	         ?>
				 </li>
			 </ul>
        	<ul class="menu">
			<?php if($this->session->userdata["case_number"]["class"] != 3) {?>

            	<li><a href="<?=base_url('title_edit');?>">編輯-進度點</a></li>
			<?php } ?>


            </ul>
        		<ul id="year_menu"  class="menu">
							<li><a href="<?=base_url('/search')?>">搜尋</a></li>
            </ul>

        		<ul id="old_year_menu"  class="menu">
							<li><a href="<?=base_url('/search/old')?>">搜尋</a></li>
							<li><a class="menu_parent">舊年份</a></li>
							<ul class="menu_children menu">
							</ul>
            </ul>
        </div>
        <div >

        </div>
    </nav>

    <script>
		$year = "<?=isset($year)? $year : 0?>";
		page_name = "<?=isset($page_name)? $page_name : ""?>";
		var start_year = 89;
		var d = new Date();
		$(document).ready(function(e) {
			for(i = d.getFullYear()-1911,j = 0 ;j<5 ; i-- , j++)
			{
				if($year == i )
					$( "#year_menu" ).append('<li><a href="'+base_url+'home/index/'+i+'" style="color:red;">'+i+'</a></li>' );
				else
					$( "#year_menu" ).append('<li><a href="'+base_url+'home/index/'+i+'"">'+i+'</a></li>' );
//				$( "#year_menu" ).append('<li><a>2222222222</a></li>' );
			}
			for( ;i >=start_year  ; i-- )
			{
				if($year == i )
					$( "#old_year_menu > ul" ).append('<li><a href="'+base_url+'home/index/'+i+'" style="color:red;">'+i+'</a></li>' );
				else
					$( "#old_year_menu > ul" ).append('<li><a href="'+base_url+'home/index/'+i+'">'+i+'</a></li>' );
//				$( "#year_menu" ).append('<li><a>2222222222</a></li>' );
			}
			if($year != 0 && $year <= d.getFullYear()- 1911 - 5)
			{
				$(".menu_children").show();
			}
		
			$("#header .casenumber").addClass(function(e){
				return "select_elem";
			});
					
				

		});
		$(".menu .menu_parent").on("click",function(e){
			//debugger;
			$(this).parent().parent(".menu").children(".menu_children").toggle();

		});
//		$.get( base_url+"home/get_case_tab", function( data ) {
//			$( "#year_menu" ).append('<li><a>111111111</a></li>' );
//			$( "#year_menu" ).append('<li><a>2222222222</a></li>' );
//			alert( "Load was performed." );
//		});
	</script>
