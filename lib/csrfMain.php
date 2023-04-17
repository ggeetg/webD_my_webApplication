<?php
session_start();
include_once('SecurityService.php');
$antiCSRF = new \Phppot\SecurityService\securityService();
$antiCSRF->unsetToken();
$antiCSRF->insertHiddenToken();
?>