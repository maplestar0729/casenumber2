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
	#header {
		min-height: 0px;
		background: #FFFFFF;
		border-bottom: 1px solid #E5E5E5;
		margin: 0;
		padding: 0;
	}
</style> 
	<header id="header" class="navbar navbar-static-top">
		<ul class="nav pull-right">
			<li><a><span class="user_name hidden-xs hidden-sm hidden-md"><?=$user_name?>您好</span><i class="fa fa-sign-out fa-lg"></i></a></li>
			<li><a href="<?=base_url('login/logout');?>"><span class="hidden-xs hidden-sm hidden-md">登出</span> <i class="fa fa-sign-out fa-lg"></i></a></li>
		</ul>
	</header>
