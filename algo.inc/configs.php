<?php
$prjPrefix = "AGR";

$prjDesc = "Algo Review";

// URL
$prjURL = "http://localhost/algorand-reviews/";
//$prjURL = "https://pyrosys.co/algo-review/";

// Currency 
$prjCur = "$";

// Currency in Words
$prjCurWords = "USD";

// Auth. Reserved Permalinks
$prjPermas = array('user','pages');



// Default Functions
// URL Parser
    function checkURL($req){
        $arr = explode("/", $req, 2);
        //$first = $arr[0];
        if ($arr[0]!='') {
            return $arr;
        } else { 
            return 0;
        }
    }

?>


