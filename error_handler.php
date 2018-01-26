<?php
require_once('config.php');
ini_set("log_errors", $logErrors);
error_log( date("Y/m/d - h:i:s A")." - Error Occured!\r\n", 3, $logErrorsFile);