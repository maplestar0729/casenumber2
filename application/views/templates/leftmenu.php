	<nav id="column-left" class="my_scrollbar active">
    	<div id="title_edit_menu">
        	
        	<ul class="menu">
            	<li><a href="<?=base_url('title_edit');?>">抬頭編輯</a></li>
            	
            </ul>
        	<ul id="year_menu"  class="menu">
            </ul>

        </div>
        <div >
        </div>
    </nav>
    
    <script>
		var start_year = 100;
		var d = new Date();
		$(document).ready(function(e) {
            for(i = d.getFullYear()-1911 ;i >=start_year  ; i--)
			{
				$( "#year_menu" ).append('<li><a href="'+base_url+'home/index/'+i+'">'+i+'</a></li>' );
//				$( "#year_menu" ).append('<li><a>2222222222</a></li>' );
			}
        });
		$.get( base_url+"home/get_case_tab", function( data ) {
//			$( "#year_menu" ).append('<li><a>111111111</a></li>' );
//			$( "#year_menu" ).append('<li><a>2222222222</a></li>' );
//			alert( "Load was performed." );
		});
	</script>