<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<style>

</style>



<body>
<?php include("../common/navigation.php"); ?>

<div class="row">
<div class="bodyOutline">

<button id="btn">Click</button>
<div id="div"></div>
<script>

  $("button#btn").on("click", function(){
    $("div#div").html("<input type='date' id='input'/>");
    $("#input").datepicker();

  });


</script>
<?php

/******************************************************************************/
/******************************************************************************/



$connection->close();
?>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
