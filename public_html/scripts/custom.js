$(document).ready(function(){


$("li.login").hover(function(){
	$("li.login form").slideToggle("fast");
});

// $("li.login").mouseover(function(){
// 	$("li.login form").slideDown("fast");
// }).mouseleave(function(){
// 	$("li.login form").slideUp("fast");
// });

$("li.logout").hover(function(){
	$("li.logout form").slideToggle("fast");
});



//*********************************************//

$("html").click(function(){
	$(".cPanelLoggedOut").css("margin-left", "-100%");
	$(".cPanelLoggedIn").css("margin-left", "-100%");
});

$(".cPanelLoggedIn").click(function(a){
	a.stopPropagation();
});

$(".cPanelLoggedOut").click(function(b){
	b.stopPropagation();
});

$("#navMenuBtn").click(function(e){
	e.preventDefault();
	e.stopPropagation();
	$(".cPanelLoggedIn").css("margin-left", "0");

	$("#closeCpanelLoggedIn").click(function(ev){
		ev.preventDefault();
		ev.stopPropagation();
		$(".cPanelLoggedIn").css("margin-left", "-100%");
	});

	$(".cPanelLoggedOut").css("margin-left", "0");

	$("#closeCpanelLoggedOut").click(function(eve){
		eve.preventDefault();
		eve.stopPropagation();
		$(".cPanelLoggedOut").css("margin-left", "-100%");
	});

	//var navW = ( $("nav").width() )  + "px";

});


//*********************************************//

$("a.scrollDown").click(function(e){
	 e.preventDefault();

        $("body, html").animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 600);

});

//*********************************************//

$(".content-register").mouseover(function(){
	$(this).find("span:not(.err)").css("color", "#A5FFCE");
	$(this).find("span:not(.err)").css("text-shadow", "0 0 12px #262626");
	$(this).find(".formHeader strong").css("color", "#A5FFCE");
	$(this).find(".formHeader strong").css("text-shadow", "0 0 12px #262626");
}).mouseleave(function(){
	$(this).find("span:not(.err)").css("color", "inherit");
	$(this).find("span:not(.err)").css("text-shadow", "inherit");
	$(this).find(".formHeader strong").css("color", "inherit");
	$(this).find(".formHeader strong").css("text-shadow", "inherit");
});

$("div.student").find( $("div.formHeader") ).click(function(){
	$("div.employer").find( $("form") ).slideUp("slow");
	$("div.student").find( $("form") ).slideToggle( "slow", "swing" );

});
$("div.employer").find( $("div.formHeader") ).click(function(){
	$("div.student").find( $("form") ).slideUp("slow");
	$("div.employer").find( $("form") ).slideToggle( "slow", "swing" );
});



//*********************************************//

$("#bidBtn").click(function(){
	$("#populate_bidding_form").slideDown("slow");
});
$("#bid_cancel_btn").click(function(){
	$("#populate_bidding_form").slideUp("slow");
});


//*********************************************//


/*
$("div.jobs_posts_container").click(function(){
	$(this).find( ".jobs_posts_hidden_container" ).slideToggle("slow");
});

$("a#show_Replies_Btn").click(function(e){
	e.preventDefault();
});
*/

//*********************************************//



//*********************************************//

$(document).on("click", "#add_date_fieldset", function(e){
	e.preventDefault();
})
$(document).on("click", "#remove_date_fieldset", function(e){
	e.preventDefault();
	$(this).parent("fieldset").remove();
})


//*********************************************//
});




//******************** Post Job Steps functions *************************//
$(document).on("click", "button.go_next_from_step_1", function(){
	if( $("div.step_2")[0] ){
		/************ If step 2 EXISTS *************/
		$("div.step_1_icon").removeClass("secondary").addClass("primary");
		$("div.step_2_icon").removeClass("primary").addClass("secondary");
		$("div.step_3_icon").removeClass("secondary").addClass("primary");
		$("div.step_4_icon").removeClass("secondary").addClass("primary");

		$("div.step_1").fadeOut("slow");
		$("div.step_3").fadeOut("slow");
		$("div.step_4").fadeOut("slow");
		$("div.step_2").slideDown("slow");
	}else{
		/************ If step 2 DOESN'T EXISTS *************/
		$("div.step_1_icon").removeClass("secondary").addClass("primary");
		$("div.step_2_icon").removeClass("secondary").addClass("primary");
		$("div.step_3_icon").removeClass("primary").addClass("secondary");
		$("div.step_4_icon").removeClass("secondary").addClass("primary");

		$("div.step_1").fadeOut("slow");
		$("div.step_2").fadeOut("slow");
		$("div.step_3").fadeIn("slow");
		$("div.step_4").fadeOut("slow");	}
});

