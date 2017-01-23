<!-- Protection HtPassWd -->


<?php

echo "<script type='text/javascript'>

$(document).ready(function(){
	
$('#enterPass').click(function(){
	if( $('#pass').val() == 'varsity2016HIRE' ){
		$('.protected').slideUp('slow', function(){
			alert ('Password OK!');
		});
	}
	else{
		alert ('Invalid Password');
	}	
});
	
});

</script>";

?>