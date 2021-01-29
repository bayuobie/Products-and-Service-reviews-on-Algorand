<?php 
ob_start();
session_start();

//Include Site Configs
include "algo.inc/configs.php";
if(isset($_REQUEST['p']) && strlen($_REQUEST['p'])>4){
    $prod = $_REQUEST['p'];
} else {
    $prod = 'ITM001';
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title><?=$prjDesc?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:title" content="<?=$prjDesc?>">
        <meta property="og:description" content="Decentralised ecommerce product reviews">
        <meta property="og:image" content="<?=$prjURL?>images/favicon.ico.png">
        <meta property="og:url" content="<?=$prjURL?>">
        <link rel="shortcut icon" href="<?=$prjURL?>images/favicon.ico.png">
        <!-- Bootstrap -->
        <link href="<?=$prjURL?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="<?=$prjURL?>css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.3/css/line.css">
        <!-- Slider -->               
        <link rel="stylesheet" href="<?=$prjURL?>css/owl.carousel.min.css"/> 
        <link rel="stylesheet" href="<?=$prjURL?>css/owl.theme.default.min.css"/> 
        <!-- Main Css -->
        <link href="<?=$prjURL?>css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="<?=$prjURL?>css/colors/default.css" rel="stylesheet" id="color-opt">
        <link href="<?=$prjURL?>toastr/toastr.css" rel="stylesheet">
        
        <style type="text/css">
            .bg-half {
                padding: 80px 0 90px !important;
            }
        </style>
    </head>

    <body>
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="<?=$prjURL?>">
                        <img src="images/logo-dark.png" height="24" alt="">
                    </a>
                </div>                 
                <div class="buy-button">
                    <a href="javascript:;">
                        <div class="btn btn-primary">Admin</div>
                    </a>
                </div><!--end login button-->
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li><a href="<?=$prjURL?>">Home</a></li>
                        <li><a href="<?=$prjURL?>reviews">Reviews</a></li>
                    </ul><!--end navigation menu-->
                    <div class="d-none">
                        <a href="javascript:;" class="btn btn-primary">Admin</a>
                    </div><!--end login button-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->

        <!-- Hero Start -->
        <section class="bg-half bg-light d-table w-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="<?=$prjURL?>"><?=$prjDesc?></a></li>
                                        <?php if (isset($_REQUEST['l'])) {
                                            $URLArr = checkURL($_REQUEST['l']);
                                            if (isset($URLArr[0]) && $URLArr[0]!="") { 
                                                $page = $URLArr[0];
                                                if (file_exists('./algo.inc/'.$page.'.algo')) {
                                            ?>
                                                    <li class="breadcrumb-item active" aria-current="page"><?=ucwords($URLArr[0])?></li>
                                                <?php } else { ?>
                                                    <li class="breadcrumb-item active" aria-current="page">#404</li>
                                                <?php }
                                                }
                                            } else { 
                                                $page = 'main';
                                            ?>
                                            <li class="breadcrumb-item active" aria-current="page">Main</li>
                                        <?php }?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->

        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Start Forums -->
        <section class="section">
            <div class="container">
                
                    <?php //var_dump($URLArr) ?>
                    <?php
                        if (file_exists('./algo.inc/'.$page.'.algo')) {
                          include ('./algo.inc/'.$page.'.algo');
                        } else { ?>
                          <div class="col-lg-12 ">
                            <div class="" style="text-align: center; padding: 0px 0px 10px 0px">
                              <img class="img-fluid" src="<?=$prjURL?>images/404.svg" width="60%">
                              <br><span style="width: 50%; font-size: 50px; padding-top: 80px; font-weight:bolder">Sorry :/</span>
                              <br><span style="width: 50%; font-size: 30px; padding-top: 20px; font-weight:bolder">Page is Unavailable</span>
                            </div>
                          </div>
                        <?php }
                    ?>
                
            </div><!--end container-->
        </section><!--end section-->
        <!-- Start Forums -->

        
        <footer class="footer footer-bar">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="text-sm-left">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> <?=$prjDesc?></p>
                        </div>
                    </div><!--end col-->

                    <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <!-- <p class="mb-0">Made with <i class="mdi mdi-heart text-danger"></i></p> -->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->
        <!-- Footer End -->

        <!-- Back to top -->
        <a href="javascript:;" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="<?=$prjURL?>js/jquery-3.5.1.min.js"></script>
        <script src="<?=$prjURL?>js/bootstrap.bundle.min.js"></script>
        <script src="<?=$prjURL?>js/jquery.easing.min.js"></script>
        <script src="<?=$prjURL?>js/scrollspy.min.js"></script>
        <!-- SLIDER -->
        <script src="<?=$prjURL?>js/owl.carousel.min.js"></script>
        <script src="<?=$prjURL?>js/owl.init.js"></script>
        <!-- Icons -->
        <script src="<?=$prjURL?>js/feather.min.js"></script>
        <script src="https://unicons.iconscout.com/release/v3.0.3/script/monochrome/bundle.js"></script>
        <!-- Switcher -->
        <script src="<?=$prjURL?>js/switcher.js"></script>
        <!-- Main Js -->
        <script src="<?=$prjURL?>js/app.js"></script>
        <script src="<?=$prjURL?>toastr/toastr.min.js"></script>
        <script  src="<?=$prjURL?>algo.inc/sdk/algosdk.min.js"></script>
        <script  src="<?=$prjURL?>js/script.js"></script>
        <script>
            $('.plus').click(function () {
                if ($(this).prev().val() < 999) {
                    $(this).prev().val(+$(this).prev().val() + 1);
                }
            });
            $('.minus').click(function () {
                if ($(this).next().val() > 1) {
                    if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
                }
            });
        </script>
    </body>
</html>

<script type="text/javascript">
window.onload = function() {
  getReviews();
  convertBill();
};
    
    function getReviews() {
      var itemCode = '<?=$prod?>';
      $.ajax({
        type: "POST",
        url: "./algo.inc/algoTransIndexer",
        data: { pID:itemCode },
        success: function(resp) {
            //prodReviews
            $("#prodReviews").html(resp);
        }
      }); 
    }
    
    function convertBill() {
      $(".checkoutBtn").attr("disabled", "");
      $('#checkoutForm').fadeTo("slow", 0.5).css('pointer-events', 'none');
      var bAmount = $("#billAmt").val();
      var targetSymbol = $("#cryptSymbol").val();
      var count = 0;
      var filtered_json = [];
      $.ajax({
        type: "POST",
        url: "./algo.inc/rateChecker.php",
        data: {  },
        success: function(resp) {
            var jsonData = JSON.parse(resp);
            for (var i = 0; i < jsonData.length; i++) {
                if(jsonData[i]['symbol'] == targetSymbol){
                    count++;
                    filtered_json.push(jsonData[i]);
                }
            }
            console.log(filtered_json);
            $(".checkoutBtn").removeAttr("disabled");
            $('#checkoutForm').fadeTo("slow", 1).css('pointer-events', 'auto');
            $("#amtInAlgos").html('( <img src="./images/logo-dark.png" style="margin-top:-3px" height="14"> '+(parseFloat(bAmount)/filtered_json[0][convPrice]).toFixed(4)+' )');
            $("#convertedRate").val((parseFloat(bAmount)/filtered_json[0][convPrice]));

        }
      }); 
    }

    // Process Transaction
    function doTransaction(ttype){
        var alertmsg = (ttype==='review')?'Your '+ttype+' was successful':ttype+' has been successful';
        var jsonRes = [];
        var usrName = $( "#full-name").val();
        var usrAlgo = (ttype==='review')?merchAlgoAddress:$("#cryptoAddress").val();
        var cOrderID = (ttype==='review')?'<?=time()?>':$( "#order-id").val();
        var cItem = (ttype==='review')?'<?=$prod?>':$( "#itmCode").val();
        var cAmount = (ttype==='review')?0:$("#convertedRate").val();
        var usrReview = $( "#comments").val();
        var amtToInt = parseFloat(cAmount);
        var amtFinal = amtToInt.toFixed(2);

        if (usrName!=='' && usrAlgo!=='') {
            $(".submitBtn").attr("disabled", "");
            $('#'+ttype+'-form').fadeTo("slow", 0.5).css('pointer-events', 'none');
            $.ajax({
                type: "GET",
                url: "https://api.algoexplorer.io/v2/accounts/"+usrAlgo,
                data: {  },
                success: function(resp) {
                    jsonRes.push(resp);
                    var mnemonic = (ttype==='review')?'settle strike venue earn accident shrug state oxygen adult calm twice seven soldier umbrella fee shell health jeans purity enlist what answer share abstract success':$("#cryptoMnemonic").val();
                    let account = algosdk.mnemonicToSecretKey(mnemonic);
                    address = account.addr;
                    if (ttype==='review') {
                        var jsonNote = '[{"oderid":"'+cOrderID+'", "storename":"AlgoReview", "storeurl":"'+window.location.href+'", "fullname":"'+usrName+'",';
                        jsonNote +='"'+cItem+'": { "name":"'+cItem+' Review", "qty":"1", "price_usd":"10.00" },';
                        jsonNote +='"review": { "comment":"'+usrReview+'", "reviewby":"user", "revieweradd":"'+usrAlgo+'" }';
                        jsonNote +='}]';
                    } else {
                        var jsonNote = '[{"oderid":"'+cOrderID+'", "storename":"AlgoReview", "storeurl":"'+window.location.href+'", "fullname":"'+usrName+'",';
                        jsonNote +='"'+cItem+'": { "name":"Product '+cItem+'", "qty":"2", "price_usd":"10.00" },';
                        jsonNote +='"review": { "comment":"'+usrReview+'", "reviewby":"user", "revieweradd":"'+usrAlgo+'" }';
                        jsonNote +='}]';
                    }

                    const url = "https://api.testnet.algoexplorer.io/v2/transactions/params";
                    const traxUrl = "https://api.testnet.algoexplorer.io/v2/transactions";
                    fetch(url)
                      .then(response => response.json())
                      .then(params=> { 
                        firstRound = params["last-round"];
                        lastRound = params["last-round"] + 1000;
                        genesisID = params["genesis-id"];
                        genesisHash = params["genesis-hash"];
                        params.fee= 1000;
                        amount = (amtFinal*1000000);
                        let note = algosdk.encodeObj(jsonNote);
                        address = account.addr;

                        let suggestedParams = {
                            "flatFee": true,
                            "fee": params.fee,
                            "firstRound": firstRound,
                            "lastRound": lastRound,
                            "genesisID": genesisID,
                            "genesisHash": genesisHash,
                          
                        };

                        //process transaction
                        let txn = algosdk.makePaymentTxnWithSuggestedParams(address, merchAlgoAddress, amount, undefined, note, suggestedParams);
                        let signedTxn = txn.signTxn(account.sk);

                        fetch(traxUrl, {
                         method: 'POST', 
                          headers: {
                           'Content-Type': 'application/x-binary',
                          },
                          body: signedTxn,
                        })
                        .then(response => response.json())
                        .then(data => {
                            // console.log(data);
                            toastr.success('Great! '+alertmsg);

                            setInterval(function(){
                                if (ttype==='review') {
                                    var relURL = location.href;
                                    window.location.href = relURL+"&done";
                                } else {
                                    location.replace("./thankyou");
                                }
                            }, 1000);
                        })
                        .catch((error) => {
                          console.error('Error:', error);
                          toastr.error('Sorry! An Error occurred. Try Again');
                            $(".submitBtn").removeAttr("disabled");
                            $('#'+ttype+'-form').fadeTo("slow", 1).css('pointer-events', 'auto');
                        });
                      });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error('Sorry! Invalid Algorand Address'); 
                    $(".submitBtn").removeAttr("disabled");
                    $('#'+ttype+'-form').fadeTo("slow", 1).css('pointer-events', 'auto');
                }
            });

        } else { 
            //...
            $(".submitBtn").removeAttr("disabled");
            toastr.warning('All fields are required.'); 
        }
    }

    $( "#checkout-form" ).submit(function( event ) {
      doTransaction('checkout');
      event.preventDefault();
    });

    $( "#review-form" ).submit(function( event ) {
      doTransaction('review');
      event.preventDefault();
    });

</script>