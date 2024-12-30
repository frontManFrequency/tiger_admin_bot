<?php

// pv
if($textmassage=="/start" && $tc == "private" && $tc == "private"){
   
    botevoobot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"$startbot6",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
               [
                    ['text'=>"🤖 افزودن به گروه",'callback_data'=>"addbot"]
                ],
                [
                ['text'=>"👨‍💻 حساب کاربری",'callback_data'=>"info-pv"],
                 ['text'=>"⚙️ امکانات",'callback_data'=>"help-pv"]
                ],
                [
                 ['text'=>"🔑 پشتیبانی",'callback_data'=>"Support"],   
                ],
           ],
        ])
    ]);
    
}
elseif(strpos($textmassage , '/start ') !== false && $tc == "private") {
    $from = str_replace("/start ","",$textmassage);
    @$user = json_decode(file_get_contents("data/user.json"),true);
    if(in_array($from_id, $user["userlist"])) {
        botevoobot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ شما قبلا عضو ربات شده اید
از دکمه های زیر استفاده کن ✅
",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
               [
                    ['text'=>"🤖 افزودن به گروه",'callback_data'=>"addbot"]
                ],
                [
                ['text'=>"👨‍💻 حساب کاربری",'callback_data'=>"info-pv"],
                 ['text'=>"⚙️ امکانات",'callback_data'=>"help-pv"]
                ],
                [
                 ['text'=>"🔑 پشتیبانی",'callback_data'=>"Support"],   
                ],
           ],
        ])
    ]);
    }
    else
    {
        $invite = $user["userjop"]["$from"]["invite"];
        $plusinvite = $invite + 1;
        botevoobot('sendmessage',[
            'chat_id'=>$from,
            'text'=>"
✅ یک کابر با لینک دعوت شما وارد ربات شد
🌟 تعداد افرادی که دعوت کرده اید	: $plusinvite
",
        ]);
        botevoobot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"$startbot6",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
               [
                    ['text'=>"🤖 افزودن به گروه",'callback_data'=>"addbot"]
                ],
                [
                ['text'=>"👨‍💻 حساب کاربری",'callback_data'=>"info-pv"],
                 ['text'=>"⚙️ امکانات",'callback_data'=>"help-pv"]
                ],
                [
                 ['text'=>"🔑 پشتیبانی",'callback_data'=>"Support"],   
                ],
           ],
        ])
    ]);
        $user["userjop"]["$from"]["invite"]=$plusinvite;
        $user = json_encode($user,true);
        file_put_contents("data/user.json",$user);
    }
}
 elseif($data=="back-pv"){
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
             'text'=>"$startbot6",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
               [
                    ['text'=>"🤖 افزودن به گروه",'callback_data'=>"addbot"]
                ],
                [
                ['text'=>"👨‍💻 حساب کاربری",'callback_data'=>"info-pv"],
                 ['text'=>"⚙️ امکانات",'callback_data'=>"help-pv"]
                ],
                [
                 ['text'=>"🔑 پشتیبانی",'callback_data'=>"Support"],   
                ],
           ],
        ])
    ]);
}
elseif($data=="test-join"){
if($tchq == 'member' or $tchq == 'creator' or $tchq == 'administrator'){     
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
             'text'=>"$startbot6",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
               [
                    ['text'=>"🤖 افزودن به گروه",'callback_data'=>"addbot"]
                ],
                [
                ['text'=>"👨‍💻 حساب کاربری",'callback_data'=>"info-pv"],
                 ['text'=>"⚙️ امکانات",'callback_data'=>"help-pv"]
                ],
                [
                 ['text'=>"🔑 پشتیبانی",'callback_data'=>"Support"],   
                ],
           ],
        ])
    ]);
}else{
        botevoobot('answercallbackquery',['callback_query_id'=>$update->callback_query->id,'text'=>"❌ برای استفاده از ربات باید در کانال ما عضو باشید .",'show_alert'=>true,
        ]);
}
}
 elseif($data=="addbot"){
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"
🙏 از این که من رو برای مدیریت گروه خودت انتخاب کردی سپاس گزارم 

📍 برای افزودن ربات به گروه خود کافیست از دکمه زیر استفاده کنید
🎈 اگر شرایط و قوانین سرویس مارو نمیدونید از دکمه دریافت قوانین استفاده کنید و کامل مطالعش کنید

❄️ ادامه سرویس دهی به شما بعد از اضافه کردن ربات به گروهتون انجام میشه

🌟 برای دریافت $freedays روز رایگان وارد حساب کاربری خود شوید  👉
       ",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [
 	['text'=>"✅ افزودن به گروه",'url'=>"https://t.me/$usernamebot?startgroup=add"]
            ],
             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);
}
 elseif($data=="help-pv"){
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"
👮🏻‍♂️ امکانات و دستورات کامل ربات $botnamef 

🌟 دستورات مدیریتی $botnamef : 

✅ لیست ادمین
✅ سنجاق [ریپلای]
🔴 حذف سنجاق
🔴 اخراج فرد
🔴 حذف [ریپلای] ( پیام مورد نظر )
✅ پاک کردن [1-99999] ( پیام اخیر )
✅ پاکسازی کلی گروه
✅ تنظیم نام [نام]
✅ تنظیم اطلاعات [متن]
🔴 حذف عکس
✅ تنظیم عکس [ریپلای]
✅ میزان شارژ
✅ اتوماتیک فعال ( خود کار گروه )
🔴 بیصدا همه ( قفل گروه ) 
✅ باصدا همه ( باز کردن گروه
✅ خوش امد [روشن - خاموش]
✅ تنظیم خوش امد [متن]
🔴 بیصدا ( افزودن فرد )
🔴 بیصدا [دقیقه] ( افزودن فرد )
✅ باصدا
🔴 لیست سکوت
✅ حذف لیست سکوت
✅ درخواست شارژ
🔴 افزودن فیلتر [کلمه]
🔴 حذف فیلتر [کلمه]
✅ لیست فیلتر
🔴 حذف لیست فیلتر
🔴 ریستارت تنظیمات ( ریست )
✅ دعوت [روشن | خاموش]
✅ تنظیم دعوت [عدد]
✅ تنظیم اخطار [عدد]
🔴 اخطار [ریپلای]
✅ حذف اخطار [ریپلای]
✅ اطلاعات اخطار [ریپلای]
✅ تنظیم قوانین [متن]
✅ بیصدا همه [دقیقه]
✅ قفل کانال [روشن | خاموش]
✅ تنظیم کانال [@یوزرنیم کانال]
🔴 سختگیرانه ربات [روشن | خاموش]
🔴 سختگیرانه اخطار [روشن | خاموش]
✅  مدیریت کاربر
✅  فان سخنگو
✅ ترفیع کاربر
🔴 تنزل کاربر
✅  ارسال متن با ربات

🌟 دستورات عمومی $botnamef : 

✅ قوانین
✅ لینک
✅ ساعت
✅ فال حافظ
✅ ارز دیجیتال
✅ اطلاعات
✅ من
✅ اطلاعات فرد (ریپلای / ایدی )
✅ $botnamef ( آنلاین بودن )
✅ درخواست پشتیبانی
✅ ریپورت ( ریپلای )
✅ اخراج من

🌟 دستورات قفلی $botnamef : 

( لینک / هشتک / یوزرنیم / متن / ویرایش / ربات / فحش / گیف / عکس / ویدیو / ویس / اهنگ / استیکر / مخاطب / مکان / فوروارد / بازی / فایل / پیام ویدیویی / ریپلای / خدمات / دستورات / قفل خودکار  / کاراکتر / انگلیسی / گروه / تبچی / عضویت )

امکانات جدید به زودی 👌
با $botnamef بهترین باشید ❤️😍😝
       ",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [
 	['text'=>"✅ افزودن به گروه",'url'=>"https://t.me/$usernamebot?startgroup=add"]
            ],
             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);
}
elseif($data=="info-pv"){
if($tchq == 'member' or $tchq == 'creator' or $tchq == 'administrator'){    
   $getuserprofile = getUserProfilePhotos($token,$chatid);
$cuphoto = $getuserprofile->total_count;
$getuserphoto = $getuserprofile->photos[0][0]->file_id;
  $gps2 = $user["gps"]["$chatid"];
        $gps=count($gps2);
date_default_timezone_set(‘Asia/Tehran’);
$timestamp = time();
$date_time = date('H:i:s', $timestamp);
$datet = date('d-m-Y', $timestamp);
if ($getuserphoto != false) {
            botevoobot('sendphoto',[
                'chat_id'=>$chatid,
                   'photo'=>$getuserphoto,
                    'caption'=>"👤 اطلاعات حساب کاربری شما :

🔴 نام شما : $first_name
🔴 یوزرنیم شما : $username
🔴 ایدی عددی شما : $chatid

♻️ تعداد گروه های شما : $gps
🕐 امروز :<code> $datet / $date_time </code>
",
 'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
                           [

                    ],
                     [
                    ['text'=>"🎉 گروه های من",'callback_data'=>"gropme"], ['text'=>"👮🏻‍♂️ خرید ربات",'callback_data'=>"paybot"] 
                    ],
                    [
                    ['text'=>"💎 هفت روز رایگان",'callback_data'=>"Freeme"],['text'=>"🔖 راهنما",'callback_data'=>"helpme"]
                    ],
             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);

    }
    else
    {
     
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"
👤 اطلاعات حساب کاربری شما :

🔴 نام شما : $firstname
🔴 یوزرنیم شما : @$usernames
🔴 ایدی عددی شما : $chatid

♻️ تعداد گروه های شما : $gps
🕐 امروز :<code> $datet / $date_time </code>

       ",
 'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
                           [

                    ],
                     [
                    ['text'=>"🎉 گروه های من",'callback_data'=>"gropme"], ['text'=>"👮🏻‍♂️ خرید ربات",'callback_data'=>"paybot"] 
                    ],
                    [
                    ['text'=>"💎 هفت روز رایگان",'callback_data'=>"Freeme"],['text'=>"🔖 راهنما",'callback_data'=>"helpme"]
                    ],
             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);
        
        
      
    }
}
else{
      botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
            'text'=>"
❌ متاسفانه شما عضو کانال ما نیستید 🤦🏻‍♂️

✅ برای ادامه کار با ربات باید عضو کانال 
ما شوید  😃👇

$nemechannel : @$channel",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"$nemechannel",'url'=>"https://telegram.me/$channel"]
                    ],
            [
          ['text'=>"✅ بررسی عضویت",'callback_data'=>"test-join"]
                    ],
                ]
            ])
        ]);
}
}

