<style>
	.user_name{
		font-size: 24px;
	  font-family:DFKai-sb;
	  color:blue;
	}
	.select_elem{
		color:red;
	}
	#header a{
	  	font-family:DFKai-sb;
		font-weight:bolder;
	}
	#header a:hover{
		background-color:#23527c;
		color:white;
	}
</style>
	<header id="header" class="navbar navbar-static-top">
	
		<div class="navbar-header">
			<span  class="navbar-brand">
			<?php
	            echo (date("Y") - 1911).date("/m/d");
	        ?>
			</span>
			<?php if($this->session->userdata('case_number')["class"] != 3){ ?>
			<a href="<?=base_url('home');?>" class="navbar-brand casenumber">案件編號</a>
			<?php }?>
			<a href="<?=base_url('logbook/index');?>" class="navbar-brand logbook">工作日誌</a>
		</div>
		<ul class="nav pull-right">
			<li><a><span class="user_name hidden-xs hidden-sm hidden-md"><?=$user_name?>您好</span><i class="fa fa-sign-out fa-lg"></i></a></li>
			<?php if($this->session->userdata["case_number"]["class"] == 1) {?>
			<li><a href="<?=base_url('login/creat_user');?>"><span class="hidden-xs hidden-sm hidden-md">新增帳號</span><i class="fa fa-sign-out fa-lg"></i></a></li>
			<?php } ?>
			<li><a href="<?=base_url('login/edit');?>"><span class="hidden-xs hidden-sm hidden-md">修改密碼</span><i class="fa fa-sign-out fa-lg"></i></a></li>
			<li><a href="<?=base_url('login/logout');?>"><span class="hidden-xs hidden-sm hidden-md">登出</span> <i class="fa fa-sign-out fa-lg"></i></a></li>
		</ul>
	</header>
