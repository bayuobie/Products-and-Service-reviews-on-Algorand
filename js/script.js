/* Conversion Price Configs
 * Change the value of the contant below to your preferred price option
 * [lastPrice / bidPrice / askPrice / openPrice / highPrice / lowPrice]
 * Also replace the merchAlgoAddress with a valid Algorand Address
 */
const convPrice = "bidPrice";
const merchAlgoAddress = "HIPB2IEVJ43VG66VFGBMIWNBHPIPXI6EDIOFNB3BN2E2KHWNPYDK2CJ24I";
const merchMnemonic = "settle strike venue earn accident shrug state oxygen adult calm twice seven soldier umbrella fee shell health jeans purity enlist what answer share abstract success";
const merchCallbackURL = "http://localhost/blaise/?";
const authTimeOutMils = 300000; //in mili-Seconds
const authTimeOutSecs = 30; //in Seconds

function genRandomID(length) {
   var result           = '';
   //var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}