elseif($data=="gropme"){
$gps = $user["gps"]["$fromid"];
for($z = 0;$z <= count($gps)-1;$z++){
$result = $result."$gps[$z]"."\n";
}
if($user["gps"]["$fromid"] != null){      
 botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
'text'=>"✅ گروه هایی که توسط شما ثبت شده 
    
<code>$result</code>",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
   [
         ['text'=>"🤖 افزودن به گروه",'url'=>"https://t.me/$usernamebot?startgroup=add"],
     ],
   [
        ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ],
            ]
   ])
        ]);
}else{
 botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
'text'=>"❌ گروهی توسط شما نصب نشده است",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
                 [
                  ['text'=>"🤖 افزودن به گروه",'url'=>"https://t.me/$usernamebot?startgroup=add"]
                ],
                [
                     ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ],
            ]
        ])
]);
  }
  }
elseif($data=="Support"){
				botevoobot('sendmessage',[
		'chat_id'=>$chatid,
		'text'=>"
 ❌ جهت ارتباط با پشتیبانی لطفا پیام خود را ارسال کنید و منتظر پاسخ پشتیبان ها باشید .

⚠️ توجه از ارسال پیام مکرر خودداری کنید که باعث میشود از ربات بلاک بشوید و مطلب ارسالی شما متن باشد و در یک پیام ارسال کنید در صورتی که پاسخ خود را دریافت کردید میتوانید از طریق دکمه زیر ارتباط خود را قطع کنید . 🙏
",
                 'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"❌قطع ارتباط"]
	],
	]
	])
	]);
