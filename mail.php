<?php
$type = $_POST['type'];
$name = $_POST['name'];
$mailTo = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];

mb_language("Japanese"); 
mb_internal_encoding("UTF-8");

$email = "enq_form.sakuraweb@gen-imai.sakura.ne.jp"; //送信元
$subject = "【enqform】お問合せ完了の通知"; // 題名 
$body = "お問い合わせいただきありがとうございます。\n" // 本文
        ."以下の内容で送信いたしました。\n"
        ."ーーーーーーーーーーーーーーーーーーーーーー\n"
        ."件名:{$type}\n"
        ."名前:{$name}\n"
        ."メールアドレス:{$mailTo}\n"
        ."電話番号:{$number}\n"
        ."お問合せ内容:{$message}\n"
        ."ーーーーーーーーーーーーーーーーーーーーーー\n";
$to = $mailTo; //送信先
$header = "From: $email\nReply-To: $email\n";
?>