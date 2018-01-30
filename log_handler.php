<?php
/*
 * Log Handler
 * Will handle all of the loggin for application (error and activity)
 */
/* USAGE:
 * Log Handler Usage in external pages:
 * require_once('config-test.php');
 * require_once('log_handler.php');
 * $logger = new AutoMainTrack_log();
 * $logger->error("Passing an error!",$logErrorsFile);
 * $logger->activity("Passing an message!",$logActivityFile);
 */
// Main log handler class consitsts of two function for handling logs
class autoMainTrack_log
{    
    private $logErrors;
    private $logActivity;
    // Set Variable
    function __construct($logActivity,$logErrors) {
        $this->logErrors = $logErrors;
        $this->logActivity = $logActivity;
    }
    // Error Handling
    public function error($errorMsg,$logErrorsFile)
    {
        if ($this->logErrors == 1) {
        error_log(date("Y/m/d - h:i:s A")." - ".$errorMsg."\r\n", 3, $logErrorsFile);
        }
    }
    // Activity Handling
    public function activity($actMsg,$logActivityFile)
    {
        if ($this->logActivity == 1) {
        $contents = file_get_contents($logActivityFile);
        $contents .= date("Y/m/d - h:i:s A")." - ".$actMsg."\r\n";
        file_put_contents($logActivityFile, $contents);
        }
    }
}