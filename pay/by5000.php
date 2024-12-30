<?php
include("../bot.php");
$MerchantID = 'مریچنت';//مریچنت زرین پال را اینجا وارد کنید
$Amount = 5000;
$Authority = $_GET['Authority'];
$group = $_GET['gpid'];
if ($_GET['Status'] == 'OK'){
$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
$result = $client->PaymentVerification(
[
'MerchantID' => $MerchantID,
'Authority' => $Authority,
'Amount' => $Amount,

]
);

if ($result->Status == 100){
echo file_get_contents("payComplete30.html");
date_default_timezone_set('Asia/Tehran');
		$gpFile = json_decode(file_get_contents("../data/$group.json"),true);
		$gpCharge = $gpFile["information"]["expire"];
		$next_date = date('Y-m-d', strtotime($gpCharge ." +30 day"));
		$settings = json_decode(file_get_contents("../data/$group.json"),true);
		$settings["information"]["expire"]=$next_date;
		$settings = json_encode($settings,true);
		file_put_contents("../data/$group.json",$settings);
       sendMessage("$group","📍 پرداخت شما موفقیت امیز بود 
🎉 میزان شارژ خریداری شد : 30 روز
📌 شارژ گروه شما به میزان 30 روز افزایش یافت 
از حمایت شما سپاسگزاریم 🙏

");
sendMessage("$Dev[0]","📍 یک خرید انجام شد
🎉 میزان شارژ خریداری شد : 30 روز 
🎉مشخصات گروه :
📍 ایدی گروه : [ $group ]
");
          
} else {
       echo file_get_contents("paysend.html");
}
}
else{
     echo file_get_contents("payment.html");
}

?>
