<style>
#column-left{
	padding-top: 100px;
}
.menu li a{
	font-size: 18px;
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
            	<li><a href="<?=base_url('logbook');?>">工作日誌</a></li>

            </ul>
			<?php if($this->session->userdata('case_number')["class"] == 1){ ?>
			<ul class="menu">
				<li><a href="<?=base_url('/logbook/logbook_head_edit')?>">工作內容編輯</a></li>
            </ul>
			<?php }?>
			
        </div>
        <div >

        </div>
    </nav>

    <script>

	</script>
