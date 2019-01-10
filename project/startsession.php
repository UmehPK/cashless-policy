<?php
  //session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['admin'])) {
    if (isset($_COOKIE['admin']) && isset($_COOKIE['username'])) {
      $_SESSION['admin'] = $_COOKIE['admin'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
  
  
  if (!isset($_SESSION['cust_id'])) {
    if (isset($_COOKIE['cust_id']) && isset($_COOKIE['username'])) {
      $_SESSION['cust_id'] = $_COOKIE['cust_id'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
?>
