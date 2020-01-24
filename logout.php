<?php
require_once "config.php";

unset($_SESSION['validacao']);

header("location:login.php");
