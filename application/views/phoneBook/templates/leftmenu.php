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
            	<li class="phoneBook"><a href="<?=base_url('phoneBook/index');?>" >事務所電話簿</a></li>

            </ul>
        	<ul class="menu">
            	<li class="myBook"><a href="<?=base_url('phoneBook/myBook');?>" >個人電話簿</a></li>

            </ul>




        </div>
        <div >

        </div>
    </nav>

    <script>
		$(document).ready(function(){
			$("#header .phoneBook").addClass(function(e){
				return "select_elem";
			});
			
		});
	</script>
