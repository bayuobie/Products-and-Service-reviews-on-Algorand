<?php 
ob_start();
session_start();

//Include Configs
include "../configs.php";

// Process Checkout 
if (isset($_POST['checkout'])) {
    //custName, custAlgo
    $custName = $_POST['custName'];
    $custAlgo = $_POST['custAlgo'];
    
    if (strlen($custName) > 1) {
      	echo 1;
    } else {  
    	echo 0;
    }
}
?>