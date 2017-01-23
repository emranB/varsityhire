<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_job_ID = $_GET["job_ID"];
$GET_bid_ID = $_GET["bid_ID"];
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Sign Up Stripe Account</h1>

<div class="content">
<div class="content-stripe-signup">

<script>Stripe.setPublishableKey("pk_test_acfVSJh9Oo9QIGTAQpUvG5Ig");</script>
<?php
require_once('../stripe/init.php');
include("../scripts/stripe_config.php");

define('CLIENT_ID', 'ca_8NKc7IoSQxjkx3aAUAnX2aSBrEFTvmzQ');
define('API_KEY', 'sk_test_TJUgjCQ5HBeqdkEodmfF3R1g');
define('TOKEN_URI', 'https://connect.stripe.com/oauth/token');
define('AUTHORIZE_URI', 'https://connect.stripe.com/oauth/authorize');
if (isset($_GET['code'])) { // Redirect w/ code
  $code = $_GET['code'];
  $token_request_body = array(
    'client_secret' => API_KEY,
    'grant_type' => 'authorization_code',
    'client_id' => CLIENT_ID,
    'code' => $code,
  );
  $req = curl_init(TOKEN_URI);
  curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($req, CURLOPT_POST, true );
  curl_setopt($req, CURLOPT_POSTFIELDS, http_build_query($token_request_body));
  // TODO: Additional error handling
  $respCode = curl_getinfo($req, CURLINFO_HTTP_CODE);
  $resp = json_decode(curl_exec($req), true);
  curl_close($req);

  $access_token = $resp['access_token'];
  if( isset($access_token) ){
    echo "<hr />Successfully connected to Stripe! Your access token is: " . $access_token . '<hr />';
    $stripe_user_id = $resp['stripe_user_id'];

    $sql_Insert_Stripe_User_ID = " UPDATE students
                                   SET stripe_user_id = '$stripe_user_id'
                                   WHERE ID='$_SESSION[ID]' ";
    $query_Insert_Stripe_User_ID = $connection->query($sql_Insert_Stripe_User_ID);
    if( $query_Insert_Stripe_User_ID ){
      echo '<hr />Successfully added Stripe User ID to associated account: ' . $stripe_user_id . '<hr />';
    }

  }

} else if (isset($_GET['error'])) { // Error
  echo $_GET['error_description'];
} else { // Show OAuth link
  $authorize_request_body = array(
    'response_type' => 'code',
    'scope' => 'read_write',
    'client_id' => CLIENT_ID
  );
  // $url = AUTHORIZE_URI . '?' . http_build_query($authorize_request_body);
  $url = "https://connect.stripe.com/oauth/authorize?response_type=code" .
          "&client_id=ca_8NKc7IoSQxjkx3aAUAnX2aSBrEFTvmzQ" .
          "&scope=read_write" .
          "&stripe_user[country]=CA" .
          "&stripe_user[product_description]=not applicable" .
          "&stripe_user[business_type]=llc" .
          "&stripe_user[street_address]=not applicable" .
          "&stripe_user[city]=not applicable" .
          "&stripe_user[state]=AB" .
          "&stripe_user[zip]=T2P3C3" .
          "&stripe_user[business_name]=not applicable" .
          "&stripe_user[url]=http://notapplicable.com" .
          "&stripe_user[phone_number]=905-111-1111" ;

  echo "<a class='customBtn1' href='$url'>Connect with Stripe</a>";
}

$connection->close();
?>



</div>
</div>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