$user["userjop"]["{$fromid}"]["file"]="sup";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);	
	}
	elseif($update->message && $rt && in_array($from_id,$Dev) && $tc == "private"){
    botevoobot('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"✅ پیام شما برای فرد ارسال شد ."
    ]);
    botevoobot('sendmessage',[
        "chat_id"=>$reply,
        "text"=>"🔆 پشتیبان $botnamef  :

`$textmassage`",
        'parse_mode'=>'MarkDown'
    ]);
}
	elseif($textmassage=="❌قطع ارتباط" or $textmassage=="🔙 برگشت" && $tc == "private"){
 botevoobot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"به منوی اصلی بازگشتید✔️",
   'reply_markup'=>json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true
])
]);

$user["userjop"]["{$from_id}"]["file"]="none";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
 botevoobot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"$startbot6",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
               [
                    ['text'=>"🤖 افزودن به گروه",'callback_data'=>"addbot"]
                ],
                [
                ['text'=>"👨‍💻 حساب کاربری",'callback_data'=>"info-pv"],
                 ['text'=>"⚙️ امکانات",'callback_data'=>"help-pv"]
                ],
                [
                 ['text'=>"🔑 پشتیبانی",'callback_data'=>"Support"],   
                ],
           ],
        ])
    ]);
}
elseif($data=="Freeme"){
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"
 🎊 از این بخش میتونی گروهت رو $freedays روز رایگان شارژ کنی 😍

🎁 برای استفاده اول ربات رو به گروهت ببر بعد از ادمین کردن دستور < نصب رایگان > رو ارسال کن😊

❗️حتما قوانین و شرایط استفاده از ربات مارو کامل مطالعه کن

ادامه سرویس دهی داخل ربات با دستور < پنل > انجام میشود 🌟
       ",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [
 	['text'=>"✅ افزودن به گروه",'url'=>"https://telegram.me/$usernamebot?startgroup=addfree"]
            ],
             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);
}
elseif($data=="paybot"){
    botevoobot('editmessagetext',[
    'chat_id'=>$chatid,
    'message_id'=>$messageid,
    'text'=>"
      🏵 $firstname  به بخش خرید اشتراک خوش آمدید 🌹
در این قسمت با تهیه اشتراک میتوانید مدیریت گروه خود را به آنتی اسپم $botnamef بسپارید

🥇 یک ماه : 5 هزارتومان

بعد از خرید سرویس با پشتیبانی تماس بگیرید تا گروهتون رو شارژ کنیم . اسکرین شات از پرداخت فراموشش نشود ❤️

توجه : برای شارژ مستقیم گروه بهتره بعد از نصب کردن ربات در گروه درخواست شارژت را ارسال کنی تا تعرفه های کامل شارژ برای شما نمایش داده بشه
",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
	[
	['text'=>"🥇 یک ماهه 🥇",'url'=>"$web/pay/pay.php?callback=$web/pay/by-5000.php?id=$fromid&amount=5000"]
	],
             [
                     ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ],
            ],
        ])
    ]);
}
/*
F-a-c-t-w-e-b.ir
*/
elseif($data=="helpme"){
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"☀️ کاربر $chatid
✨ به بخش راهنما خوش آمدید .

🔆 راهنمای نصب :
در صورتی که نمی دانید چگونه ربات را در گروه خود نصب کنید از این بخش استفاده کنید.

🔆 راهنمای قابلیت ها :
درصورتی که نمی دانید چگونه از دستورات و قابلیت های ربات استفاده کنید از این بخش استفاده کنید.

🔑 اگر باز هم سوالی دارید از بخش پشتیبانی از ما بپرسید 😊 .
       ",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
            [
				['text'=>"🛠 راهنمای نصب",'callback_data'=>"adminhelp"],
				['text'=>"🔆 راهنمای قابلیت ها",'callback_data'=>"grophelp"]
				],
             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);
}
elseif($data=="adminhelp"){
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"☀️ کاربر $chatid
🔆 خب برای نصب ربات در گروهت

🤖 وارد آیدی ربات شوید :
 
✅ @$usernamebot
            
روی اسم ربات در بالای صفحه ضربه بزنید

🔻 سپس کلید سه نقطه در بالای صفحه سمت راست را انتخاب کنید.

🔻 سپس گزینه ی Add to group را انتخاب کنید.

🔻 بعدش گروهتونو انتخاب کنین.

‼️☝🏻 حتماً بعد از اضافه کردن ربات آن را ادمین کنید.⚠️ تمام دسترسی ها یک ادمین را به ربات بدهید

بعد از آدمین کردن ربات دستور < نصب رایگان > رو ارسال کنید
       ",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
            [
				['text'=>"✅ یادگرفتم / بعدی",'callback_data'=>"helpnext"]
				],
             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);
}
elseif($data=="helpnext"){
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"☀️ کاربر $chatid
🔆 خب حالا ربات در گروه شما نصب شده .
🔑 حالا میتونی با دستور < پنل > ربات خودت رو مدیریت کنی 😊
💡 اگرم بلد نبودی چکار کنی و دستورات ربات رو بلد نبودی فقط کافیه دستور < راهنما > رو ارسال کنی .
❌ و تمام 
       ",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);
}
elseif($data=="grophelp"){
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"
🔆 راهنمای دستورات مدیریتی :

✅پنل
🔆دریافت پنل تنظیمات و پنل مدیریت گروه

✅تنظیمات
🔆دریافت تنظیمات گروه به صورت متنی

✅ترفیع [ریپلای]
💭ادمین کرد فرد مورد نظر

✅تنزل [ریپلای]
🔆تنزل مقام فرد مورد نظر

✅لیست ادمین
🔆دریافت لیست ادمین های گروه

✅سنجاق [ریپلای]
🔆سنحاق کردن پیام مورد نظر توسط ربات

✅حذف سنجاق
🔆حذف سنجاق پیام سنجاق شده

✅اخراج فرد
🔆اخراج فرد مورد نظر از گروه

✅حذف [ریپلای]
🔆حذف پیام مورد نظر

✅پاک کردن [1-99999]
🔆پاک کردن پیام های اخیر گروه

✅تنظیم نام [نام]
🔆تنظیم نام گروه

✅تنظیم اطلاعات [متن]
🔆تنظیم اطلاعات گروه

✅حذف عکس
🔆حذف عکس گروه

✅تنظیم عکس [ریپلای]
🔆تنظیم عکس گروه

✅میزان شارژ
🔆دریافت میزان شارژ گروه

✅اتوماتیک فعال
🔆فعال کردن قفل ها به صورت خودکار و مدیریت خود کار گروه

✅بیصدا همه
🔆ساکت کردن همه گروه

✅باصدا همه
🔆غیر فعال کردن سکوت گروه

✅خوش امد [روشن - خاموش]
🔆روشن . خاموش کردن خوش امد گویی گروه

✅تنظیم خوش امد [متن]
🔆تنظیم پیام خوش امد

✅بیصدا
🔆افزودن فرد به لیست سکوت گروه

✅بیصدا [دقیقه]
🔆 افزودن فرد به لیست سکوت گروه به صورت زمان داره

✅باصدا
🔆خارج کردن فرد از لیست سکوت گروه

✅لیست سکوت
🔆دریافت لیست سکوت گروه

✅حذف لیست سکوت
🔆 پاک کردن لیست سکوت گروه

✅درخواست شارژ
💭درخواست تمدید شارژ برای گروه

✅افزودن فیلتر [کلمه]
🔆افزودن کلمه به لیست کلمات فیلترشده

✅حذف فیلتر [کلمه]
🔆حذف کلمه از لیست کلمات فیلتر شده

✅لیست فیلتر
🔆دریافت لیست کلمات فیلتر شد

✅حذف لیست فیلتر
🔆پاک کردن تمام کلمات درون لیست فیلتر

✅ریستارت تنظیمات
🔆ریستارت کردن تنظیمات گروه به حالت اولیه

✅دعوت [روشن | خاموش]
🔆روشن و خاموش کردن اد اجباری در گروه

✅تنظیم دعوت [عدد]
🔆تنظیم مقدار کاربری که یک فرد باید دعوت کند تا بتواند در گروه چت کند

✅تنظیم اخطار [عدد]
🔆 تنظیم حداکثر اخطار برای کاربر

✅اخطار [ریپلای]
🔆 اخطار دادن به کاربر مورد نظر

✅حذف اخطار [ریپلای]
🔆 کم کردن اخطار های کاربر مورد نظر

✅اطلاعات اخطار [ریپلای]
🔆 به دست اوردن تعداد اخطار های کاربر

✅تنظیم قوانین [متن]
🔆 تنظیم قوانین گروه

✅بیصدا همه [دقیقه]
🔆سکوت همه به صورت زمان دار

✅قفل کانال [روشن | خاموش]
🔆روشن و خاموش کردن قفل کانال

✅تنظیم کانال [@یوزرنیم کانال]
🔆 قفل کردن ربات روی کانال تنظیم شد

✅سختگیرانه ربات [روشن | خاموش]
🔆 روشن و خاموش کردن حالت سختگیرانه اضافه کردن ربات

✅سختگیرانه اخطار [روشن | خاموش]
🔆 روشن و خاموش کردن حالت سختگیرانه اخراج کاربر پس از رسیدن به حداکثر اخطار

✅ مدیریت کاربر ( ریپلای )
🔆 مدیریت کردن فرد مورد نظر

✅ فان روشن / خاموش
🔆 روشن و خاموش کردن حالت صحبت کردن ربات

⚠️ ایموجی های ابتدای دستورات را وارد کنید
🔆 در جای که علامت های () وجود دارد در دستور از آن ها استفاده نکنید
🎉 میتوانید در متن خوش امد و قوانین برای گرفتن نام و ایدی فرد مورد نظر از موارد زیر استفاده کنید .
🎈gpname = دریافت نام‌ گروه
🎈username = دریافت یوزرنیم طرف

🔸 مثال دستورات :
خوش امد روشن
       ",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
            [
				['text'=>"✅ یادگرفتم / بعدی",'callback_data'=>"helpnextgrop"]
				],
             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);
}
elseif($data=="helpnextgrop"){
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"🔆 راهنمای دستورات عمومی :

✅قوانین
🔆دریافت قوانین گروه

✅لینک
🔆دریافت لینک گروه

✅ساعت
🔆دریافت تاریخ و ساعت

✅ایدی
🔆دریافت اطلاعات خودتان

✅من
🔆دریافت اطلاعات شما به همراه مقام شما در ربات

✅ تمدید
🔆دریافت نرخ برای خرید ربات

✅ اطلاعات
🔆دریافت اطلاعات گروه و خودتان

✅اطلاعات فرد [ریپلای| ایدی]
🔆دریافت اطلاعات فرد مورد نظر

✅ انلاینی
🔆اطمینان حاصل کردن از انلاینی ربات


✅درخواست پشتیبانی
🔆در صورت وجود مشکل با ارسال این دستور پشتیبانی به گروه شما اعزام میشود

✅ریپورت [ریپلای]
🔆ارسال گزارش برای مدیر گروه

✅اخراج من
🔆اخراج شما از گروه

✅عکس پروفایل [عدد]
🔆دریافت عکس پروفایل شما به عدد

✅ ! ( ریپلای و تایپ )
🔆 گفتن حرف شما با ربات

✅ کد رایگان
🔆  شارژ کردن گروه با استفاده از کد شارژ رایگان

⚠️ ایموجی های ابتدای دستور را وارد نکنید

❇️ در جای که علامت های () وجود دارد در دستورات از آن ها استفاده نکنید

🔅 مثال : $botnamef
       ",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
            [
				['text'=>"✅ یادگرفتم / بعدی",'callback_data'=>"helpnextgropnext"]
				],
             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);
}
elseif($data=="helpnextgropnext"){
            botevoobot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"
🔅 راهنمای دستورات قفلی :

❌ پاک کردن و پاک نکردن دستورات زیر

✅ مثال : ( قفل لینک ) ( بازکردن لینک )

🔅 لیست قفل ها : 

( لینک / تگ / یوزرنیم / متن / ویرایش / ربات / فحش / گیف / عکس / ویدیو / اهنگ / ویس / استیکر / مخاطب / فوروارد / مکان / فایل /بازی / پیام ویدیویی / ریپلای / دستورات / خدمات / کاراکتر / انگلیسی / تبچی / عضویت / گروه )

✅ روشن و خاموش کردت قفل خودکار گروه
🔅قفل خودکار ( روشن / خاموش )
🔅 تنظیم قفل خودکار 00:00 07:00 

✅ تنظیم قفل کاراکتر
🔅تنظیم کاراکتر 10 320 

❌ ایموجی های ابتدایی دستورات را وارد کنید
       ",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[

             [
          ['text'=>"🔙 برگشت",'callback_data'=>"back-pv"]
                    ]
            ]
            ])
        ]);
}

?>