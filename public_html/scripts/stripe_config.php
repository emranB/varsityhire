<?php

require_once('../stripe/init.php');
\Stripe\Stripe::setApiKey('sk_test_TJUgjCQ5HBeqdkEodmfF3R1g');

$stripe = array(
  "secret_key"      => "sk_test_TJUgjCQ5HBeqdkEodmfF3R1g",
  "publishable_key" => "pk_test_2LCwFRswn2Beys6jEJ5YlOk6"
);
\Stripe\Stripe::setApiKey($stripe['secret_key']);

?>
