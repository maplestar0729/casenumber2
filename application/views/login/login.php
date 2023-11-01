<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-office 登入</title>
		<link href="<?=base_url('public/css/login.css');?>" rel="stylesheet" >

</head>
<body class="login">
<div id="login">
  <form name="loginform" method="post" name="loginform" action="<?=base_url('/login/login_check')?>"  accept-charset="utf-8" >
  
		<p>
			<label>帳號<br />
			<input type="text" class="input" name="uid"></label>
		</p>
		<p>
			<label>密碼<br />
			<input type="password" class="input" name="pw"></label>
		</p>
		<p>
		<?php
		  if(isset($login_error))
		  {
			  echo $login_error;
		  }
		 ?>
		</p>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button-primary" value="登入" tabindex="100" />
		</p>
  </form>
  </div>
</body>
</html>
