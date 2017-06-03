<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 3/6/2017
 * Time: 11:54 μμ
 */
require_once "includes/header.php";?>
<?php
$session->logout();

redirect('login.php');
?>