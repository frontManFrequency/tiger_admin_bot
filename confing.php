<?php
flush();
ob_start();
ob_implicit_flush(1);
 ini_set( "expose_php","Off" );
ini_set( "Allow_url_fopen","Off" );
ini_set( "disable_functions","exec,passthru,shell_exec,system,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source,eval,file,file_get_contents,file_put_contents,fclose,fopen,fwrite,mkdir,rmdir,unlink,glob,echo,die,exit,print,scandir" );
ini_set( "max_execution_time","25" );
ini_set( "max_input_time","25" );
ini_set( "memory_limit","15M" );
ini_set( "file_uploads","Off" );
ini_set( "post_max_size","10k" );
error_reporting(0);
ini_set( "log_errors","Off" );
ignore_user_abort(true);
date_default_timezone_set('Asia/Tehran');
define('API_KEY','7906620801:AAHa9sMWCN2zrnF6aOY18g6X4rZeJsCz52A'); //توکن خود را اینجا وارد کنید
//-----------------------------------------------------------------------------------------
//فانکشن botevoobot :
function botevoobot($method,$data){
  
  $url = "https://api.telegram.org/bot".API_KEY."/".$method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, count($data));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
 }
//-----------------------------------------------------------------------------------------
//متغیر ها :
$Dev = array("384245451","895404911","0000000000"); // آیدی مدیر
@$usernamebot = "TigerAdminVIP_bot"; // آیدی بوت
@$idbot = "7906620801"; // آیدی عددی توکن بوت
@$channel = "TigerAdmin_bot_Channel"; // آدرس کانال
@$idchannel ="2373324815"; // آیدی چنل
@$nemechannel = "تایگر";  // Name Channel
@$web = "https://erfansx.store/group/"; // آدرس مسیر اصلی ربات
@$linkgrop = "https://t.me/USER"; // گروه پشتیبانی
@$botnamef="تایگر";
@$token = API_KEY;
//----------------------------------------------------------------------------------------------
@$adsbot6=file_get_contents('data/tablighat.txt');
@$startbot6=file_get_contents('data/start.txt');
@$freedays=file_get_contents('data/fredays.txt');
//-----------------------------------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
@$message = $update->message;
@$from_id = $message->from->id;
@$chat_id = $message->chat->id;
@$message_id = $message->message_id;
@$first_name = $message->from->first_name;
@$last_name = $message->from->last_name;
@$username = $message->from->username;
@$textmassage = $message->text;
@$firstname = $update->callback_query->from->first_name;
@$usernames = $update->callback_query->from->username;
@$chatid = $update->callback_query->message->chat->id;
@$fromid = $update->callback_query->from->id;
@$membercall = $update->callback_query->id;
@$reply = $update->message->reply_to_message->forward_from->id;
//------------------------------------------------------------------------
@$data = $update->callback_query->data;
@$messageid = $update->callback_query->message->message_id;
@$tc = $update->message->chat->type;
@$gpname = $update->callback_query->message->chat->title;
@$namegroup = $update->message->chat->title;
@$text = $update->inline_qurey->qurey;
//------------------------------------------------------------------------
@$newchatmemberid = $update->message->new_chat_member->id;
@$newchatmemberu = $update->message->new_chat_member->username;
@$rt = $update->message->reply_to_message;
@$replyid = $update->message->reply_to_message->message_id;
@$tedadmsg = $update->message->message_id;
@$edit = $update->edited_message->text;
@$re_id = $update->message->reply_to_message->from->id;
@$re_user = $update->message->reply_to_message->from->username;
@$re_name = $update->message->reply_to_message->from->first_name;
@$re_msgid = $update->message->reply_to_message->message_id;
@$re_chatid = $update->message->reply_to_message->chat->id;
@$message_edit_id = $update->edited_message->message_id;
@$chat_edit_id = $update->edited_message->chat->id;
@$edit_for_id = $update->edited_message->from->id;
@$edit_chatid = $update->callback_query->edited_message->chat->id;
@$caption = $update->message->caption;
//------------------------------------------------------------------------
@$statjson = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$from_id),true);
@$status = $statjson['result']['status'];
@$statjsonrt = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$re_id),true);
@$statusrt = $statjsonrt['result']['status'];
@$statjsonq = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chatid&user_id=".$fromid),true);
@$statusq = $statjsonq['result']['status'];
@$info = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_edit_id&user_id=".$edit_for_id),true);
@$you = $info['result']['status'];
@$forchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$from_id));
@$tch = $forchannel->result->status;
@$forchannelq = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$fromid));
@$tchq = $forchannelq->result->status;
//-----------------------------------------------------------------------------------------
@$settings = json_decode(file_get_contents("data/$chat_id.json"),true);
@$settings2 = json_decode(file_get_contents("data/$chatid.json"),true);
@$editgetsettings = json_decode(file_get_contents("data/$chat_edit_id.json"),true);
@$user = json_decode(file_get_contents("data/user.json"),true);
@$filterget = $settings["filterlist"];
//=========================================================================
//فانکشن ها :
function SendMessage($chat_id, $text){
botevoobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
 function Forward($berekoja,$azchejaei,$kodompayam)
{
botevoobot('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
function  getUserProfilePhotos($token,$from_id) {
  @$url = 'https://api.telegram.org/bot'.$token.'/getUserProfilePhotos?user_id='.$from_id;
  @$result = file_get_contents($url);
  @$result = json_decode ($result);
  @$result = $result->result;
  return $result;
}
function check_filter($str){
	global $filterget;
	foreach($filterget as $d){
		if (mb_strpos($str, $d) !== false) {
			return true;
		}
	}
}
function vmsTehranDate(){
    $tehran = new DateTimeZone("Asia/Tehran");
    $london = new DateTimeZone("Europe/London");
    $dateDiff = new DateTime("now", $london);
    $timeOffset = $tehran->getOffset($dateDiff);
    $newtime = time() + $timeOffset;
    return Date("H:i:s",$newtime);
}
//=========================================================================
// dokmezer
@$inlinebutton = json_encode([
    'inline_keyboard'=>[
           [
         ['text'=>"$nemechannel",'url'=>"https://telegram.me/$channel"]
     ],
   ]
   ]);
   $bitcoin2 = file_get_contents("https://www.tgju.org/profile/crypto-bitcoin");
$ethereum2 = file_get_contents("https://www.tgju.org/profile/crypto-ethereum");
$litecoin2 = file_get_contents("https://www.tgju.org/profile/crypto-litecoin");
$tron2 = file_get_contents("https://www.tgju.org/profile/crypto-tron");
$tether2 = file_get_contents("https://www.tgju.org/profile/crypto-tether");
$dogecoin2 = file_get_contents("https://www.tgju.org/profile/crypto-dogecoin");
$bitcoincash2 = file_get_contents("https://www.tgju.org/profile/crypto-bitcoin-cash");
preg_match_all('#<td class="text-left">(.*?)</td>#',$bitcoin2,$bitcoin1);
preg_match_all('#<td class="text-left">(.*?)</td>#',$ethereum2,$ethereum1);
preg_match_all('#<td class="text-left">(.*?)</td>#',$litecoin2,$litecoin1);
preg_match_all('#<td class="text-left">(.*?)</td>#',$tron2,$tron1);
preg_match_all('#<td class="text-left">(.*?)</td>#',$tether2,$tether1);
preg_match_all('#<td class="text-left">(.*?)</td>#',$dogecoin2,$dogecoin1);
$bitcoin= $bitcoin1[1][0];
$ethereum=$ethereum1[1][0];
$litecoin=$litecoin1[1][0];
$tron = $tron1[1][0];
$tether = $tether1[1][0];
$dogecoin = $dogecoin1[1][0];
@$arzdigitalk = json_encode([
    'inline_keyboard'=>[
     [
         ['text'=>"$bitcoin",'callback_data'=>"dhcnjsdbcjhsd"],  ['text'=>"قیمت بیت کوین:",'callback_data'=>"jnjknbjhb"]
     ],
      [
             ['text'=>"$ethereum",'callback_data'=>"dhcnjsdbcjhsd"],  ['text'=>"قیمت اتریوم",'callback_data'=>"jnjknbjhb"]
     ],
      [
         ['text'=>"$litecoin",'callback_data'=>"dhcnjsdbcjhsd"],  ['text'=>"قیمت لایت کوین",'callback_data'=>"jnjknbjhb"]
     ],
      [
           ['text'=>"$tron",'callback_data'=>"dhcnjsdbcjhsd"],  ['text'=>"قیمت ترون:",'callback_data'=>"jnjknbjhb"]
     ],
      [
          ['text'=>"$dogecoin",'callback_data'=>"dhcnjsdbcjhsd"],  ['text'=>"قیمت دوج کوین:",'callback_data'=>"jnjknbjhb"]
     ],
      [
            ['text'=>"💵 قیمت تتر : $tether  ",'callback_data'=>"dhcnjsdbcjhsd"]
     ],
   ]
   ]);
?>