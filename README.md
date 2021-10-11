# [enq_form](https://enqform.sakuraweb.com)
ノンフレームワークのPHPで作成しました。  
DB登録、メール送信機能があります。
  
  
### 開発環境  
macOS BigSur   
PHP7.3    
Bootstrap5  
MySQL  
さくらレンタルサーバー  
  
  
### 制作期間  
約2日間  
  
  
### 問題、工夫箇所
##### 問題点  
・今までmysql_connectを用いたDB接続しかやったことがなかったためPDO接続を理解するのに少し時間がかかった。  
・修正ボタンで入力フォームに戻る際のtextareaの値保持。  
  
##### 工夫した点  
・修正ボタンで入力フォームに戻る際、入力値を保持したかったので  
jQueryを使用してconfirm.phpから修正ボタンの場合にはaction属性をindex.phpにしてsubmitし、  
送信ボタンの場合はaction属性をcomplete.phpにしてsubmitできるようにした。
```
$('.btn').click(function() {
  $(this).parents('form').attr('action', $(this).data('action'));
  $(this).parents('form').submit();
});
```
・電話番号はハイフンなし、半角数字で統一したかったためconfirm.phpで整形。
```
<?php 
$numChecked = mb_convert_kana($_POST['number'], 'n', 'UTF-8'); 
$numChecked = str_replace('-','',$numChecked);
$_POST['number'] = $numChecked;
echo $_POST['number'];
?>
```
  
    
### 改善点  
・環境変数の利用（db.phpおよびmail.php）  
・セキュリティ対策
　　
  
### テスト内容  
・メールの送信  
・DBのINSERT確認  
・フォームバリデーション    
  
  
### 参考サイト  
[PHPでメール送信を行う方法：mb_send_mail()](https://uxmilk.jp/15057)  
[PHPでMySQLに接続する方法【さくらのレンタルサーバ利用】](https://note.com/koushikagawa/n/n43a478b8193f)  
[PHPでデータベースへデータ登録（INSERT）する方法](https://nagablog.info/php-pdo-insert/)
