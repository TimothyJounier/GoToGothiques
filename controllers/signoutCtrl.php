<?php
session_start();

$_SESSION = array();

header('location: /controllers/homeCtrl.php');