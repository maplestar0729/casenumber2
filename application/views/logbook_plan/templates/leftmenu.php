<style>
#column-left{
	padding-top: 100px;
}
.menu li a{
	font-size: 18px;
}
.small-menu{
	text-align:right;
}
.small-menu span a{
	font-size: 14px;
	color:white;
}
.small-menu span a:hover{
	background-color: #444444;
}   
</style>
	<nav id="column-left" class="my_scrollbar active">
    	<div id="title_edit_menu">
		
				<ul class="menu" style="color:white;">
					<li>
					<?php
	            echo (date("Y") - 1911).date("/m/d");
	         ?>
				 </li>
			 </ul>

        </div>
        <div >

        </div>
    </nav>

    <script>
		$(document).ready(function(){
			$("#header .logbook_plan").addClass(function(e){
				return "select_elem";
			});
			
		});
	</script>
