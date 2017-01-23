function validate_registration_student(){

var fname = $("input#fname").val();
var lname = $("input#lname").val();
var email = $("input#email").val();
var password = $("input#password").val();
var postalCode = $("input#postalCode").val();

  if( fname !== "" && lname !== "" && email !== "" && password !== "" && postalCode !== "" && $("#cb_terms").is(":checked") ){

    if( !validate_email(email) ){
      $("span.err_email").removeClass("el el-ok-sign").addClass("el el-remove-sign");
      return false;
    }else{
      $("span.err_email").removeClass("el el-remove-circle").addClass("el el-ok-circle");
    }

    if( !validate_password(password) ){
      $("span.err_password").removeClass("el el-ok-circle").addClass("el el-remove-circle");
      return false;
    }else{
      $("span.err_password").removeClass("el el-remove-circle").addClass("el el-ok-circle");
    }

    if( !validate_postalCode(postalCode) ){
      $("span.err_postalCode").removeClass("el el-ok-circle").addClass("el el-remove-circle");
      return false;
    }else{
      $("span.err_postalCode").removeClass("el el-remove-circle").addClass("el el-ok-circle");
    }

  }else{
    if( fname == "" ){
      $("span.err_fname").removeClass("el el-ok-circle").addClass("el el-remove-circle");
    }else{
      $("span.err_fname").removeClass("el el-remove-circle").addClass("el el-ok-circle");
    }
    if( lname == "" ){
      $("span.err_lname").removeClass("el el-ok-circle").addClass("el el-remove-circle");
    }else{
      $("span.err_lname").removeClass("el el-remove-circle").addClass("el el-ok-circle");
    }
    if( email == "" ){
      $("span.err_email").removeClass("el el-ok-circle").addClass("el el-remove-circle");
    }else{
      if( !validate_email(email) ){
        $("span.err_email").removeClass("el el-ok-sign").addClass("el el-remove-sign");
        return false;
      }else{
        $("span.err_email").removeClass("el el-remove-circle").addClass("el el-ok-circle");
      }
    }
    if( password == "" ){
      $("span.err_password").removeClass("el el-ok-circle").addClass("el el-remove-circle");
    }else{
      if( !validate_password(password) ){
        $("span.err_password").removeClass("el el-ok-circle").addClass("el el-remove-circle");
        return false;
      }else{
        $("span.err_password").removeClass("el el-remove-circle").addClass("el el-ok-circle");
      }
    }
    if( postalCode == "" ){
      $("span.err_postalCode").removeClass("el el-ok-circle").addClass("el el-remove-circle");
    }else{
      if( !validate_postalCode(postalCode) ){
        $("span.err_postalCode").removeClass("el el-ok-circle").addClass("el el-remove-circle");
        return false;
      }else{
        $("span.err_postalCode").removeClass("el el-remove-circle").addClass("el el-ok-circle");
      }
    }
    if( !$("#cb_terms").is(":checked") ){
      $("span.err_cb").removeClass("el el-ok-circle").addClass("el el-remove-circle");
    }else{
      $("span.err_cb").removeClass("el el-remove-circle").addClass("el el-ok-circle");
    }
  return false;
  }
}


function validate_registration_client(){

var fname = $("input#fname2").val();
var lname = $("input#lname2").val();
var email = $("input#email2").val();
var password = $("input#password2").val();
var postalCode = $("input#postalCode2").val();

if( fname !== "" && lname !== "" && email !== "" && password !== "" && postalCode !== "" && $("#cb_terms2").is(":checked") ){

  if( !validate_email(email) ){
    $("span.err_email").removeClass("el el-ok-sign").addClass("el el-remove-sign");
    return false;
  }else{
    $("span.err_email").removeClass("el el-remove-circle").addClass("el el-ok-circle");
  }

  if( !validate_password(password) ){
    $("span.err_password").removeClass("el el-ok-circle").addClass("el el-remove-circle");
    return false;
  }else{
    $("span.err_password").removeClass("el el-remove-circle").addClass("el el-ok-circle");
  }

  if( !validate_postalCode(postalCode) ){
    $("span.err_postalCode").removeClass("el el-ok-circle").addClass("el el-remove-circle");
    return false;
  }else{
    $("span.err_postalCode").removeClass("el el-remove-circle").addClass("el el-ok-circle");
  }

}else{
  if( fname == "" ){
    $("span.err_fname").removeClass("el el-ok-circle").addClass("el el-remove-circle");
  }else{
    $("span.err_fname").removeClass("el el-remove-circle").addClass("el el-ok-circle");
  }
  if( lname == "" ){
    $("span.err_lname").removeClass("el el-ok-circle").addClass("el el-remove-circle");
  }else{
    $("span.err_lname").removeClass("el el-remove-circle").addClass("el el-ok-circle");
  }
  if( email == "" ){
    $("span.err_email").removeClass("el el-ok-circle").addClass("el el-remove-circle");
  }else{
    if( !validate_email(email) ){
      $("span.err_email").removeClass("el el-ok-sign").addClass("el el-remove-sign");
      return false;
    }else{
      $("span.err_email").removeClass("el el-remove-circle").addClass("el el-ok-circle");
    }
  }
  if( password == "" ){
    $("span.err_password").removeClass("el el-ok-circle").addClass("el el-remove-circle");
  }else{
    if( !validate_password(password) ){
      $("span.err_password").removeClass("el el-ok-circle").addClass("el el-remove-circle");
      return false;
    }else{
      $("span.err_password").removeClass("el el-remove-circle").addClass("el el-ok-circle");
    }
  }
  if( postalCode == "" ){
    $("span.err_postalCode").removeClass("el el-ok-circle").addClass("el el-remove-circle");
  }else{
    if( !validate_postalCode(postalCode) ){
      $("span.err_postalCode").removeClass("el el-ok-circle").addClass("el el-remove-circle");
      return false;
    }else{
      $("span.err_postalCode").removeClass("el el-remove-circle").addClass("el el-ok-circle");
    }
  }
  if( !$("#cb_terms2").is(":checked") ){
    $("span.err_cb").removeClass("el el-ok-circle").addClass("el el-remove-circle");
  }else{
    $("span.err_cb").removeClass("el el-remove-circle").addClass("el el-ok-circle");
  }
return false;
}
}


function validate_email(str){
  var regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regEx.test(str);
}

function validate_password(str2){
  // password maust have 1 uppercaps letter and 1 number
  var regEx = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  return regEx.test(str2);
}

function validate_postalCode(str3){
  var regEx = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
  return regEx.test(str3);
}
