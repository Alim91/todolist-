<?php
session_start();
require_once "./helper/index.php";
require_once "./controller/index.php";
require_once "./view/header.php"; ?>
<?php if ( $_SESSION["loggedIn"] !== true ): ?>
<?php require_once "./view/login/index.php"; ?>
<?php require_once "./view/register/index.php"; ?>
<?php elseif ( $_SESSION["loggedIn"] === true ): ?>
<?php require_once "./view/dashboard/index.php"; ?>
<?php endif; ?>
<?php require_once "./view/footer.php" ?>
