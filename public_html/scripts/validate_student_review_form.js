function validate_student_review(){

  if( $("input[name=timing").is(":checked") ){
    var timing = $("input[name=timing]:checked").val();
  }else{
    var timing = "null";
  }

  if( $("input[name=cleanliness").is(":checked") ){
    var cleanliness = $("input[name=cleanliness]:checked").val();
  }else{
    var cleanliness = "null";
  }

  if( $("input[name=quality_of_work").is(":checked") ){
    var quality_of_work = $("input[name=quality_of_work]:checked").val();
  }else{
    var quality_of_work = "null";
  }

  if( $("input[name=knowledge_of_activity").is(":checked") ){
    var knowledge_of_activity = $("input[name=knowledge_of_activity]:checked").val();
  }else{
    var knowledge_of_activity = "null";
  }

  var score = 0;
  $( "input[name=timing]:checked" ).each(function(){
      score += parseInt( $(this).val(), 10 );
  });
  $( "input[name=cleanliness]:checked" ).each(function(){
      score += parseInt( $(this).val(), 10 );
  });
  $( "input[name=quality_of_work]:checked" ).each(function(){
      score += parseInt( $(this).val(), 10 );
  });
  $( "input[name=knowledge_of_activity]:checked" ).each(function(){
      score += parseInt( $(this).val(), 10 );
  });
  var average = score / 4;

  var additional_comments = $("textarea[name=additional_comments]").val();
  if( timing !== "null" && cleanliness !== "null" && quality_of_work !== "null" && knowledge_of_activity !== "null" ){
    return true;
  }else{
    alert("Please fill up all necessary fields");
    return false;
  }

  // alert ("timing: " + timing +
  //        "\n cleanliness: " + cleanliness +
  //        "\n quality_of_work: " + quality_of_work +
  //        "\n knowledge_of_activity: " + knowledge_of_activity +
  //        "\n average: " + average +
  //        "\n additional_comments: " + additional_comments);

  // return false;
}
