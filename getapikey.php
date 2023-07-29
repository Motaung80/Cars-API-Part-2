<?php
session_start();

if (isset($_SESSION['apikey'])) {
  $apikey = $_SESSION['apikey'];
  echo $apikey;
} else {
  echo 'No API key found in session';
}
?>