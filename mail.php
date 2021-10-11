<?php
$type = $_POST['type'];
$name = $_POST['name'];
$mailTo = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];

mb_language("Japanese"); 
mb_internal_encoding("UTF-8");

//メール送信内容（ユーザー）
$email1 = "enq_form.sakuraweb@gen-imai.sakura.ne.jp"; //送信元
$subject1 = "【enqform】お問合せ完了の通知"; // 題名 
$body1 = "お問い合わせいただきありがとうございます。\n" // 本文
        ."以下の内容で送信いたしました。\n"
        ."ーーーーーーーーーーーーーーーーーーーーーー\n"
        ."件名:{$type}\n"
        ."名前:{$name}\n"
        ."メールアドレス:{$mailTo}\n"
        ."電話番号:{$number}\n"
        ."お問合せ内容:{$message}\n"
        ."ーーーーーーーーーーーーーーーーーーーーーー\n";
$to1 = $mailTo; //送信先
$header1 = "From: $email\nReply-To: $email\n";

//メール送信内容（管理者）
$email2 = "enq_form.sakuraweb@gen-imai.sakura.ne.jp"; //送信元
$subject2 = "【enqform】お問合せの通知"; // 題名 
$body2 = "{$name}様より以下の内容でお問合せがありました。\n" // 本文
        ."確認してください。\n"
        ."ーーーーーーーーーーーーーーーーーーーーーー\n"
        ."件名:{$type}\n"
        ."名前:{$name}\n"
        ."メールアドレス:{$mailTo}\n"
        ."電話番号:{$number}\n"
        ."お問合せ内容:{$message}\n"
        ."ーーーーーーーーーーーーーーーーーーーーーー\n";
$to2 = 'eichi_kite@yahoo.co.jp'; //送信先
$header2 = "From: $email\nReply-To: $email\n";
?>