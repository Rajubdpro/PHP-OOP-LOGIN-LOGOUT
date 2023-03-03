<?php

require'function.php';

$log_out = new logout();

if(isset($_POST['logout'])){
    $log_out->log_out();
}

?>