$(document).on("click", "button.go_next_from_step_2", function(){
	$("div.step_1_icon").removeClass("secondary").addClass("primary");
	$("div.step_2_icon").removeClass("secondary").addClass("primary");
	$("div.step_3_icon").removeClass("primary").addClass("secondary");
	$("div.step_4_icon").removeClass("secondary").addClass("primary");

	$("div.step_1").fadeOut("slow");
	$("div.step_2").fadeOut("slow");
	$("div.step_3").fadeIn("slow");
	$("div.step_4").fadeOut("slow");
});
$(document).on("click", "button.go_previous_from_step_2", function(){
	$("div.step_1_icon").removeClass("primary").addClass("secondary");
	$("div.step_2_icon").removeClass("secondary").addClass("primary");
	$("div.step_3_icon").removeClass("secondary").addClass("primary");
	$("div.step_4_icon").removeClass("secondary").addClass("primary");

	$("div.step_1").fadeIn("slow");
	$("div.step_2").fadeOut("slow");
	$("div.step_3").fadeOut("slow");
	$("div.step_4").fadeOut("slow");
});

$(document).on("click", "button.go_next_from_step_3", function(){
	$("div.step_1_icon").removeClass("secondary").addClass("primary");
	$("div.step_2_icon").removeClass("secondary").addClass("primary");
	$("div.step_3_icon").removeClass("secondary").addClass("primary");
	$("div.step_4_icon").removeClass("primary").addClass("secondary");

	$("div.step_1").fadeOut("slow");
	$("div.step_2").fadeOut("slow");
	$("div.step_3").fadeOut("slow");
	$("div.step_4").fadeIn("slow");
});
$(document).on("click", "button.go_previous_from_step_3", function(){
	if( $("div.step_2")[0] ){
		$("div.step_1_icon").removeClass("secondary").addClass("primary");
		$("div.step_2_icon").removeClass("primary").addClass("secondary");
		$("div.step_3_icon").removeClass("secondary").addClass("primary");
		$("div.step_4_icon").removeClass("secondary").addClass("primary");

		$("div.step_1").fadeOut("slow");
		$("div.step_2").fadeIn("slow");
		$("div.step_3").fadeOut("slow");
		$("div.step_4").fadeOut("slow");
	}else{
		$("div.step_1_icon").removeClass("primary").addClass("secondary");
		$("div.step_2_icon").removeClass("secondary").addClass("primary");
		$("div.step_3_icon").removeClass("secondary").addClass("primary");
		$("div.step_4_icon").removeClass("secondary").addClass("primary");

		$("div.step_1").fadeIn("slow");
		$("div.step_2").fadeOut("slow");
		$("div.step_3").fadeOut("slow");
		$("div.step_4").fadeOut("slow");
	}
});

$(document).on("click", "button.go_previous_from_step_4", function(){
	$("div.step_1_icon").removeClass("secondary").addClass("primary");
	$("div.step_2_icon").removeClass("secondary").addClass("primary");
	$("div.step_3_icon").removeClass("primary").addClass("secondary");
	$("div.step_4_icon").removeClass("secondary").addClass("primary");

	$("div.step_1").fadeOut("slow");
	$("div.step_2").fadeOut("slow");
	$("div.step_3").fadeIn("slow");
	$("div.step_4").fadeOut("slow");
});
//******************** Post Job Steps functions *************************//


//******************** Validate Update Password *************************//

function validate_update_password(){

	var new_password = $("input[name=new_password]").val();
	var retype_new_password = $("input[name=retype_new_password]").val();

	if( new_password !== "" && retype_new_password !== "" ){
		if( new_password == retype_new_password ){

			alert("Passwords Match!");
			$("input[name=retype_new_password]").parent("div").prev("div").removeClass("el el-remove-circle");
			if( !validate_password(new_password) ){
				alert("Invalid Password Format");
	      $("input[name=new_password]").parent("div").prev("div").removeClass("el el-ok-circle").addClass("el el-remove-circle");
	      return false;
	    }else{
				$("input[name=new_password]").parent("div").prev("div").removeClass("el el-remove-circle").addClass("el el-ok-circle");
				$("input[name=retype_new_password]").parent("div").prev("div").removeClass("el el-remove-circle").addClass("el el-ok-circle");
	    }

		}else{
			alert("Passwords Do Not Match!");
			$("input[name=retype_new_password]").parent("div").prev("div").addClass("el el-remove-circle");
			return false;
		}
	}else{
		alert("Please enter valid passwords");
		return false;
	}

}

function validate_password(str2){
  // password maust have 1 uppercaps letter and 1 number
  var regEx = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  return regEx.test(str2);
}

//***********************************************************************//
