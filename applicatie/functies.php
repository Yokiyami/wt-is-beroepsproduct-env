<?php
if (isset($_GET['pagina'])) {
  $selectedPage = $_GET['pagina'];
  header("Location: $selectedPage");
  exit;
}

if (isset($_GET['login-als'])) {
  $selectedPage = $_GET['login-als'];
  header("Location: $selectedPage");
  exit;
}