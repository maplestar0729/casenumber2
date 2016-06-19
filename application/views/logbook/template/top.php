	<header id="header" class="navbar navbar-static-top">
		<div class="navbar-header">
			<a type="button" id="button-menu" class="pull-left"><i class="fa fa-indent fa-lg"></i></a>
			<a href="<?=base_url('logbook');?>" class="navbar-brand">home</a>
		</div>
		<ul class="nav pull-right">
		<!-- 	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span id="total_num" class="label label-danger pull-left">12312</span> <i class="fa fa-bell fa-lg"></i></a>
				<ul class="dropdown-menu dropdown-menu-right alerts-dropdown">
					<li class="dropdown-header">廠商</li>
					<li><a href="<?=base_url('company/verify');?>"><span class="notify label label-danger pull-right num_company_verify"></span>註冊審核</a></li>
					<li><a href="<?=base_url('company/contact');?>"><span class="notify label label-warning pull-right num_company_contact">2</span>邀約通知</a></li>
					<li><a href="<?=base_url('company/info');?>"><span class="label label-success pull-right num_company"></span>會員人數</a></li>
					<li class="divider"></li>
					<li class="dropdown-header">寶貝</li>
					<li><a href="<?=base_url('babys/verify');?>"><span class="notify label label-danger pull-right num_baby_verify"></span>我要成為寶貝審核</a></li>
					<li><a href="<?=base_url('babys/info');?>"><span class="label label-success pull-right num_baby"></span>寶貝人數</a></li>
					<li class="divider"></li>
					<li class="dropdown-header">贊助</li>
					<li><a href="<?=base_url('sponsor/verify');?>"><span class="notify label label-danger pull-right num_sponsor_verify"></span>贊助審核</a></li>
					<li><a href="<?=base_url('sponsor/');?>"><span class="label label-success pull-right num_sponsor"></span>贊助數量</a></li>
					<li class="divider"></li>
					<li class="dropdown-header">試手氣</li>
					<li><a href="<?=base_url('lucky/verify');?>"><span class="notify label label-danger pull-right num_lucky_verify"></span>試手氣審核</a></li>
					<li><a href="<?=base_url('lucky/');?>"><span class="label label-success pull-right num_lucky"></span>試手氣數量</a></li>
					<li class="divider"></li>
					<li class="dropdown-header">生日禮</li>
					<li><a href="<?=base_url('birthday/verify');?>"><span class="notify label label-danger pull-right num_birthday_verify"></span>生日禮審核</a></li>
					<li><a href="<?=base_url('birthday/');?>"><span class="label label-success pull-right num_birthday"></span>生日禮數量</a></li>
					<li class="divider"></li>
					<li><a href="<?=base_url('home');?>"><span class="label label-success pull-right num_online">1</span>在線人數</a></li>
				</ul>
			</li> -->
			<!-- <li><a href="<?=str_replace("/admin/","",base_url());?>" target="_blank"><span class="hidden-xs hidden-sm hidden-md">返回前台</span> <i class="glyphicon glyphicon-globe"></i></a></li> -->
			<li><a><span class="hidden-xs hidden-sm hidden-md"><?=$user_name?>您好</span><i class="fa fa-sign-out fa-lg"></i></a></li>
			<?php if($this->session->userdata["case_number"]["class"] == 1) {?>
			<li><a href="<?=base_url('login/creat_user');?>"><span class="hidden-xs hidden-sm hidden-md">新增帳號</span><i class="fa fa-sign-out fa-lg"></i></a></li>
			<?php } ?>
			<li><a href="<?=base_url('login/edit');?>"><span class="hidden-xs hidden-sm hidden-md">修改密碼</span><i class="fa fa-sign-out fa-lg"></i></a></li>
			<li><a href="<?=base_url('login/logout');?>"><span class="hidden-xs hidden-sm hidden-md">登出</span> <i class="fa fa-sign-out fa-lg"></i></a></li>
		</ul>
	</header>
