<?php

$valid_passwords = array ("admin" => "admin", "Askar" => "0101", "Stefano" => "0202", "Sherif" => "0303", "Hasan" => "0404", "Tarek" => "0505", "Marwan" => "0606", "Ghayt" => "0707", "Preet" => "0808", "Veer" => "0909", "ghufra" => "1010", "Noor" => "1111");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="Regency Plus Trading Platform"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Sorry... You are not authorized...");
}
?>