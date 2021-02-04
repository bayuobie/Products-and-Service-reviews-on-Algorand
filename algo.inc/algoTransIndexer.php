<?php
	if(isset($_REQUEST['pID']) && strlen($_REQUEST['pID'])>4){
	    $prod = $_REQUEST['pID'];
	} else {
	    $prod = 'ITM001';
	}

	$merchAddress = 'HIPB2IEVJ43VG66VFGBMIWNBHPIPXI6EDIOFNB3BN2E2KHWNPYDK2CJ24I';
	$cURLConnection = curl_init();
	curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.testnet.algoexplorer.io/idx2/v2/accounts/'.$merchAddress.'/transactions');
	curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
	$jsonRes = curl_exec($cURLConnection);
	curl_close($cURLConnection);

	$decJSON = json_decode($jsonRes, true);
	foreach ($decJSON['transactions'] as $key) {
		$mainBase64 = @$key['note'];
		$string = base64_decode($mainBase64);
		$arr = explode("{", $string, 2);
		
		$jsonRes = str_replace($arr[0], '', $string);
		$jsonRes2 = str_replace('[', '', $jsonRes);
		$jsonRes3 = str_replace(']', '', $jsonRes2);
		if (isset($key['note']) && strlen($jsonRes3)>1) {

			$transNote = json_decode($jsonRes3, true);

			if (isset($transNote["storeurl"]) && strlen($transNote["storeurl"])>1) {
				$prodID = substr($transNote["storeurl"],-6);
				@$transProdDetails = $transNote[$prodID];
				@$transNoteRev = $transNote["review"];
				if ($prodID==$prod) {
				?>
				<div class="p-4" style="border-top: 1px dashed #ccc;">
                    <div class="d-flex justify-content-between">
                        <div class="media align-items-center">
                            <a class="pr-3" href="javascript:;">
                                <img src="images/default-user.png" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                            </a>
                            <div class="commentor-detail">
                                <h6 class="mb-0">
                                    <a href="javascript:void(0)" class="media-heading text-dark">
                                    	<?=($transNoteRev['reviewby']=='admin')?'<i data-feather="command" class="fea icon-sm icons text-warning"></i>':''?>
                                    	<?=ucwords(strtolower($transNote["fullname"]))?>
                                    </a>
                                </h6>
                            </div>
                        </div>
                                        
                    </div>
                    <div class="mt-3">
                        <p class="text-muted mb-0"><?=$transNoteRev['comment']?></p>
                    </div>
                </div>
			<?php }
			}
		}
	}
?>