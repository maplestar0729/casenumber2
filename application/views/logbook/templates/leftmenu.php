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
				
        	<ul class="menu">
            	<li class="work_logbook"><a href="<?=base_url('logbook/index');?>" >工作日誌</a></li>

            </ul>
			<ul class="menu">
            	<li class="work_plan"><a href="<?=base_url('logbook_plan/index');?>" >工作計畫</a></li>
            	<li class="work_plan_E"><a href="<?=base_url('logbook_plan/planend');?>" >工作計畫成果</a></li>


            </ul>

			<?php if($this->session->userdata('case_number')["class"] == 1){ ?>
			<ul class="menu">
				<li class="work_head"><a href="<?=base_url('/logbook_head/index/W')?>">編輯-工作內容</a></li>
				<li class="small-menu work_head_W"><span><a href="<?=base_url('/logbook_head/index/W')?>">編輯-案件</a></span></li>
				<li class="small-menu work_head_D"><span><a href="<?=base_url('/logbook_head/index/D')?>">編輯-指派</a></span></li>
            </ul>
			<?php }?>



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
