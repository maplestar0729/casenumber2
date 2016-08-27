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
        	<ul class="menu">
            	<li class="work_logbook"><a href="<?=base_url('logbook/index');?>" >工作日誌</a></li>

            </ul>
			<?php if($this->session->userdata('case_number')["class"] == 1){ ?>
			<ul class="menu">
				<li class="work_head"><a href="<?=base_url('/logbook_head/index/W')?>">工作內容編輯</a></li>
				<li class="small-menu work_head_W"><span><a href="<?=base_url('/logbook_head/index/W')?>">案件</a></span></li>
				<li class="small-menu work_head_D"><span><a href="<?=base_url('/logbook_head/index/D')?>">指派</a></span></li>
            </ul>
			<?php }?>
			<ul class="menu">
            	<li class="work_plan"><a href="<?=base_url('logbook_plan/index');?>" >工作計畫</a></li>

            </ul>
        </div>
        <div >

        </div>
    </nav>

    <script>
		$(document).ready(function(){
			$("#header .logbook").addClass(function(e){
				return "select_elem";
			});
			
		});
	</script>
